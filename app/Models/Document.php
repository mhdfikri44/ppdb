<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    protected $fillable = [
        'jenis_dokumen',
        'path',
    ];
}
