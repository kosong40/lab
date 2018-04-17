<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Peminjam;
use App\Ruang;
use App\Alat;
use App\viewRuang;
use App\Posting;
use App\praktikum;



class utamaController extends Controller
{
    public function index()
    {
    	return view('halaman_awal',[
            'post'  => Posting::orderBy('waktu','desc')->limit(5)->get(),
            'prak'  => praktikum::get()
        ]);
    }
    public function berita($id)
    {
        $lain       = Posting::where('id','<>',$id)->get();
        return view('berita',[
            'post'  => Posting::find($id),
            'lain'  => $lain
        ]);
    }
    public function login(Request $request)
    {
        $user   = session('user');
        $nama   = Peminjam::where('username',$user)->get();
        return view('login',['alert'=>'','session'=>$user]);
    }
    public function ya()
    {
    	return view('ya');
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
            'username'  =>  $request->input('username'),
            'password'  =>  md5(md5($request->input('password'))));
        $peminjam = Peminjam::where($login)->get();
        // dd(count($peminjam));
        if(count($peminjam) == 1){
            session(['user'=>$request->input('username')]);
            $cek = Peminjam::where($login)->update([
                'status' => 'online'
            ]);
            return redirect('/user');

        }else{
            return redirect('/home/login')->with('login', 'Username atau Password Salah');
        }
    }
    public function kegiatan()
    {
        // $pinjam     = Peminjam::first();
        $ruang  = Ruang::where('id_peminjam','ADMIN')->where('status','aktif')->get();
        $pinjam = viewRuang::get();
        return view('kegiatan',[
          'pinjam' =>$pinjam,
          'prak'      =>  $ruang
        ]);
    }
    public function alat()
    {
        $alat       = Alat::get();
        return view('alat',
        [
          'alat' => $alat
        ]
      );
    }
}
