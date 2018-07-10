<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Peserta;
use App\Scan;


class ApiController extends Controller
{
    public function scan(Request $request){
    	$hasil = $request->input('hasil');
    	$isi2 = array ();
		    $isi2 = explode(";", $hasil);
		    // dd($request->input('hasil'));
				//untuk mengecek apakah ada peserta dengan nama dan nomor di tabel peserta
				$cekid = Peserta::select('id_peserta')
				->where('nama_peserta', $isi2[0])
				->where('no_peserta', $isi2[1])
				->first();
				if(!empty($cekid)) //jika ada (query cekid tidak kosong)
				{
					//untuk mengecek apakah di tabel hasil scan sudah ada id peserta yang sama
					$cekscan = Scan::select('id_scan')
					->where('id_peserta', $cekid->id_peserta)
					->first();
					if(empty($cekscan)) //jika tidak ada (query cekscan kosong)
					{
						//tambahkan hasil scan tersebut
						$tambahorang = Scan::create([
			    		'scan_teks' => $hasil,
			    		'id_peserta' => $cekid->id_peserta
			    		]);
					}
					else //jika ada
					{
						//apdet sesuai id peserta yang sudah ada
						$apdetorang = Scan::where('id_peserta', $cekid->id_peserta)
						->update([
			    		'scan_teks' => $hasil
			    		]);
					}
				}
				else //jika tidak ada (query cekid kosong)
				{
					//disini buat tampilan kalo ga sama
					$cekbeda = Peserta::select('id_peserta', 'nama_peserta')
					->where('no_peserta', $isi2[1])
					->first();

					if(!empty($cekbeda)) {
						$response = array();
						$response["error"] = TRUE;
						$response["scan_teks"] = $hasil;
						var_dump('Peserta dengan nama '. $isi2[0].' dan nomor '.$isi2[1].' memiliki data yang berbeda');
						var_dump('Mungkin maksud Anda'.$cekbeda->nama_peserta); 
					}
					

				}

				$response = array();
				$response["error"] = FALSE;
				$response["scan_teks"] = $hasil;

				echo json_encode($response);
    }
}
