<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
// impor model file
use App\File;
use App\Models\Peserta;
use App\Scan;
use Storage;
use Illuminate\Http\RedirectResponse;
class FileController extends Controller
{
    public function index(): View
    {
        $files = File::orderBy('created_at', 'DESC')
            ->paginate(30);
        return view('file.index', compact('files'));
    }
    public function form(): View
    {
        return view('file.form');
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
				}
				$ulang++;
			
		}
    return redirect()
        ->back()
        ->withSuccess(sprintf('File %s has been uploaded.', $file->title));        
}
}