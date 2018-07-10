<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kunci extends Model
{
    protected $table = 'kunci_jawaban';

    protected $primaryKey ='id_kuncijwbn';
    protected $guarded = [];
}
