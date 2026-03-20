<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guardian extends Model
{
    use HasFactory;

    protected $appends = [
        'tempat_tanggal_lahir_ayah',
        'tempat_tanggal_lahir_ibu',
        'tempat_tanggal_lahir_wali',

        'penghasilan_ayah_label',
        'penghasilan_ibu_label',
        'penghasilan_wali_label',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function fatherJob()
    {
        return $this->belongsTo(Occupation::class, 'father_occupation_id');
    }
    public function motherJob()
    {
        return $this->belongsTo(Occupation::class, 'mother_occupation_id');
    }
    public function waliJob()
    {
        return $this->belongsTo(Occupation::class, 'wali_occupation_id');
    }

    public function fatherEducation(): BelongsTo
    {
        return $this->belongsTo(Education::class, 'father_education_id');
    }
    public function motherEducation(): BelongsTo
    {
        return $this->belongsTo(Education::class, 'mother_education_id');
    }
    public function waliEducation(): BelongsTo
    {
        return $this->belongsTo(Education::class, 'wali_education_id');
    }

    protected $fillable = [
        'nama_ayah',
        'nik_ayah',
        'tempat_lahir_ayah',
        'tanggal_lahir_ayah',
        'father_education_id',
        'father_occupation_id',
        'penghasilan_ayah',
        'hp_ayah',
        'keterangan_ayah',

        'nama_ibu',
        'nik_ibu',
        'tempat_lahir_ibu',
        'tanggal_lahir_ibu',
        'mother_education_id',
        'mother_occupation_id',
        'penghasilan_ibu',
        'hp_ibu',
        'keterangan_ibu',

        'nama_wali',
        'tempat_lahir_wali',
        'tanggal_lahir_wali',
        'wali_education_id',
        'wali_occupation_id',
        'penghasilan_wali',
        'hp_wali',
    ];

    public function getTempatTanggalLahirAyahAttribute()
    {
        $tempat = $this->tempat_lahir_ayah ?: '-';
        $tanggal = $this->tanggal_lahir_ayah
            ? Carbon::parse($this->tanggal_lahir_ayah)->translatedFormat('d F Y')
            : '-';

        return $tempat . ', ' . $tanggal;
    }

    public function getTempatTanggalLahirIbuAttribute()
    {
        $tempat = $this->tempat_lahir_ibu ?: '-';
        $tanggal = $this->tanggal_lahir_ibu
            ? Carbon::parse($this->tanggal_lahir_ibu)->translatedFormat('d F Y')
            : '-';

        return $tempat . ', ' . $tanggal;
    }

    public function getTempatTanggalLahirWaliAttribute()
    {
        $tempat = $this->tempat_lahir_wali ?: '-';
        $tanggal = $this->tanggal_lahir_wali
            ? Carbon::parse($this->tanggal_lahir_wali)->translatedFormat('d F Y')
            : '-';

        return $tempat . ', ' . $tanggal;
    }

    public function getPenghasilanAyahLabelAttribute()
    {
        $value = $this->penghasilan_ayah ?: '0';
        return 'Rp. ' . number_format($value, 0, ',', '.');
    }

    public function getPenghasilanIbuLabelAttribute()
    {
        $value = $this->penghasilan_ibu ?: '0';
        return 'Rp. ' . number_format($value, 0, ',', '.');
    }

    public function getPenghasilanWaliLabelAttribute()
    {
        $value = $this->penghasilan_wali ?: '0';
        return 'Rp. ' . number_format($value, 0, ',', '.');
    }
}
