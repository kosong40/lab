@if($session =="")
<script>
	alert("Anda Belum Login");
	window.location.href = "/admin";
</script>
@else
@extends('layout.baru')
@foreach ($user as $user)
		@section('konten')

        <meta>
			<center><h1>Daftar Alat Laboratorium</h1>
					<p>"{{$user->nama}}"</p>
			</center>
			<p>
				<a href="" data-toggle="modal" data-target='#add' class="btn btn-info"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah Alat</a>
			</p>
	<center>
	<form action="" method="POST" class="form-inline" style="margin-top:1cm;">
	</center>
	<div class="row">
		<div class="table-responsive thumbnail">
				<table class="table table-bordered table-hovered" id="alat">
			  <thead>
			    <tr class="header">
			      <th style="width: 2%">No</th>
			      <th style="width:25%">Gambar</th>
			      <th style="width:20%">Nama alat</th>
			      <th style="width:5%">Stok Alat</th>
			      <th style="width:10%">Satuan</th>
				  <th style="width:20%">Keterangan</th>
			      <th style="width:10%">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<style>
			  		#alat:hover{
			  			opacity: 0.5;
			  		}
			  	</style>
			  	@php $i =1;@endphp
						@foreach ($alat->where('id','<>',1) as $alat)

			    <tr>
			    		<td>{{$i++}}</td>
						<td><a href="" id="alat"><img class="img-thumbnail" src="{{$alat->gambar}}"></a></td>
						<td><div id="nama"><label>{{$alat->nama}}</label></div></td>
						<td>	

							@if($alat->stok > 0 )
							<div><label>{{$alat->stok}}</label></div>
							@else
							<div><label>Alat Habis</label><div>

							@endif

						</td>
						<td><div><label>{{$alat->satuan}}</label></div></td>
						<td>
							<div><p align="justify" style="color:black;font-size:13px;">{{$alat->keterangan}}</p></div>
						</td>
						<td>
							<a href="#edit{{$alat->id}}" data-toggle="modal"><span class="label label-success">Ubah</span></a>
							<a href="" data-toggle="modal" data-target='#hapus{{$alat->id}}'><i class="label label-danger">Hapus</i></a>
			      </td>
			    </tr>
				</div>
				<div class="modal fade" id="edit{{$alat->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Edit Alat {{$alat->nama}}</h4>
							</div>
							<div class="modal-body">
							<form action="/admin/alat/{{$alat->id}}/edit" method="POST" enctype="multipart/form-data">
									<label>Nama Alat</label>
									<input type="text" class="form-control" name="nama_alat" value="{{$alat->nama}}">
									<label>Jumlah Alat</label>
									<input type="number" class="form-control" name="jumlah" value="{{$alat->stok}}">
									<label>Keterangan Alat</label>
									<textarea class="form-control" name="ket">{{$alat->keterangan}}</textarea>
									@if ($alat->gambar =='')
									<div class="imageupload panel panel-default">
						              <label>Gambar Alat</label>
						                <div class="file-tab panel-body">
						                    <label class="btn btn-default btn-file">
						                        <span>Browser</span>
						                        <input type="file" name="file" id="image-file">
						                    </label>
						                    <button type="button" class="btn btn-default">Remove</button>
						                </div>
						            </div>
									@endif
								<input style="margin-top: 1cm;" type="submit" name="submit" class="form-control btn btn-info" value="Simpan">
								<input name="_method" type="hidden" value="PUT">
								{{csrf_field()}}
							</form>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="hapus{{$alat->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Hapus Data</h4>
							</div>
							<div class="modal-body">
								<h6>Apa benar Anda akan menghapus alat {{$alat->nama}} </h6>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
								<a href="/admin/alat/hapus/{{$alat->id}}" type="button" class="btn btn-danger">Hapus</a>
							</div>
						</div>
					</div>
				</div>
			@endforeach
			  </tbody>
			  <tfoot>
			    <tr class="header">
			    <th style="width: 2%;">No</th>
			      <th style="width:25%">Gambar</th>
			      <th style="width:20%">Nama alat</th>
			      <th style="width:5%">Stok Alat</th>
			      <th style="width:10%">Satuan</th>
				  <th style="width:20%">Keterangan</th>
			      <th style="width:10%">Aksi</th>
			    </tr>
			  </tfoot>
			</table>
		</div>
	</div>
	</form>
	<div class="modal fade" id="add">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tambah Alat</h4>
				</div>
				<form action="/admin/alat/tambah" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Alat</label>
						<input type="text" class="form-control" name="nama_alat" placeholder="Nama Alat">
					</div>
					<div class="form-group">
						<label>Jumlah Alat</label>
						<input type="number" class="form-control" name="jumlah">
					</div>
					<div>
						<label>Keterangan Alat</label>
						<textarea class="form-control" name="ket"></textarea>
					</div>

		            <div class="imageupload panel panel-default">
		              <label>Gambar Alat</label>
		                <div class="file-tab panel-body">
		                    <label class="btn btn-default btn-file">
		                        <span>Browser</span>
		                        <input type="file" name="file" id="image-file">
		                    </label>
		                    <button type="button" class="btn btn-default">Remove</button>
		                </div>
		            </div>

		        </div>
				<div class="modal-footer">
					{{-- <button type="button" class="btn btn-info"><i class="glyphicon glyphicon-floppy-disk"></i>&nbsp;Simpan</button> --}}
					<input type="submit" name="submit" value="Simpan">
					<input name="_method" type="hidden" value="PUT">
				</div>
				</form>
			</div>
		</div>
	</div>
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
		@section('admin'){{$user->nama}} @endsection
		@section('title','ini Admin')
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
    $('#alat').DataTable({
    	
    });
} );
</script>
@endsection
