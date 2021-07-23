<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semester';
    protected $primaryKey = 'idSemester';
    protected $fillable = ['tahunAjaran', 'tglMulai', 'tglSelesai', 'keterangan'];


    public function jadwal()
    {
        return $this->hasMany('App\Jadwal', 'idJadwal', 'idJadwal');
    }

    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran', 'idPembayaran', 'idPembayaran');
    }

}
