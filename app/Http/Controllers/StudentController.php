<?php

namespace App\Http\Controllers;

use App\Models\Dream;
use App\Models\Education;
use App\Models\Funder;
use App\Models\Hobby;
use App\Models\HouseStatus;
use App\Models\Occupation;
use App\Models\Religion;
use App\Models\Setting;
use App\Models\Status;
use App\Models\TestPractice;
use App\Models\TestWritten;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Menampilkan halaman beranda siswa.
     */
    public function index()
    {
        $student = auth('student')->user();
        $pasfoto = $student->documents->where('jenis_dokumen', 'pasfoto')->first();
        $pasfotoUrl = $pasfoto
            ? route('student.file.show', $pasfoto->path)
            : asset('assets/img/mts/profile-default.jpg');

        $reg = $student->registration;
        $status = [
            'is_result_publish' => Setting::get('final_result_published'),
            'is_open' => Setting::get('ppdb_open'),
            'data'        => $reg->status_data ? 'Lengkap' : 'Belum lengkap',
            'dokumen'     => $reg->status_dokumen ? 'Lengkap' : 'Belum lengkap',
            'konfirmasi'  => $reg->is_locked,
            'pendaftaran' => [
                'status'  => 'Belum lengkap',
                'ket'     => '',
                'warna'   => 'warning',
                'icon'    => 'file-description'
            ],
        ];

        // status pendaftaran
        if (!$reg->status_data && !$reg->status_dokumen) {
            $status['pendaftaran']['ket'] = 'Lengkapi data & dokumen terlebih dahulu.';
        } elseif (!$reg->status_dokumen) {
            $status['pendaftaran']['ket'] = 'Lengkapi dokumen terlebih dahulu.';
        } elseif (!$reg->is_locked && $reg->status_verifikasi === 'Pending') {
            $status['pendaftaran']['status'] = 'Belum konfirmasi';
            $status['pendaftaran']['ket'] = 'Konfirmasi untuk melanjutkan pendaftaran.';
            $status['pendaftaran']['icon'] = 'send';
        } elseif ($reg->is_locked && $reg->status_verifikasi === 'Pending') {
            $status['pendaftaran']['status'] = 'Sudah konfirmasi';
            $status['pendaftaran']['ket'] = 'Menunggu verifikasi dari panitia.';
            $status['pendaftaran']['warna'] = 'info';
            $status['pendaftaran']['icon'] = 'clock';
        } elseif ($reg->status_verifikasi === 'Ditolak') {
            $status['pendaftaran']['status'] = 'Pendaftaran ditolak';
            $status['pendaftaran']['ket'] = 'Alasan penolakan: ' . $reg->rejected_message;
            $status['pendaftaran']['warna'] = 'danger';
            $status['pendaftaran']['icon'] = 'alert-circle';
        } elseif ($reg->status_verifikasi === 'Disetujui') {
            $status['pendaftaran']['status'] = 'Pendaftaran disetujui';
            $status['pendaftaran']['ket'] = 'Selamat ya! Pendaftaranmu sudah disetujui.';
            $status['pendaftaran']['warna'] = 'success';
            $status['pendaftaran']['icon'] = 'circle-check';
        }

        // alur pendaftaran
        $alur = [
            'data'       => $reg->status_data ? 'Selesai' : 'Belum Selesai',
            'dokumen'    => $reg->status_dokumen ? 'Selesai' : 'Belum Selesai',
            'konfirmasi' => $reg->is_locked ? 'Selesai' : 'Belum Selesai',
            'verifikasi' => $reg->status_verifikasi
        ];

        return view('student.pages.beranda', compact('student', 'pasfotoUrl', 'status', 'alur'));
    }

    /**
     * Menampilkan halaman edit data pribadi.
     */
    public function edit1()
    {
        /** @var \App\Models\Student $student */
        $student = auth('student')->user();
        $student->load('registration');
        $religions = Religion::all();
        $hobbies = Hobby::all();
        $dreams = Dream::all();
        $funders = Funder::all();
        return view('student.pages.identitas1', compact(
            'student',
            'religions',
            'hobbies',
            'dreams',
            'funders'
        ));
    }

    /**
     * Menampilkan halaman edit data keluarga.
     */
    public function edit2()
    {
        /** @var \App\Models\Student $student */
        $student = auth('student')->user();
        $student->load('guardian', 'registration');

        if (!$student->registration->is_biodata_complete) {
            return back()->with('error', 'Lengkapi dahulu data pribadi.');
        }

        $student->guardian->penghasilan_ayah
            = $student->guardian->penghasilan_ayah ? number_format($student->guardian->penghasilan_ayah, 0, ',', '.') : '';
        $student->guardian->penghasilan_ibu
            = $student->guardian->penghasilan_ibu ? number_format($student->guardian->penghasilan_ibu, 0, ',', '.') : '';
        $student->guardian->penghasilan_wali
            = $student->guardian->penghasilan_wali ? number_format($student->guardian->penghasilan_wali, 0, ',', '.') : '';

        $educations = Education::all();
        $occupations = Occupation::all();
        $statuses = Status::all();
        return view('student.pages.identitas2', compact(
            'student',
            'occupations',
            'educations',
            'statuses'
        ));
    }

    /**
     * Menampilkan halaman edit data sekolah asal.
     */
    public function edit3()
    {
        /** @var \App\Models\Student $student */
        $student = auth('student')->user();
        $student->load('guardian', 'registration');
        $houseStatuses = HouseStatus::all();

        if (!$student->registration->is_biodata_complete) {
            return back()->with('error', 'Lengkapi dahulu data pribadi.');
        }

        if (!$student->registration->is_family_complete) {
            return back()->with('error', 'Lengkapi dahulu data orang tua.');
        }

        return view('student.pages.identitas3', compact('student', 'houseStatuses'));
    }

    /**
     * Simpan perubahan data pribadi.
     */
    public function update1(Request $request)
    {
        /** @var \App\Models\Student $student */
        $student = auth('student')->user();

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|digits:16|unique:students,nik,' . $student->id,
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'religion_id' => 'required|exists:religions,id',
            'hobby_id' => 'required|exists:hobbies,id',
            'dream_id' => 'required|exists:dreams,id',
            'funder_id' => 'required|exists:funders,id',
            'tahun_lulus' => 'required|digits:4',
            'asal_sekolah' => 'required|string|max:255',
            'alamat_asal_sekolah' => 'required|string|max:255',

            'prestasi' => 'nullable|string|max:255',
            'penyakit' => 'nullable|string|max:255',
            'no_kip_pkh_kks_kps' => 'nullable|string|max:30',
        ], [
            'religion_id.required' => 'Agama wajib dipilih.',
            'hobby_id.required' => 'Hobi wajib dipilih.',
            'dream_id.required' => 'Cita-cita wajib dipilih.',
            'funder_id.required' => 'Yang Membiayai Sekolah wajib dipilih.',
            'religion_id.exists' => 'Pilihan tidak valid.',
            'hobby_id.exists' => 'Pilihan tidak valid.',
            'dream_id.exists' => 'Pilihan tidak valid.',
            'funder_id.exists' => 'Pilihan tidak valid.',
        ]);

        $student->update([
            'nama_lengkap' => ucwords(strtolower($request->nama_lengkap)),
            'nik' => $request->nik,
            'tempat_lahir' => ucwords(strtolower($request->tempat_lahir)),
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'religion_id' => $request->religion_id,
            'hobby_id' => $request->hobby_id,
            'dream_id' => $request->dream_id,
            'funder_id' => $request->funder_id,
            'tahun_lulus' => $request->tahun_lulus,
            'asal_sekolah' => ucwords(strtolower($request->asal_sekolah)),
            'alamat_asal_sekolah' => $request->alamat_asal_sekolah,

            'prestasi' => $request->prestasi ? ucfirst(strtolower($request->prestasi)) : null,
            'penyakit' => $request->penyakit ? ucfirst(strtolower($request->penyakit)) : null,
            'no_kip_pkh_kks_kps' => $request->no_kip_pkh_kks_kps ? $request->no_kip_pkh_kks_kps : null,
        ]);

        $student->registration->update([
            'is_biodata_complete' => true,
        ]);

        return redirect()->route('student.edit2')->with('sukses', 'Berhasil menyimpan data pribadi!');
    }

    /**
     * Simpan perubahan data keluarga.
     */
    public function update2(Request $request)
    {
        /** @var \App\Models\Student $student */
        $student = auth('student')->user();

        $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|digits:16',
            'tempat_lahir_ayah' => 'required|string|max:50',
            'tanggal_lahir_ayah' => 'required|date',
            'father_education_id' => 'required|exists:educations,id',
            'father_occupation_id' => 'required|exists:occupations,id',
            'penghasilan_ayah' => 'required|string|max:20',
            'hp_ayah' => 'required|string|max:15',
            'father_status_id' => 'required|exists:statuses,id',

            'nama_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|digits:16',
            'tempat_lahir_ibu' => 'required|string|max:50',
            'tanggal_lahir_ibu' => 'required|date',
            'mother_education_id' => 'required|exists:educations,id',
            'mother_occupation_id' => 'required|exists:occupations,id',
            'penghasilan_ibu' => 'required|string|max:20',
            'hp_ibu' => 'required|string|max:15',
            'mother_status_id' => 'required|exists:statuses,id',

            'nama_wali' => 'nullable|string|max:255',
            'nik_wali' => 'nullable|digits:16',
            'tempat_lahir_wali' => 'nullable|string|max:50',
            'tanggal_lahir_wali' => 'nullable|date',
            'wali_education_id' => 'nullable|exists:educations,id',
            'wali_occupation_id' => 'nullable|exists:occupations,id',
            'penghasilan_wali' => 'nullable|string|max:20',
            'hp_wali' => 'nullable|string|max:15',
        ], [
            'father_education_id.required' => 'Pendidikan ayah wajib dipilih.',
            'father_education_id.exists'   => 'Pilihan tidak valid.',
            'father_occupation_id.required' => 'Pekerjaan ayah wajib dipilih.',
            'father_occupation_id.exists'   => 'Pilihan tidak valid.',
            'father_status_id.required' => 'Status ayah wajib dipilih.',
            'father_status_id.exists'   => 'Pilihan tidak valid.',
            'mother_education_id.required' => 'Pendidikan ibu wajib dipilih.',
            'mother_education_id.exists'   => 'Pilihan tidak valid.',
            'mother_occupation_id.required' => 'Pekerjaan ibu wajib dipilih.',
            'mother_occupation_id.exists'   => 'Pilihan tidak valid.',
            'mother_status_id.required' => 'Status ibu wajib dipilih.',
            'mother_status_id.exists'   => 'Pilihan tidak valid.',
            'wali_education_id.exists'   => 'Pilihan tidak valid.',
            'wali_occupation_id.exists'   => 'Pilihan tidak valid.',
        ]);

        $student->guardian->update([
            'nama_ayah' => ucwords(strtolower($request->nama_ayah)),
            'nik_ayah' => $request->nik_ayah,
            'tempat_lahir_ayah' => ucwords(strtolower($request->tempat_lahir_ayah)),
            'tanggal_lahir_ayah' => $request->tanggal_lahir_ayah,
            'father_education_id' => $request->father_education_id,
            'father_occupation_id' => $request->father_occupation_id,
            'penghasilan_ayah' => str_replace('.', '', $request->penghasilan_ayah),
            'hp_ayah' => $request->hp_ayah,
            'father_status_id' => $request->father_status_id,

            'nama_ibu' => ucwords(strtolower($request->nama_ibu)),
            'nik_ibu' => $request->nik_ibu,
            'tempat_lahir_ibu' => ucwords(strtolower($request->tempat_lahir_ibu)),
            'tanggal_lahir_ibu' => $request->tanggal_lahir_ibu,
            'mother_education_id' => $request->mother_education_id,
            'mother_occupation_id' => $request->mother_occupation_id,
            'penghasilan_ibu' => str_replace('.', '', $request->penghasilan_ibu),
            'hp_ibu' => $request->hp_ibu,
            'mother_status_id' => $request->mother_status_id,

            'nama_wali' => $request->nama_wali ? ucwords(strtolower($request->nama_wali)) : null,
            'nik_wali' => $request->nik_wali ? $request->nik_wali : null,
            'tempat_lahir_wali' => $request->tempat_lahir_wali ? ucwords(strtolower($request->tempat_lahir_wali)) : null,
            'tanggal_lahir_wali' => $request->tanggal_lahir_wali ? $request->tanggal_lahir_wali : null,
            'wali_education_id' => $request->wali_education_id ? $request->wali_education_id : null,
            'wali_occupation_id' => $request->wali_occupation_id ? $request->wali_occupation_id : null,
            'penghasilan_wali' => $request->penghasilan_wali ? str_replace('.', '', $request->penghasilan_wali) : null,
            'hp_wali' => $request->hp_wali ? $request->hp_wali : null
        ]);

        $student->registration->update([
            'is_family_complete' => true,
        ]);

        return redirect()->route('student.edit3')->with('sukses', 'Berhasil menyimpan data orang tua!');
    }

    /**
     * Simpan perubahan data sekolah asal.
     */
    public function update3(Request $request)
    {
        /** @var \App\Models\Student $student */
        $student = auth('student')->user();

        $request->validate([
            'no_kk' => 'required|digits:16',
            'alamat' => 'required|string|max:255',
            'house_status_id' => 'required|exists:house_statuses,id',
            'anak_keberapa' => 'required|integer|min:1|lte:jumlah_saudara',
            'jumlah_saudara' => 'required|integer|min:0|max:999',
            'transportasi' => 'required|string|max:50',
            'jarak_tempuh' => 'required|numeric|min:0.1|max:100',
            'waktu_tempuh' => 'required|integer|min:1|max:300',
        ], [
            'house_status_id.required' => 'Status tempat tinggal wajib dipilih.',
            'house_status_id.exists' => 'Status tidak valid.',
        ]);

        $student->update([
            'no_kk' => $request->no_kk,
            'alamat' => $request->alamat,
            'house_status_id' => $request->house_status_id,
            'anak_keberapa' => $request->anak_keberapa,
            'jumlah_saudara' => $request->jumlah_saudara,
            'tempat_tinggal' => $request->tempat_tinggal,
            'transportasi' => ucwords(strtolower($request->transportasi)),
            'jarak_tempuh' => $request->jarak_tempuh,
            'waktu_tempuh' => $request->waktu_tempuh,
        ]);

        $student->registration->update([
            'status_data' => true,
        ]);

        return redirect()->route('student.document')->with('sukses', 'Berhasil menyimpan data rumah dan keluarga!');
    }

    /**
     * Menampilkan halaman dokumen siswa.
     */
    public function document()
    {
        /** @var \App\Models\Student $student */
        $student = auth('student')->user();
        $student->load('documents', 'registration');

        if (!$student->registration->status_data) {
            return redirect()->route('student.edit1')->with('error', 'Lengkapi dahulu data identitas.');
        }

        $requiredDocs = [
            'pasfoto',
            'suket_sekolah',
            'kk',
            'ktp',
            'akta',
            'nisn',
            'suket_ngaji'
        ];

        $docs = $student->documents->pluck('path', 'jenis_dokumen')->toArray();

        $uploadedDocs = $student->documents
            ->pluck('path', 'jenis_dokumen') // ambil dokumen yang sudah diupload
            ->keys() // ambil key-nya saja (jenis_dokumen)
            ->toArray();
        $missingDocs = array_diff($requiredDocs, $uploadedDocs);
        $allDocsUploaded = empty($missingDocs);
        $emptyDocs = implode(', ', array_map(fn($d) => str_replace('_', ' ', $d), $missingDocs));

        return view('student.pages.dokumen', compact('student', 'docs', 'emptyDocs', 'allDocsUploaded'));
    }

    /**
     * Simpan unggahan dokumen siswa.
     */
    public function upload(Request $request, $jenis)
    {
        /** @var \App\Models\Student $student */
        $student = auth('student')->user();

        $request->validate([
            $jenis => 'required|mimes:png,jpg,jpeg,pdf|max:2048'
        ]);

        $file = $request->file($jenis); // ambil file yang diupload
        $extension = $file->getClientOriginalExtension(); // ambil extensi/format file asli
        $filename = $student->nisn . '_' . $jenis . '.' . $extension; // nama file {nisn}_{jenis}.{extensi}

        // Cek apakah sebelumnya sudah ada file untuk jenis ini
        $existing = $student->documents()->where('jenis_dokumen', $jenis)->first();
        if ($existing) {
            // Hapus file lama dari storage
            if (Storage::exists($existing->path)) {
                Storage::delete($existing->path);
            }
        }

        $path = $file->storeAs(
            'document/' . str_replace('_', '-', $jenis),  // nama folder
            $filename
        );

        $student->documents()->updateOrCreate(
            ['jenis_dokumen' => $jenis],
            ['path' => $path]
        );

        return back()->with('sukses', 'Dokumen berhasil diunggah!');
    }

    /**
     * Kunci unggahan dokumen.
     */
    public function lock()
    {
        /** @var \App\Models\Student $student */
        $student = auth('student')->user();

        $student->registration->update([
            'status_dokumen' => true
        ]);
        return redirect()->route('student.index')->with('sukses', 'Berhasil mengunci dokumen!');
        // return back()->with('sukses', 'Berhasil mengunci dokumen!');
    }

    /**
     * Buka kunci unggahan dokumen.
     */
    public function unlock()
    {
        /** @var \App\Models\Student $student */
        $student = auth('student')->user();

        $student->registration->update([
            'status_dokumen' => false
        ]);
        return back()->with('sukses', 'Berhasil membuka kunci dokumen!');
    }

    /**
     * Konfirmasi pendaftaran siswa.
     */
    public function confirm()
    {
        /** @var \App\Models\Student $student */
        $student = auth('student')->user();

        $student->registration->generateNoPendaftaran();
        return redirect()->route('student.index')->with('sukses-konfirmasi', 'Pendaftaran berhasil dikonfirmasi.');
    }

    public function cetakKartuTes()
    {
        /** @var \App\Models\Student $student */
        $student = auth('student')->user();
        $pasfoto = $student->documents->where('jenis_dokumen', 'pasfoto')->first();

        $fotoBase64 = null;
        if ($pasfoto && $pasfoto->path) {
            $pathFile = storage_path('app/private/' . $pasfoto->path);

            if (file_exists($pathFile)) {
                $type = pathinfo($pathFile, PATHINFO_EXTENSION);
                $data = file_get_contents($pathFile);
                $fotoBase64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            }
        }

        $tes['praktik'] = TestPractice::where('student_id', $student->id)->first();
        $tes['tertulis'] = TestWritten::where('student_id', $student->id)->first();

        $pdf = FacadePdf::loadView('pdf.kartu-tes', compact('student', 'tes', 'fotoBase64'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('kartu-tes.pdf');
    }

    public function cetakSuratNgaji()
    {
        /** @var \App\Models\Student $student */
        $student = auth('student')->user();

        $pdf = FacadePdf::loadView('pdf.surat-mengaji', compact('student'))
            ->setPaper('A4', 'portrait');;

        return $pdf->stream('format-surat-mengaji.pdf');
    }

    public function cetakFormulir()
    {
        /** @var \App\Models\Student $student */
        $data = auth('student')->user();

        $pdf = FacadePdf::loadView('pdf.formulir-penerimaan', compact('data'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('formulir-penerimaan.pdf');
    }

    public function seeResult()
    {
        /** @var \App\Models\Student $student */
        $student = auth('student')->user();

        $student->registration->update([
            'has_seen_result' => true
        ]);
        return redirect()->route('student.index');
    }

    /**
     * Remove user from list.
     */
    public function destroy()
    {
        //
    }
}
