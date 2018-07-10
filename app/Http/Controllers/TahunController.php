<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Prodi;
use App\Jurusan;
use App\Pilihan;
use App\Perhitungan;
use App\Ranking;
use App\Scan;
use App\Models\Kunci;
use App\Models\Peserta;
use App\Tahun;

class TahunController extends Controller
{
    public function grafiktahun($tahun){

		$jrsn = Jurusan::all()->count();
		for($i=1; $i<=$jrsn; $i++){
			$naprod = Prodi::select('id_prodi','nama_prodi')
	        ->join('jurusan', 'jurusan.id_jurusan', 'prodi.id_jurusan')
	        ->where('prodi.id_jurusan', '=', $i)
	        ->orderby('id_prodi')
	        ->get();
	          ${'naprod' . $i } = array();
	          ${'total_peminat' . $i } = array();
	          ${'lulus' . $i } = array();
	          ${'cadangan' . $i } = array();
	          ${'tdklulus' . $i } = array();
	          ${'sma' . $i } = array();
	          ${'smk' . $i } = array();
	          ${'lain' . $i } = array();
			foreach($naprod as $naprods)
			{
				array_push(${'naprod' . $i }, $naprods->nama_prodi);

				$total_peminat = Pilihan::selectRaw("coalesce(count(distinct pilih.id_peserta), 0) as total_peminat")
	          ->join('prodi', 'pilih.id_prodi', 'prodi.id_prodi')
	          ->where('prodi.id_prodi', $naprods->id_prodi)
	          ->whereYear('pilih.created_at', $tahun)
	          // ->groupBy('pilih.id_prodi')
	          // ->orderBy('pilih.id_prodi')
	          ->first();

				if($total_peminat)
				{
					array_push(${'total_peminat' . $i }, $total_peminat->total_peminat); 
				}
				else
				{
					array_push(${'total_peminat' . $i }, 0); 	
				}
				
				$lulus = Ranking::selectRaw("coalesce(count(distinct ranking.id_peserta), 0) as total_lulus")
				->join('prodi', 'ranking.id_prodi', 'prodi.id_prodi')
				->where('keterangan', '=', 'Lulus')
				->where('prodi.id_prodi', $naprods->id_prodi)
				->whereYear('ranking.created_at', $tahun)
				// ->groupBy('ranking.id_prodi')
				->first();

				if($lulus)
				{
					array_push(${'lulus' . $i }, $lulus->total_lulus); 
				}
				else
				{
					array_push(${'lulus' . $i }, 0); 	
				}
				$cadangan = Ranking::selectRaw("coalesce(count(distinct ranking.id_peserta), 0) as total_cadangan")
				->join('prodi', 'ranking.id_prodi', 'prodi.id_prodi')
				->where('keterangan', '=', 'Cadangan')
				->where('prodi.id_prodi', $naprods->id_prodi)
				->whereYear('ranking.created_at', $tahun)
				// ->groupBy('ranking.id_prodi')
				->first();

				if($cadangan)
				{
					array_push(${'cadangan' . $i }, $cadangan->total_cadangan); 
				}
				else
				{
					array_push(${'cadangan' . $i }, 0); 	
				}

				$tdklulus = Ranking::selectRaw("coalesce(count(distinct ranking.id_peserta), 0) as total_tdklulus")
				->join('prodi', 'ranking.id_prodi', 'prodi.id_prodi')
				->where('keterangan', '=', 'Tidak Lulus')
				->where('prodi.id_prodi', $naprods->id_prodi)
				->whereYear('ranking.created_at', $tahun)
				// ->groupBy('ranking.id_prodi')
				->first();

				if($tdklulus)
				{
					array_push(${'tdklulus' . $i }, $tdklulus->total_tdklulus); 
				}
				else
				{
					array_push(${'tdklulus' . $i }, 0); 	
				}

				$sma = Ranking::selectRaw("coalesce(count(distinct ranking.id_peserta), 0) as total_sma")
				->join('prodi', 'ranking.id_prodi', 'prodi.id_prodi')
				->join('peserta', 'ranking.id_peserta', 'peserta.id_peserta')
				->where('keterangan', '=', 'Lulus')
				->where('prodi.id_prodi', $naprods->id_prodi)
				->where('asal_sekolah', 'like', 'SMA%')
				->whereYear('ranking.created_at', $tahun)
				// ->groupBy('ranking.id_prodi')
				->first();

				if($sma)
				{
					array_push(${'sma' . $i }, $sma->total_sma); 
				}
				else
				{
					array_push(${'sma' . $i }, 0); 	
				}

				$smk = Ranking::selectRaw("coalesce(count(distinct ranking.id_peserta), 0) as total_smk")
				->join('prodi', 'ranking.id_prodi', 'prodi.id_prodi')
				->join('peserta', 'ranking.id_peserta', 'peserta.id_peserta')
				->where('keterangan', '=', 'Lulus')
				->where('prodi.id_prodi', $naprods->id_prodi)
				->where('asal_sekolah', 'like', 'SMK%')
				->whereYear('ranking.created_at', $tahun)
				// ->groupBy('ranking.id_prodi')
				->first();

				if($smk)
				{
					array_push(${'smk' . $i }, $smk->total_smk); 
				}
				else
				{
					array_push(${'smk' . $i }, 0); 	
				}

				$lain = Ranking::selectRaw("coalesce(count(distinct ranking.id_peserta), 0) as total_lain")
				->join('prodi', 'ranking.id_prodi', 'prodi.id_prodi')
				->join('peserta', 'ranking.id_peserta', 'peserta.id_peserta')
				->where('keterangan', '=', 'Lulus')
				->where('prodi.id_prodi', $naprods->id_prodi)
				->where('asal_sekolah', 'not like', 'SMA%')
				->where('asal_sekolah', 'not like', 'SMK%')
				->whereYear('ranking.created_at', $tahun)
				// ->groupBy('ranking.id_prodi')
				->first();

				if($lain)
				{
					array_push(${'lain' . $i }, $lain->total_lain); 
				}
				else
				{
					array_push(${'lain' . $i }, 0); 	
				}
			}			
		}	
		
		$tahuns = Tahun::select('tahun')
		->orderBy('tahun', 'desc')
		->first();
		$tahunsekarang = $tahuns->tahun;

		return view('vendor.adminlte.home', compact('naprod1', 'naprod2', 'naprod3', 'naprod4', 'naprod5', 'naprod6', 'naprod7', 'naprod8', 'total_peminat1', 'total_peminat2', 'total_peminat3', 'total_peminat4', 'total_peminat5', 'total_peminat6', 'total_peminat7', 'total_peminat8','lulus1', 'lulus2', 'lulus3', 'lulus4', 'lulus5', 'lulus6', 'lulus7', 'lulus8', 'tdklulus1', 'tdklulus2', 'tdklulus3', 'tdklulus4', 'tdklulus5', 'tdklulus6', 'tdklulus7',  'tdklulus8', 'cadangan1', 'cadangan2', 'cadangan3', 'cadangan4', 'cadangan5', 'cadangan6', 'cadangan7', 'cadangan8', 'sma1', 'sma2', 'sma3', 'sma4', 'sma5', 'sma6', 'sma7', 'sma8', 'smk1', 'smk2', 'smk3', 'smk4', 'smk5', 'smk6', 'smk7', 'smk8', 'lain1', 'lain2', 'lain3', 'lain4', 'lain5', 'lain6', 'lain7', 'lain8', 'tahunsekarang'));
	}

