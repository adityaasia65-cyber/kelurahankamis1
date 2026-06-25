<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Surat extends Model
{
    protected $fillable = ['nomor_surat', 'jenis_surat', 'tanggal_ajuan', 'penduduk_id'];
    // Relasi: Surat dimiliki oleh Penduduk
    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }
}
