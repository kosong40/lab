@if($session =="")
<script>
	alert("Anda Belum Login");
	window.location.href = "/home/login";
</script>
@else
@foreach($user as $user)
{{-- <title>{{$user->nama}}</title> --}}
@section('brand')
{{$user->kategori}}
@endsection
@endforeach
<title>Keranjang</title>
@extends('layout.coba')
@section('content')
<center><h1>Keranjang</h1>
	<p>"{{$user->nama}}"</p>
<h1></h1>
<form action="" method="POST" class="form-inline" role="form">
	<div class="form-group">
		Tanggal Pinjam : <input type="date" name="pinjam" id="inputPinjam" class="form-control" value="{{date('Y-m-d')}}" required="required">
		Tanggal Kembali : <input type="date" name="kembali" id="inputPinjam" class="form-control" value="{{date('Y-m-d',strtotime("tomorrow"))}}" required="required">
	</div>
</center>
<div class="row">
	<div class="table-responsive">
			<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col" width="400px">Nama Alat</th>
		      <th scope="col" width="90px">Jumlah</th>
		      <th scope="col" width="250px">Keterangan</th>
		      <th scope="col">Aksi</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope="row">1</th>
		      <td>{{$user->nama}}</td>
		      <td>{{$user->nama}}</td>
		      <td>{{$user->nama}}</td>
		      <td>
		      	<a href="" data-toggle="modal" data-target='#modal'><span class="glyphicon glyphicon-pencil text-warning" aria-hidden="true"></span></a>
		      	<a href="#" title=""><i class="glyphicon glyphicon-remove text-danger"></i></a>
		      </td>
		    </tr>
		  </tbody>
		</table>
	</div>
</div>
<div>
	<button type="button"class="btn btn-info">Pinjam</button>
</div>
</form>
<div class="modal fade" id="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

@endsection
@section('login')
{{$user->nama}}
@endsection
@endif

@section('head')
<a type="button" href="/user/alat" class="btn btn-info navbar-btn"><i class="glyphicon glyphicon-arrow-left"></i>&nbsp;Kembali</a>
@endsection

