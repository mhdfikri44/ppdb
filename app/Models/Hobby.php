<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hobby extends Model
{
    public function student(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    protected $fillable = [
        'name'
    ];
}
