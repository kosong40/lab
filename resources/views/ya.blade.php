@extends('layout.master')
@section('title')
Cara Meminjam
@endsection
@section('content')
	<style media="screen">
		.img-rounded{
			margin-bottom: 0.4cm;
		}
	</style>
<div style="padding-top: 0.5cm">
	<div class="row">
		<div class="col-sm-5 col-sm-offset-1">
			<hr>
			<h1 align="center">Alat</h1>
			<div class="responsive thumbnail" id="alur">
				<img src="{{url('file/alur/alat/alat/Slide1.png')}}" class="img-rounded">
				<img src="{{url('file/alur/alat/alat/Slide2.png')}}" class="img-rounded">
				<img src="{{url('file/alur/alat/alat/Slide3.png')}}" class="img-rounded">
				<img src="{{url('file/alur/alat/alat/Slide4.png')}}" class="img-rounded">
				<img src="{{url('file/alur/alat/alat/Slide5.png')}}" class="img-rounded">
				<img src="{{url('file/alur/alat/alat/Slide6.png')}}" class="img-rounded">
				<img src="{{url('file/alur/alat/alat/Slide7.png')}}" class="img-rounded">
				<img src="{{url('file/alur/alat/alat/Slide8.png')}}" class="img-rounded">
				<img src="{{url('file/alur/alat/alat/Slide9.png')}}" class="img-rounded">
			</div>
		</div>
		<div class="col-sm-5">
			<hr>
			<h1 align="center">Ruang</h1>
			<div class="responsive thumbnail" id="alur">
				<img src="{{url('file/alur/ruang/ruang/Slide1.png')}}" class="img-rounded">
				<img src="{{url('file/alur/ruang/ruang/Slide2.png')}}" class="img-rounded">
				<img src="{{url('file/alur/ruang/ruang/Slide3.png')}}" class="img-rounded">
				<img src="{{url('file/alur/ruang/ruang/Slide4.png')}}" class="img-rounded">
				<img src="{{url('file/alur/ruang/ruang/Slide6.png')}}" class="img-rounded">
				<img src="{{url('file/alur/ruang/ruang/Slide7.png')}}" class="img-rounded">
				<img src="{{url('file/alur/ruang/ruang/Slide8.png')}}" class="img-rounded">
				<div class="panel panel-danger">
		      <div class="panel-heading">Pembatalan</div>
		      <div class="panel-body">Peminjaman ruang akan dibatalkan apabila tanggalnya sama dengan Praktikum</div>
		    </div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('login')
<li><a style="color: #37474F" href="/home/login" style="">Login <span class="glyphicon glyphicon-log-in"></span></a></li>
@endsection
