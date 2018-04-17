@extends('layout.user')
@section('content')
@section('css')
<title>Cetak Surat</title>
@endsection
<table class="table">
	@foreach ($profil as $a)
@section('brand')
{{"Cetak Surat"}}
@endsection
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td>{{$a->nama}}</td>
	</tr>
	<tr>
		<td>NIM</td>
		<td>:</td>
		<td>{{$a->username}}</td>
	</tr>
	<tr>
		<td>Kegunaan</td>
		<td>:</td>
		<td>{{$a->kegunaan}}</td>
	</tr>
	<tr>
		<td>Tanggal Pinjam</td>
		<td>:</td>
		<td>{{$a->tgl_pinjam}}</td>
	</tr>
	<tr>
		<td>No Handphone</td>
		<td>:</td>
		<td>{{$a->no_hp}}</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td>{{$a->alamat}}</td>
	</tr>
	<form action="/user/cetak/ruang/{{$a->tgl_pinjam}}/{{$a->kegunaan}}" method="post" enctype="multipart/form-data">
		<tr>
			<td>Dosen Pembimbing 1</td>
			<td>:</td>
			<td><input type="text" name="dos1" style="width: 50%" required class="form-control"></td>
		</tr>
		<tr>
			<td>Dosen Pembimbing 2</td>
			<td>:</td>
			<td><input type="text" name="dos2" style="width: 50%" required="" class="form-control"></td>
		</tr>
		<tr>
			<td>Judul</td>
			<td>:</td>
			<td><textarea style="width: 50%" class="form-control" name="judul" required></textarea></td>
		</tr>
		<tr>
			<td>Pas Foto 4x6</td>
			<td>:</td>
			<td><input type="file" name="foto" style="width: 50%" required="" class="form-control"></td>
		</tr>
		<tr>
			<td>Scan KTM</td>
			<td>:</td>
			<td><input type="file" name="ktm" style="width: 50%" required="" class="form-control"></td>
		</tr>
		<tr>
			<td><input type="submit" class="btn btn-warning" value="Cetak Sekarang"></td>
		</tr>
		<input name="_method" type="hidden" value="PUT">
		{{csrf_field()}}
		
	</form>

	@endforeach
</table>
@endsection