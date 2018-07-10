<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Prodi;
use App\Models\Kunci;
use Auth;

class KelolaController extends Controller
{
	public function prodiindex(){
		$prodi1 = Prodi::join('jurusan', 'jurusan.id_jurusan', '=', 'prodi.id_jurusan')
		->select('prodi.id_jurusan', 'jurusan.nama_jurusan')
		->where('id_bidang', '=', '1')
		->distinct()
		->orderby('prodi.id_jurusan')
		->get();

		$prodi2 = Prodi::join('jurusan', 'jurusan.id_jurusan', '=', 'prodi.id_jurusan')
		->select('prodi.id_jurusan', 'jurusan.nama_jurusan')
		->where('id_bidang', '=', '2')
		->distinct()
		->orderby('prodi.id_jurusan')
		->get();


		return view('prodi', ['jrsn1' => $prodi1, 'jrsn2' => $prodi2 ]);
	}
	public function prodistore(Request $request){
		// dd($request);
		$this->validate($request,[
			'nama_prodi' => 'required',
			'jmlh_kuota' => 'required',
			'min_score' => 'required',
			'id_jurusan' => 'required',
			'id_admin' => 'required'
			]);
			$prodi = Prodi::create([
			'nama_prodi' => $request->nama_prodi,
			'jmlh_kuota' => $request->jmlh_kuota,
			'min_score' => $request->min_score,
			'id_jurusan' => $request->id,
			'id_admin' => Auth::id(),
			]);

		return redirect('/kelolaprodi');
	}
	public function prodiupdate(Request $request, $id_prodi){
		$this->validate($request,[
			'nama_prodi' => 'required',
			'jmlh_kuota' => 'required',
			'min_score' => 'required',
		]);
		$prodi = Prodi::where('id_prodi', $id_prodi)
		->update([
		'nama_prodi' => $request->nama_prodi,
		'jmlh_kuota' => $request->jmlh_kuota,
		'min_score' => $request->min_score,
		]);

		return redirect('/kelolaprodi');
	}
	public function prodidelete($id_prodi){
		$prodi = Prodi::where('id_prodi', $id_prodi);
		$prodi->delete();
		return redirect('/kelolaprodi');
	}
	public function kjindex(){
    	$kj = Kunci::join('bidang', 'bidang.id_bidang', '=', 'kunci_jawaban.id_bidang')
		->select('kunci_jawaban.id_bidang', 'bidang.nama_bidang_jurusan')
		->orderby('kunci_jawaban.id_bidang')
		->get();
		
    	return view('kuncijawaban', ['jwbn' => $kj]);
    }
    public function kjstore(Request $request){
    
    	$validasi = [];
    	// $val = [];
    	For($i=0;$i<101;$i++)
			{
			    $j = (string)$i; 
			    if($j!='0')
			    {
			    	 $validasi[$j] = 'required';
			    	 // $val[$j] = $request->$j;
			    }
			    else
			    {
			    	$validasi[$j] = '';
			    	$val[$j] = '';
			    }
			   
			}
			$validasi['tipe_soal'] = 'not_in:"0"|unique:kunci_jawaban,tipe_soal,NULL,NULL,id_bidang,'.$request->id_bidang;
			$validasi['id_bidang'] = 'not_in:"0"||unique:kunci_jawaban,id_bidang,NULL,NULL,tipe_soal,'.$request->tipe_soal;

			
    	$this->validate($request, $validasi);

    		$masukdb = [];
    		$masukdb['tipe_soal'] = $request->tipe_soal;
			$masukdb['id_bidang'] = $request->id_bidang;
			$masukdb['id_admin'] = Auth::id();

			$kj='';
			For($i=0;$i<=100;$i++)
			{
			    $j = (string)$i; 
			    $kj .= $request->$j;
			}
			// dd($kj);
			$kj = str_pad($kj,100," ");
			$masukdb['kunci_jwbn'] = $kj;
			Kunci::create($masukdb);

    	return redirect('/kelolakuncijawaban');
    }
    public function kjupdate(Request $request, $n){ 
    	$kj='';
			For($i=0;$i<=100;$i++)
			{
			    $j = (string)$i; 
			    $kj .= $request->$j;
			}
		$kj = str_pad($kj,100," ");
    	$kjs = Kunci::where('id_kuncijwbn', $n)
    	->update([
		'kunci_jwbn' => $kj,
		]);

		return redirect('/kelolakuncijawaban');
	}
	public function kjdelete($n){
		$kj = Kunci::where('id_kuncijwbn', $n);
		$kj->delete();
		return redirect('/kelolakuncijawaban');
	}
}
