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
        <h5><b>RAPORT</b></h5>
    </center>
    <p style="text-align:left;font-size: 12px;">
        Nama : {{ $siswa->namaSiswa }}
        <span style="float:right;">
            Nomor Induk : {{ $siswa->nis }}
        </span>
    </p>
    <p style="text-align:left;font-size: 12px;">
        Kelas : {{ $siswa->namaKelas }}
        <span style="float:right;">
            Tahun Ajaran/Semester : 2020-2021/Genap
        </span>
    </p>
    <table style="width: 100%">
        <thead>
            <tr>
                <th  style="text-align:center; font-size: 12px;" rowspan="2">No</th>
                <th  style="text-align:center; font-size: 12px;" rowspan="2">Mata Pelajaran</th>
                <th  style="text-align:center; font-size: 12px;" rowspan="2">KKM</th>
                <th  style="text-align:center; font-size: 12px;" colspan="4">Akademik</th>
            </tr>
            <tr>
                <th  style="text-align:center; font-size: 12px;">Tugas</th>
                <th  style="text-align:center; font-size: 12px;">UH</th>
                <th  style="text-align:center; font-size: 12px;">UTS</th>
                <th  style="text-align:center; font-size: 12px;">UAS</th>
            </tr>

        </thead>
        {{-- <thead>
            <tr>
                <th width="20px" style="text-align:center; font-size: 12px;">No</th>
                <th width="80px" style="text-align:center; font-size: 12px;">NIS</th>
                <th width="200px" style="text-align:center; font-size: 12px; ">Nama</th>
                <th width="50px" style="text-align:center;  font-size: 12px;">Hadir</th>
                <th width="50px" style="text-align:center;  font-size: 12px;">Sakit</th>
                <th width="50px" style="text-align:center;  font-size: 12px;">Ijin</th>
                <th width="50px" style="text-align:center; font-size: 12px; ">Alpha</th>
            </tr>
        </thead> --}}
        <tbody>


            @php $i = 1 @endphp
            @foreach ($data as $item)
                <tr>

                    <td  style="text-align:center; font-size: 12px;">{{ $i }}</td>
                    <td  style=" font-size: 12px;">{{ $item->namaMapel }}</td>
                    <td  style="text-align:center; font-size: 12px;">{{ $item->kkm }}</td>
                    <td  style="text-align:center; font-size: 12px;">{{ $item->nilaiTugas }}</td>
                    <td  style=" font-size: 12px;">{{ $item->nilaiUH }}</td>
                    <td  style="text-align:center; font-size: 12px;">{{ $item->nilaiUTS }}</td>
                    <td  style=" font-size: 12px;">{{ $item->nilaiUAS }}</td>
                    @php
                        $i++;
                    @endphp
                </tr>
            @endforeach

    </table>
</body>

</html>
