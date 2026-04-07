<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Authenticatable
{
    use HasFactory;

    protected $guard = 'student';

    protected $appends = [
        'jenis_kelamin_label',
        'tempat_tanggal_lahir',
        'anak_keberapa_label',
    ];

    public function registration(): HasOne
    {
        return $this->hasOne(Registration::class);
    }

    public function guardian(): HasOne
    {
        return $this->hasOne(Guardian::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class);
    }

    public function testPractice(): HasOne
    {
        return $this->hasOne(TestPractice::class);
    }

    public function testWritten(): HasOne
    {
        return $this->hasOne(TestWritten::class);
    }

    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'password',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'religion_id',
        'hobi',
        'cita_cita',
        'prestasi',
        'penyakit',

        'anak_keberapa',
        'jumlah_saudara',
        'tempat_tinggal',
        'transportasi',
        'jarak_tempuh',
        'waktu_tempuh',
        'no_kk',
        'no_kip_pkh_kks_kps',

        'tahun_lulus',
        'asal_sekolah',
        'alamat_asal_sekolah',
    ];

    protected $hidden = [
        'password',
    ];

    public function getTempatTanggalLahirAttribute()
    {
        $tempat = $this->tempat_lahir ?: '-';
        $tanggal = $this->tanggal_lahir
            ? Carbon::parse($this->tanggal_lahir)->translatedFormat('d F Y')
            : '-';

        return $tempat . ', ' . $tanggal;
    }

    public function getJenisKelaminLabelAttribute()
    {
        if (empty($this->jenis_kelamin)) {
            return null;
        }
        return $this->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan';
    }

    public function getAnakKeberapaLabelAttribute()
    {
        if (empty($this->anak_keberapa)) {
            return null;
        }
        $terbilang = $this->terbilang($this->anak_keberapa);
        return $this->anak_keberapa . ' (' . $terbilang . ')';
    }

    private function terbilang($number)
    {
        $words = [
            0 => 'Nol',
            1 => 'Satu',
            2 => 'Dua',
            3 => 'Tiga',
            4 => 'Empat',
            5 => 'Lima',
            6 => 'Enam',
            7 => 'Tujuh',
            8 => 'Delapan',
            9 => 'Sembilan',
            10 => 'Sepuluh',
            11 => 'Sebelas',
        ];

        if ($number < 12) {
            return $words[$number] ?? '-';
        }

        if ($number < 20) {
            return $words[$number - 10] . ' Belas';
        }

        if ($number < 100) {
            $puluhan = intdiv($number, 10);
            $satuan = $number % 10;
            return $words[$puluhan] . ' Puluh ' . ($satuan ? $words[$satuan] : '');
        }

        return $number;
    }
}
