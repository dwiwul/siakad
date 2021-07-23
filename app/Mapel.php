<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $primaryKey = 'idMapel';
    protected $fillable = ['namaMapel'];


    public function nilai()
    {
        return $this->hasMany('App\Nilai', 'idNilai', 'idNilai');
    }

    public function jadwal()
    {
        return $this->hasMany('App\Jadwal', 'idJadwal', 'idJadwal');
    }
}
