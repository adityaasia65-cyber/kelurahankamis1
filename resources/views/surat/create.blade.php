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
    <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="nomor_surat">Nomor Surat</label>
                <input type="text" name="nomor_surat" class="form-control" id="nomor_surat" value="{{ old('nomor_surat') }}" placeholder="Contoh: 005-SKTM-2026">
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

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-0 pb-0">
                <h5 class="fw-bold mb-1">Berkas Pendukung Permohonan</h5>
                <p class="text-muted small mb-0">
                    Upload dokumen pendukung seperti KTP atau KK agar proses verifikasi permohonan surat lebih mudah dilakukan.
                </p>
            </div>

            <div class="card-body">
                <div class="alert alert-light border d-flex align-items-start gap-2" role="alert">
                    <div>
                        <strong>Ketentuan file:</strong><br>
                        Format yang diperbolehkan adalah JPG, PNG, atau PDF dengan ukuran maksimal 2MB.
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="berkas_pendukung" class="form-label fw-semibold">
                        Upload KTP/KK Pendukung
                    </label>

                    <input
                        type="file"
                        name="berkas_pendukung"
                        id="berkas_pendukung"
                        class="form-control @error('berkas_pendukung') is-invalid @enderror"
                        accept=".jpg,.png,.pdf">

                    @error('berkas_pendukung')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="form-text">
                        Pastikan dokumen terlihat jelas dan sesuai dengan data permohonan.
                    </div>
                </div>

                <div id="preview-file" class="small text-muted mt-2"></div>
            </div>
        </div>



        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan Pengajuan</button>
            <a href="{{ route('surat.index') }}" class="btn border">Kembali</a>
        </div>
    </form>
</div>
@endsection
