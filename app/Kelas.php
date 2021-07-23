<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'idKelas';
    protected $fillable = ['idPegawai', 'namaKelas' ];


    public function jadwal()
    {
        return $this->hasMany('App\Jadwal', 'idJadwal', 'idJadwal');
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->using(Historisiswa::class)->withPivot('tahun');
    }
}
