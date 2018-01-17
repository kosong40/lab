@extends('layout.master')
@section('title')
Login
@endsection
@section('content')
<div class="row">
	<div class="col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<form action="/home/login/proses" method="POST" class="form-horizontal">
			{{csrf_field()}}
			<div class="form-group">
				<center><legend><h2>LOGIN</h2></legend></center>
			
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">User:</label>
					<div class="col-sm-10">
						<input type="text" name="username" id="" class="form-control" value="" required="required"  title="" placeholder="NIM">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="col-sm-2 control-label">Password:</label>
					<div class="col-sm-10">
						<input type="password" name="password" id="inputPassword" class="form-control" required="required" title="" placeholder="Password">
					</div>
				</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					{{-- <center> --}}
					<button type="submit" class="btn btn-danger btn-lg">Masuk</button>
					{{-- </center> --}}
				</div>
			</div>
			<input name="_method" type="hidden" value="PUT">
			</div>
	</form>
	</div>
</div>
@section('alert')
	{!!$alert!!}
@endsection
@endsection
@section('login')

@endsection