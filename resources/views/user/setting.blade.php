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
			<h1>Pengaturan</h1>
			<form action="#" method="POST" class="form-horizontal" role="form">
				
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