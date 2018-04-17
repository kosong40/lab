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
<style>
	#profil input{
		margin-bottom: 0.3cm;
	}
	#profil textarea{
		margin-bottom: 0.3cm;
	}
	#profil label{
		margin-bottom: 0.2cm;
		font-size: 12px;
		text-align: left;
	}
</style>
<center>
	<div class="row">
			<h1>Pengaturan</h1>
		<div class="col-sm-4">
			<legend>
				<h3 style="margin-bottom: 1cm;">Ganti Password</h3>
				<form action="/user/pengaturan/password/{{$user->username}}" method="POST" class="form-horizontal" role="form">
					<input style="margin-bottom: 0.3cm;" type="password" name="password" class="form-control" required minlength="8" placeholder="Password Baru">
					{{csrf_field()}}
                   	<input name="_method" type="hidden" value="PUT">
					<input type="submit" class="form-control btn btn-primary" value="Ganti">
				</form>	
			</legend>
			@if (session('password'))
			    <div class="alert alert-success">
			        {{ session('password') }}
			    </div>
			@endif
		</div>
		<div class="col-sm-4">
			<legend>
				<h3 style="margin-bottom: 0.4cm;">Profil</h3>
				<form id="profil" action="/user/pengaturan/profil/{{$user->username}}" method="POST">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" value="{{$user->nama}}" disabled>
					<label>NIM</label>
					<input type="text" name="nama" class="form-control" value="{{$session}}" disabled>
					<label>Nomor Telepon</label>
					{{-- <input type="text" name="no_hp" class="form-control" value="{{$user->no_hp}}"> --}}
					<input type="text" onkeypress='return event.charCode >= 43 && event.charCode <= 57' name="no_hp" class="form-control" value="{{$user->no_hp}}">
					<label>Alamat</label>
					<textarea class="form-control" name="alamat" required>{{$user->alamat}}</textarea>
					{{csrf_field()}}
                   	<input name="_method" type="hidden" value="PUT">
                   	<input type="submit" class="form-control btn btn-primary" value="Simpan">
				</form>
			</legend>
			@if (session('profil'))
			    <div class="alert alert-success">
			        {{ session('profil') }}
			    </div>
			@endif
		</div>
	</div>
</center>
@endsection
@section('login')
{{$user->nama}}
@endsection
@endif