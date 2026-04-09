<?php

namespace App\Http\Controllers;

use App\Exports\JadwalTemplateExport;
use App\Exports\NilaiTemplateExport;
use App\Imports\JadwalImport;
use App\Imports\NilaiImport;
use App\Models\Registration;
use App\Models\Student;
use App\Models\TestPractice;
use App\Models\TestWritten;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    /**
     * Menampilkan halaman beranda admin.
     */
    public function index()
    {
        $admin = auth('admin')->user();
        $stat = [
            'total'     => Registration::count(),
            'belum'     => Registration::where('status_verifikasi', 'Pending')->where('is_locked', false)->count(),
            'pending'   => Registration::where('status_verifikasi', 'Pending')->where('is_locked', true)->count(),
            'revisi'    => Registration::where('status_verifikasi', 'Ditolak')->count(),
            'disetujui' => Registration::where('status_verifikasi', 'Disetujui')->count(),
            'lulus'     => Registration::where('lulus', true)->count(),
        ];

        return view('admin.pages.beranda', compact('admin', 'stat'));
    }

    /**
     * Menampilkan halaman daftar siswa.
     */
    public function studentList()
    {
        return view('admin.pages.pendaftar-daftar');
    }
    /**
     * Datatable daftar siswa.
     */
    public function studentData()
    {
        $data = Student::query()->with(['registration']);

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status_data', function ($data) {
                if ($data->registration->status_data) {
                    return '<span class="badge rounded-pill bg-success">Lengkap</span>';
                }
                return '<span class="badge rounded-pill bg-danger">Belum lengkap</span>';
            })
            ->addColumn('status_dokumen', function ($data) {
                if ($data->registration->status_dokumen) {
                    return '<span class="badge rounded-pill bg-success">Lengkap</span>';
                }
                return '<span class="badge rounded-pill bg-danger">Belum lengkap</span>';
            })
            ->addColumn('status_verifikasi', function ($data) {
                if ($data->registration->status_verifikasi === 'Disetujui') {
                    return '<span class="badge rounded-pill bg-success">Disetujui</span>';
                } elseif ($data->registration->status_verifikasi === 'Ditolak') {
                    return '<span class="badge rounded-pill bg-danger">Ditolak</span>';
                }
                return '<span class="badge rounded-pill bg-secondary">Pending</span>';
            })
            ->addColumn('aksi', function ($data) {
                $deleteButton = '';
                if (auth('admin')->user()->role === 'superadmin') {
                    $deleteButton = '
                    <form action="' . route('admin.student.delete', $data->id) . '" method="post">
                        ' . csrf_field() . '
                        ' . method_field("DELETE") . '
                        <button type="button" class="btn btn-icon btn-danger waves-effect waves-light btn-hapus" data-nama="' . $data->nama_lengkap . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                            <span class="ti ti-trash"></span>
                        </button>
                    </form>';
                }

                return '
                <div class="d-inline-flex align-items-center gap-1">
                    <a href="' . route('admin.student.detail', $data->nisn) . '" class="btn btn-icon btn-info waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                        <span class="ti ti-eye"></span>
                    </a>
                    ' . $deleteButton . '
                </div>
                ';
            })
            ->rawColumns(['aksi', 'status_data', 'status_dokumen', 'status_verifikasi'])
            ->toJson();
    }

    /**
     * Menampilkan halaman detail siswa.
     */
    public function studentDetail(Student $student)
    {
        $student->load('guardian', 'documents');
        $docs = $student->documents->pluck('path', 'jenis_dokumen')->toArray();
        return view('admin.pages.pendaftar-detail', compact('student', 'docs'));
    }


    /**
     * Menampilkan halaman daftar & datatable siswa yang perlu verifikasi.
     */
    public function studentConfirmList()
    {
        return view('admin.pages.pendaftar-verifikasi');
    }

    public function studentConfirmData()
    {
        $data = Student::query()->whereHas('registration', function ($q) {
            $q->where('is_locked', true)
                ->where('status_verifikasi', 'Pending');
        })->with(['registration']);

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('tgl_konfirmasi', function ($data) {
                return '<strong>' . $data->registration->locked_at->translatedFormat('d F Y') . '</strong>' .
                    '<br><small>' . $data->registration->locked_at->format('H:i') . ' WIB | ' . $data->registration->locked_at->diffForHumans()  . '</small>';
            })
            ->addColumn('aksi', function ($data) {
                return '
                <div class="d-inline-flex align-items-center gap-1">
                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Verifikasi">
                        <button class="btn btn-icon btn-info waves-effect waves-light btn-verifikasi" data-bs-toggle="modal" data-bs-target="#modalVerifikasi" data-nisn="' . $data->nisn . '">
                            <span class="ti ti-checkbox"></span>
                        </button>
                    </span>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'tgl_konfirmasi'])
            ->toJson();
    }

    /**
     * datatable siswa yang ditolak.
     */
    public function studentRejectedData()
    {
        $data = Student::query()->whereHas('registration', function ($q) {
            $q->where('status_verifikasi', 'Ditolak');
        })->with(['registration']);

        return DataTables::of($data)
            ->addIndexColumn()
            ->toJson();
    }

    /**
     * Menghasilkan data detail siswa dalam format JSON.
     */
    public function getStudentDetail(Student $student)
    {
        $student->load([
            'religion',
            'registration',
            'documents',
            'guardian.fatherJob',
            'guardian.motherJob',
            'guardian.waliJob',
            'guardian.fatherEducation',
            'guardian.motherEducation',
            'guardian.waliEducation',
        ]);
        return response()->json($student);
    }


    /**
     * Menampilkan halaman daftar & datatable siswa yang disetujui.
     */
    public function studentApprovedList()
    {
        return view('admin.pages.pendaftar-disetujui');
    }

    public function studentApprovedData()
    {
        $data = Student::query()->whereHas('registration', function ($q) {
            $q->where('status_verifikasi', 'Disetujui');
        })->with(['registration']);

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                return '
                <div class="d-inline-flex align-items-center gap-1">
                    <form action="' . route('admin.student.cancel.approved', $data->id) . '" method="post">
                        ' . csrf_field() . '
                        ' . method_field("PUT") . '
                        <button type="button" class="btn btn-icon btn-warning waves-effect waves-light btn-batal" data-nama="' . $data->nama_lengkap . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Batal Verifikasi">
                            <span class="ti ti-arrow-back"></span>
                        </button>
                    </form>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    /**
     * Hapus calon siswa.
     */
    public function studentDelete(Student $student)
    {
        if (auth('admin')->user()->role !== 'superadmin') {
            abort(403);
        }
        $student->delete();
        return back()->with('sukses', 'Calon siswa berhasil dihapus!');
    }

    public function verify(Request $request, Student $student)
    {
        $request->validate([
            'status_verifikasi' => 'required|in:Disetujui,Ditolak',
            'pesan_ditolak' => 'required_if:status_verifikasi,Ditolak|max:255',
        ]);

        if ($request->status_verifikasi == 'Ditolak') {
            $student->registration->update([
                'status_verifikasi' => $request->status_verifikasi,
                'rejected_message' => $request->pesan_ditolak,
                'is_locked' => false,
            ]);
            return back()->with('sukses', 'Calon siswa ditolak dan konfirmasi dibuka kembali.');
        } else {

            $student->registration->update([
                'status_verifikasi' => $request->status_verifikasi,
                'rejected_message' => null,
            ]);
            return back()->with('sukses', 'Calon siswa disetujui.');
        }
    }

    public function cancelApproved(Student $student)
    {
        $student->registration->update([
            'status_verifikasi' => 'Pending',
        ]);
        return back()->with('sukses', 'Verifikasi dibatalkan.');
    }

    /**
     * Mengelola penjadwalan tes.
     */
    public function testPraktik()
    {
        $hasTest = TestPractice::exists();
        return view('admin.pages.tes-praktik', compact('hasTest'));
    }

    public function testTertulis()
    {
        $hasTest = TestWritten::exists();
        return view('admin.pages.tes-tertulis', compact('hasTest'));
    }

    public function testPraktikData()
    {
        $data = TestPractice::with('student.registration');
        return DataTables::of($data)
            ->addIndexColumn()
            ->toJson();
    }

    public function testTertulisData()
    {
        $data = TestWritten::with('student.registration');
        return DataTables::of($data)
            ->addIndexColumn()
            ->toJson();
    }

    public function downloadTemplateJadwal()
    {
        return Excel::download(new JadwalTemplateExport, 'template-jadwal-tes.xlsx');
    }

    public function downloadTemplateNilai()
    {
        return Excel::download(new NilaiTemplateExport, 'template-input-nilai.xlsx');
    }

    public function importJadwal(Request $request)
    {
        $request->validate([
            'jadwal_tes' => 'required|mimes:xlsx,xls|max:1024',
            'type' => 'required|in:praktik,tertulis',
        ]);

        $import = new JadwalImport($request->type);
        Excel::import($import, $request->file('jadwal_tes'));

        return back()->with([
            'import_summary' => [
                'total' => $import->total,
                'success' => $import->success,
                'failed' => $import->failed,
            ],
            'import_errors' => array_slice($import->errors, 0, 10), // batasi 10 error
        ]);
    }

    public function importNilai(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:1024',
        ]);

        $import = new NilaiImport();
        Excel::import($import, $request->file('file'));

        return response()->json([
            'message' => 'Import selesai',
            'summary' => [
                'total' => $import->total,
                'success' => $import->success,
                'failed' => $import->failed,
            ],
            'errors' => array_slice($import->errors, 0, 10)
        ]);
    }

    public function clearJadwal(Request $request)
    {
        $request->validate([
            'type' => 'required|in:praktik,tertulis',
        ]);;

        if ($request->type === 'praktik') {
            TestPractice::truncate();
        } else {
            TestWritten::truncate();
        }
        return back()->with('sukses', 'Jadwal berhasil dikosongkan');
    }

    /**
     * Mengelola nilai dan kelulusan.
     */
    public function scoring()
    {
        return view(('admin.pages.penilaian'));
    }

    public function scoringData()
    {
        $data = Student::query()
            ->whereHas('registration', function ($q) {
                $q->where('status_verifikasi', 'Disetujui');
            })
            ->whereHas('testPractice')
            ->whereHas('testWritten')
            ->with(['registration', 'testPractice', 'testWritten'])
            ->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('final_score', function ($data) {
                $practiceScore = $data->testPractice->score;
                $writtenScore = $data->testWritten->score;

                if ($practiceScore === null && $writtenScore === null) {
                    return 0;
                }
                return ($practiceScore * 0.6) + ($writtenScore * 0.4);
            })
            ->addColumn('keterangan', function ($data) {
                if ($data->testPractice->score === null && $data->testWritten->score === null) {
                    return '<span class="badge rounded-pill bg-secondary">Belum ujian</span>';
                }
                if ($data->registration->lulus) {
                    return '<span class="badge rounded-pill bg-success">Lulus</span>';
                }
                return '<span class="badge rounded-pill bg-danger">Tidak Lulus</span>';
            })
            ->rawColumns(['keterangan'])
            ->toJson();
    }

    public function passed(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:students,id',
        ]);

        Student::whereIn('id', $request->ids)->each(function ($student) {
            $student->registration->update(['lulus' => true]);
        });

        return response()->json(['message' => 'Siswa berhasil ditandai lulus.']);
    }

    public function failed(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:students,id',
        ]);

        Student::whereIn('id', $request->ids)->each(function ($student) {
            $student->registration->update(['lulus' => false]);
        });

        return response()->json(['message' => 'Siswa berhasil ditandai tidak lulus.']);
    }
}
