<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Penduduk;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semuaSurat = Surat::with('penduduk')->get();
        return view('surat.index', compact('semuaSurat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil data penduduk untuk pilihan dropdown di form
        $penduduk = Penduduk::all();
        return view('surat.create', compact('penduduk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // 1. Eksekusi Aturan Validasi Server-Side
        $validatedData = $request->validate([
            'nomor_surat' => 'required|unique:surats,nomor_surat|max:50',
            'jenis_surat' => 'required',
            'penduduk_id' => 'required|numeric',
            'tanggal_ajuan' => 'required|date',
            'berkas_pendukung' => 'nullable|file|mimes:jpg,png,pdf|max:2048'
        ], [
            'nomor_surat.required' => 'Nomor surat wajib diisi.',
            'nomor_surat.unique' => 'Nomor surat tersebut sudah terdaftar di sistem.',
            'jenis_surat.required' => 'Silakan pilih jenis surat.',
            'penduduk_id.required' => 'Warga pemohon wajib dipilih.',
        ]);



        if ($request->hasFile('berkas_pendukung')) {
        $namaFile = time() . '_' . $request->file('berkas_pendukung')->getClientOriginalName();
        $path = $request->file('berkas_pendukung')->storeAs('berkas_surat', $namaFile, 'public');

        $validatedData['berkas_pendukung'] = $path;
    }

        // 2. Simpan ke Database Menggunakan Mass Assignment Eloquent
        Surat::create($validatedData);

        // 3. Redirect dengan Flash Session
        return redirect()->route('surat.index')->with('sukses', 'Surat permohonan berhasil disimpan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $surat= Surat::findorFail($id);
        return view ('surat.edit' ,compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $surat = Surat::findOrFail($id);

    // Jalankan aturan validasi data server-side
    $validatedData = $request->validate([
        'nomor_surat' => 'required|max:50|unique:surats,nomor_surat,' . $surat->id,
        'jenis_surat' => 'required',
        'tanggal_ajuan' => 'required|date'
    ], [
        'nomor_surat.required' => 'Nomor surat wajib diisi.',
        'nomor_surat.unique' => 'Nomor surat ini telah terdaftar pada sistem.'
    ]);

    // Update entitas data menggunakan fungsi update Eloquent
    $surat->update($validatedData);

    // Alihkan halaman ke indeks tabel utama disertai pesan kilat (flash message) sukses
    return redirect()->route('surat.index')->with('sukses', 'Data surat berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surat = Surat::findorFail($id);
        $surat->delete();
        return redirect()->route('surat.index')->with('sukses', 'data surat berhasil dihapus!');
    }

    public function cetakPdf($id)
    {
        $surat = Surat::findOrFail($id);

        $pdf = Pdf::loadView('surat.cetak', compact('surat'));

        return $pdf->stream('Surat_Kelurahan_' . $surat->nomor_surat . '.pdf');
    }


}
