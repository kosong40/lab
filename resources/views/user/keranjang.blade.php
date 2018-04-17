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
<title>Keranjang</title>
@extends('layout.user')
@section('content')
<center><h1>Alat yang dipilih</h1>
	<p>"{{$user->nama}}"</p>
<h1></h1>
<form action="" method="POST" class="form-inline" role="form">
</center>
<div class="row">
	
</div>
<div>
	</form>
	{{-- <a href="/user/alat/lanjutan" type="button"class="btn btn-info">Lanjut&nbsp;<span class="glyphicon glyphicon-arrow-right"></span></a> --}}
</div>
<div class="row" style="margin-top: 1cm">
	<div class="col-sm-offset-3 col-sm-6">
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
	<div style="margin-bottom: 1cm;margin-top: 1cm;" class="table-responsive">
		<center><label>Daftar Alat Pinjaman</label></center>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col" width="400px">Nama Alat</th>
		      <th scope="col" width="90px">Jumlah</th>
		      <th scope="col" width="250px">Keterangan</th>
		      <th scope="col">Aksi</th>
		    </tr>
		  </thead>
		  <tbody>
				@foreach ($bukan->where('status','belum') as $alat1)
					<tr>
			      <th scope="row">{{$alat1->id_alat}}</th>
						<td>{{$alat1->nama_alat}}</td>
			      		<td>{{$alat1->jumlah}}</td>
						<td>{{$alat1->keterangan}}</td>
						<td>
							<a data-toggle="modal" data-target='#hapus{{$alat1->id_alat}}'><span class="label label-danger">Batal</span></a>
						</td>
			    </tr>
					<div class="modal fade" id="hapus{{$alat1->id_alat}}">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Hapus Data</h4>
								</div>
								<div class="modal-body">
									<h6>Apa benar Anda akan menghapus alat {{$alat1->nama_alat}} </h6>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
									<a href="/user/alat/keranjang/batal/{{$alat1->id_alat}}/alat" type="button" class="btn btn-danger">Hapus</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
		  </tbody>
		</table>
	</div>
		  	<div>
		  		{{csrf_field()}}
				<input name="_method" type="hidden" value="PUT">
		  		<input type="submit" class="btn btn-info" value="Pinjam">
		  	</div>
		</form>
	</div>	
</div>
@endsection
@section('login')
{{$user->nama}}
@endsection
@endif

@section('head')
<a type="button" href="/user/alat" class="btn btn-info navbar-btn"><i class="glyphicon glyphicon-arrow-left"></i>&nbsp;Kembali</a>
@endsection
