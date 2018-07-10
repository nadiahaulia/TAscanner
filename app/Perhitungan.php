<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
	protected $table = 'hasil_perhitungan';
    protected $primaryKey = 'id_hasilperhit';
    protected $guarded = [];
}
