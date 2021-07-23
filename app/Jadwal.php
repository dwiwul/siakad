<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Pembelajaran;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'idJadwal';
    protected $fillable = ['idSemester', 'idPegawai', 'idMapel', 'idKelas', 'hari', 'jamMulai', 'jamSelesai'];

    public function jadwal()
    {
        return $this->hasOne('App\Jadwal'); //select * from post where user_id = 1
     }

     public function pegawai(){
        return $this->belongsTo('App\Pegawai', 'idPegawai');
    }
    public function mapel(){
        return $this->belongsTo('App\Mapel', 'idMapel');
    }
    public function kelas(){
        return $this->belongsTo('App\Kelas', 'idKelas');
    }
    public function semester(){
        return $this->belongsTo('App\Semester', 'idSemester');
    }

}
