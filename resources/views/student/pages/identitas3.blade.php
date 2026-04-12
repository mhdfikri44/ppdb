@extends('student.pages.identitas', ['subpage' => 'Data Sekolah Asal'])

@section('step')
    <!-- Data Sekolah Asal -->
    <div class="tab-pane fade active show" id="data-asal-sekolah" role="tabpanel">
        <div class="content-header my-3">
            <h5 class="mb-0 text-primary">Data Rumah & Keluarga</h5>
        </div>
        <form action="{{ route('student.update3', $student->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="no_kk" class="form-label fw-bold">No. Kartu Keluarga</label>
                    <input type="text" id="no_kk" name="no_kk" class="form-control max-16 angka"
                        placeholder="Masukkan nomor kartu keluarga" value="{{ old('no_kk', $student->no_kk ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('no_kk')
                        <div id="no_kk" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="alamat" class="form-label fw-bold">Alamat Rumah</label>
                    <input type="text" id="alamat" name="alamat" class="form-control max-255"
                        placeholder="Masukkan alamat rumah" value="{{ old('alamat', $student->alamat ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('alamat')
                        <div id="alamat" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="house_status_id" class="form-label fw-bold">Status Kepemilikan Rumah</label>
                    <select id="house_status_id" name="house_status_id" class="select2" @disabled($student->registration->is_locked)>
                        <option label="" selected disabled>Pilih salah satu</option>
                        @foreach ($houseStatuses as $houseStatus)
                            <option value="{{ $houseStatus->id }}" @selected(old('house_status_id', $student->house_status_id) == $houseStatus->id)>
                                {{ $houseStatus->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('house_status_id')
                        <div id="house_status_id" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="anak_keberapa" class="form-label fw-bold">Anak Keberapa</label>
                    <input type="text" id="anak_keberapa" name="anak_keberapa" class="form-control max-3 angka"
                        placeholder="Masukkan anak keberapa"
                        value="{{ old('anak_keberapa', $student->anak_keberapa ?? '') }}" @disabled($student->registration->is_locked) />
                    @error('anak_keberapa')
                        <div id="anak_keberapa" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="jumlah_saudara" class="form-label fw-bold">Jumlah Saudara</label>
                    <div class="input-group">
                        <input type="text" id="jumlah_saudara" name="jumlah_saudara" class="form-control max-3 angka"
                            placeholder="Masukkan jumlah saudara"
                            value="{{ old('jumlah_saudara', $student->jumlah_saudara ?? '') }}"
                            @disabled($student->registration->is_locked) />
                        <span class="input-group-text">Saudara</span>
                    </div>
                    @error('jumlah_saudara')
                        <div id="jumlah_saudara" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="transportasi" class="form-label fw-bold">Transportasi Ke sekolah</label>
                    <input type="text" id="transportasi" name="transportasi" class="form-control max-50"
                        placeholder="Masukkan transportasi yang digunakan"
                        value="{{ old('transportasi', $student->transportasi ?? '') }}" @disabled($student->registration->is_locked) />
                    @error('transportasi')
                        <div id="transportasi" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="jarak_tempuh" class="form-label fw-bold">Jarak Tempuh Ke sekolah</label>
                    <div class="input-group">
                        <input type="text" id="jarak_tempuh" name="jarak_tempuh" class="form-control max-3 desimal"
                            placeholder="Masukkan jarak tempuh"
                            value="{{ old('jarak_tempuh', $student->jarak_tempuh ?? '') }}" @disabled($student->registration->is_locked) />
                        <span class="input-group-text">Kilometer</span>
                    </div>
                    @error('jarak_tempuh')
                        <div id="jarak_tempuh" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="waktu_tempuh" class="form-label fw-bold">Waktu Tempuh Ke sekolah</label>
                    <div class="input-group">
                        <input type="text" id="waktu_tempuh" name="waktu_tempuh" class="form-control max-3 angka"
                            placeholder="Masukkan waktu tempuh"
                            value="{{ old('waktu_tempuh', $student->waktu_tempuh ?? '') }}" @disabled($student->registration->is_locked) />
                        <span class="input-group-text">Menit</span>
                    </div>
                    @error('waktu_tempuh')
                        <div id="waktu_tempuh" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 d-flex justify-content-between pt-4">
                    <a href="{{ route('student.edit2') }}" type="button" class="btn btn-label-secondary btn-prev">
                        <i class="ti ti-arrow-left me-sm-1"></i>
                        <span class="align-middle d-sm-inline-block d-none">Sebelumnya</span>
                    </a>
                    @if (!$student->registration->is_locked)
                        <button type="submit" class="btn btn-success">Simpan</button>
                    @else
                        <button type="button" class="btn btn-primary btn-next" disabled>
                            <span class="align-middle d-sm-inline-block d-none">Selanjutnya</span>
                            <i class="ti ti-arrow-right"></i>
                        </button>
                    @endif
                </div>
        </form>
    </div>
@endsection
