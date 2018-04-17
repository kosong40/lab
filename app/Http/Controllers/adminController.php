<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Admin;
use App\Peminjam;
use App\Alat;
use App\pinjamAlat;
use App\view;
use App\meja;
use App\viewRuang;
use App\Ruang;
use App\Posting;
use App\praktikum;

class adminController extends Controller
{
    public function index(Request $request)
    {
        $user           = session('admin');
        if ($user == '') {
          return redirect('/admin')->with('belum','Belum Login');
        }
        $nama           = Admin::where('user',$user)->get();
        $peminjam       = Peminjam::where('status','online')->get();
        $online         = count(Peminjam::where('status','online')->get());
        $totaluser      = count(view::groupBy('id')->get());
        $alat           = Alat::all();
        $totalalat      = count($alat);
        $meja           = count(meja::where('status','belum')->get());
        $pinjam         = count(view::groupBy(['id','tgl_pinjam'])->get());
        $post           = count(Posting::get());
        $prak           = praktikum::get();
        // dd($pinjam);
      	return view('admin/utama',
      [
        'user'=>$nama,
        'session'=>$user,
        'peminjam'=>$peminjam,
        'alat'=>$totalalat,
        'mhs'=>$totaluser,
        'meja'=>$meja,
        'online'=>$online,
        'pinjam' => $pinjam,
        'posting'=>$post,
        'prak'=>$prak
      ]
    );
    }
    public function login()
    {

    	return view('admin/login');
    }
    public function prologin(Request $request)
    {

    	$login	= array(
    		'user'		=> $request->input('username')  ,
    		'password'	=> md5(md5($request->input('password')))
      );
    	$admin 	= Admin::where($login)->get();
    	// dd($admin);
    	if($admin->count()>0){
    		session(['admin'=>$request->input('username')]);
    		return redirect('/admin/home');
    	}else{
    		return redirect('/admin/login')->with('login', 'Username atau Password Salah');
    	}

    }
    public function keluar()
    {
        $destroy = session()->forget('admin');
        // dd($destroy);
        if($destroy==''){
            // return view('admin/login',['alert'=>'<div class="alert alert-success"><center>Berhasil Keluar</center></div>']);
            // echo "string";♠
            return redirect('/admin/login')->with('keluar', 'Berhasil Keluar');
        }else{
            // return view('admin/home');
            echo "gagal logout";
        }
    }
    public function daftarAlat(Request $request)
    {
       $user           = session('admin');
        if ($user == '') {
          return redirect('/admin')->with('belum','Belum Login');
        }
      $nama  = Admin::where('user',$user)->get();
      $alat  = Alat::get();
      // dd("bisa");
      return view('admin/daftaralat',['user'=>$nama,'session'=>$user,'alat'=>$alat]);
          }
    public function daftarUser(Request $request)
    {
         $user           = session('admin');
        if ($user == '') {
          return redirect('/admin')->with('belum','Belum Login');
        }
        $nama           = Admin::where('user',$user)->get();
        $pengguna       = Peminjam::first();
        $id_pengguna    = $pengguna->id;
        $peminjam       = pinjamAlat::where('id_peminjam',$id_pengguna)->get();
        $user           = view::groupBy(['nama','tgl_pinjam','status','tgl_kembali'])->orderBy('status','asc')->get();
        $ruang          = viewRuang::get();
        $alat           = view::get();
        $meja           = meja::get();
        return view('admin/daftarUser',
        [
        'user'          =>$nama,
        'session'       =>$user,
        'peminjam'      =>$peminjam,
        'peminjam_asli' =>$user,
        'ruang'         =>$ruang,
        'alat'          =>$alat,
        'meja'          =>$meja
        ]);
    }
    public function setting(Request $request)
    {
         $user           = session('admin');
        if ($user == '') {
          return redirect('/admin')->with('belum','Belum Login');
        }
        $admin  = Admin::get();
        $ruang  = Ruang::get();
        $prak   = praktikum::get();
        $peminjam = peminjam::orderBy('username','asc')->paginate(2000);
        $nama  = Admin::where('user',$user)->get();
        return view('admin/setting',[
          'admin'     =>$admin,
          'user'      =>$nama,
          'session'   =>$user,
          'praktikum' =>$prak,
          'pinjam'    =>$peminjam,
          'prak'      =>$ruang
        ]);
    }
    public function praktikum(Request $request,$id)
    {
         $user           = session('admin');
        if ($user == '') {
          return redirect('/admin')->with('belum','Belum Login');
        }
        $prak   = praktikum::find($id);
        $nama  = Admin::where('user',$user)->get();
        return view('admin/prak',[
          'user'=>$nama,
          'session'=>$user,
          'prak' =>$prak
        ]);
    }
    public function prakedit(Request $request,$id)
    {
      $user     = session('admin');
      $prak     = praktikum::find($id);
      $prak->keterangan = $request->input('posting');
      $prak->save();
      return redirect('/admin/pengaturan');

    }
    public function posting(Request $request)
    {
         $user           = session('admin');
        if ($user == '') {
          return redirect('/admin')->with('belum','Belum Login');
        }
        $nama  = Admin::where('user',$user)->get();
        $pinjam = Peminjam::all();
        $ruang    = viewRuang::get();
        $posting  = Posting::get();
        return view('admin/ruang',[
          'user'      =>$nama,
          'session'   =>$user,
          'peminjam'  =>$pinjam,
          'ruang'     =>$ruang,
          'posting'   =>$posting
     ]);
    }
    public function hapusPost(Request $request,$id)
    {
      // dd($id);
      $hapus      = Posting::find($id);
      $hapus->delete();
      return redirect('/admin/posting/daftar');
    }
    public function editPost(Request $request,$id)
    {
       $user           = session('admin');
        if ($user == '') {
          return redirect('/admin')->with('belum','Belum Login');
        }
      $nama  = Admin::where('user',$user)->get();
      $post      = Posting::find($id);
      return view('admin/EditPost',[
          'user'      =>$nama,
          'session'   =>$user,
          'posting'   =>$post
     ]);
    }
    public function editPosting(Request $request,$id)
    {
      // dd($id);
      $edit      = Posting::find($id);
      $edit->judul    = $request->input('judul');
      $edit->posting  = $request->input('posting');
      $edit->save();
      return redirect('/admin/posting/daftar');
    }
    public function editAlat(Request $request,$id)
    {
      // dd(Input::file('file'));
      if (Input::file('file')=='') {
        $alat      = Alat::find($id)->update([
            'nama'        => $request->input('nama_alat'),
            'stok'        => $request->input('jumlah'),
            'keterangan'  => $request->input('ket')

        ]);
          
          return redirect('/admin/alat');
      }else{
      $file = Input::file('file');
      // dd($file);
      $lokasi = url('img').'/'.$file->getClientOriginalName();
      // dd($lokasi);
        $alat      = Alat::find($id)->update([
            'nama'        => $request->input('nama_alat'),
            'stok'        => $request->input('jumlah'),
            'keterangan'  => $request->input('ket'),
            'gambar'      => $lokasi

        ]);
          $file->move('img',$file->getClientOriginalName());
          return redirect('/admin/alat');
        }
    }
    public function tambahAlat(Request $request)
    {
      $file = Input::file('file');
      if($file == null){
        $lokasi = "";
      }else{
      $lokasi = url('img').'/'.$file->getClientOriginalName();
      // dd($lokasi);
    }
      $alat = new Alat();
      $alat->nama   = $request->input('nama_alat');
      $alat->stok   = $request->input('jumlah');
      $alat->keterangan = $request->input('ket');
      $alat->gambar  = $lokasi;
      $simpan = $alat->save();
      if($simpan){
        if($file != null){
          $file->move('img', $file->getClientOriginalName());
          return redirect('/admin/alat');
        }else{
        return redirect('/admin/alat');
      }
      }else{
        echo "gagal";
      }
    }
    public function hapusAlat(Request $request,$id)
    {
      // dd($id);
      $del = Alat::find($id);
      $hapus = $del->delete();
      return redirect('/admin/alat');
    }
    public function meja(Request $request)
    {
       $user           = session('admin');
        if ($user == '') {
          return redirect('/admin')->with('belum','Belum Login');
        }
      $nama       = Admin::where('user',$user)->get();
      $peminjam   = Peminjam::orderBy('status','desc')->get();
      $totaluser  = count(view::get());
      $alat       = Alat::all();
      $totalalat      = count($alat);
      $meja       = meja::get();
    return view('admin/meja',
    [
      'user'=>$nama,
      'session'=>$user,
      'peminjam'=>$peminjam,
      'alat'=>$totalalat,
      'mhs'=>$totaluser,
      'meja'=>$meja
    ]
  );
    }
    public function hapusMeja(Request $request,$id)
    {
      $meja           = meja::find($id);
      $meja->username = '';
      $meja->nama     = '';
      $meja->status   = 'belum';
      $simpan         = $meja->save();
      if ($simpan) {
        return redirect('/admin/user');
      }
    }
    public function editMeja(Request $request,$id)
    {
      $meja           = meja::find($id);
      $meja->status   = 'sudah';
      $simpan         = $meja->save();
      if ($simpan) {
        return redirect('/admin/user');
      }
    }
    public function accAlat(Request $request,$id,$tgl,$tgl2)
    {
      pinjamAlat::where('id_peminjam',$id)->where('tgl_kembali',$tgl2)->where('tgl_pinjam',$tgl)->where('status','proses')->update(['status'=>'setuju']);
      return redirect('/admin/user');
    }
    public function batalAlat(Request $request,$id,$tgl,$tgl2)
    {
      pinjamAlat::where('id_peminjam',$id)->where('tgl_kembali',$tgl2)->where('tgl_pinjam',$tgl)->where('status','proses')->update(['status'=>'Batal']);
      return redirect('/admin/user');
    }
    public function accRuang(Request $request,$id,$tgl,$guna)
    {

      // dd($id);
      Ruang::where('id_peminjam',$id)->where('kegunaan',$guna)->where('tgl_pinjam',$tgl)->where('status','<>','Dibatalkan')->update(['status'=>'setuju']);

      return redirect('/admin/user');
    }
    public function buatPost(Request $request)
    {
      $request->validate([
        'judul' => 'required'
      ]);
      $post     = new Posting();
      $post->judul    = $request->input('judul');
      $post->posting  = $request->input('posting');
      $simpan = $post->save();
      return redirect('/admin/home')->with('posting', 'Posting Berhasil di Buat');
    }
    public function prakJadwal(Request $request)
    {
      $cek  = Ruang::where('tgl_pinjam',$request->input('tgl'))->where('id_peminjam','<>','ADMIN')->get();
      // dd(count($cek));
      if (count($cek)>0) {
        Ruang::where('tgl_pinjam',$request->input('tgl'))->where('id_peminjam','<>','ADMIN')->update([
          'status'    => 'Dibatalkan'
        ]);
        $prak = array(
        'id_peminjam' => 'ADMIN',
        'kegunaan'    => $request->input('prak'),
        'tema'    => $request->input('modul')
      );
     $ruang = Ruang::where($prak)->update([
      'keterangan'    => $request->input('judul'),
      'tgl_pinjam'    => $request->input('tgl'),
      'status'        => 'aktif'
     ]);
     return redirect('/admin/praktikum/jadwal')->with('praktikum', 'Jadwal Berhasil di Atur');
      }
      $prak = array(
        'id_peminjam' => 'ADMIN',
        'kegunaan'    => $request->input('prak'),
        'tema'    => $request->input('modul')
      );
     $ruang = Ruang::where($prak)->update([
      'keterangan'    => $request->input('judul'),
      'tgl_pinjam'    => $request->input('tgl'),
      'status'        => 'aktif'
     ]);
     return redirect('/admin/praktikum/jadwal')->with('praktikum', 'Jadwal Berhasil di Atur');

    }
    public function jadwalPrak(Request $request)
    {
      $user           = session('admin');
        if ($user == '') {
          return redirect('/admin')->with('belum','Belum Login');
        }
      $nama         = Admin::where('user',$user)->get();
      $prak         = Ruang::where('id_peminjam','ADMIN')->get();
      $matkul       = praktikum::where('status','aktif')->get();
      $matkul2      = praktikum::get();
      return view('admin/jadwalPrak',[
        'session'   =>  $user,
        'user'      =>  $nama,
        'prak'      =>  $prak,
        'matkul'    =>  $matkul,
        'matkul2'   =>  $matkul2
      ]);
    }
    public function gantiPass(Request $request,$id)
    {
      Peminjam::where('username',$id)->update(['password'=>md5(md5($request->input('password')))]);

      return redirect('/admin/pengaturan')->with('status', 'Password Berhasil Diubah');
    }
    public function adminPass(Request $request,$id)
    {
      Admin::find($id)->update([
        'password'  => md5(md5($request->input('password'))),
        'user'      => $request->input('user'),
        'nama'      => $request->input('nama')

      ]);
      return redirect('/admin/pengaturan')->with('status', 'Profil Admin berhasil diubah');
    }
    public function tambahAdmin(Request $request)
    {
      Admin::create([
        'password'  => md5(md5($request->input('password'))),
        'user'      => $request->input('user'),
        'nama'      => $request->input('nama')

      ]);
      return redirect('/admin/pengaturan')->with('status', 'Berhasil menambah 1 admin baru');
    }
    public function jadwalAktif($nama)
    {
      praktikum::where('nama',$nama)->update([
        'status' => 'aktif'
      ]);
      Ruang::where('kegunaan',$nama)->update([
        'status'  => 'aktif'
      ]);
      return redirect('admin/praktikum/jadwal');
    }
    public function jadwalnAktif($nama)
    {
      praktikum::where('nama',$nama)->update([
        'status' => 'belum aktif'
      ]);
      Ruang::where('kegunaan',$nama)->update([
        'status'  => 'belum aktif'
      ]);
      return redirect('admin/praktikum/jadwal');
    }
    public function hapusAdmin($id)
    {
      Admin::destroy($id);
      return redirect('/admin/pengaturan')->with('hapus', 'Berhasil menghapus 1 admin');
    }
    public function uploadCSV()
    {
      if (Input::file('csv')=='') {
       dd("ini kosong");
      }else{
        if (($handle = fopen (Input::file('csv'),"r")) !== FALSE) {
        while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE )  {
          Peminjam::create([
            'nama'        => $data[0],
            'username'    => $data[1]
          ]);
            }
        fclose ( $handle );
        return redirect('/admin/pengaturan')->with('sukses', 'Berhasil mengimport data CSV');
          }
      }
        // return redirect('/admin/pengaturan')->with('sukses', 'Berhasil mengimport data CSV');
    
    }
}
