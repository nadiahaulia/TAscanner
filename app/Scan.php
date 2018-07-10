<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    protected $table = 'hasil_scan';
    protected $primaryKey = 'id_scan';
    public $fillable = ['scan_teks', 'scan_gambar', 'id_peserta'];
    protected $guarded = [];
}
