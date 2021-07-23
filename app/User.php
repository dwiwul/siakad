<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'idUsers';
    protected $table = 'users';
    protected $fillable = [
         'idPegawai', 'idKepsek', 'idSiswa', 'username', 'password', 'level',
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai', 'idPegawai', 'idPegawai');
    }
    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'idSiswa');
    }

    public function kepsek()
    {
        return $this->belongsTo('App\Kepsek', 'idKepsek');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
}
