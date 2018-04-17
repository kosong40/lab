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

// Route::get('/home','utamaController@index');
// get = methodnya
// /home = digunakan untuk link /home
// utamaController = file controller
// @index = fungsi yang terdapat di file utamaController

Route::get('/','utamaController@index');
Route::get('/home','utamaController@index');
Route::get('/home/login','utamaController@login');
Route::get('/home/kegiatan','utamaController@kegiatan');
Route::get('/home/alat','utamaController@alat');
Route::put('/home/login/proses','utamaController@proLogin');
Route::get('/home/peminjam','utamaController@ya');
Route::get('/home/ya/hapus/{id}','utamaController@hapus');
Route::get('/home/berita/{id}','utamaController@berita');

//Admin
Route::get('/admin', function() {
   return view('admin.404');
});
Route::get('/admin/login','adminController@login');
Route::get('/admin/home','adminController@index');
Route::put('/admin/proses','adminController@proLogin');
Route::get('/admin/logout','adminController@keluar');

Route::get('/admin/alat','adminController@daftarAlat');
Route::put('/admin/alat/tambah','adminController@tambahAlat');
Route::get('/admin/alat/hapus/{id}','adminController@hapusAlat');
Route::put('/admin/alat/{id}/edit','adminController@editAlat');

Route::get('/admin/user','adminController@daftarUser');
Route::get('/admin/user/hapus/{id}','adminController@hapusUser');
Route::get('/admin/user/edit/{id}','adminController@editUser');
Route::get('/admin/user/pinjam/{id}/{tgl}/{tgl2}/alat','adminController@accAlat');
Route::get('/admin/user/pinjam/{id}/{tgl}/{tgl2}/alat/batal','adminController@batalAlat');
Route::get('/admin/user/pinjam/{id}/{tgl}/{guna}/ruang','adminController@accRuang');
Route::put('/admin/user/password/{id}','adminController@gantiPass');

Route::put('/admin/pengguna/upload','adminController@uploadCSV');
Route::get('/admin/pengaturan','adminController@setting');
Route::get('/admin/pengaturan/praktikum/{id}','adminController@praktikum');
Route::put('/admin/pengaturan/praktikum/{id}/proses','adminController@prakedit');
Route::put('/admin/pengaturan/password/{id}','adminController@adminPass');
Route::put('/admin/tambah', 'adminController@tambahAdmin');
Route::get('/admin/hapus/{id}','adminController@hapusAdmin');

Route::put('/admin/praktikum/jadwal','adminController@prakJadwal');
Route::get('/admin/praktikum/jadwal','adminController@jadwalPrak');
Route::get('/admin/praktikum/aktif/{id}','adminController@jadwalAktif');
Route::get('/admin/praktikum/tidak/{id}','adminController@jadwalnAktif');

Route::put('/admin/posting','adminController@buatPost');
Route::get('/admin/posting/daftar','adminController@posting');
Route::get('/admin/posting/hapus/{id}','adminController@hapusPost');
Route::get('/admin/posting/edit/{id}','adminController@editPost');
Route::put('/admin/posting/edit/{id}/proses','adminController@editPosting');


Route::get('/admin/meja','adminController@meja');
Route::get('/admin/meja/{id}/hapus','adminController@hapusMeja');
Route::get('/admin/meja/{id}/edit','adminController@editMeja');

Route::get('/cetak',function(){
	return view('user/cetak');
});
Route::put('/upload', 'userController@cek');


Route::get('/user','userController@index');
Route::get('/user/logout','userController@logout');
Route::get('/user/ruangan','userController@ruang');
Route::get('/user/alat','userController@alat');
Route::get('/user/alat/kembali/{tgl_pinjam}/{tgl_kembali}','userController@alatKembali');
Route::get('/user/alat/terima/{id}/{tgl}/{tgl2}','userController@alatTerima');
Route::get('/user/alat/keranjang','userController@alatCart');
Route::get('/user/alat/keranjang/batal/{id}/alat','userController@batalSatu');
Route::put('/user/alat/keranjang/edit/{id}','userController@editSatu');
Route::get('/user/alat/lanjutan', 'userController@profil');
Route::put('/user/alat/lanjutan/data','userController@tambahData');

Route::get('/user/cetak/ruang/{tgl}/{guna}','userController@cetakRuang');
Route::put('/user/cetak/ruang/{tgl}/{guna}','userController@printRuang');
Route::put('/user/cetak/alat/{tgl_pinjam}/{tgl_kembali}','userController@cetakAlat');

Route::get('/user/pengaturan', 'userController@setting');
Route::put('/user/pengaturan/password/{id}','userController@gantiPass');
Route::put('/user/pengaturan/profil/{id}','userController@profilEdit');
Route::put('/user/alat/tambahCart/{id}','userController@addcart');
Route::get('/user/meja','userController@meja');
Route::get('/user/meja/{id}/add','userController@addMeja');
Route::put('/user/ruang/add','userController@addRuang');
Route::get('/user/cetak/alat/{id}','userController@cetakAlat');
