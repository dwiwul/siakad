<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawai";
    protected $primaryKey = "idPegawai";
    protected $fillable = (['namaPegawai', 'nip', 'jk', 'tmpLahir', 'tglLahir', 'alamat', 'telp', 'status']);

    public function users(){
        return $this->hasOne('App\User', 'idUsers', 'idUsers');
    }

}
