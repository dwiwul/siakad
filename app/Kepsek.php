<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Kepsek extends Model
{
    protected $table = "kepsek";
    protected $primaryKey = "idKepsek";
    protected $fillable = (['namaKepsek', 'alamat', 'telp']);

    public function users(){
        return $this->hasOne('App\User', 'idUsers', 'idUsers');
    }
}
