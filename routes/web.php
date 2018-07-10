<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'auth'], function () {
	Route::get('/masuk', 'TestController@pilih');
// Route::prefix('dashboard')->group(function() {
// Route::get('/login', 'LoginController@showLoginForm')->name('dashboard.login');
//     Route::post('/login', 'LoginController@login')->name('dashboard.login.submit');
//===============================================================
//                          Dashboard                           =
//===============================================================
Route::get('/', 'DashboardController@grafik')->middleware('auth')->name('grafik');
Route::get('/grafik/{tahun}', 'TahunController@grafiktahun')->middleware('auth')->name('grafik');

Route::get('/dashboardranking', 'DashboardController@rankings')->name('ranking');
Route::get('/dashboardranking/{tahun}', 'TahunController@rankings')->name('ranking');
Route::get('/dashboardrankings', 'DashboardController@ranking');
Route::post('/cadangan', 'DashboardController@cadangan')->name('ranking');

//##############################################################

//===============================================================
//                     Data                                     =
//===============================================================
// Route::get('/datapeserta', function () {
//     return view('peserta');
Route::get('/datapeserta', 'DataController@peserta')->name('unduh');
Route::get('/datapeserta/{tahun}', 'TahunController@pesertatahun')->name('unduh');
Route::get('/datahasil', 'DataController@perhitungan')->name('perhitungan');
Route::get('/datahasilscan', 'DataController@hasilscan')->name('perhitungan');
Route::get('/datahasil/{tahun}', 'TahunController@perhitungan')->name('perhitungan');
Route::post('/datahasil', 'DataController@upload')->name('file.upload');

Route::post('/uploadfile','DashboardController@upload');

//##############################################################


//===============================================================
//                     	Kelola                                  =
//===============================================================
Route::get('/kelolaprodi', 'KelolaController@prodiindex');
Route::post('/tambahprodi', 'KelolaController@prodistore');
Route::put('/prodi/{id_prodi}', 'KelolaController@prodiupdate');
Route::delete('/prodi/{id_prodi}', 'KelolaController@prodidelete');

Route::get('/kelolakuncijawaban', 'KelolaController@kjindex');
Route::post('/kelolakj', 'KelolaController@kjstore');
Route::put('/kelolakj/{n}', 'KelolaController@kjupdate');
Route::delete('/kelolakj/{n}', 'KelolaController@kjdelete');

//##############################################################

Route::get('/test', function () {
    return view('test');
});
Route::post('/testing', 'DashboardController@peserta');
});

Route::post('/hasilscan', 'ApiController@scan');


// Route::get('file/upload', 'FileController@form')->name('file.form');
// Route::get('file/index', 'FileController@index')->name('file.index');
// Route::post('file/upload', 'FileController@upload')->name('file.upload');
