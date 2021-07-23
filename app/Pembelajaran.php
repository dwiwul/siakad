<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelajaran extends Model
{
    protected $table = "pembelajaran";
    protected $primaryKey = "idPembelajaran";
    protected $fillable = (['idMapel', 'idKelas', 'idPegawai', 'idSemester']);

    public function semester()
    {
        return $this->belongsTo('App\Semester', 'idSemester', 'idSemester');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'idKelas', 'idKelas');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel', 'idMapel', 'idMapel');
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai', 'idPegawai', 'idPegawai');
    }
}
