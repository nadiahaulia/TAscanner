<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Scan;
use App\Perhitungan;
use App\Models\Kunci;
use App\File;
use App\Ranking;
use App\Pilihan;
use App\Models\Prodi;
use Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Tahun;
use Redirect;

class DataController extends Controller
{
	public function peserta(){
		$jmlh = Peserta::all()->count();
		$pilihs = array();

		for($i = 1; $i<= $jmlh; $i++)
		{
		$cekket = Ranking::selectRaw("id_peserta, keterangan")
		->where('id_peserta', $i)
		->first();
		if(count($cekket) < 1)
		{
			$kueri = "(select 'Kosong' FROM ranking where id_peserta = ".$i." limit 1) keterangan";
		}
		else
		{
			if($cekket->keterangan == 'Lulus' || $cekket->keterangan == 'Cadangan')
			{
				$kueri = "(select concat(keterangan,' pada prodi ', nama_prodi) from ranking join prodi on ranking.id_prodi = prodi.id_prodi where id_peserta = ".$i." and (keterangan = 'Lulus' or keterangan = 'Cadangan') limit 1) keterangan";
			}
			else if($cekket->keterangan == 'Tidak Lulus')
			{
				$kueri = "(select keterangan FROM ranking where id_peserta = ".$i." limit 1) keterangan";
			}
		}
		

		$pilih[$i] = Peserta::select("*",
		 DB::raw($kueri
		 	),
		 DB::raw("(select nama_prodi From pilih join prodi on pilih.id_prodi = prodi.id_prodi where id_peserta = ".$i." and pilihan_ke ='1') pilihan_1"
		 	),
		 DB::raw("(select nama_prodi From pilih join prodi on pilih.id_prodi = prodi.id_prodi where id_peserta = ".$i." and pilihan_ke ='2') pilihan_2"
			),
		 DB::raw("(select nama_prodi From pilih join prodi on pilih.id_prodi = prodi.id_prodi where id_peserta = ".$i." and pilihan_ke ='3') pilihan_3"
			))
		->where('id_peserta', $i)
		->get();
		
		}

		return view('peserta', ['pilihan' => $pilih, 'jumlah' => $jmlh]);
	}

