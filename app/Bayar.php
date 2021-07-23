<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    protected $table = 'detailbayar';
    protected $primaryKey = 'idBayar';
    protected $fillable = ['jenisBayar' ];

    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran', 'idPembayaran', 'idPembayaran');
    }
}
