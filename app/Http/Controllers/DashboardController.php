<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Prodi;
use App\Jurusan;
use App\Pilihan;
use App\Perhitungan;
use App\Ranking;
use App\Models\Peserta;
use App\Tahun;
// use Illuminate\Support\Facades\Input;
// use Excel;
// use Response;

class DashboardController extends Controller
{
	public function grafik(){

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
		->first();
		$tahunsekarang = $tahuns->tahun;

		return view('vendor.adminlte.home', compact('naprod1', 'naprod2', 'naprod3', 'naprod4', 'naprod5', 'naprod6', 'naprod7', 'naprod8', 'total_peminat1', 'total_peminat2', 'total_peminat3', 'total_peminat4', 'total_peminat5', 'total_peminat6', 'total_peminat7', 'total_peminat8','lulus1', 'lulus2', 'lulus3', 'lulus4', 'lulus5', 'lulus6', 'lulus7', 'lulus8', 'tdklulus1', 'tdklulus2', 'tdklulus3', 'tdklulus4', 'tdklulus5', 'tdklulus6', 'tdklulus7',  'tdklulus8', 'cadangan1', 'cadangan2', 'cadangan3', 'cadangan4', 'cadangan5', 'cadangan6', 'cadangan7', 'cadangan8', 'sma1', 'sma2', 'sma3', 'sma4', 'sma5', 'sma6', 'sma7', 'sma8', 'smk1', 'smk2', 'smk3', 'smk4', 'smk5', 'smk6', 'smk7', 'smk8', 'lain1', 'lain2', 'lain3', 'lain4', 'lain5', 'lain6', 'lain7', 'lain8', 'tahunsekarang'));
	}
	
public function ranking(){
		$prodi = Prodi::join('jurusan', 'jurusan.id_jurusan', '=', 'prodi.id_jurusan')
		->select('prodi.id_jurusan', 'jurusan.nama_jurusan')
		->orderby('prodi.id_jurusan')
		->distinct()
		->get();
		$dapats = array();
		$dapat1 = array();
		$dapat2 = array();
		$dapat3 = array();
		DB::select(DB::raw("ALTER SEQUENCE id_ranking_seq RESTART WITH 1;"));
		Ranking::truncate();
		$prod = Prodi::all()->count();
		for($i=1; $i<=$prod; $i++)
		{
			${'batas'. $i} = Prodi::select('id_prodi','jmlh_kuota', 'min_score')
			->where('id_prodi', $i)
			->first();

			${'kuota'. $i} = ${'batas'. $i}->jmlh_kuota;

			$propil1 = Perhitungan::select('hasil_perhitungan.id_peserta')
			->join('pilih', 'hasil_perhitungan.id_peserta', 'pilih.id_peserta')
			->where('id_prodi', $i)
			->where('pilihan_ke', 1)
			->where('total_score', '>=', ${'batas'. $i}->min_score)
			->orderBy('total_score', 'desc')
			->get();
			foreach($propil1 as $propil1s)
			{
				array_push($dapat1, $propil1s->id_peserta);
			}
		}
		for($i=1; $i<=$prod; $i++)
		{
				$propil2 = Perhitungan::select('hasil_perhitungan.id_peserta')
				->join('pilih', 'hasil_perhitungan.id_peserta', 'pilih.id_peserta')
				->where('id_prodi', $i)
				->where('pilihan_ke', 2)
				->where('total_score', '>=', ${'batas'. $i}->min_score)
				->orderBy('total_score', 'desc')
				->get();
			foreach($propil2 as $propil2s)
			{
				array_push($dapat2, $propil2s->id_peserta);
			}
		}
		for($i=1; $i<=$prod; $i++)
		{
				$propil3 = Perhitungan::select('hasil_perhitungan.id_peserta')
				->join('pilih', 'hasil_perhitungan.id_peserta', 'pilih.id_peserta')
				->where('id_prodi', $i)
				->where('pilihan_ke', 3)
				->where('total_score', '>=', ${'batas'. $i}->min_score)
				->orderBy('total_score', 'desc')
				->get();
			foreach($propil3 as $propil3s)
			{
				array_push($dapat3, $propil3s->id_peserta);
			}
		}

			for($p = 1;$p <= 3; $p++)
			{
				for($i=1; $i<=$prod; $i++)
				{
					$peringkats = 1;
					$propilakhir = Perhitungan::select('hasil_perhitungan.id_peserta')
					->join('pilih', 'hasil_perhitungan.id_peserta', 'pilih.id_peserta')
					->where('pilihan_ke', $p)
					->where('id_prodi', $i)
					->whereIn('hasil_perhitungan.id_peserta', ${'dapat'. $p})
					->whereNotIn('hasil_perhitungan.id_peserta', $dapats)
					->orderBy('total_score', 'desc')
					->limit(${'kuota'. $i})
					->get();
					foreach($propilakhir as $propila)
					{
						Ranking::create([
						'id_prodi'	=> $i,
						'id_peserta' => $propila->id_peserta,
						'keterangan' => 'Lulus',
						'peringkat' => $peringkats
						]);
						array_push($dapats, $propila->id_peserta);
						$peringkats++;
						if(${'kuota'. $i} > 0)
						{
							${'kuota'. $i}--;
						}
					}
				}
			}
				$pilihanpeserta = Ranking::select('id_peserta', 'id_prodi')
				->where('keterangan', 'Lulus')
				->get();
				for($pilke = 1;$pilke <= 3; $pilke++)
				{
					foreach($pilihanpeserta as $pilpes)
					{
						$luluslain = Peserta::select('peserta.id_peserta')
						->join('pilih', 'peserta.id_peserta', '=', 'pilih.id_peserta')
						->where('peserta.id_peserta', $pilpes->id_peserta)
						->where('pilihan_ke', $pilke)
						->where('pilih.id_prodi', $pilpes->id_prodi)
						->first();

						if(count($luluslain)<1)
						{
							$prodinya = Pilihan::select('id_prodi')
							->where('id_peserta', $pilpes->id_peserta)
							->where('pilihan_ke', $pilke)
							->first();

							Ranking::create([
							'id_prodi'	=> $prodinya->id_prodi,
							'id_peserta' => $pilpes->id_peserta,
							'keterangan' => 'Tidak Lulus'
							]);
						}					
					}
				}
				
		for($i=1; $i<=$prod; $i++)
		{
			$peringkats = 1;
			$propil4 = Perhitungan::select('hasil_perhitungan.id_peserta')
			->join('pilih', 'hasil_perhitungan.id_peserta', 'pilih.id_peserta')
			->where('id_prodi', $i)
			->whereNotIn('pilih.id_peserta', $dapats)
			->orderBy('total_score', 'desc')
			->get();
			foreach($propil4 as $propil4s)
			{
				Ranking::create([
				'id_prodi'	=> $i,
				'id_peserta' => $propil4s->id_peserta,
				'keterangan' => 'Tidak Lulus',
				'peringkat' => $peringkats
				]);
				$peringkats++;
			}
				// $kirim['sdhdpt'.$i] = ${'sudahdapat'. $i};
		}

		return redirect('dashboardranking');
	}
	public function rankings(){
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

	public function cadangan(Request $request){		
		
		$prodi = Prodi::join('jurusan', 'jurusan.id_jurusan', '=', 'prodi.id_jurusan')
		->select('prodi.id_jurusan', 'jurusan.nama_jurusan')
		->orderby('prodi.id_jurusan')
		->distinct()
		->get();

		$sudahranking = Ranking::select('id_peserta')->where('keterangan', 'Lulus')->get();
		$dapata = array();
		$dapata1 = array();
		$dapata2 = array();
		$dapata3 = array();
		$prod = Prodi::all()->count();
		for($i=1; $i<=$prod; $i++)
		{

			foreach($sudahranking as $sdhranking)
			{
				array_push($dapata, $sdhranking->id_peserta);
			}
			${'batas'. $i} = Prodi::select('id_prodi','jmlh_kuota', 'min_score')
			->where('id_prodi', $i)
			->first();

			$propil1 = Perhitungan::select('hasil_perhitungan.id_peserta')
			->join('pilih', 'hasil_perhitungan.id_peserta', 'pilih.id_peserta')
			->where('id_prodi', $i)
			->where('pilihan_ke', 1)
			->where('total_score', '>=', ${'batas'. $i}->min_score)
			->whereNotIn('pilih.id_peserta', $dapata)
			->orderBy('total_score', 'desc')
			->get();
			foreach($propil1 as $propil1s)
			{
				array_push($dapata1, $propil1s->id_peserta);
			}
		}
		for($i=1; $i<=$prod; $i++)
		{
				$propil2 = Perhitungan::select('hasil_perhitungan.id_peserta')
				->join('pilih', 'hasil_perhitungan.id_peserta', 'pilih.id_peserta')
				->where('id_prodi', $i)
				->where('pilihan_ke', 2)
				->where('total_score', '>=', ${'batas'. $i}->min_score)
				->whereNotIn('pilih.id_peserta', $dapata)
				->orderBy('total_score', 'desc')
				->get();
			
			foreach($propil2 as $propil2s)
			{
				array_push($dapata2, $propil2s->id_peserta);
			}
		}
		for($i=1; $i<=$prod; $i++)
		{
				$propil3 = Perhitungan::select('hasil_perhitungan.id_peserta')
				->join('pilih', 'hasil_perhitungan.id_peserta', 'pilih.id_peserta')
				->where('id_prodi', $i)
				->where('pilihan_ke', 3)
				->where('total_score', '>=', ${'batas'. $i}->min_score)
				->whereNotIn('pilih.id_peserta', $dapata)
				->orderBy('total_score', 'desc')
				->get();
			
			foreach($propil3 as $propil3s)
			{
				array_push($dapata3, $propil3s->id_peserta);
			}
		}
		for($p = 1; $p<=3; $p++)
		{
			for($i=1; $i<=$prod; $i++)
			{
				${'cad'.$i} = (int)$request->cadangan;

				$peringkatss = 1;
				$propilcadakhir = Perhitungan::select('hasil_perhitungan.id_peserta')
				->join('pilih', 'hasil_perhitungan.id_peserta', 'pilih.id_peserta')
				->where('pilihan_ke', $p)
				->where('id_prodi', $i)
				->whereIn('hasil_perhitungan.id_peserta', ${'dapata'. $p})
				->whereNotIn('hasil_perhitungan.id_peserta', $dapata)
				->orderBy('total_score', 'desc')
				->limit(${'cad'. $i})
				->get();
				foreach($propilcadakhir as $propilcada)
				{
					Ranking::where('id_peserta', $propilcada->id_peserta)
					->where('id_prodi', $i)
					->update([
					'keterangan' => 'Cadangan',
					'peringkat' => $peringkatss
					]);
					array_push($dapata, $propilcada->id_peserta);
					$peringkatss++;
					if(${'cad'.$i}>0)
					{
						${'cad'.$i}--;
					}
				}
			}
		}
		
		return redirect('dashboardranking');
	}

}
