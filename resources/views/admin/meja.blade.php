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

        <meta http-equiv="refresh" content="5">
	<center><h1>Pengguna Meja Tugas Akhir</h1>
		<p>"{{$user->nama}}"</p>
	</center>
	<div class="row">
		<div class="table-responsive">
			<div class="col-sm-offset-2 col-sm-8">
				<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col"></th>
			      <th scope="col" style="width:30%;">Nomor Meja</th>
			      <th scope="col" style="width:50%;">Peminjam</th>
						<th scope="col" style="width:20%;">Aksi</th>
			    </tr>
			  </thead>
				@foreach ($meja as $meja)
					@if ($meja->nama =='')
						<tr>
						<td></td>
						<td>{{$meja->id}}</td>
						<td>Belum di Pinjam</td>
						<td><a href="" class="label label-success">Kosong</a></td>
					</tr>
				@elseif($meja->status =='sudah')
						<tr>
							<td></td>
							<td>{{$meja->id}}</td>
							<td>{{$meja->nama}}&nbsp;({{$meja->username}})</td>
							<td>
								<div class="">
									<a class="label label-info">Detail</a>
									<a href="/admin/meja/{{$meja->id}}/hapus" class="label label-danger">Batal</a>
								</div>
							</td>
						</tr>
					@else
					<tr>
						<td></td>
						<td>{{$meja->id}}</td>
						<td>{{$meja->nama}}&nbsp;({{$meja->username}})</td>
						<td>
							<div class="">
								<a href="/admin/meja/{{$meja->id}}/edit" class="label label-warning">Setujui</a>
								<a href="/admin/meja/{{$meja->id}}/hapus" class="label label-danger">Batal</a>
							</div>
						</td>
					</tr>
					@endif
				@endforeach
			</table>
		</div>
		</div>
	</div>
@endsection
@section('title','ini admin')
@section('admin')
{{$user->nama}}
@endsection
@endforeach
@endif
