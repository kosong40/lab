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
<title>{{$user->nama}}</title>
@extends('layout.coba')
@section('content')
<center>
	<div class="row">
		<div class="col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
			<h1>Profil</h1>
			<form action="#" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
			    	<center><label for="jumlah">Nama Lengkap</label></center>
			    	<input type="text" class="form-control" value="{{$user->nama}}" disabled>
			  	</div>
			  	<div class="form-group">
			    	<center><label for="jumlah">NIM</label></center>
			    	<input type="text" class="form-control" value="{{$user->user}}" disabled>
			  	</div>
			  	<div class="form-group">
			    	<center><label for="jumlah">Nomor Telepon</label></center>
			    	<input type="text" class="form-control" value="">
			  	</div>
			  	<div class="form-group">
			    	<center><label for="jumlah">Judul Tugas Akhir</label></center>
			    	<textarea class="form-control"></textarea>
			  	</div>
			  	<div class="form-group">
			    	<center><label for="jumlah">Dosen Pembimbing 1</label></center>
			    	<input type="text" class="form-control" value="">
			  	</div>
			  	<div class="form-group">
			    	<center><label for="jumlah">Dosen Pembimbing 2</label></center>
			    	<input type="text" class="form-control" value="">
			  	</div>
			  	<div>
			  		<button type="button" class="btn btn-info"><i class="glyphicon glyphicon-floppy-disk"></i>&nbsp;Simpan</button>
			  	</div>
			</form>	
		</div>
	</div>
</center>
@endsection
@section('login')
{{$user->nama}}
@endsection
@endif