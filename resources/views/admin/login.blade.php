@extends('layout.baru')
<title>Login Admin</title>
@section('konten')
	<div class="row">
	<div class="col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<h1 align="center">Login</h1>
		<form action="/admin/proses" method="POST" class="form-horizontal">
			{{csrf_field()}}
			<div class="form-group">
				<div class="form-group">
					<input type="text" name="username" id="" class="form-control" value="" required="required"  title="" placeholder="User">
				</div>
				<div class="form-group">
					<input type="password" name="password" id="inputPassword" class="form-control" required="required" title="" placeholder="Password">
				</div>
				<div class="form-group">
				<button type="submit" class="btn btn-danger btn-sm">Masuk</button>
				</div>
				<input name="_method" type="hidden" value="PUT">
			</div>
	</form>
	@section('alert')
	@if (session('login'))
	    <div class="alert alert-danger">
	        <p style="color: black;" align="center">{{ session('login') }}</p>
	    </div>
    @elseif(session('belum'))
    	<div class="alert alert-warning">
	        <p style="color: black;" align="center">{{ session('belum') }}</p>
	    </div>
    @elseif(session('keluar'))
    	<div class="alert alert-info">
	        <p style="color: black;" align="center">{{ session('keluar') }}</p>
	    </div>
	@endif
@endsection
	</div>
</div>
@endsection
@section('utama')
	<a href="/home" type="button" id="sidebarCollapse" class="btn btn-success navbar-btn">
			<i class="glyphicon glyphicon-home"></i>
			<span>Halaman Utama</span>
	</a>
@endsection
