<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Historisiswa extends Pivot
{
    protected $table = 'historisiswa';
    protected $primaryKey = 'idHistori';
    public $incrementing = true;
    protected $fillable = ['idSemester', 'idKelas', 'idSiswa', 'tahun' ];

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'idSiswa', 'idSiswa');
    }
}
