@extends('student.pages.identitas', ['subpage' => 'Data Keluarga'])

@section('step')
    <!-- Data Keluarga -->
    <div class="tab-pane fade active show" id="data-keluarga" role="tabpanel">
        <div class="content-header my-3">
            <h5 class="mb-0 text-primary">Data Keluarga</h5>
        </div>
        <form action="{{ route('student.update2', $student->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="row g-3">
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
                    <label for="tempat_tinggal" class="form-label fw-bold">Tempat Tinggal</label>
                    <select id="tempat_tinggal" name="tempat_tinggal" class="select2" @disabled($student->registration->is_locked)>
                        <option label="" selected disabled>Pilih salah satu</option>
                        <option value="Bersama orang tua" @selected(old('tempat_tinggal', $student->tempat_tinggal ?? '') == 'Bersama orang tua')>Bersama orang tua</option>
                        <option value="Kos" @selected(old('tempat_tinggal', $student->tempat_tinggal ?? '') == 'Kos')>Kos</option>
                        <option value="Lainnya" @selected(old('tempat_tinggal', $student->tempat_tinggal ?? '') == 'Lainnya')>Lainnya</option>
                    </select>
                    @error('tempat_tinggal')
                        <div id="tempat_tinggal" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="transportasi" class="form-label fw-bold">Transportasi Kesekolah</label>
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
                    <label for="jarak_tempuh" class="form-label fw-bold">Jarak Tempuh Kesekolah</label>
                    <div class="input-group">
                        <input type="text" id="jarak_tempuh" name="jarak_tempuh" class="form-control max-6 desimal"
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
                    <label for="waktu_tempuh" class="form-label fw-bold">Waktu Tempuh Kesekolah</label>
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
                <div class="col-sm-6 mb-5">
                    <label for="no_kip_pkh_kks_kps" class="form-label fw-bold">
                        No. KIP/PKH/KKS/KPS <span class="form-text text-primary fst-italic">*Opsional</span>
                    </label>
                    <input type="text" id="no_kip_pkh_kks_kps" name="no_kip_pkh_kks_kps"
                        class="form-control max-30 angka" placeholder="Masukkan nomor kartu yang dimiliki"
                        value="{{ old('no_kip_pkh_kks_kps', $student->no_kip_pkh_kks_kps ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('no_kip_pkh_kks_kps')
                        <div id="no_kip_pkh_kks_kps" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- =================================== DATA AYAH =================================== --}}
                <div class="divider divider-primary mb-0">
                    <div class="divider-text">Data Ayah</div>
                </div>

                <div class="col-sm-6">
                    <label for="nama_ayah" class="form-label fw-bold">Nama Ayah</label>
                    <input type="text" id="nama_ayah" name="nama_ayah" class="form-control max-255"
                        placeholder="Masukkan nama ayah"
                        value="{{ old('nama_ayah', $student->guardian->nama_ayah ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('nama_ayah')
                        <div id="nama_ayah" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="nik_ayah" class="form-label fw-bold">NIK Ayah</label>
                    <input type="text" id="nik_ayah" name="nik_ayah" class="form-control max-16 angka"
                        placeholder="Masukkan nomor induk kependudukan"
                        value="{{ old('nik_ayah', $student->guardian->nik_ayah ?? '') }}" @disabled($student->registration->is_locked) />
                    @error('nik_ayah')
                        <div id="nik_ayah" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="tempat_lahir_ayah" class="form-label fw-bold">Tempat Lahir Ayah</label>
                    <input type="text" id="tempat_lahir_ayah" name="tempat_lahir_ayah" class="form-control max-255"
                        placeholder="Masukkan tempat lahir ayah"
                        value="{{ old('tempat_lahir_ayah', $student->guardian->tempat_lahir_ayah ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('tempat_lahir_ayah')
                        <div id="tempat_lahir_ayah" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="tanggal_lahir_ayah" class="form-label fw-bold">Tanggal Lahir Ayah</label>
                    <input type="date" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" class="form-control"
                        value="{{ old('tanggal_lahir_ayah', $student->guardian->tanggal_lahir_ayah ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('tanggal_lahir_ayah')
                        <div id="tanggal_lahir_ayah" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="father_education_id" class="form-label fw-bold">Pendidikan Ayah</label>
                    <select id="father_education_id" name="father_education_id" class="select2"
                        @disabled($student->registration->is_locked)>
                        <option label="" selected disabled>Pilih salah satu</option>
                        @foreach ($educations as $education)
                            <option value="{{ $education->id }}" @selected(old('father_education_id', $student->father_education_id) == $education->id)>
                                {{ $education->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('father_education_id')
                        <div id="father_education_id" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="father_occupation_id" class="form-label fw-bold">Pekerjaan Ayah</label>
                    <select id="father_occupation_id" name="father_occupation_id" class="select2"
                        @disabled($student->registration->is_locked)>
                        <option label="" selected disabled>Pilih salah satu</option>
                        @foreach ($occupations as $occupation)
                            <option value="{{ $occupation->id }}" @selected(old('father_occupation_id', $student->father_occupation_id) == $occupation->id)>
                                {{ $occupation->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('father_occupation_id')
                        <div id="father_occupation_id" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label class="form-label fw-bold" for="penghasilan_ayah">Penghasilan Ayah</label>
                    <input type="text" name="penghasilan_ayah" id="penghasilan_ayah"
                        class="form-control max-20 penghasilan" placeholder="Masukkan penghasilan perbulan"
                        value="{{ old('penghasilan_ayah', $student->guardian->penghasilan_ayah ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('penghasilan_ayah')
                        <div id="penghasilan_ayah" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="hp_ayah" class="form-label fw-bold">HP/WA Ayah</label>
                    <input type="text" class="form-control phone" id="hp_ayah" name="hp_ayah"
                        placeholder="Masukkan nomor hp/wa"
                        value="{{ old('hp_ayah', $student->guardian->hp_ayah ?? '') }}" @disabled($student->registration->is_locked) />
                    @error('hp_ayah')
                        <div id="hp_ayah" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6 mb-5">
                    <label class="form-label fw-bold" for="keterangan_ayah">Keterangan Ayah</label>
                    <select class="select2" name="keterangan_ayah" id="keterangan_ayah" @disabled($student->registration->is_locked)>
                        <option label="" selected disabled>Pilih salah satu</option>
                        <option value="Masih Hidup" @selected(old('keterangan_ayah', $student->guardian->keterangan_ayah ?? '') == 'Masih Hidup')>Masih Hidup</option>
                        <option value="Meninggal" @selected(old('keterangan_ayah', $student->guardian->keterangan_ayah ?? '') == 'Meninggal')>Meninggal</option>
                        <option value="Cerai" @selected(old('keterangan_ayah', $student->guardian->keterangan_ayah ?? '') == 'Cerai')>Cerai</option>
                    </select>
                    @error('keterangan_ayah')
                        <div id="keterangan_ayah" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- =================================== DATA IBU =================================== --}}
                <div class="divider divider-primary mb-0">
                    <div class="divider-text">Data Ibu</div>
                </div>

                <div class="col-sm-6">
                    <label for="nama_ibu" class="form-label fw-bold">Nama Ibu</label>
                    <input type="text" id="nama_ibu" name="nama_ibu" class="form-control max-255"
                        placeholder="Masukkan nama ibu" value="{{ old('nama_ibu', $student->guardian->nama_ibu ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('nama_ibu')
                        <div id="nama_ibu" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="nik_ibu" class="form-label fw-bold">NIK Ibu</label>
                    <input type="text" id="nik_ibu" name="nik_ibu" class="form-control max-16 angka"
                        placeholder="Masukkan nomor induk kependudukan"
                        value="{{ old('nik_ibu', $student->guardian->nik_ibu ?? '') }}" @disabled($student->registration->is_locked) />
                    @error('nik_ibu')
                        <div id="nik_ibu" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="tempat_lahir_ibu" class="form-label fw-bold">Tempat Lahir Ibu</label>
                    <input type="text" id="tempat_lahir_ibu" name="tempat_lahir_ibu" class="form-control max-255"
                        placeholder="Masukkan tempat lahir ibu"
                        value="{{ old('tempat_lahir_ibu', $student->guardian->tempat_lahir_ibu ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('tempat_lahir_ibu')
                        <div id="tempat_lahir_ibu" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="tanggal_lahir_ibu" class="form-label fw-bold">Tanggal Lahir Ibu</label>
                    <input type="date" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" class="form-control"
                        value="{{ old('tanggal_lahir_ibu', $student->guardian->tanggal_lahir_ibu ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('tanggal_lahir_ibu')
                        <div id="tanggal_lahir_ibu" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="mother_education_id" class="form-label fw-bold">Pendidikan Ibu</label>
                    <select id="mother_education_id" name="mother_education_id" class="select2"
                        @disabled($student->registration->is_locked)>
                        <option label="" selected disabled>Pilih salah satu</option>
                        @foreach ($educations as $education)
                            <option value="{{ $education->id }}" @selected(old('mother_education_id', $student->mother_education_id) == $education->id)>
                                {{ $education->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('mother_education_id')
                        <div id="mother_education_id" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="mother_occupation_id" class="form-label fw-bold">Pekerjaan Ibu</label>
                    <select id="mother_occupation_id" name="mother_occupation_id" class="select2"
                        @disabled($student->registration->is_locked)>
                        <option label="" selected disabled>Pilih salah satu</option>
                        @foreach ($occupations as $occupation)
                            <option value="{{ $occupation->id }}" @selected(old('mother_occupation_id', $student->mother_occupation_id) == $occupation->id)>
                                {{ $occupation->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('mother_occupation_id')
                        <div id="mother_occupation_id" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label class="form-label fw-bold" for="penghasilan_ibu">Penghasilan Ibu</label>
                    <input type="text" name="penghasilan_ibu" id="penghasilan_ibu"
                        class="form-control max-20 penghasilan" placeholder="Masukkan penghasilan perbulan"
                        value="{{ old('penghasilan_ibu', $student->guardian->penghasilan_ibu ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('penghasilan_ibu')
                        <div id="penghasilan_ibu" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="hp_ibu" class="form-label fw-bold">HP/WA Ibu</label>
                    <input type="text" class="form-control phone" id="hp_ibu" name="hp_ibu"
                        placeholder="Masukkan nomor hp/wa" value="{{ old('hp_ibu', $student->guardian->hp_ibu ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('hp_ibu')
                        <div id="hp_ibu" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6 mb-5">
                    <label class="form-label fw-bold" for="keterangan_ibu">Keterangan Ibu</label>
                    <select class="select2" name="keterangan_ibu" id="keterangan_ibu" @disabled($student->registration->is_locked)>
                        <option label="" selected disabled>Pilih salah satu</option>
                        <option value="Masih Hidup" @selected(old('keterangan_ibu', $student->guardian->keterangan_ibu ?? '') == 'Masih Hidup')>Masih Hidup</option>
                        <option value="Meninggal" @selected(old('keterangan_ibu', $student->guardian->keterangan_ibu ?? '') == 'Meninggal')>Meninggal</option>
                        <option value="Cerai" @selected(old('keterangan_ibu', $student->guardian->keterangan_ibu ?? '') == 'Cerai')>Cerai</option>
                    </select>
                    @error('keterangan_ibu')
                        <div id="keterangan_ibu" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- =================================== DATA WALI (OPSIONAL) =================================== --}}
                <div class="divider divider-primary mb-0">
                    <h5 class="divider-text">Data Wali (Opsional)</h5>
                </div>

                <div class="col-sm-6">
                    <label for="nama_wali" class="form-label fw-bold">Nama Wali <span
                            class="form-text text-primary fst-italic">*Opsional</span></label>
                    <input type="text" id="nama_wali" name="nama_wali" class="form-control max-255"
                        placeholder="Masukkan nama wali"
                        value="{{ old('nama_wali', $student->guardian->nama_wali ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('nama_wali')
                        <div id="nama_wali" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="tempat_lahir_wali" class="form-label fw-bold">Tempat Lahir Wali <span
                            class="form-text text-primary fst-italic">*Opsional</span></label>
                    <input type="text" id="tempat_lahir_wali" name="tempat_lahir_wali" class="form-control max-255"
                        placeholder="Masukkan tempat lahir wali"
                        value="{{ old('tempat_lahir_wali', $student->guardian->tempat_lahir_wali ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('tempat_lahir_wali')
                        <div id="tempat_lahir_wali" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="tanggal_lahir_wali" class="form-label fw-bold">Tanggal Lahir Wali <span
                            class="form-text text-primary fst-italic">*Opsional</span></label>
                    <input type="date" id="tanggal_lahir_wali" name="tanggal_lahir_wali" class="form-control"
                        value="{{ old('tanggal_lahir_wali', $student->guardian->tanggal_lahir_wali ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('tanggal_lahir_wali')
                        <div id="tanggal_lahir_wali" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="wali_education_id" class="form-label fw-bold">Pendidikan Wali <span
                            class="form-text text-primary fst-italic">*Opsional</span></label>
                    <select id="wali_education_id" name="wali_education_id" class="select2"
                        @disabled($student->registration->is_locked)>
                        <option label="" selected disabled>Pilih salah satu</option>
                        @foreach ($educations as $education)
                            <option value="{{ $education->id }}" @selected(old('wali_education_id', $student->wali_education_id) == $education->id)>
                                {{ $education->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('wali_education_id')
                        <div id="wali_education_id" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="wali_occupation_id" class="form-label fw-bold">Pekerjaan Wali <span
                            class="form-text text-primary fst-italic">*Opsional</span></label>
                    <select id="wali_occupation_id" name="wali_occupation_id" class="select2"
                        @disabled($student->registration->is_locked)>
                        <option label="" selected disabled>Pilih salah satu</option>
                        @foreach ($occupations as $occupation)
                            <option value="{{ $occupation->id }}" @selected(old('wali_occupation_id', $student->wali_occupation_id) == $occupation->id)>
                                {{ $occupation->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('wali_occupation_id')
                        <div id="wali_occupation_id" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label class="form-label fw-bold" for="penghasilan_wali">Penghasilan Wali <span
                            class="form-text text-primary fst-italic">*Opsional</span></label>
                    <input type="text" name="penghasilan_wali" id="penghasilan_wali"
                        class="form-control max-20 penghasilan" placeholder="Masukkan penghasilan perbulan"
                        value="{{ old('penghasilan_wali', $student->guardian->penghasilan_wali ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('penghasilan_wali')
                        <div id="penghasilan_wali" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="hp_wali" class="form-label fw-bold">HP/WA Wali <span
                            class="form-text text-primary fst-italic">*Opsional</span></label>
                    <input type="text" class="form-control phone" id="hp_wali" name="hp_wali"
                        placeholder="Masukkan nomor hp/wa"
                        value="{{ old('hp_wali', $student->guardian->hp_wali ?? '') }}" @disabled($student->registration->is_locked) />
                    @error('hp_wali')
                        <div id="hp_wali" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 d-flex justify-content-between">
                    <a href="{{ route('student.edit1') }}" type="button" class="btn btn-label-secondary btn-prev">
                        <i class="ti ti-arrow-left me-sm-1"></i>
                        <span class="align-middle d-sm-inline-block d-none">Sebelumnya</span>
                    </a>
                    @if (!$student->registration->is_locked)
                        <button type="submit" class="btn btn-success">Simpan</button>
                    @else
                        <a href="{{ route('student.edit3') }}" type="button" class="btn btn-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none">Selanjutnya</span>
                            <i class="ti ti-arrow-right"></i>
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection
