<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    /**
     * Menampilkan halaman beranda admin.
     */
    public function index()
    {
        $admin = Admin::findOrFail(1);

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
     * Display the form for creating new admin.
     */
    public function create()
    {
        //
    }

    /**
     * Storing new created admin.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove admin from list.
     */
    public function destroy(Admin $admin)
    {
        //
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
        // dd($data->get()->toArray());

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
            ->addColumn('aksi', function ($data) {
                return '
                <div class="d-inline-flex align-items-center gap-1">
                    <a href="' . route('admin.student.detail', $data->nisn) . '" class="btn btn-icon btn-info waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                        <span class="ti ti-eye"></span>
                    </a>
                    <form action="' . route('admin.student.delete', $data->id) . '" method="post">
                        ' . csrf_field() . '
                        ' . method_field("DELETE") . '
                        <button type="button" class="btn btn-icon btn-warning waves-effect waves-light btn-hapus" data-nama="' . $data->nama_lengkap . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                            <span class="ti ti-trash"></span>
                        </button>
                    </form>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'status_data', 'status_dokumen'])
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
}
