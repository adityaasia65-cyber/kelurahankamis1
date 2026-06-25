<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Surat;

class KelurahanController extends Controller
{
public function dataPenduduk() {
    // Mengambil seluruh data dari database melalui Model
    $warga = Penduduk::all();
    return view('penduduk_index', compact('warga'));
}
public function daftarSurat() {
    // Eager Loading relasi penduduk untuk menghemat query
    $semuaSurat = Surat::with('penduduk')->get();
    return view('surat_index', compact('semuaSurat'));
}
}