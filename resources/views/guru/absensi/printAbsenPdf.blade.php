<!DOCTYPE html>
<html>

<head>
    <title>Cetak Absensi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td {
            padding-left: 10px;
        }

    </style>
    <center>
        <h5>DAFTAR PRESENSI SISWA KELAS {{ $mpl->namaKelas }}</h5>
    </center>
    <p style="text-align:left;font-size: 12px;">
        Tanggal : <b>{{ $mpl->hari . ', ' . Helper::tanggal($mpl->tgl) }}</b>

    </p>
    <p style="text-align:left;font-size: 12px;">
        Mata Pelajaran : <b>{{ $mpl->namaMapel }}</b>

    </p>
    <table style="width: 100%">
        <thead>
            <tr>
                <th width="20px" style="text-align:center; font-size: 12px;">No</th>
                <th width="80px" style="text-align:center; font-size: 12px;">NIS</th>
                <th width="200px" style="text-align:center; font-size: 12px; ">Nama</th>
                <th width="50px" style="text-align:center;  font-size: 12px;">Keterangan</th>
            </tr>
        </thead>
        <tbody>


            @php $i = 1 @endphp
            @foreach ($data as $item)
                <tr>

                    <td style="font-size: 12px;">
                        <center>{{ $i++ }}</center>
                    </td>
                    <td style="font-size: 12px;"> {{ $item->nis }}</td>
                    <td style="font-size: 12px;"> {{ $item->namaSiswa }}</td>
                    <td style="font-size: 12px;">
                       <p>{{ Str::ucfirst($item->keterangan)}}</p>

                    </td>


                </tr>
            @endforeach
        </tbody>

    </table>

</body>

</html>
