<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {   
    //     $peserta = Peserta::join('pilih', 'peserta.id_peserta', '=', 'pilih.id_peserta')
    // ->join('prodi', 'pilih.id_prodi', '=', 'prodi.id_prodi')
    // ->join('hasil_perhitungan', 'peserta.id_peserta', '=', 'hasil_perhitungan.id_peserta')
    // ->select('nama_peserta', 'no_peserta', 'keterangan', 'total_score', 'pilih.pilihan_ke', 'pilih.id_prodi', 'nama_prodi', 'jmlh_kuota', 'min_score')
    // ->distinct()->get();

    // dd ( $peserta );

        return view('adminlte::home');
    }
}