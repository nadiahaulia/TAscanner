<?php

use Illuminate\Database\Seeder;
use App\Models\Peserta;
use App\Models\Kunci;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    	// $faker = Faker::create();       
    	// for ($i=11; $i<15; $i++){
    	// 	$x = rand(0,100);
    	// 	$y = rand(0,100);
    	// 	$z = rand(0,100);
    	// 	while($x + $y + $z != 100)
    	// 	{
    	// 		$x = rand(0,100);
    	// 		$y = rand(0,100);
    	// 		$z = rand(0,100);
    	// 	}
    	// 	$jmlh = ($x*(-1)) + ($y*4); 
    	// 	Peserta::insert([
    	// 		'jmlh_salah' => $x,
    	// 		'jmlh_benar' => $y,
    	// 		'jmlh_kosong' => $z,
    	// 		'id_peserta' => $i,
    	// 		'total_score' =>$jmlh,

    	// 		]);

        function randomString($str) {
          $len = strlen($str);
          $num_to_remove = ceil($len * .4); // 40% removal
          for($i = 0; $i < $num_to_remove; $i++)
          {
            $k = 0;
            do
            {
              $k = rand(1, $len);
            } while($str[$k-1] == "_");
            $str[$k-1] = "_";
          }
          return $str;
        }

        function generateRandomString($length, $pilihan) {
            // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $characters = '';
            if($pilihan == 1)
            {
                $characters = 'ABCD';
            }
            else if($pilihan == 2)
            {
                $characters = ' ABCDE ';
            }
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        function hasil_scan()
        {
            for ($i=1; $i<=86; $i++){
            $psrt = DB::table('peserta')
            ->select('*')
            ->where('id_peserta', $i)
            ->first();

            $nama = $psrt->nama_peserta;
            $nomor = $psrt->no_peserta;
            $scnnomor = $nomor;

            $scntipe = generateRandomString(1,1);
            $kj = Kunci::join('bidang', 'bidang.id_bidang', '=', 'kunci_jawaban.id_bidang')
            ->select('kunci_jawaban.id_bidang', 'kunci_jwbn', 'tipe_soal')
            ->where('kunci_jawaban.id_bidang', $psrt->id_bidang)
            ->where('tipe_soal', $scntipe)
            ->orderby('kunci_jawaban.id_bidang')
            ->first();
            $scnjwbn = $kj->kunci_jwbn;
            $skor = 0;
            
            ////////////////////////////////////////////////////
            $kosong = 0;
            $benar = 0;
            $salah = 0;

          
            ///////////////////////////////////////////////////////
            // while($skor<150)
            // {

          //   $len = strlen($scnjwbn);
          // $num_to_remove = ceil($len * .1); // 40% removal
          // for($i = 0; $i < $num_to_remove; $i++)
          // {
          //   $k = 0;
          //   do
          //   {
          //     $k = rand(1, $len);
          //   } while($scnjwbn[$k-1] == ' ');
          //   $scnjwbn[$k-1] = ' ';
          // }

            // $array1 = str_split($scnjwbn);
            // $array2 = str_split($kj->kunci_jwbn);
            // $kosong = 0;
            // $benar = 0;
            // $salah = 0;
            // for($p=0;$p<100;$p++)
            // {
            //     if($array1[$p]==" ")
            //     {
            //         //kosong
            //         $kosong++;
            //     }
            //     else if($array1[$p]==$array2[$p])
            //     {
            //         //benar
            //         $benar++;
            //     }
            //     else if($array1[$p]!=$array2[$p])
            //     {
            //         //salah
            //         $salah++;
            //     } 
            // }
            // $skor = $benar*4 - $salah;
        // }


            ////////////////////////////////////////////////////
            DB::table('hasil_scan')
            ->insert([
                'id_peserta' => $i,
                'scan_teks'  => $nama.$nomor.$scntipe.$scnjwbn
            ]);       
             }
         }


         function peserta()
         {
            $faker = Faker::create(); 
            for ($i=1; $i<=86; $i++)
            {
                $namas = $faker->name;
                while(strlen($namas)>25)
                {
                    $namas = $faker->name;
                }
                Peserta::insert([
                    'nama_peserta'=>$namas,
                    'no_peserta'=> '1020'.$i+20,
                    'id_bidang'=> rand(1,2)
                    ]);
            }
         }

         function pilih()
         {
            for ($i=1; $i<=86; $i++){
                $psr = DB::table('peserta')
                ->select('*')
                ->where('id_peserta', $i)
                ->first();

                for($ii=1; $ii<=3; $ii++)
                {
                  Peserta::insert([
                'id_peserta' => $i,
                'id_prodi' => rand(1,20),
                'pilihan_ke' => $ii
                 ]);  
                }
             
            }
         }

        //Jalankan Fungsi dibawah:
    	$faker = Faker::create();
        //Masukkan fungsi
        // ||||
        // VVVV
            hasil_scan ();
        }      

}
