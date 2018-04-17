@if($session =="")
<script>
	alert("Anda Belum Login");
	window.location.href = "/admin";
</script>
@else
@foreach($user as $user)
@extends('layout.baru')
@section('brand')
<a class="navbar-brand" href="../">Admin</a>
@endsection
@section('konten')
{{-- <meta http-equiv="refresh" content="120">       --}}
		<p>"{{$user->nama}}"</p>

@php
switch (date("l")) {
	case 'Wednesday':
		$hari = "RABU ";
		break;
	case 'Monday':
		$hari = "SENIN ";
		break;
	case 'Tuesday':
		$hari = "SELASA ";
		break;
	case 'Thursday':
		$hari = "KAMIS ";
		break;
	case 'Friday':
		$hari = "JUMAT ";
		break;
	case 'Saturday':
		$hari = "SABTU ";
		break;
	case 'Monday':
		$hari = "MINGGU ";
		break;
	default:
		$hari = date("l");
		break;
}
@endphp

<div class="container">
	<label></label>
	<div class="row">
		<div class="col-sm-3 col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading" style="
				border-color: #c62828 ;
				color: white;
				background-color: #c62828 ;
				">
				<div class="row">
					<div class="col-sm-6">
						<i class="fa fa-calendar fa-5x"></i>
					</div>
					<div class="col-sm-6">
						<div style="padding-bottom: 0.3cm;"><h3>{{$hari}}</h3></div>
						<div>{{"__________"}}</div>
					</div>
				</div>
				</div>
				<div class="panel-footer">
					<a>{{date("d-M-Y")}}</a>
				</div>
  		</div>
		</div>
		<div class="col-sm-3 col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading"
				style="
				border-color: #1565c0   ;
				color: white;
				background-color: #1565c0   ;
				"
				>
					<div class="row">
						<div class="col-sm-6">
							<i class="fa fa-wrench fa-5x"></i>
						</div>
						<div class="col-sm-6">
							<div><h1>{{$alat}}</h1></div>
							<div>Alat Lab</div>
						</div>
					</div>
				</div>
		    <div class="panel-footer">
					<a href="/admin/alat">Lihat Selengkapnya &nbsp;<span class="pull-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i><span></a>
				</div>
  		</div>
		</div>
		<div class="col-sm-3 col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading" style="
				border-color: #388e3c ;
				color: white;
				background-color: #388e3c ;
				">
				<div class="row">
					<div class="col-sm-6">
						<i class="fa fa-table fa-5x"></i>
					</div>
					<div class="col-sm-6">
						<div><h1>{{$meja}}</h1></div>
						<div>Meja</div>
					</div>
				</div>
				</div>
				<div class="panel-footer">
					<a href="/admin/meja">Lihat Selengkapnya &nbsp;<span class="pull-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i><span></a>
				</div>
  		</div>
		</div>
		<div class="col-sm-3 col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading" style="
				border-color: #ff9100 ;
				color: white;
				background-color: #ff9100 ;
				">
				<div class="row">
					<div class="col-sm-6">
						<i class="fa fa-pencil fa-5x"></i>
					</div>
					<div class="col-sm-6">
						<div><h1>{{$posting}}</h1></div>
						<div>Posting</div>
					</div>
				</div>
				</div>
				<div class="panel-footer">
					<a href="/admin/posting/daftar">Semua Posting&nbsp;<span class="pull-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i><span></a>
				</div>
  		</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-8">

		</div>
		@section('pengguna')
			<li>
			     <button type="button" class="btn btn-default" disabled><span class="glyphicon glyphicon-wrench">&nbsp;</span>&nbsp;<span class="badge">{{$pinjam}}</span></button>
			</li>
			<li class="dropdown">
			     <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
					<span class="glyphicon glyphicon-user">&nbsp;</span>&nbsp;<span class="badge">{{$online}}</span>
			     <span class="caret"></span></button>

					  <div class="dropdown-menu dropdown-user" id="pengguna">
					<table class="table">
						<tr>
							<td style="width:30%">NIM</td>
							<td style="width:60%">Nama</td>
							<td style="width:10%">Status</td>
						</tr>
						@foreach ($peminjam as $peminjam)
							<tr>
								<td>{{$peminjam->username}}</td>
								<td>{{$peminjam->nama}}</td>
								@if ($peminjam->status == 'online')
									<td><div class="label label-success">ONLINE</div></td>
								@else
									<td><div class="label label-danger">OFFLINE</div></td>
								@endif
							</tr>
						@endforeach
					</table>
			</div>
			</li>
			
		@endsection
	</div>
</div>
<div class="container">
	@if (session('posting'))
			    <div class="alert alert-success">
			        {{ session('posting') }}
			    </div>
				@endif
				@if ($errors->any())
			    <div class="alert alert-danger">
			    	<center>
		            @foreach ($errors->all() as $error)
		                {{ "Judul tidak boleh kosong" }}
		            @endforeach
		        </center>
			    </div>
			@endif
	<hr>
	<div class="row">
		<div class="col-sm-12">
	<h3>Buat Postingan:</h3>
			<div class="">
				<form class="form-group" action="/admin/posting" method="post">
					<div>
						<input type="text" name="judul" class="form-control" placeholder="Judul" required>
					</div>
					<textarea id="editor1" name="posting" rows="5" cols="80" required>
						
					</textarea>
					{{csrf_field()}}
					<input name="_method" type="hidden" value="PUT">
				</form>
				
			</div>
		</div>
	</div>
</div>

@section('script')
<script>
            CKEDITOR.replace('editor1');
</script>
 <script type="text/javascript">
	  	 $(document).ready(function () {
	  			 $('#calendar').fullCalendar({

	  				 header: {
	  					right: 'prev,next today',
	  					center: 'title',
	  					left: 'listDay,listWeek,month'
	  				},
	  				views: {
	  					listDay: { buttonText: 'list day' },
	  					listWeek: { buttonText: 'list week' }
	  				},
	  				// locale: initialLocaleCode,
	  				locale: 'id',
	  				defaultView: 'month',
	  				defaultDate: '{{date('Y-m-d')}}',
	  				navLinks: true,
	  				
	  				eventLimit: true,
	  				events: [
						  	{
								title: 'Cek',
								start: '{{date("Y-m-d")}}',
								description: 'siap',
																
							},
						
						 ],

	  			 });
	  	 });
	  </script>
@endsection
@endsection
@section('title','ini admin')
@section('admin')
{{$user->nama}}
@endsection
@endforeach
@endif
