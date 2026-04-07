@extends('student.pages.identitas', ['subpage' => 'Data Sekolah Asal'])

@section('step')
    <!-- Data Sekolah Asal -->
    <div class="tab-pane fade active show" id="data-asal-sekolah" role="tabpanel">
        <div class="content-header my-3">
            <h5 class="mb-0 text-primary">Data Sekolah Asal</h5>
        </div>
        <form action="{{ route('student.update3', $student->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="nisn" class="form-label fw-bold">NISN</label>
                    <input type="text" id="nisn" name="nisn" class="form-control max-10 angka"
                        placeholder="Masukkan nisn" value="{{ old('nisn', $student->nisn ?? '') }}" disabled />
                    @error('nisn')
                        <div id="nisn" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="tahun_lulus" class="form-label fw-bold">Tahun Lulus</label>
                    <input type="text" id="tahun_lulus" name="tahun_lulus" class="form-control max-4 angka"
                        placeholder="Masukkan tahun lulus" value="{{ old('tahun_lulus', $student->tahun_lulus ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('tahun_lulus')
                        <div id="tahun_lulus" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="asal_sekolah" class="form-label fw-bold">Asal Sekolah</label>
                    <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control max-255"
                        placeholder="Masukkan sekolah sebelumnya"
                        value="{{ old('asal_sekolah', $student->asal_sekolah ?? '') }}" @disabled($student->registration->is_locked) />
                    @error('asal_sekolah')
                        <div id="asal_sekolah" class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="alamat_asal_sekolah" class="form-label fw-bold">Alamat Asal Sekolah</label>
                    <input type="text" id="alamat_asal_sekolah" name="alamat_asal_sekolah" class="form-control max-255"
                        placeholder="Masukkan alamat sekolah sebelumnya"
                        value="{{ old('alamat_asal_sekolah', $student->alamat_asal_sekolah ?? '') }}"
                        @disabled($student->registration->is_locked) />
                    @error('alamat_asal_sekolah')
                        <div id="alamat_asal_sekolah" class="form-text text-danger">
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
