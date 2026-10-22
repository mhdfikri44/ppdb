@extends('student.pages.identitas', ['subpage' => 'Data Pribadi'])

@section('step')
    <!-- Data Pribadi -->
    <div class="tab-pane fade active show" id="data-pribadi" role="tabpanel">
        <div class="content-header my-3">
            <h5 class="mb-0 text-primary">Data Pribadi</h5>
        </div>
        <form action="{{ route('student.update1', $student->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="nisn" class="form-label fw-bold">NISN</label>
                    <input type="text" id="nisn" class="form-control max-10 angka" placeholder="Masukkan nisn"
                        value="{{ old('nisn', $student->nisn ?? '') }}" disabled />
                </div>
                <div class="col-sm-6">
                    <label for="nama_lengkap" class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control max-255" placeholder="Masukkan nama lengkap"
                        value="{{ old('nama_lengkap', $student->nama_lengkap ?? '') }}" @disabled($student->registration->is_locked) />
                    @error('nama_lengkap')
                        <div id="nama_lengkap" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="nik" class="form-label fw-bold">NIK</label>
                    <input type="text" id="nik" name="nik" class="form-control max-16 angka" placeholder="Masukkan nomor induk kependudukan"
                        value="{{ old('nik', $student->nik ?? '') }}" @disabled($student->registration->is_locked) />
                    @error('nik')
                        <div id="nik" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="tempat_lahir" class="form-label fw-bold">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control max-100" placeholder="Masukkan tempat lahir"
                        value="{{ old('tempat_lahir', $student->tempat_lahir ?? '') }}" @disabled($student->registration->is_locked) />
                    @error('tempat_lahir')
                        <div id="tempat_lahir" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control"
                        value="{{ old('tanggal_lahir', $student->tanggal_lahir ?? '') }}" @disabled($student->registration->is_locked) />
                    @error('tanggal_lahir')
                        <div id="tanggal_lahir" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="select2" @disabled($student->registration->is_locked)>
                        <option label="" disabled selected>Pilih salah satu</option>
                        <option value="L" @selected(old('jenis_kelamin', $student->jenis_kelamin ?? '') == 'L')>Laki-laki</option>
                        <option value="P" @selected(old('jenis_kelamin', $student->jenis_kelamin ?? '') == 'P')>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div id="jenis_kelamin" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="religion_id" class="form-label fw-bold">Agama</label>
                    <select id="religion_id" name="religion_id" class="select2" @disabled($student->registration->is_locked)>
                        <option label="" selected disabled>Pilih salah satu</option>
                        @foreach ($religions as $religion)
                            <option value="{{ $religion->id }}" @selected(old('religion_id', $student->religion_id) == $religion->id)>
                                {{ $religion->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('religion_id')
                        <div id="religion_id" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="hobby_id" class="form-label fw-bold">Hobi</label>
                    <select id="hobby_id" name="hobby_id" class="select2" @disabled($student->registration->is_locked)>
                        <option label="" selected disabled>Pilih salah satu</option>
                        @foreach ($hobbies as $hobby)
                            <option value="{{ $hobby->id }}" @selected(old('hobby_id', $student->hobby_id) == $hobby->id)>
                                {{ $hobby->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('hobby_id')
                        <div id="hobby_id" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="dream_id" class="form-label fw-bold">Cita-cita</label>
                    <select id="dream_id" name="dream_id" class="select2" @disabled($student->registration->is_locked)>
                        <option label="" selected disabled>Pilih salah satu</option>
                        @foreach ($dreams as $dream)
                            <option value="{{ $dream->id }}" @selected(old('dream_id', $student->dream_id) == $dream->id)>
                                {{ $dream->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('dream_id')
                        <div id="dream_id" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="tahun_lulus" class="form-label fw-bold">Tahun Lulus</label>
                    <input type="text" id="tahun_lulus" name="tahun_lulus" class="form-control max-4 angka" placeholder="Masukkan tahun lulus"
                        value="{{ old('tahun_lulus', $student->tahun_lulus ?? '') }}" @disabled($student->registration->is_locked) />
                    @error('tahun_lulus')
                        <div id="tahun_lulus" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="asal_sekolah" class="form-label fw-bold">Asal Sekolah</label>
                    <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control max-255"
                        placeholder="Masukkan sekolah sebelumnya" value="{{ old('asal_sekolah', $student->asal_sekolah ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('asal_sekolah')
                        <div id="asal_sekolah" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="alamat_asal_sekolah" class="form-label fw-bold">Alamat Asal Sekolah</label>
                    <input type="text" id="alamat_asal_sekolah" name="alamat_asal_sekolah" class="form-control max-255"
                        placeholder="Masukkan alamat sekolah sebelumnya" value="{{ old('alamat_asal_sekolah', $student->alamat_asal_sekolah ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('alamat_asal_sekolah')
                        <div id="alamat_asal_sekolah" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="funder_id" class="form-label fw-bold">Yang Membiayai Sekolah</label>
                    <select id="funder_id" name="funder_id" class="select2" @disabled($student->registration->is_locked)>
                        <option label="" selected disabled>Pilih salah satu</option>
                        @foreach ($funders as $funder)
                            <option value="{{ $funder->id }}" @selected(old('funder_id', $student->funder_id) == $funder->id)>
                                {{ $funder->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('funder_id')
                        <div id="funder_id" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <label for="prestasi" class="form-label fw-bold">
                        Prestasi <span class="form-text text-primary fst-italic">*Jika ada</span>
                    </label>
                    <input type="text" id="prestasi" name="prestasi" class="form-control max-255"
                        placeholder="Masukkan prestasi yang pernah diraih" value="{{ old('prestasi', $student->prestasi ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('prestasi')
                        <div id="prestasi" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="penyakit" class="form-label fw-bold">
                        Penyakit <span class="form-text text-primary fst-italic">*Jika ada</span>
                    </label>
                    <input type="text" id="penyakit" name="penyakit" class="form-control max-255"
                        placeholder="Masukkan penyakit yang pernah diderita" value="{{ old('penyakit', $student->penyakit ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('penyakit')
                        <div id="penyakit" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6 mb-5">
                    <label for="no_kip_pkh_kks_kps" class="form-label fw-bold">
                        No. KIP/PKH/KKS/KPS <span class="form-text text-primary fst-italic">*Jika ada</span>
                    </label>
                    <input type="text" id="no_kip_pkh_kks_kps" name="no_kip_pkh_kks_kps" class="form-control max-30"
                        placeholder="Masukkan nomor kartu yang dimiliki" value="{{ old('no_kip_pkh_kks_kps', $student->no_kip_pkh_kks_kps ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('no_kip_pkh_kks_kps')
                        <div id="no_kip_pkh_kks_kps" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 d-flex justify-content-between">
                    <button type="button" class="btn btn-label-secondary btn-prev" disabled>
                        <i class="ti ti-arrow-left me-sm-1"></i>
                        <span class="align-middle d-sm-inline-block d-none">Sebelumnya</span>
                    </button>
                    @if (!$student->registration->is_locked)
                        <button type="submit" class="btn btn-success">Simpan</button>
                    @else
                        <a href="{{ route('student.edit2') }}" type="button" class="btn btn-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none">Selanjutnya</span>
                            <i class="ti ti-arrow-right"></i>
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection
