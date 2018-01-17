@extends('layout.user')
<title>Login Admin</title>
@section('form_login')
	<div class="row">
	<div class="col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<form action="/admin/proses" method="POST" class="form-horizontal">
			{{csrf_field()}}
			<div class="form-group">
				<center><legend><h2>LOGIN</h2></legend></center>
			
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">User:</label>
					<div class="col-sm-10">
						<input type="text" name="username" id="" class="form-control" value="" required="required"  title="" placeholder="User">
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
					<button type="submit" class="btn btn-danger btn-sm">Login</button>
					{{-- </center> --}}
				</div>
			</div>
			<input name="_method" type="hidden" value="PUT">
			</div>
	</form>
	</div>
</div>
@endsection