	public function pesertatahun($tahun){
		$jmlh = Peserta::all()->count();
		$pilihs = array();

		for($i = 1; $i<= $jmlh; $i++)
		{
		$cekket = Ranking::selectRaw("id_peserta, keterangan")
		->where('id_peserta', $i)
		->whereYear('ranking.created_at', $tahun)
		->first();
		if(count($cekket) < 1)
		{
			$kueri = "(select 'Kosong' FROM ranking where id_peserta = ".$i." and extract(YEAR from created_at) = '$tahun' limit 1) keterangan";
		}
		else
		{
			if($cekket->keterangan == 'Lulus' || $cekket->keterangan == 'Cadangan')
			{
				$kueri = "(select concat(keterangan,' pada prodi ', nama_prodi) from ranking join prodi on ranking.id_prodi = prodi.id_prodi where id_peserta = ".$i." and (keterangan = 'Lulus' or keterangan = 'Cadangan') and extract(YEAR from ranking.created_at) = '$tahun' limit 1) keterangan";
			}
			else if($cekket->keterangan == 'Tidak Lulus')
			{
				$kueri = "(select keterangan FROM ranking where id_peserta = ".$i." and extract(YEAR from ranking.created_at) = '$tahun' limit 1) keterangan";
			}
		}
		

		$pilih[$i] = Peserta::select("*",
		 DB::raw($kueri
		 	),
		 DB::raw("(select nama_prodi From pilih join prodi on pilih.id_prodi = prodi.id_prodi where id_peserta = ".$i." and pilihan_ke ='1' and extract(YEAR from pilih.created_at) = '$tahun') pilihan_1"
		 	),
		 DB::raw("(select nama_prodi From pilih join prodi on pilih.id_prodi = prodi.id_prodi where id_peserta = ".$i." and pilihan_ke ='2' and extract(YEAR from pilih.created_at) = '$tahun') pilihan_2"
			),
		 DB::raw("(select nama_prodi From pilih join prodi on pilih.id_prodi = prodi.id_prodi where id_peserta = ".$i." and pilihan_ke ='3' and extract(YEAR from pilih.created_at) = '$tahun') pilihan_3"
			))
		->where('id_peserta', $i)
		->whereYear('peserta.created_at', $tahun)
		->get();
		
		}

		return view('peserta', ['pilihan' => $pilih, 'jumlah' => $jmlh]);
	}

