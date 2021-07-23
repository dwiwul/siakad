<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'idNilai';
    protected $fillable = ['idMapel', 'idPegawai', 'idSiswa', 'idSemester', 'kkm', 'nilaiTugas', 'nilaiUH', 'nilaiUTS', 'nilaiUAS'];

    public function mapel()
    {
        return $this->belongsTo('App\Mapel', 'idMapel', 'idMapel');
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai', 'idPegawai', 'idPegawai');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'idSiswa', 'idSiswa');
    }

    public function semester()
    {
        return $this->belongsTo('App\Semester', 'idSemester', 'idSemester');
    }

}
