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
@extends('layout.user')
@section('content')
<center>
	<div class="row">
		<div class="col-sm-offset-3 col-sm-6">
			<h1>Profil</h1>
			<form action="/user/alat/lanjutan/data" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
			    	<center><label for="jumlah">Nama Lengkap</label></center>
			    	<input type="text" class="form-control" value="{{$user->nama}}" disabled>
			  	</div>
			  	<div class="form-group">
			    	<center><label for="jumlah">NIM</label></center>
			    	<input type="text" class="form-control" value="{{$user->username}}" disabled>
			  	</div>
			  	<div class="form-group">
			    	<center><label for="jumlah">Nomor Telepon</label></center>
			    	<input type="text" class="form-control" value="{{$user->no_hp}}" name="no_hp">
			  	</div>
			  	<div class="form-group">
			    	<center><label for="jumlah">Alamat</label></center>
			    	<textarea class="form-control" name="alamat">{{$user->alamat}}</textarea>
			  	</div>
			  	<div class="form-group">
			    	<center><label for="jumlah">Tangal Pinjam</label></center>
			    	<input type="date" name="pinjam" class="form-control" required>
			  	</div>
			  	<div class="form-group">
			    	<center><label for="jumlah">Tangal Kembali</label></center>
			    	<input type="date" name="kembali" class="form-control" required>
			  	</div>
					<div class="form-group">
						<center><label for="jumlah">Kegunaan</label></center>
						<select class="form-control" name="guna" required>
							<option value=""></option>
							<option name="guna" value="Tugas Akhir">Tugas Akhir</option>
							<option name="guna" value="Praktikum">Praktikum</option>
							<option name="guna" value="Penelitian">Penelitian</option>
						</select>
					</div>
			  	<div>
			  		{{csrf_field()}}
					<input name="_method" type="hidden" value="PUT">
			  		<input type="submit" class="btn btn-info" value="Selesai">
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
@section('head')
<a type="button" href="/user/alat/keranjang" class="btn btn-info navbar-btn"><i class="glyphicon glyphicon-arrow-left"></i>&nbsp;Kembali</a>
@endsection
