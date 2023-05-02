<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Evaluasi</title>
    <style>
        #title {
            text-align: center;
        }

        #tabel-header {
            padding-bottom: 40px;
            border-bottom: 3px dashed black;
        }
        #tabel-data td  {
        border: 1px solid;
        }
        #tabel-data th {
        border: 1px solid;
        }
        #tabel-data {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <header>
        <h3 id="title">Laporan <br> Pemantauan Website OPD</h3>
        <div id="data-header">
            <div id="tabel-header">
                <table>
                    <tr>
                        <td style="width:180px;">Tanggal</td>
                        <td>:</td>
                        <td>{{ $evaluasi->tanggal_pemantauan }}</td>
                    </tr>
                    <tr>
                        <td>OPD</td>
                        <td>:</td>
                        <td>{{ $evaluasi->nama_opd }}</td>
                    </tr>
                    <tr>
                        <td>Alamat Website</td>
                        <td>:</td>
                        <td>{{ $evaluasi->url_web }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </header>
    <main style="padding-top: 25px;">
        <h3 style="text-align: center;">Hasil Monitoring</h3>
        <div id="gambar" style="text-align: center">
             @foreach ($evaluasi->gambar as $image)
                <img style="width:90%; height: 60%;" src="{{ $image->path }}" alt="">
                <p style="font-size: 14px;">Caption</p>
             @endforeach
        </div>
        <div>
            Ketersediaan fitur berdasarkan Pergub No. 11 Tahun 2018:
            <table id="tabel-data">
                <thead>
                    <tr>
                        <td style="width:25%;">Fitur</td>
                        <td>Ketersediaan</td>
                        <td>Keterangan</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evaluasi->kategori->where('jenis_sumber', 'utama')->)
                        <tr>
                            <td>{{ $detail->sub_kategori->nama }}</td>
                            <td>{{ $detail->ketersediaan }}</td>
                            <td>{{ $detail->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="padding-top: 20px;">Ketersediaan fitur tambahan yang direkomendasikan:</div>
            <table id="tabel-data">
                <thead>
                    <tr>
                        <td style="width:25%;">Fitur</td>
                        <td>Ketersediaan</td>
                        <td>Keterangan</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evaluasi->details as $detail)
                        <tr>
                            <td>{{ $detail->sub_kategori->nama }}</td>
                            <td>{{ $detail->ketersediaan }}</td>
                            <td>{{ $detail->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="padding-top: 20px;">{!! $evaluasi->catatan !!}</div>
    </main>
</body>

</html>
