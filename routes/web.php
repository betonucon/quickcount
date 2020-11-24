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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/cek/password/{id}', 'HomeController@password');
Auth::routes();
Route::group(['middleware'    => 'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/chart', 'HomeController@chart');
    Route::get('/', 'HomeController@index')->name('home');
});

Route::group(['middleware'    => 'auth'],function(){
    Route::get('/pengaturan/ubah', 'MasterController@ubah_password');
    Route::post('/pengaturan/simpan_password', 'MasterController@simpan_password');
});
Route::group(['middleware'    => 'auth'],function(){
    Route::get('/pemilihan', 'PemilihanController@index');
    Route::get('/pemilihan/file', 'PemilihanController@index_file');
    Route::get('/pemilihan/tambah', 'PemilihanController@tambah');
    Route::get('/pemilihan/ubah/{id}', 'PemilihanController@ubah');
    Route::get('/pemilihan/ubah_file/{id}', 'PemilihanController@ubah_file');
    Route::get('/pemilihan/hapus/{id}', 'PemilihanController@hapus');
    Route::get('/pemilihan/kelurahan/{id}', 'PemilihanController@cek_kelurahan');
    Route::get('/pemilihan/api', 'PemilihanController@api');
    Route::get('/pemilihan/api_pemilu', 'PemilihanController@api_pemilu');
    Route::post('/pemilihan/simpan', 'PemilihanController@simpan');
    Route::post('/pemilihan/simpan_ubah/{id}', 'PemilihanController@simpan_ubah');
    Route::post('/pemilihan/simpan_file/{id}', 'PemilihanController@simpan_file');
});

Route::group(['middleware'    => 'auth'],function(){
    Route::get('/pengguna', 'PenggunaController@index');
    Route::get('/pengguna/tambah', 'PenggunaController@tambah');
    Route::get('/pengguna/ubah/{id}', 'PenggunaController@ubah');
    Route::get('/pengguna/hapus/{id}', 'PenggunaController@hapus');
    Route::get('/pengguna/kelurahan/{id}', 'PenggunaController@cek_kelurahan');
    Route::get('/pengguna/api', 'PenggunaController@api');
    Route::post('/pengguna/simpan', 'PenggunaController@simpan');
    Route::post('/pengguna/simpan_ubah/{id}', 'PenggunaController@simpan_ubah');
});

Route::group(['middleware'    => 'auth'],function(){
    Route::get('/kecamatan', 'MasterController@index');
    Route::get('/kelurahan/{id}', 'MasterController@index_kelurahan');
    Route::get('/pengguna/tambah', 'MasterController@tambah');
    Route::get('/pengguna/ubah/{id}', 'MasterController@ubah');
    Route::get('/pengguna/hapus/{id}', 'MasterController@hapus');
    Route::get('/pengguna/kelurahan/{id}', 'MasterController@cek_kelurahan');
    Route::get('/kecamatan/api', 'MasterController@api');
    Route::get('/kelurahan/api/{id}', 'MasterController@api_kelurahan');
    Route::post('/pengguna/simpan', 'MasterController@simpan');
    Route::post('/pengguna/simpan_ubah/{id}', 'MasterController@simpan_ubah');
});

