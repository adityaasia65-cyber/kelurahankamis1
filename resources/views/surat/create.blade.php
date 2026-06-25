@extends('layouts.admin')
@section('judul', 'Kelurahan Dilurahkan')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Pengajuan Surat Baru</h3>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger m-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('surat.store') }}" method="POST">
        @csrf 
        
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="nomor_surat">Nomor Surat</label>
                <input type="text" name="nomor_surat" class="form-control" id="nomor_surat" value="{{ old('nomor_surat') }}" placeholder="Contoh: 005/SKTM/2026">
            </div>

            <div class="form-group mb-3">
                <label for="jenis_surat">Jenis Surat</label>
                <select name="jenis_surat" class="form-control" id="jenis_surat">
                    <option value="">-- Pilih Jenis Surat --</option>
                    <option value="Surat Keterangan Tidak Mampu (SKTM)">Surat Keterangan Tidak Mampu (SKTM)</option>
                    <option value="Surat Keterangan Usaha (SKU)">Surat Keterangan Usaha (SKU)</option>
                    <option value="Surat Pengantar SKCK">Surat Pengantar SKCK</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="penduduk_id">Warga Pemohon</label>
                <select name="penduduk_id" class="form-control" id="penduduk_id">
                    <option value="">-- Pilih Warga --</option>
                    @foreach($penduduk as $p)
                        <option value="{{ $p->id }}">{{ $p->nik }} - {{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="tanggal_ajuan">Tanggal Pengajuan</label>
                <input type="date" name="tanggal_ajuan" class="form-control" id="tanggal_ajuan" value="{{ date('Y-m-d') }}">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan Pengajuan</button>
            <a href="{{ route('surat.index') }}" class="btn border">Kembali</a>
        </div>
    </form>
</div>
@endsection
