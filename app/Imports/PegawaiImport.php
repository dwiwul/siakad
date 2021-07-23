<?php

namespace App\Imports;

use App\Pegawai;
use App\Kepsek;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $now = date('Y-m-d H:i:s');
        return new Pegawai([
            'nip' => $row[1],
            'namaPegawai' => $row[2],
            'jk' => $row[3],
            'tmpLahir' => $row[4],
            'tglLahir' => $row[5],
            'alamat' => $row[6],
            'telp' => $row[7],
            'status' => $row[8],
        ]);
    }
}
