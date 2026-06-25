
    @extends("layouts.admin")
    @section('judul', 'Kelurahan Dilurahkan')
    @section('content')
    <div class="card p-4">
        <h3>Daftar Pengajuan Surat Kelurahan</h3>
        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th>No Surat</th>
                    <th>Jenis Surat</th>
                    <th>Nama Pemohon</th>
                    <th>NIK Pemohon</th>
                    <th>Tanggal Ajuan</th>
                </tr>
            </thead>
            <tbody>
            @foreach($semuaSurat as $s)
                <tr>
                    <td>{{ $s->nomor_surat }}</td>
                    <td>{{ $s->jenis_surat }}</td>
                    <td>{{ $s->penduduk->nama }}</td>
                    <td>{{ $s->penduduk->nik }}</td>
                    <td>{{ $s->tanggal_ajuan }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection
