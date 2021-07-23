<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Historibayar extends Pivot
{
    protected $table = 'historibayar';
    protected $primaryKey = 'idHistoribayar';
    protected $fillable = ['idSemester', 'idKelas', 'idPembayaran' ];
    public $incrementing = true;

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'idSiswa', 'idSiswa');
    }
}
