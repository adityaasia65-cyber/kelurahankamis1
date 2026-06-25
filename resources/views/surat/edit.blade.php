@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Form Perbarui Data Surat Kelurahan</h4>
        </div>
        <div class="card-body">
            <!-- Perhatikan Rute Action mengarah ke surat.update dengan parameter ID -->
            <form action="{{ route('surat.update', $surat->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Mengaktifkan HTTP Method Spoofing PUT -->

                <div class="form-group mb-3">
                    <label for="nomor_surat">Nomor Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" class="form-control @error('nomor_surat') is-invalid @enderror" value="{{ old('nomor_surat', $surat->nomor_surat) }}" required>
                    @error('nomor_surat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="jenis_surat">Jenis Surat</label>>
                    <select name="jenis_surat" id="jenis_surat" class="form-control" required>
                        <option value="Surat Pengantar" {{ $surat->jenis_surat == 'Surat Pengantar' ? 'selected' : '' }}>Surat Pengantar</option>
                        <option value="Surat Keterangan Tidak Mampu" {{ $surat->jenis_surat == 'Surat Keterangan Tidak Mampu' ? 'selected' : '' }}>Surat Keterangan Tidak Mampu</option>
                        <option value="Surat Domisili" {{ $surat->jenis_surat == 'Surat Domisili' ? 'selected' : '' }}>Surat Domisili</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="tanggal_ajuan">Tanggal Ajuan</label>
                    <input type="date" name="tanggal_ajuan" id="tanggal_ajuan" class="form-control" value="{{ old('tanggal_ajuan', $surat->tanggal_ajuan) }}" required>
                </div>

                <div class="form-group mb-3">
                    <a href="{{ route('surat.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
