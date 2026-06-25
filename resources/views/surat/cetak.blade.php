<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kelurahan</title>
    <style>
        @page {
            margin: 24mm 22mm 22mm 22mm;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            color: #111827;
            font-size: 12pt;
            line-height: 1.55;
        }

        .kop-table {
            width: 100%;
            border-bottom: 3px double #111827;
            padding-bottom: 12px;
            margin-bottom: 26px;
        }

        .logo-box {
            width: 70px;
            height: 70px;
            border: 2px solid #111827;
            border-radius: 50%;
            text-align: center;
            line-height: 70px;
            font-weight: bold;
            font-size: 18pt;
        }

        .kop-title {
            text-align: center;
        }

        .kop-title h2 {
            margin: 0;
            font-size: 16pt;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .kop-title h3 {
            margin: 2px 0;
            font-size: 13pt;
            text-transform: uppercase;
        }

        .kop-title p {
            margin: 3px 0 0 0;
            font-size: 9.5pt;
        }

        .judul-surat {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            font-size: 14pt;
            margin-top: 8px;
            margin-bottom: 2px;
            text-transform: uppercase;
        }

        .nomor-surat {
            text-align: center;
            margin-bottom: 28px;
            font-size: 11.5pt;
        }

        .meta-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 22px;
        }

        .meta-table td {
            padding: 4px 0;
            vertical-align: top;
        }

        .meta-label {
            width: 170px;
        }

        .isi-surat {
            text-align: justify;
        }

        .box-keterangan {
            border: 1px solid #d1d5db;
            padding: 12px 14px;
            margin: 18px 0;
            background-color: #f9fafb;
        }

        .ttd-table {
            width: 100%;
            margin-top: 42px;
        }

        .ttd-kanan {
            width: 260px;
            text-align: center;
            float: right;
        }

        .nama-pejabat {
            font-weight: bold;
            text-decoration: underline;
        }

        .footer-note {
            position: fixed;
            bottom: -8mm;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 8.5pt;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 6px;
        }
    </style>
</head>
<body>

    <table class="kop-table">
        <tr>
            <td style="width: 82px; vertical-align: middle;">
                <div class="logo-box">SK</div>
            </td>
            <td class="kop-title">
                <h2>Pemerintah Kota Administrasi Simpel-K</h2>
                <h3>Kecamatan Rekayasa Teknologi</h3>
                <h3>Kelurahan Pemrograman Web</h3>
                <p>Jl. Jalur Lingkar Informatika No. 45, Telp. (021) 888999, Kode Pos 12345</p>
            </td>
        </tr>
    </table>

    <div class="judul-surat">{{ strtoupper($surat->jenis_surat) }}</div>
    <div class="nomor-surat">Nomor: {{ $surat->nomor_surat }}</div>

    <p>Yang bertanda tangan di bawah ini, Kepala Kelurahan Pemrograman Web, Kecamatan Rekayasa Teknologi, Kota Administrasi Simpel-K, menerangkan bahwa permohonan surat berikut telah tercatat pada sistem pelayanan administrasi kelurahan.</p>

    <table class="meta-table">
        <tr>
            <td class="meta-label">Nomor Surat</td>
            <td>: {{ $surat->nomor_surat }}</td>
        </tr>
        <tr>
            <td class="meta-label">Jenis Surat</td>
            <td>: {{ $surat->jenis_surat }}</td>
        </tr>
        <tr>
            <td class="meta-label">Tanggal Pengajuan</td>
            <td>: {{ date('d F Y', strtotime($surat->tanggal_ajuan)) }}</td>
        </tr>
        <tr>
            <td class="meta-label">Status Berkas Pendukung</td>
            <td>: {{ $surat->berkas_pendukung ? 'Tersimpan di sistem' : 'Belum tersedia' }}</td>
        </tr>
    </table>

    <div class="box-keterangan">
        Dokumen ini diterbitkan berdasarkan data permohonan yang tersimpan pada aplikasi Simpel-K. Data yang tercetak pada surat ini digunakan sebagai bukti administratif sesuai kebutuhan layanan kelurahan.
    </div>

    <div class="isi-surat">
        <p>Demikian surat keterangan ini dibuat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana mestinya. Apabila di kemudian hari terdapat kekeliruan pada data permohonan, maka akan dilakukan perbaikan sesuai prosedur administrasi yang berlaku.</p>
    </div>

    <div class="ttd-kanan">
        Malang, {{ date('d F Y') }}<br>
        Lurah Pemrograman Web,
        <br><br><br><br>
        <span class="nama-pejabat">( ............................................ )</span><br>
        NIP. 199208122024121001
    </div>

    <div class="footer-note">
        Dicetak otomatis melalui Simpel-K - Sistem Informasi Pelayanan Administrasi Kelurahan Digital
    </div>

</body>
</html>
