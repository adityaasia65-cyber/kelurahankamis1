<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $fillable = ['nik', 'nama', 'jk', 'alamat'];
    public function surats(): HasMany
    {
        return $this->hasMany(Surat::class);
    }
}
