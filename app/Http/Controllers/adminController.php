<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;


class adminController extends Controller
{
    public function index(Request $request)
    {
        $user   = session('admin');
        $nama  = Admin::where('user',$user)->get();
    	return view('admin/utama',['user'=>$nama,'session'=>$user]);
    }
    public function login()
    {
    	return view('admin/login');
    }
    public function prologin(Request $request)
    {
    	$login	= array(
    		'user'		=> $request->input('username')  ,
    		'password'	=> $request->input('password')	);
    	$admin 	= Admin::where($login)->get();
    	// dd($admin);
    	if($admin->count()>0){
    		session(['admin'=>$request->input('username')]);
    		return redirect('/admin/home');
    	}else{
    		return "gagal login";
    	}

    }
    public function keluar()
    {
        $destroy = session()->forget('admin');
        // dd($destroy);
        if($destroy==''){
            // return view('admin/login',['alert'=>'<div class="alert alert-success"><center>Berhasil Keluar</center></div>']);
            // echo "string";
            return redirect('/admin');
        }else{
            // return view('admin/home');
            echo "gagal logout";
        }
    }
    public function daftarAlat(Request $request)
    {
        $user   = session('admin');
        $nama  = Admin::where('user',$user)->get();
        return view('admin/daftaralat',['user'=>$nama,'session'=>$user]);
    }
}
