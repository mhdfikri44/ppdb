<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Education extends Model
{
    // Laravel secara internal mencari tabel education (tanpa s) karena aturan bahasa Inggris standar.
    // Untuk memastikan Model merujuk ke 'educations'
    protected $table = 'educations';

    public function guardian(): HasMany
    {
        return $this->hasMany(Guardian::class);
    }

    protected $fillable = [
        'name'
    ];
}
