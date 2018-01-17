<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link type="shortcut icon" href="{{url('bs/img/favicon.ico')}}">
	@extends('layout.bs')
	@yield('head')
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid" >
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/home">Home</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="/home/kegiatan">Jadwal Kegiatan</a></li>
				<li><a href="/home/peminjam">Daftar Peminjam</a></li>
				<li><a href="/home/alat">Alat LAB </a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				
				@yield('login')
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>
<div class="container" style="padding-top: 0.9cm">
	@yield('content')
	@yield('alert')
</div>
</body>
</html>