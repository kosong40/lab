@if($session =="")
<script>
	alert("Anda Belum Login");
	window.location.href = "/admin";
</script>
@else
@foreach($user as $user)
@extends('layout.baru')
@section('konten')

        {{-- <meta http-equiv="refresh" content="5"> --}}
<center><h1>Pengaturan</h1></center>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@elseif (session('hapus'))
		<div class="alert alert-danger">
			{{session('hapus')}}
		</div>
    @elseif (session('sukses'))
    <div class="alert alert-success">
      {{session('sukses')}}
    </div>
@endif
<div style="margin-bottom: 1cm;">
    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#user">Pengguna</a></li>
        <li><a data-toggle="pill" href="#prak">Praktikum</a></li>
        <li><a data-toggle="pill" href="#admin">Admin</a></li>
    </ul>
</div>
    {{-- <div class="container"> --}}
<div class="tab-content">
    <div class="tab-pane fade" id="admin">
        <div class="row">
            <div class="col-sm-7">
              <h3 align="center">Daftar Admin</h3>
                <table class="table table-hover" id="Tadmin">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>User</th>
                    <th>Password</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($admin as $admin)
                    <tr>
                      <td>{{$admin->nama}}</td>
                      <td>{{$admin->user}}</td>
                      <td>
												<a href="#{{$admin->id}}" class="label label-warning" data-toggle="modal">Ubah</a>
												<a href="#hapus{{$admin->id}}" class="label label-danger" data-toggle="modal">hapus</a>
											</td>
                      <div class="modal fade" role="dialog" id="{{$admin->id}}">
                         <div class="modal-dialog">
                           <div class="modal-content">
                             <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              {{$admin->nama}}
                             </div>
                             <div class="modal-body">
                               <form method="POST" action="/admin/pengaturan/password/{{$admin->id}}">
                                  <label>Nama</label>
                                  <input style="margin-bottom: 0.2cm" class="form-control" type="text" name="nama" placeholder=" " value="{{$admin->nama}}" required >
                                  <label>Username</label>
                                  <input style="margin-bottom: 0.2cm" class="form-control" type="text" name="user" placeholder=" " value="{{$admin->user}}" required>
                                  <label>Password</label>
                                  <input style="margin-bottom: 0.2cm" class="form-control" type="password" name="password" placeholder="Password Baru" value="" required minlength="8">
                                  <input style="margin-top: 0.5cm" type="submit" name="" class="form-control btn btn-info" value="Simpan">
                                  {{csrf_field()}}
                                  <input name="_method" type="hidden" value="PUT">
                               </form>
                             </div>
                           </div>
                         </div>
                       </div>
											 <div class="modal fade" role="dialog" id="hapus{{$admin->id}}">
											 	<div class="modal-dialog">
											 		<div class="modal-content">
											 			<div class="modal-header">
											 				<button type="button" class="close" data-dismiss="modal">&times;</button>
															<label>Hapus admin&nbsp;{{$admin->nama}}</label>
											 			</div>
														<div class="modal-footer">
															<a href="/admin/hapus/{{$admin->id}}" class="btn btn-danger">Hapus</a>
															<a data-dismiss="modal" class="btn btn-warning">Batal</a>
														</div>
											 		</div>
											 	</div>
											 </div>
                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <th>Nama</th>
                    <th>User</th>
                    <th>Password</th>
                  </tfoot>
                </table>
            </div>
            <div class="col-sm-offset-1 col-sm-3">
              <h3 align="center">Tambah Admin</h3>
              <form method="POST" action="/admin/tambah">
                  <label>Nama</label>
                  <input style="margin-bottom: 0.2cm" class="form-control" type="text" name="nama" placeholder=" " required >
                  <label>Username</label>
                  <input style="margin-bottom: 0.2cm" class="form-control" type="text" name="user" placeholder=" " required>
                  <label>Password</label>
                  <input style="margin-bottom: 0.2cm" class="form-control" type="password" name="password" placeholder="Password Baru" value="" required minlength="8">
                  <input style="margin-top: 0.5cm" type="submit" name="" class="form-control btn btn-info" value="Tambah">
                  {{csrf_field()}}
                  <input name="_method" type="hidden" value="PUT">
               </form>
            </div>
        </div>
    </div>
        <div class="tab-pane fade" id="prak">
            <div class="row">
                @foreach ($praktikum as $prak)
               <div class="col-sm-4">
                   <div class="thumbnail">
                       <div><h6 align="center">{{$prak->nama}}</h6><hr></div>
                       <div>
                           <center><img src="{{$prak->gambar}}" style="width: 200px;height: 200px" class="img-circle"></center>
                       </div>
                       <div>
                        <hr>
                           <center>
                                <a class="label label-info" style="font-size: 11px" href="#prak{{$prak->id}}" data-toggle="modal">Lihat</a>
                                <div class="modal fade" id="prak{{$prak->id}}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{!!$prak->nama!!}</h5>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{$prak->gambar}}" width="300px">
                                                <div style="margin-top: 0.7cm;">
                                                    {!!$prak->keterangan!!}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="label label-warning" style="font-size: 11px" href="/admin/pengaturan/praktikum/{{$prak->id}}">Ubah</a>
                           </center>
                       </div>
                   </div>
               </div>
                @endforeach
            </div>
        </div>
        <div id="user" class="tab-pane fade in active">
           <div class="row">
               <div class="col-sm-offset-1 col-sm-10">
            <div class="row" style="margin-bottom: 1cm;">
              <form action="/admin/pengguna/upload" method="POST" enctype="multipart/form-data">
                <div class="col-sm-4"><input type="file" name="csv" class="form-control" style="" required=""></div>
                <div class="col-sm-2"><input type="submit" name="submit" class="form-control btn btn-info" value="Import CSV" ></div>
                <input name="_method" type="hidden" value="PUT">
                {{csrf_field()}}
              </form> 
            </div>
                   <table class="table table-hover" id="mahasiswa">
                        <thead>
                       <tr>
                           <th style="width: 30%;">NIM</th>
                           <th style="width: 55%;">NAMA</th>
                           <th style="width: 15%;">UBAH</th>
                       </tr>
                        </thead>
                              <tbody id="tabel">
                       @foreach ($pinjam as $mahasiswa)
                          <tr>
                                <td>{{$mahasiswa->username}}</td>
                                <td>{{$mahasiswa->nama}}</td>
                                <td><a href="#{{$mahasiswa->username}}" class="label label-danger" data-toggle="modal">Ubah Password</a></td>
                             <div class="modal fade" role="dialog" id="{{$mahasiswa->username}}">
                               <div class="modal-dialog">
                                 <div class="modal-content">
                                   <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                     {{$mahasiswa->nama .' ( '.$mahasiswa->username .' )'}}
                                   </div>
                                   <div class="modal-body">
                                     <form method="POST" action="/admin/user/password/{{$mahasiswa->username}}">
                                        <input class="form-control" type="password" name="password" placeholder="Password Baru" value="" required minlength="8">
                                        <input style="margin-top: 0.5cm" type="submit" name="" class="form-control btn btn-info" value="Simpan">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="PUT">
                                     </form>
                                   </div>
                                 </div>
                               </div>
                             </div>
                          </tr>
                       @endforeach
                     </tbody>
                    <tfoot>
                           <th style="width: 30%;">NIM</th>
                           <th style="width: 55%;">NAMA</th>
                           <th style="width: 15%;">UBAH</th>
                        </thead>
                   </tfoot>
                       {{$pinjam->links()}}
               </div>
           </div>
        </div>

{{-- </div> --}}

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="{{url('bs/bootstrap-imageupload.js')}}"></script>
<script>
            var $imageupload = $('.imageupload');
            $imageupload.imageupload();

            $('#imageupload-disable').on('click', function() {
                $imageupload.imageupload('disable');
                $(this).blur();
            })

            $('#imageupload-enable').on('click', function() {
                $imageupload.imageupload('enable');
                $(this).blur();
            })

            $('#imageupload-reset').on('click', function() {
                $imageupload.imageupload('reset');
                $(this).blur();
            });
        </script>
@endsection
@section('title','ini admin')
@section('admin')
{{$user->nama}}
@endsection
@endforeach
@endif
@section("css")
  <link rel="stylesheet" href="{{url("assets/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
@endsection
@section("script")
<script src="{{url("assets/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{url("assets/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script>
  $(document).ready( function () {
    $('#mahasiswa').DataTable();
} );
  $(document).ready(function(){
    $('#Tadmin').DataTable({

    });
  });
</script>
@endsection
