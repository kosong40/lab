<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Peminjam;
use App\Ruang;



class utamaController extends Controller
{
    public function index()
    {
    	// $coba = DB::select("SELECT * FROM peminjam");
        // dd(Ruang::all());
    	return view('halaman_awal');
    }
    public function login(Request $request)
    {
        $user   = session('user');
        $nama   = Peminjam::where('user',$user)->get();
    	return view('login',['alert'=>'','session'=>$user]);
    }
    public function ya()
    {
    	// $coba = DB::table('peminjam')->get();
        $peminjam = Peminjam::all();
       
    	return view('ya',['peminjam'=>$peminjam]);
    }
    public function proses_login(Request $request)
    {
        $nim    = $request->input('username');
        $pass   = $request->input('password');
        echo $nim;
    }
    public function hapus($id)
    {
        
    }
    public function proLogin(Request $request)
    {
        $login = array(
            'user' => $request->input('username'),
            'password'=>$request->input('password') );
        $peminjam = Peminjam::where($login)->get();
        if($peminjam->count()>0){
            session(['user'=>$request->input('username')]);
            return redirect('/user');
            // dd($peminjam);
        }else{
            // return redirect('home/login',['alert'=>'<div class="alert alert-info">Password salah</div>']);
            return view('login',['alert'=>'<div class="alert alert-danger"><center>Gagal Masuk</center></div>']);
        }
    }
    public function kegiatan()
    {
        return view('kegiatan');
    }
    public function alat()
    {
        return view('alat');
    }
}
