<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $tabel = 'bidang';

    protected $primaryKey ='id_bidang';
    protected $guarded = [];
}
