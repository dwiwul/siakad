<?php

namespace App\Imports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $now = date('Y-m-d H:i:s');
        return new Siswa([
            'idKelas'   => $row[1],
            'nis'       => $row[2],
            'namaSiswa' => $row[3],
            'alamat'    => $row[4],
            'jk'        => $row[5],
            'tmpLahir'  => $row[6],
            'tglLahir'  => $row[7],
            'telp    '  => $row[8],
            'namaOrtu'  => $row[9],
            'status  '  => $row[10],
        ]);
    }
}
