<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            /* left: 3%; */
            border: 1px solid #543535;
        }

        table.cop {
            position: center;
            width: 100%;
        }

        hr {
            size : 5px;
            color : black;
            width : 100%;
        }
    </style>
    <title>Cetak Data Siswa</title>
</head>
<body>
    <div class="form-group">

        <table class="cop">
            <font face ="Times New Roman" color="black">
                <td align="center"><b><font face="Times New Roman" color="black" size="5">LAPORAN DATA SISWA PERTANGGAL</font> <br>
                    <font size="3" >JL.RAYA PARANG-SAMPUNG KM.2 DS.BUNGKUK, KEC.PARANG<br></font>
                    <font size="2" >Kode Pos:  63371<br></font></b></td>
        </table>
        <hr>

        <p align="center"><b>Laporan Data Siswa</b></p>
        {{-- <p align="center"> Periode Tanggal {{ Carbon\carbon::parse($tglawal)->translatedFormat("d F Y")}} s/d {{Carbon\carbon::parse($tglakhir)->translatedFormat("d F Y")}} </p> --}}

        <table class="static" align="center" rules="all" border="1px" style="width: 96%;">
            <tr>
                <th>No</th>
                <th>Ajaran</th>
                <th>Angkatan</th>
                <th>Kelas</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Tempat, Tgl Lahir</th>
                <th>Tlp</th>
                <th>Nama OrangTua</th>
                <th>Status</th>
              </tr>
                @foreach($siswa as $row)
                <tr>
                    <td>{{ $loop->iteration}} </td>
                    <td>{{ $row->semester->tahunAjaran }}</td>
                    <td>{{ $row->tahunAngkatan }}</td>
                    <td>{{ $row->kelas->namaKelas }}</td>
                    <td>{{ $row->nis }}</td>
                    <td>{{ $row->namaSiswa }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->jk}}</td>
                    <td>{{ $row->tmpLahir }}, {{ $row->tglLahir }}</td>
                    <td>{{ $row->telp }}</td>
                    <td>{{ $row->namaOrtu }}</td>
                    <td>{{ $row->status }}</td>
                </tr>
                @endforeach
        </table>

        {{-- <script type="text/javascript">
            window.print();
        </script> --}}
    </div>
</body>
</html>
