@extends('layout.master')
@section('title')
Daftar Pengguna
@endsection
@section('content')
<div style="padding-top: 0.5cm">
	<table class="table table-hover">
	<thead>
		<tr>
			<th>NIM</th>
			<th>NAMA</th>
			<th>Jenis Peminjaman</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach($peminjam as $a)
		<tr>
			<td>{{$a->user}}</td>
			<td>{{$a->nama}}</td>
			<td></td>
			
		</tr>
		@endforeach
	</tbody>
</table>	
</div>
@endsection
@section('login')
<li><a href="/home/login">Login</a></li>
@endsection
