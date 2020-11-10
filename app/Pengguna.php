<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';
    public $timestamps = false;
    protected $fillable = ['kecamatan_id','nik','alamat','kelurahan_id','tps'];
}
