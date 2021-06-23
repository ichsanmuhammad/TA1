<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/daftar-dokter', 'DataController@daftarDokter')->middleware('auth');
// Route::get('/tabel-dokter', 'DataController@tabelDokter')->middleware('auth');
// Route::get('/blog-dokter', 'DataController@blogDokter')->middleware('auth');

Route::resource('/pasiens', 'PasienController');
Route::get('/', 'DataController@index')->name('halaman_utama')->middleware('auth');
Route::resource('/dokters', 'DokterController')->middleware('auth');
Route::get('/dokters/{dokter}', 'DokterController@show')->name('dokterss.show')->middleware('auth')->middleware('can:view,dokter');

Route::get('/admin','AdminController@index')->name('admin.index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
