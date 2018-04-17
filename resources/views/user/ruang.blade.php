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
<title>Ruangan</title>
@extends('layout.user')
@section('content')
<center><h2>Ruang Laboratorium Sistem Tertanam dan Robotika</h2></center>
<div class="container container-fluid" style="padding-top:5%;">
		<div class="row">
			<div class="col-sm-9 col-md-9">
				<div id='calendar'></div>
			</div>
			<div class="col-sm-3 col-md-3">
				<center><label>FORM PEMINJAMAN RUANGAN</label></center>
				<form class="form-group" action="/user/ruang/add" method="post">
					<div class="form-group" style="padding-top:10%">
						<label for="">Nama</label>
						<input type="text" name="nama" value="{{$user->nama}}" placeholder="Hallo" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label for="">NIM</label>
						<input type="text" name="nim" value="{{$user->username}}" placeholder="Hallo" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label for="">No HP</label>
						<input type="text" name="no_hp" value="{{$user->no_hp}}" placeholder="Nomor Handphone" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Alamat</label>
						<input type="text" name="alamat" value="{{$user->alamat}}" placeholder="Alamat" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Keperluan</label>
						<select class="form-control" name="guna" required>
							<option value=""></option>
							<option name="guna" value="Seminar TA">Seminar TA</option>
							<option name="guna" value="Seminar KP">Seminar KP</option>
							<option name="guna" value="Praktikum">Praktikum</option>
							<option name="guna" value="Penelitian">Penelitian</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Tanggal Peminjam</label>
						<input type="date" name="tgl" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Keterangan Lain-Lain</label>
						<textarea name="ket" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="" value="Pinjam" class="btn btn-info">
						{{csrf_field()}}
					<input name="_method" type="hidden" value="PUT">
					</div>
				</form>
				@if (session('status'))
				    <div class="alert alert-success">
				        {{ session('status') }}
				    </div>
			    @elseif(session('gagal'))
			    <div class="alert alert-danger">
				        {{ session('gagal') }}
				    </div>
				@endif
			</div>
		</div>
	</div>
	<div>
		<h3>Keterangan :</h3>
		<div class="row">
			<div class="col-sm-2" style="background-color:#ff6f00 ;padding-bottom: 0.5cm;"></div>
			<div class="col-sm-3">
				<label>Sedang di proses</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2" style="background-color:#33691e ;padding-bottom: 0.5cm;"></div>
			<div class="col-sm-3">
				<label>Sudah disetujui</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2" style="background-color:#E10308 ;padding-bottom: 0.5cm;"></div>
			<div class="col-sm-3">
				<label>Digunakan Admin</label>
			</div>
		</div>
		
	</div>

 <script type="text/javascript">
            
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
						 @foreach ($ruang->where('status','<>','Dibatalkan') as $ruang)
						  	{
								title: '{{$ruang->nama.'\n'.$ruang->username.'\n'.$ruang->kegunaan.'\n'.$ruang->keterangan}}',
								start: '{{$ruang->tgl_pinjam}}',
								description: '{{$ruang->keteragan}}',
								@if ($ruang->status =='proses')
									color: '#ff6f00'
								@elseif($ruang->status =='setuju')	
									color: '#33691e'
								@endif
								
							},
						 @endforeach
						@foreach ($prak as $prak)
							{
								title: '{{$prak->kegunaan.'\n'.$prak->tema.'\n'.$prak->keterangan}}',
								start: '{{$prak->tgl_pinjam}}',
								description: '{{$prak->keteragan}}',
								color: '#E10308'
								
								
							},
						@endforeach
						 ],


						});

        </script>

@endsection
@section('login')
{{$user->nama}}
@endsection
@endif

@section('head')
@endsection