	public function perhitungan(){
		$scan = Scan::join('peserta', 'peserta.id_peserta', '=', 'hasil_scan.id_peserta')
		->select('scan_teks', 'id_bidang', 'peserta.id_peserta')
		->orderby('peserta.id_peserta')
		->get(); 
		$ts = array();
		$m = 0;

		$is = 0;
		foreach($scan as $scans)
		{
			$pisah = explode(";", $scans->scan_teks);
			$nama = $pisah[0];
			$no = $pisah[1];
			$tipe = $pisah[2];
			$jwbn = $pisah[3];
		$kj = Kunci::join('bidang', 'bidang.id_bidang', '=', 'kunci_jawaban.id_bidang')
		->select('kunci_jawaban.id_bidang', 'kunci_jwbn', 'tipe_soal')
		->where('kunci_jawaban.id_bidang', $scans->id_bidang)
		->where('tipe_soal', $tipe)
		->orderby('kunci_jawaban.id_bidang')
		->first();
			$array1 = str_split($jwbn);
			$array2 = str_split($kj->kunci_jwbn);
			$kosong = 0;
			$benar = 0;
			$salah = 0;
			$is++;
			for($p=0;$p<100;$p++)
			{
				
				if($array1[$p]==" ")
				{ //kosong
					$kosong++; }
				else if($array1[$p]==$array2[$p])
				{ //benar
					$benar++; }
				else if($array1[$p]!=$array2[$p])
				{ //salah
					$salah++; } 
			}
			$hasil = Perhitungan::where('id_peserta',  $scans->id_peserta)
			->select('*')
			->first();
			if(count($hasil)==0)
			{
				$skor = $benar*4 - $salah;
				$perhitungan = Perhitungan::create([
					'jmlh_salah' => $salah,
					'jmlh_benar'  => $benar,
					'jmlh_kosong' => $kosong,
					'id_peserta'  => $scans->id_peserta,
					'total_score' => $skor
				]);
			}
			else if(count($hasil)>0)
			{
					$skor = $benar*4 - $salah;
					$perhitungan = Perhitungan::where('id_peserta', $scans->id_peserta)
					->update([
					'jmlh_salah' => $salah,
					'jmlh_benar'  => $benar,
					'jmlh_kosong' => $kosong,
					'id_peserta'  => $scans->id_peserta,
					'total_score' => $skor
					]);
			}
			
		$m++;
		}
		$hasils = Perhitungan::join('peserta', 'peserta.id_peserta', '=', 'hasil_perhitungan.id_peserta')
				->join('bidang', 'bidang.id_bidang', '=', 'peserta.id_bidang')
				->selectRaw("hasil_perhitungan.id_peserta, no_peserta, nama_peserta, jmlh_salah, 
					jmlh_benar, jmlh_kosong, total_score, nama_bidang_jurusan")
				->orderby('id_peserta')
				->get();
		if(count($hasils)<1)
				{
					$hasils = "kosong";
				}
				$thn = date("Y");
				$isitahun = Tahun::select('id_tahun')
				->where('tahun', $thn)
				->first();
				if(count($isitahun)<1)
				{
					Tahun::create([
						'tahun' => $thn
						]);
				}
			return view('hasilperhitungan', ['scans' => $scan, 'hasil' => $hasils]);
	}

public function upload(Request $request): RedirectResponse
{
    $this->validate($request, [
        'title' => 'nullable|max:100',
        'file' => 'required|file|max:2000'
    ]);
    $uploadedFile = $request->file('file');        
    $path = $uploadedFile->storeAs('txt', 'test.txt');
    $file = File::create([
        'title' => $request->title ?? $uploadedFile->getClientOriginalName(),
        'filename' => $path
    ]);
    	$isi = Storage::get('txt/test.txt');
        $isi = explode("\n", $isi);
		$isi2 = array ();
		foreach ($isi as $item)
		{
		    $isi2[] = explode(";", $item);
		}
		$ulang = 0;
		foreach($isi as $item)
		{
				//untuk mengecek apakah ada peserta dengan nama dan nomor di tabel peserta
				$cekid = Peserta::select('id_peserta')
				->where('nama_peserta', $isi2[$ulang][0])
				->where('no_peserta', $isi2[$ulang][1])
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
			    		'scan_teks' => $item,
			    		'id_peserta' => $cekid->id_peserta
			    		]);
					}
					else //jika ada
					{
						//apdet sesuai id peserta yang sudah ada
						$apdetorang = Scan::where('id_peserta', $cekid->id_peserta)
						->update([
			    		'scan_teks' => $item
			    		]);
					}
				}
				else //jika tidak ada (query cekid kosong)
				{
					//disini buat tampilan kalo ga sama
					$cekbeda = Peserta::select('id_peserta', 'nama_peserta')
					->where('no_peserta', $isi2[$ulang][1])
					->first();
					var_dump('Peserta dengan nama '. $isi2[$ulang][0].' dan nomor '.$isi2[$ulang][1].' memiliki data yang berbeda');
					var_dump('Mungkin maksud Anda'.$cekbeda->nama_peserta);
					return Redirect::back()->withErrors(['Peserta dengan nama '. $isi2[$ulang][0].' dan nomor '.$isi2[$ulang][1].' memiliki data yang berbeda.\nMungkin maksud Anda '.$cekbeda->nama_peserta]); 
				}
				$ulang++;
			
		}
    return redirect()
        ->back()
        ->withSuccess(sprintf('File %s has been uploaded.', $file->title));        
}

public function hasilscan(){
		$scans = Scan::join('peserta', 'peserta.id_peserta', '=', 'hasil_scan.id_peserta')
		->select('scan_teks', 'id_bidang', 'peserta.id_peserta')
		->orderby('peserta.id_peserta')
		->get(); 

		
		foreach($scans as $key => $scan)
		{
			$pisahs[$key] = explode(";", $scan->scan_teks);
		}
// dd($pisahs);
		if(count($scans)<1)
				{
					$scans = "kosong";
				}
				$thn = date("Y");
				$isitahun = Tahun::select('id_tahun')
				->where('tahun', $thn)
				->first();
				if(count($isitahun)<1)
				{
					Tahun::create([
						'tahun' => $thn
						]);
				}
			return view('hasilscan', ['scans' => $scans, 'pisahs' => $pisahs]);
	}

}
