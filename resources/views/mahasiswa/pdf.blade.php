<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 25px 30px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #222;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
            color: #123b7a;
        }

        .header h2 {
            margin: 5px 0;
            font-size: 14px;
        }

        .header p {
            margin: 3px 0;
            color: #555;
        }

        .line {
            border-top: 2px solid #123b7a;
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .info {
            margin-bottom: 15px;
        }

        .info table {
            width: auto;
            border: none;
        }

        .info td {
            border: none;
            padding: 3px 10px 3px 0;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table.data th {
            background: #123b7a;
            color: white;
            border: 1px solid #999;
            padding: 8px 6px;
            text-align: center;
            font-weight: bold;
        }

        table.data td {
            border: 1px solid #bbb;
            padding: 7px 6px;
        }

        table.data tr:nth-child(even) {
            background: #f5f7fa;
        }

        .center {
            text-align: center;
        }

        .footer {
            margin-top: 20px;
            font-size: 10px;
            color: #666;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }
    </style>
</head>

<body>

    {{-- =====================================================
         HEADER
    ====================================================== --}}
    <div class="header">
        <h1>SISTEM INFORMASI DATA MAHASISWA</h1>
        <h2>LAPORAN DATA MAHASISWA</h2>
        <p>{{ $namaProdi }}</p>
    </div>

    <div class="line"></div>

    {{-- =====================================================
         INFORMASI
    ====================================================== --}}
    <div class="info">
        <table>
            <tr>
                <td><strong>Total Data</strong></td>
                <td>: {{ $mahasiswas->count() }} Mahasiswa</td>
            </tr>
            <tr>
                <td><strong>Program Studi</strong></td>
                <td>: {{ $namaProdi }}</td>
            </tr>

            @if($search)
                <tr>
                    <td><strong>Pencarian</strong></td>
                    <td>: {{ $search }}</td>
                </tr>
            @endif

            <tr>
                <td><strong>Tanggal Cetak</strong></td>
                <td>: {{ now()->format('d F Y H:i') }}</td>
            </tr>
        </table>
    </div>

    {{-- =====================================================
         DATA
    ====================================================== --}}
    @if($mahasiswas->count() > 0)
        <table class="data">
            <thead>
                <tr>
                    <th style="width: 40px;">No</th>
                    <th style="width: 120px;">NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program Studi</th>
                    <th style="width: 100px;">Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswas as $index => $mahasiswa)
                    <tr>
                        <td class="center">{{ $index + 1 }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->prodi->nama_prodi }}</td>
                        <td class="center">{{ $mahasiswa->jenis_kelamin }}</td>
                        <td>{{ $mahasiswa->email ?? '-' }}</td>
                        <td>{{ $mahasiswa->telepon ?? '-' }}</td>
                        <td>{{ $mahasiswa->alamat ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty">
            Tidak ada data mahasiswa yang sesuai dengan filter.
        </div>
    @endif

    {{-- =====================================================
         FOOTER
    ====================================================== --}}
    <div class="footer">
        Dicetak dari Sistem Informasi Data Mahasiswa
        <br>
        {{ config('app.name') }}
    </div>

</body>
</html>