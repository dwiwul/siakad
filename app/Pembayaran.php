<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'idPembayaran';
    protected $fillable = ['idSiswa', 'idSemester', 'idKelas', 'idBayar', 'tgl', 'jumlahBayar'];

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'idSiswa', 'idSiswa');
    }

    public function semester()
    {
        return $this->belongsTo('App\Semester', 'idSemester', 'idSemester');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'idKelas', 'idKelas');
    }

    public function detailbayar()
    {
        return $this->belongsTo('App\Bayar', 'idBayar', 'idBayar');
    }

}
