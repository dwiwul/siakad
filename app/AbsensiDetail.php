<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsensiDetail extends Model
{
    protected $primaryKey = 'idDetail';
    protected $table = 'absensi_detail';
    protected $fillable = ['idAbsensi', 'idSiswa', 'sakit', 'ijin', 'alpha', 'created_at', 'updated_at'];

    public function siswa(){
        return $this->belongsTo('App\Siswa', 'idSiswa');
    }
}
