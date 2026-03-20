<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Registration extends Model
{
    use HasFactory;

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    protected $casts = [
        'locked_at' => 'datetime', // Konversi otomatis ke Carbon
    ];

    protected $fillable = [
        'no_pendaftaran',
        'status_data',
        'status_dokumen',
        'is_locked',
        'locked_at',
        'status_verifikasi',
        'rejected_message',
        'lulus',
    ];

    public function generateNoPendaftaran()
    {
        DB::transaction(function () {
            if ($this->no_pendaftaran === null) {
                $year = now()->year;

                $lastNumber = DB::table('registrations')
                    ->whereYear('created_at', $year)
                    ->whereNotNull('no_pendaftaran')
                    ->lockForUpdate()
                    ->max('no_pendaftaran');

                $lastSequence = $lastNumber
                    ? (int) substr($lastNumber, -4)
                    : 0;

                $nextSequence = $lastSequence + 1;

                $this->no_pendaftaran = 'P' . $year . str_pad($nextSequence, 4, '0', STR_PAD_LEFT);
            }
            $this->is_locked = true;
            $this->locked_at = now();
            $this->status_verifikasi = 'Pending';

            $this->save();
        });
    }
}
