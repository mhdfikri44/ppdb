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
                    <label for="nama_lengkap" class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control max-255"
                        placeholder="Masukkan nama lengkap" value="{{ old('nama_lengkap', $student->nama_lengkap ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('nama_lengkap')
                        <div id="nama_lengkap" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="nik" class="form-label fw-bold">NIK</label>
                    <input type="text" id="nik" name="nik" class="form-control max-16 angka"
                        placeholder="Masukkan nomor induk kependudukan" value="{{ old('nik', $student->nik ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('nik')
                        <div id="nik" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="tempat_lahir" class="form-label fw-bold">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control max-100"
                        placeholder="Masukkan tempat lahir" value="{{ old('tempat_lahir', $student->tempat_lahir ?? '') }}"
                        @disabled($student->registration->is_locked) />
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
                    <label for="hobi" class="form-label fw-bold">Hobi</label>
                    <input type="text" id="hobi" name="hobi" class="form-control max-100"
                        placeholder="Masukkan hobi" value="{{ old('hobi', $student->hobi ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('hobi')
                        <div id="hobi" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="cita_cita" class="form-label fw-bold">Cita-cita</label>
                    <input type="text" id="cita_cita" name="cita_cita" class="form-control max-100"
                        placeholder="Masukkan cita-cita" value="{{ old('cita_cita', $student->cita_cita ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('cita_cita')
                        <div id="cita_cita" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="prestasi" class="form-label fw-bold">
                        Prestasi <span class="form-text text-primary fst-italic">*Jika ada</span>
                    </label>
                    <textarea id="prestasi" name="prestasi" class="form-control max-255" rows="3" style="resize: none;"
                        placeholder="Masukkan Prestasi yang pernah diraih" @disabled($student->registration->is_locked)>{{ old('prestasi', $student->prestasi ?? '') }}</textarea>
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
                    <textarea id="penyakit" name="penyakit" class="form-control max-255" rows="3" style="resize: none;"
                        placeholder="Masukkan penyakit yang pernah diderita" @disabled($student->registration->is_locked)>{{ old('penyakit', $student->penyakit ?? '') }}</textarea>
                    @error('penyakit')
                        <div id="penyakit" class="form-text text-danger">
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
