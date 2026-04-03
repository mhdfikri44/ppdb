<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestWritten extends Model
{
    protected $fillable = [
        'student_id',
        'tanggal',
        'jam',
        'lokasi',
        'score'
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
