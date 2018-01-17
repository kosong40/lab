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
<title>Alat Lab</title>
@extends('layout.coba')
@section('content')
<center><h1>Peralatan Lab</h1>
<form action="" method="POST" class="form-inline" role="form">
	<div class="form-group">
		<input type="text" class="form-control" id="" placeholder="Pencarian">
	</div>
	<button type="submit" class="btn btn-primary">Cari</button>
</form>
</center>
	<div class="row" style="padding-top: 1cm">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<div class="thumbnail">
				<img src="{{url('bs/img/4.jpg')}}" alt="">
				<div class="caption">
					<h3><center>Board Nuvoton</center></h3>
					{{-- <p>{{date("Y-m-d")}}</p> --}}
					<form action="" method="POST" role="form">
						  <div class="form-group">
						    <center><label for="jumlah">Jumlah</label></center>
						    <input type="number" class="form-control" id="jumlah">
						  </div>
						  <div class="form-group">
						    <center><label for="jumlah">Keterangan</label></center>
						    <textarea name="" class="form-control"></textarea>
						  </div>
						  <div class="form-group">
						   <center><button class="btn btn-primary">Pilih</button></center>
						  </div>
					</form>
				</div>
			</div>
		</div>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<div class="thumbnail">
				<img src="{{url('bs/img/5.jpg')}}" alt="">
				<div class="caption">
					<h3><center>Arduino Uno</center></h3>
					<form action="" method="POST" role="form">
						  <div class="form-group">
						    <center><label for="jumlah">Jumlah</label></center>
						    <input type="number" class="form-control" id="jumlah">
						  </div>
						  <div class="form-group">
						    <center><label for="jumlah">Keterangan</label></center>
						    <textarea name="" class="form-control"></textarea>
						  </div>
						  <div class="form-group">
						   <center><button class="btn btn-primary">Pilih</button></center>
						  </div>
					</form>
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
<a type="button" href="/user/alat/keranjang" class="btn btn-info navbar-btn"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;Pilihan Alat</a>
@endsection
