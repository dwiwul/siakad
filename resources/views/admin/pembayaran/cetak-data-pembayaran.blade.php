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
    <title>Cetak Data Pembayaran</title>
</head>
<body>
    <div class="form-group">

        <table class="cop">
            <font face ="Times New Roman" color="black">
                <td align="center"><b><font face="Times New Roman" color="black" size="5">LAPORAN DATA PEMBAYARAN</font> <br>
                    <font size="3" >JL.RAYA PARANG-SAMPUNG KM.2 DS.BUNGKUK, KEC.PARANG<br></font>
                    <font size="2" >Kode Pos:  63371<br></font></b></td>
        </table>
        <hr>

        <p align="center"><b>Laporan Data Pembayaran</b></p>
        {{-- <p align="center"> Periode Tanggal {{ Carbon\carbon::parse($tglawal)->translatedFormat("d F Y")}} s/d {{Carbon\carbon::parse($tglakhir)->translatedFormat("d F Y")}} </p> --}}

        <table class="static" align="center" rules="all" border="1px" style="width: 96%;">
            <tr>
                <th>No</th>
                <th>Semester</th>
                <th>Kelas</th>
                <th>Siswa</th>
                <th>Tgl</th>
                <th>Pembayaran</th>
                <th>Jumlah</th>
              </tr>
                @foreach($pembayaran as $row)
                <tr>
                    <td>{{ $loop->iteration}} </td>
                    <td>{{ $row->semester->tahunAjaran }}</td>
                    <td>{{ $row->kelas->namaKelas }}</td>
                    <td>{{ $row->siswa->namaSiswa}}</td>
                    <td>{{ $row->tgl }}</td>
                    <td>{{ $row->detailbayar->jenisBayar }}</td>
                    <td>{{ $row->jumlahBayar }}</td>
                </tr>
                @endforeach
        </table>

        {{-- <script type="text/javascript">
            window.print();
        </script> --}}
    </div>
</body>
</html>
