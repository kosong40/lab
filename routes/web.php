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
Route::get('/','utamaController@index');
Route::get('/home','utamaController@index');
Route::get('/home/login','utamaController@login');
Route::get('/home/kegiatan','utamaController@kegiatan');
Route::get('/home/alat','utamaController@alat');
Route::put('/home/login/proses','utamaController@proLogin');
Route::get('/home/peminjam','utamaController@ya');
Route::get('/home/ya/hapus/{id}','utamaController@hapus');

//Admin
Route::get('/admin','adminController@login');
Route::get('/admin/home','adminController@index');
Route::put('/admin/proses','adminController@proLogin');
Route::get('/admin/logout','adminController@keluar');
Route::get('/admin/alat','adminController@daftarAlat');


//User
Route::get('/user','userController@index');
Route::get('/user/logout','userController@logout');
Route::get('/user/ruang','userController@ruang');
Route::get('/user/alat','userController@alat');
Route::get('/user/alat/keranjang','userController@alatCart');
Route::get('/user/profil', 'userController@profil');
Route::get('/user/pengaturan', 'userController@setting');