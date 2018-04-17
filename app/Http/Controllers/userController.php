<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Peminjam;
use App\Ruang;
use App\Alat;
use App\pinjamAlat;
use App\view;
use App\meja;
use App\viewRuang;
use App\Posting;
// use \Input as Input;

class userController extends Controller
{
     public function index(Request $request)
    {
    	$user 	  = session('user');
      if($user ==''){
        return redirect('/home/login')->with('belum','Anda belum melakukan login !');
      }else{
        $nama   = Peminjam::where('username',$user)->get();
      $nama1    = Peminjam::where('username',$user)->first();
      $pinjam   = view::groupBy('tgl_kembali','tgl_pinjam')->where('nim',$user)->get();
      $detail   = view::where('nim',$user)->get();
      $ruang    = viewRuang::where('username',$user)->get();
      return view('user/utama',[
        'detail'  => $detail,
        'user'    =>$nama,
        'pinjam'  =>$pinjam,
        'session' =>$user,
        'ruang'   =>$ruang
      ]);
      }

    }
    public function logout(Request $request)
    {

      $out = Peminjam::where('username',session('user'))->first();
      // dd($out);
      $out->status = "offline";
      $simpan = $out->save();
      if($simpan){
    	$destroy = session()->forget('user');
    	// dd(session('user'));
    	if($destroy==''){

    		return redirect('/home/login');
    	}else{
    		return view('user/utama');
      	}
      }
    }
     public function ruang(Request $request)
    {
        // $user = $request->sesion->get('user');
        $user   = session('user');
        if ($user == '') {
          return redirect('/home/login')->with('belum','Anda belum melakukan login !');
        }else{
        $ruang  = Ruang::where('id_peminjam','ADMIN')->where('status','aktif')->get();
        $nama   = Peminjam::where('username',$user)->get();
        $ruangan  = viewRuang::get();
        return view('user/ruang',[
          'user'      =>  $nama,
          'session'   =>  $user,
          'ruang'     =>  $ruangan,
          'prak'      =>  $ruang
        ]);
      }
    }
     public function alat(Request $request)
    {
        $user   = session('user');
        if ($user == '') {
          return redirect('/home/login')->with('belum','Anda belum melakukan login !');
        }else{
        $alat   = Alat::all();
        $nama   = Peminjam::where('username',$user)->get();
        return view('user/alat',['user'=>$nama,'session'=>$user,'alat'=>$alat]);
      }
    }
    public function alatCart(Request $request)
    {
        $user   = session('user');
        if($user ==''){
          return redirect ('/home/login')->with('belum','Anda belum melakukan login !');
        }else{
          $nama   = Peminjam::where('username',$user)->get();
        $peminjam = Peminjam::where('username',$user)->first();
        $id_peminjam = $peminjam->id;
        $alatpinjam = pinjamAlat::where('id_peminjam',$id_peminjam)->get();
        return view('user/keranjang',['user'=>$nama,'session'=>$user,'bukan'=>$alatpinjam]);
        }

    }
    public function profil(Request $request)
    {
        $user   = session('user');
        if($user ==''){
          return redirect ('/home/login')->with('belum','Anda belum melakukan login !');
        }else{
        $nama   = Peminjam::where('username',$user)->get();
        return view('user/profil',['user'=>$nama,'session'=>$user]);
      }
    }
    public function setting(Request $request)
    {
       $user   = session('user');
        if($user ==''){
          return redirect ('/home/login')->with('belum','Anda belum melakukan login !');
        }else{
        $nama   = Peminjam::where('username',$user)->get();
        return view('user/setting',['user'=>$nama,'session'=>$user]);
      }
    }
    public function addcart(Request $request,$id)
    {
      $user   = session('user');
        if($user ==''){
          return redirect ('/home/login')->with('belum','Anda belum melakukan login !');
        }else{
      $peminjam = Peminjam::where('username',$user)->first();
      $alat     = Alat::where('id',$id)->first();
      // dd($alat);
      $id_peminjam = $peminjam->id;
      $cek      = pinjamAlat::where('id_alat',$id)->where('id_peminjam',$id_peminjam)->where('status','belum')->first();
      // dd(count($cek));
        if(count($cek) < 1){
        $pinjamAlat = new pinjamAlat();
        $pinjamAlat->id_alat      = $id;
        $pinjamAlat->nama_alat    = $alat->nama;
        $pinjamAlat->id_peminjam  = $id_peminjam;
        $pinjamAlat->jumlah       = $request->input('jumlah');
        $pinjamAlat->Keterangan   = $request->input('ket');
        $simpan = $pinjamAlat->save();
        if($simpan){
          $alat     = Alat::where('id',$id)->first();
          $alat->stok = $alat->stok;
          // dd($alat->stok);
          $alat->save();
          return redirect('/user/alat/keranjang');
        }else{
          echo "gagal";
        }
      }else{
        $up     = pinjamAlat::where('id_alat',$id)->first();
        $up->jumlah             =($cek->jumlah)+($request->input('jumlah'));
        $save = $up->save();
        if($save){
          $alat     = Alat::where('id',$id)->first();
          $alat->stok = ($alat->stok) - ($request->input('jumlah'));
          // dd($alat->stok);
          $alat->save();
          return redirect('/user/alat/keranjang');
        }else{
          echo "gagal";
        }
      }
    }
    }
    public function batalSatu(Request $request,$id)
    {
      $user   = session('user');
        if($user ==''){
          return redirect ('/home/login')->with('belum','Anda belum melakukan login !');
        }else{
      $peminjam = Peminjam::where('username',$user)->first();
      $pinjam  = pinjamAlat::where('id_alat',$id)->where('id_peminjam',$peminjam->id)->first();
      $alat    = Alat::where('id',$id)->first();
      $alat->stok = ($alat->stok);
      $simpan = $alat->save();
       if($simpan){
         $hapus = $pinjam->delete();
         if($hapus){
           return redirect('user/alat/keranjang');
         }else{
           echo "gagal hapus";
         }
       }else{
         echo "gagal update";
       }
      }

    }
    public function editSatu(Request $request,$id)
    {
      $alat = pinjamAlat::where('id_alat',$id)->first();

      dd($cek);
    }
    public function meja(Request $request)
   {
      $user   = session('user');
        if($user ==''){
          return redirect ('/home/login')->with('belum','Anda belum melakukan login !');
        }else{
       $meja    = meja::get();
       $alat    = Alat::all();
       $nama    = Peminjam::where('username',$user)->get();
       return view('user/meja',
       [
         'user'=>$nama,
         'session'=>$user,
         'alat'=>$alat,
         'meja'=>$meja
       ]);
     }
   }
   public function addMeja(Request $request,$id)
   {
     $user   = session('user');
        if($user ==''){
          return redirect ('/home/login')->with('belum','Anda belum melakukan login !');
        }else{
     $nama    = Peminjam::where('username',$user)->first();
     // $cek     = meja::where('username',$nama->username)->where('status','sudah')->get();
     $cek     = meja::where('username',$nama->username)->get();
     if(count($cek) == 0){
     $meja    = meja::find($id);
     $meja->username  = $nama->username;
     $meja->nama      = $nama->nama;
     $meja->status    = 'proses';
     $simpan          = $meja->save();
     // dd($meja);
     if($simpan){
       return redirect('/user/meja');
     }
   }else{
     return redirect('/user/meja');
   }
   }
   }
   public function tambahData(Request $request)
   {
      $user   = session('user');
        if($user ==''){
          return redirect ('/home/login')->with('belum','Anda belum melakukan login !');
        }else{
      $nama       = Peminjam::where('username',$user)->first();
      $peminjam = pinjamAlat::where('id_peminjam',$nama->id)->where('status','belum')->update([
        'kegunaan'        =>  $request->input('guna'),
        'tgl_pinjam'      =>  $request->input('pinjam'),
        'tgl_kembali'     =>  $request->input('kembali'),
        'status'          =>  'proses'
      ]);
      $pengguna = Peminjam::where('username',$user)->update([
        'no_hp'         => $request->input('no_hp'),
        'alamat'        => $request->input('alamat')
      ]);
      return redirect('/user');
   }
 }
   public function addRuang(Request $request)
   {
      $user   = session('user');
        if($user ==''){
          return redirect ('/home/login')->with('belum','Anda belum melakukan login !');
        }else{
      $cek  = array(
        'id_peminjam' => 'ADMIN',
        'tgl_pinjam'  => $request->input('tgl'),
        'status'      => 'aktif'
      );
      $coba  = ruang::where($cek)->get();
      if(count($coba) == 1){
        return redirect('/user/ruangan')->with('gagal', 'Ruangan digunakan Praktikum !');
      }
      else{
      $ruang = ruang::where('id_peminjam',$user)->where('status','<>','setuju')->get();
      if(count($ruang)==0){
        $ruang = new Ruang;
        $ruang->id_peminjam = session('user');
        $ruang->kegunaan    = $request->input('guna');
        $ruang->tgl_pinjam  = $request->input('tgl');
        $ruang->Keterangan  = $request->input('ket');
        $ruang->status      = 'proses';
        $ruang->save();
        Peminjam::where('username',$user)->update([
        'no_hp'         => $request->input('no_hp'),
        'alamat'        => $request->input('alamat')
      ]);
     return redirect('/user/ruangan')->with('status', 'Ruangan sedang diproses !');
      }
    else{
      ruang::where('id_peminjam',$user)->update([
        'kegunaan'    => $request->input('guna'),
        'Keterangan'    => $request->input('ket'),
        'tgl_pinjam'    => $request->input('tgl'),
        'status'        => 'proses'
      ]);
      Peminjam::where('username',$user)->update([
        'no_hp'         => $request->input('no_hp'),
        'alamat'        => $request->input('alamat')
      ]);
      return redirect('/user/ruangan')->with('status', 'Ruangan sedang diproses !');
    }
    }
     }
   }
    public function alatKembali(Request $request,$tgl_pinjam,$tgl_kembali)
    {
        $user   = session('user');
        if($user ==''){
          return redirect ('/home/login')->with('belum','Anda belum melakukan login !');
        }else{
        $nama   = Peminjam::where('username',$user)->first();
        $peminjam = pinjamAlat::where('id_peminjam',$nama->id)->where('status','setuju')->where('tgl_pinjam',$tgl_pinjam)->where('tgl_kembali',$tgl_kembali)->update([
          'status' => 'Proses Kembali'
        ]);
       return redirect('/user');
        }
    }
    public function alatTerima(Request $request,$id,$tgl,$tgl2)
    {
        $peminjam = pinjamAlat::where('id_peminjam',$id)->where('tgl_kembali',$tgl2)->where('tgl_pinjam',$tgl)->where('status','Proses Kembali')->update([
          'status' => 'Terima'
        ]);
       return redirect('/admin/user');

    }
    public function gantiPass(Request $request,$id)
    {

      Peminjam::where('username',$id)->update(['password'=>md5(md5($request->input('password')))]);

      return redirect('/user/pengaturan')->with('password', 'Password Berhasil Diubah');

    }
    public function profilEdit(Request $request,$id)
    {
      Peminjam::where('username',$id)->update([
        'no_hp'   =>  $request->input('no_hp'),
        'alamat'  =>  $request->input('alamat')
      ]);

      return redirect('/user/pengaturan')->with('profil', 'Profil Berhasil Diubah');
  }
  public function cetakRuang($tgl,$guna)
  {
    $user   = session('user');
    $kondisi = array(
      'tgl_pinjam'  => $tgl,
      'status'      => 'proses',
      'kegunaan'    => $guna
    );
    $cetak  = viewRuang::where($kondisi)->get();
    return view('/user/cetakRuang',[
      'profil' => $cetak 
    ]);
  }
  public function printRuang(Request $request,$tgl,$guna)
  {
    // dd($request->all());
    $user     = session('user');
    $profil = array(
      'username'    => $user,
      'tgl_pinjam'  => $tgl,
      'kegunaan'    => $guna,
      'status'      => 'proses'
    );
    $foto     = Input::file('foto');
    $ktm      = Input::file('ktm');
    $lokasi   = url('img').'/'.$foto->getClientOriginalName();
    $lokasi2  = url('img').'/'.$ktm->getClientOriginalName();
    // dd($lokasi);
    $foto->move('img',$foto->getClientOriginalName());
    $ktm->move('img',$ktm->getClientOriginalName());
    $peminjam = Peminjam::where('username',$user)->update([
      'foto'  => $lokasi,
      'ktm'   => $lokasi2
    ]);
    $coba = viewRuang::where($profil)->get();
    // dd($coba);
    // dd(Peminjam::where('username',$user)->get());
    return view('/user/suratRuang',[
      'peminjam'  => $coba,
      'dosen1'    => $request->input('dos1'),
      'dosen2'    => $request->input('dos2'),
      'judul'     => $request->input('judul')

    ]);
    
  }
  public function cetakAlat(Request $request,$tgl_pinjam,$tgl_kembali)
  {
    // dd($request->all());
    $user   = session('user');
    $detail = array(
      'tgl_kembali' => $tgl_kembali,
      'tgl_pinjam'  => $tgl_pinjam,
      'status'      => 'proses',
      'nim'         => $user
    );
    $pertama  = view::where($detail)->get();
    $kedua    = view::groupBy('tgl_pinjam','tgl_kembali')->where('nim',$user)->where('status','proses')->get();
    return view('/user/suratAlat',[
      'satu'      => $pertama,
      'dua'       => $kedua,
      'judul'     => $request->input('judul'),
      'dosen1'    => $request->input('dosen1'),
      'dosen2'    => $request->input('dosen2')

    ]);
  }
     public function cek(Request $request)
    {
      $request->validate([
        'csv'  => 'mimes:csv'
      ]);

      if (Input::file('csv')=='') {
       dd("ini kosong");
      }else{
        if (($handle = fopen (Input::file('csv'),"r")) !== FALSE) {
        while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE )  {
          Posting::create([
            'judul'   => $data[0],
            'posting' => $data[1]

          ]);
            }
        fclose ( $handle );
          }
      }
    }
}
