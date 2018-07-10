<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $table = 'ranking';
    protected $primaryKey = 'id_ranking';

    protected $fillable = ['id_prodi', 'id_peserta', 'keterangan', 'peringkat'];
    protected $guarded = [];
}