	public function perhitungan($tahun){
		$scan = Scan::join('peserta', 'peserta.id_peserta', '=', 'hasil_scan.id_peserta')
		->select('scan_teks', 'id_bidang', 'peserta.id_peserta')
		->whereYear('hasil_scan.created_at', $tahun)
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
			->whereYear('hasil_perhitungan.created_at', $tahun)
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
			->whereYear('hasil_perhitungan.created_at', $tahun)
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

	public function rankings($tahun){
		$prodi = Prodi::join('jurusan', 'jurusan.id_jurusan', '=', 'prodi.id_jurusan')
		->select('prodi.id_jurusan', 'jurusan.nama_jurusan')
		->orderby('prodi.id_jurusan')
		->distinct()
		->get();

		$prod = Prodi::all()->count();
		for($i=1; $i<=$prod; $i++)
		{
			${'sudahdapat'. $i} = Ranking::select('id_peserta')
			->where('id_prodi', $i)
			->where('keterangan', 'Lulus')
			->whereYear('ranking.created_at', $tahun)
			->get();
		}
		$kirim = [];
		$kirim['jrsn'] = $prodi;
		
		for($i=1; $i<=$prod; $i++)
		{
			$ada = false;
			$arr = array();
				foreach(${'sudahdapat'. $i} as ${'sudahdapats'. $i})
				{
					array_push($arr, strval(${'sudahdapats'. $i}->id_peserta));
					$ada = true;
				}

				if(!$ada)
				{
					$kirim['sdhdpt'.$i] = ["0"];
				}
				else
				{
					$kirim['sdhdpt'.$i] = $arr;
				}
		}
		return view('ranking', $kirim);
	}

}
