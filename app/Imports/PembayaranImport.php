<?php

namespace App\Imports;

use App\Pembayaran;
use Maatwebsite\Excel\Concerns\ToModel;

class PembayaranImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $now = date('Y-m-d H:i:s');
        return new Pembayaran([
            'idSemester'   => $row[1],
            'idBayar'   => $row[2],
            'idKelas'   => $row[3],
            'idSiswa'   => $row[4],
            'tgl'          => $row[5],
            'jumlahBayar'  => $row[6],
        ]);
    }
}
