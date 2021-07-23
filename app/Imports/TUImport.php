<?php

namespace App\Imports;

use App\PetugasTU;
use Maatwebsite\Excel\Concerns\ToModel;

class TUImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $now = date('Y-m-d H:i:s');
        return new PetugasTU([
                'idTU'   => $row[1],
                'namaTU'       => $row[2],
                'jk'        => $row[3],
                'alamat'  => $row[4],
                'telp    '  => $row[6],
        ]);
    }
}
