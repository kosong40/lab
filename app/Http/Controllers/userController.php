<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjam;
use App\Ruang;

class userController extends Controller
{
     public function index(Request $request)
    {
    	// $user = $request->sesion->get('user');
    	$user 	= session('user');
    	$nama 	= Peminjam::where('user',$user)->get();
    	return view('user/utama',['user'=>$nama,'session'=>$user]);
    }
    public function logout()
    {
    	$destroy = session()->forget('user');
    	// dd(session('user'));
    	if($destroy==''){
    		return view('login',['alert'=>'<div class="alert alert-success"><center>Berhasil Keluar</center></div>']);
    	}else{
    		return view('user/utama');
    	}
    }
     public function ruang(Request $request)
    {
        // $user = $request->sesion->get('user');
        $user   = session('user');
        $nama   = Peminjam::where('user',$user)->get();
        return view('user/ruang',['user'=>$nama,'session'=>$user]);
    }
     public function alat(Request $request)
    {
        // $user = $request->sesion->get('user');
        $user   = session('user');
        $nama   = Peminjam::where('user',$user)->get();
        return view('user/alat',['user'=>$nama,'session'=>$user]);
    }
    public function alatCart(Request $request)
    {
        $user   = session('user');
        $nama   = Peminjam::where('user',$user)->get();
        return view('user/keranjang',['user'=>$nama,'session'=>$user]);
    }
    public function profil(Request $request)
    {
        $user   = session('user');
        $nama   = Peminjam::where('user',$user)->get();
        return view('user/profil',['user'=>$nama,'session'=>$user]);
    }
    public function setting(Request $request)
    {
        $user   = session('user');
        $nama   = Peminjam::where('user',$user)->get();
        return view('user/setting',['user'=>$nama,'session'=>$user]);
    }
}
