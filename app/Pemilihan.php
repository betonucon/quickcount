<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilihan extends Model
{
    protected $table = 'pemilihan';
    public $timestamps = false;
    protected $fillable = ['kecamatan_id','calon_id','nilai','kelurahan_id','tanggal','tps','users_id'];
}
