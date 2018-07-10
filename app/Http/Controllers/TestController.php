<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pilihan;

class TestController extends Controller
{
    public function pilih()
    {
    	for($h = 0; $h<86; $h++)
    	{
    		for($i = 0; $i<3; $i++)
			{
				Pilihan::create([
					'id_peserta' => $h+1,
					'id_prodi' => rand(1,32),
					'pilihan_ke' => $i+1,
					]);
			}
    	}
    }
}
