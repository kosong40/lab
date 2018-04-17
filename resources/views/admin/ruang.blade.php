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
<center><h1>Postingan</h1>
	<p>"{{$user->nama}}"</p>
</center>
<center>
<form action="" method="POST" class="form-inline" role="form">
</center>
<div class="row">
	<div class="table-responsive thumbnail col-sm-offset-1 col-sm-10">
			<table class="table table-hover" id="posting">
		  <thead>
		    <tr>
		      <th scope="col" style="width:40%">Judul</th>
		      <th scope="col" style="width:30%">Waktu</th>
		      <th scope="col" style="width:30%">Aksi</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($posting as $post)
		  		<tr>
		  			<td>{{$post->judul}}</td>
		  			<td>{{$post->waktu}}</td>
		  			<td>
		  				<label class="label label-danger"><a data-target="#hapus{{$post->id}}" data-toggle="modal">Hapus</a></label>
		  				<div class="modal fade" id="hapus{{$post->id}}" role="dialog">
						    <div class="modal-dialog modal-sm">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Hapus</h4>
						        </div>
						        <div class="modal-body">
						          <p style="color: black;">{{$post->judul}}</p>
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Batal</button>
						          <a href="/admin/posting/hapus/{{$post->id}}" class="btn btn-danger btn-sm">Hapus</a>
						        </div>
						      </div>
						    </div>
						  </div>
						  {{-- Buat Edit --}}
		  				<label class="label label-warning"><a data-target="#edit{{$post->id}}" data-toggle="modal">Ubah</a></label>
		  				<div class="modal fade" id="edit{{$post->id}}" role="dialog">
						    <div class="modal-dialog modal-sm">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">{{$post->judul}}</h4>
						        </div>
						        <div class="modal-body">
						         	<label>Apakah mau di ubah</label>
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Batal</button>
						          <a href="/admin/posting/edit/{{$post->id}}"class="btn btn-danger btn-sm">Ubah</a>
						        </div>
						      </div>
						    </div>
						  </div>
						  {{-- Buat Detail --}}
		  				<label class="label label-primary"><a href="#detail{{$post->id}}" data-toggle="modal">Lihat</a></label>
		  				<div class="modal fade" id="detail{{$post->id}}" role="dialog">
						    <div class="modal-dialog modal-lg">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">{{$post->judul}}</h4>
						        </div>
						        <div class="modal-body">
						          {!!$post->posting!!}
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
						        </div>
						      </div>
						    </div>
						  </div>
		  			</td>
		  		</tr>
		  	@endforeach
		  </tbody>
		  <tfoot>
		  	<tr>
		      <th scope="col" style="width:40%">Judul</th>
		      <th scope="col" style="width:30%">Waktu</th>
		      <th scope="col" style="width:30%">Aksi</th>
		    </tr>
		  </tfoot>
		</table>
	</div>
</div>
</form>
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
    $('#posting').DataTable({
    	
    });
} );
</script>
@endsection