<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetugasTU extends Model
{
    protected $table = "petugastu";
    protected $primaryKey = "idTU";
    protected $fillable = (['idSiswa', 'namaTU', 'jk', 'alamat', 'telp']);

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'idSiswa', 'idSiswa');
    }
}
