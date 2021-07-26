<!DOCTYPE html>
<html>

<head>
    <title>Cetak Raport</title>
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
        <h5>RAPORT MTS ROUDLOTUL ULUM PARANG</h5>
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
                <th  style="text-align:center; font-size: 12px;" colspan="2">Pengetahuan</th>
                <th  style="text-align:center; font-size: 12px;" colspan="2">Keterampilan</th>
                <th  style="text-align:center; font-size: 12px;" colspan="2">Sikap</th>
            </tr>
            <tr>
                <th  style="text-align:center; font-size: 12px;">Angka</th>
                <th  style="text-align:center; font-size: 12px;">Predikat</th>

                <th  style="text-align:center; font-size: 12px;">Angka</th>
                <th  style="text-align:center; font-size: 12px;">Predikat</th>

                <th  style="text-align:center; font-size: 12px;">Dalam Mapel</th>
                <th  style="text-align:center; font-size: 12px;">Antar Mapel</th>
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
                    <?php 
                        $pengetahuan   = ((int)$item->nilaiTugas + (int)$item->nilaiUH + (int)$item->nilaiUTS + (int)$item->nilaiUAS) / 4 / 25;
                        $predikat_pengetahuan = "";
                        if ($pengetahuan > 3.66)
                            $predikat_pengetahuan = "A";
                        elseif($pengetahuan > 3.33)
                            $predikat_pengetahuan = "A-";
                        elseif($pengetahuan > 3.00)
                            $predikat_pengetahuan = "B+";
                        elseif($pengetahuan > 2.66)
                            $predikat_pengetahuan = "B";
                        elseif($pengetahuan > 2.33)
                            $predikat_pengetahuan = "B-";
                        elseif($pengetahuan > 2.00)
                            $predikat_pengetahuan = "C+";
                        elseif($pengetahuan > 1.66)
                            $predikat_pengetahuan = "C";
                        elseif($pengetahuan > 1.33)
                            $predikat_pengetahuan = "C-";
                        elseif($pengetahuan > 1.00)
                            $predikat_pengetahuan = "D+";
                        else
                            $predikat_pengetahuan = "D";
                     ?>
                    <td  style="text-align:center; font-size: 12px;">{{ $pengetahuan }}</td>
                    <td  style="text-align:center; font-size: 12px;">{{ $predikat_pengetahuan }}</td>
                    <?php 
                        $keterampilan = (float)$item->nilaiPraktik / 25;
                        $predikat_keterampilan = "";
                        if ($keterampilan > 3.66)
                            $predikat_keterampilan = "A";
                        elseif($keterampilan > 3.33)
                            $predikat_keterampilan = "A-";
                        elseif($keterampilan > 3.00)
                            $predikat_keterampilan = "B+";
                        elseif($keterampilan > 2.66)
                            $predikat_keterampilan = "B";
                        elseif($keterampilan > 2.33)
                            $predikat_keterampilan = "B-";
                        elseif($keterampilan > 2.00)
                            $predikat_keterampilan = "C+";
                        elseif($keterampilan > 1.66)
                            $predikat_keterampilan = "C";
                        elseif($keterampilan > 1.33)
                            $predikat_keterampilan = "C-";
                        elseif($keterampilan > 1.00)
                            $predikat_keterampilan = "D+";
                        else
                            $predikat_keterampilan = "D";

                        $observasi = (float)$item->nilaiObservasi / 25;
                        $predikat_observasi = "";
                        if($observasi > 3.33)
                            $predikat_observasi = "SB (Sangat Baik)";
                        elseif($observasi > 2.33)
                            $predikat_observasi = "B (Baik)";
                        elseif($observasi > 1.33)
                            $predikat_observasi = "C (Cukup)";
                        else
                            $predikat_observasi = "K (Kurang)";
                     ?>
                    <td  style="text-align:center; font-size: 12px;">{{ $keterampilan }}</td>
                    <td  style="text-align:center; font-size: 12px;">{{ $predikat_keterampilan }}</td>

                    <td  style="text-align:center; font-size: 12px;">{{ $predikat_observasi }}</td>
                    <td></td>
                    @php
                        $i++;
                    @endphp
                </tr>
            @endforeach

    </table>
</body>

</html>
