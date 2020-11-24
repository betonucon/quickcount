<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filesaksi extends Model
{
    protected $table = 'file_saksi';
    public $timestamps = false;
    protected $fillable = ['nik','tps','tanggal','file'];
}
