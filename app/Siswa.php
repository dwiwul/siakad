<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'idSiswa';
    protected $fillable = ['idSemester', 'idKelas', 'tahunAngkatan', 'nis', 'namaSiswa', 'alamat', 'jk', 'tmpLahir', 'tglLahir', 'telp', 'namaOrtu', 'status'];

    public function semester()
    {
        return $this->belongsTo('App\Semester', 'idSemester', 'idSemester');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'idKelas', 'idKelas');
    }

    public function nilai()
    {
        return $this->hasMany('App\Nilai', 'idNilai', 'idNilai');
    }

    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran', 'idPembayaran', 'idPembayaran');
    }

    public function historis()
    {
        return $this->belongsToMany(Kelas::class)->using(Historisiswa::class)->withPivot('tahun');
    }
}
