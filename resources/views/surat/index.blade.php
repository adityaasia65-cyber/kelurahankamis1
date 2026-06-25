@extends('layouts.admin')

@section('content')
<div class="card p-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Pengajuan Surat Kelurahan</h3>

        <a href="{{ route('surat.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle"></i> Tambah Pengajuan Surat
        </a>
    </div>

    {{-- Flash Message --}}
    @if(session('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i>
            {{ session('sukses') }}

            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="bg-light">
                <tr>
                    <th width="5%">No</th>
                    <th>No Surat</th>
                    <th>Jenis Surat</th>
                    <th>Nama Pemohon</th>
                    <th>NIK Pemohon</th>
                    <th>Tanggal Ajuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($semuaSurat as $index => $s)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $s->nomor_surat }}</td>
                    <td>{{ $s->jenis_surat }}</td>
                    <td>
                        <strong>{{ $s->penduduk->nama ?? '-' }}</strong>
                    </td>
                    <td>{{ $s->penduduk->nik ?? '-' }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($s->tanggal_ajuan)->format('d-m-Y') }}
                    </td>

                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-1">

                            {{-- Tombol Edit --}}
                            <a href="{{ route('surat.edit', $s->id) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('surat.destroy', $s->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data surat ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        Belum ada data pengajuan surat.
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>
@endsection