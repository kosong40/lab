<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link type="shortcut icon" href="{{url('bs/img/favicon.ico')}}">
	{{-- @extends('layout.bs') --}}
	@yield('head')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{url('calendar/fullcalendar.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url("bs/fa/css/font-awesome.min.css")}}">
	 <link rel="icon" type="image/png" href="{{ url('img/logo.png') }}" sizes="32x32">
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	 <!-- Bootstrap Js CDN -->
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <script src="{{url('calendar/lib/jquery.min.js')}}"></script>
	 <script src="{{url('calendar/lib/moment.min.js')}}"></script>
	 {{-- <script src="{{url('calendar/locale/id.js')}}"></script> --}}
	 <script src="{{url('calendar/locale-all.js')}}"></script>
	 <script src="{{url('calendar/fullcalendar.js')}}"></script>
	 <script src="{{url('js/ckeditor/ckeditor.js')}}"></script>
	 @yield("head")
	 <link rel="stylesheet" type="text/css" href="{{url('css/timeline.css')}}">
</head>
<style>
	body{
		animation-name: bodi;
		animation-duration: 20s;
		animation-iteration-count: infinite;
	}
	#navigasi{
		animation-name: navigasi;
		animation-duration: 15s;
		animation-iteration-count: infinite;
	}
	@keyframes bodi{
		0%   {background-color: #E1F5FE;}
		10%   {background-color: #B3E5FC;}
		20%   {background-color: #81D4FA;}
		30%   {background-color: #4FC3F7;}
		40%   {background-color: #29B6F6;}
		50%   {background-color: #03A9F4;}
		60%   {background-color: #29B6F6;}
		70%   {background-color: #4FC3F7;}
	    80%  {background-color: #81D4FA;}
	    90%  {background-color: #B3E5FC;}
	    100% {background-color: #E1F5FE;}
	}
	@keyframes navigasi{
		100%   {background-color: #03A9F4;}
		90%   {background-color: #29B6F6;}
		80%   {background-color: #4FC3F7;}
		70%   {background-color: #81D4FA;}
		60%   {background-color: #B3E5FC;}
		50%   {background-color: #E1F5FE;}
		40%   {background-color: #B3E5FC;}
		30%   {background-color: #81D4FA;}
	    20%  {background-color: #4FC3F7;}
	    10%  {background-color: #29B6F6;}
	    0% {background-color: #03A9F4;}
	}
</style>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navigasi">
	<div class="container-fluid" >
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/home" style="color: #37474F"><b>Home</b></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="/home/kegiatan" style="color: #37474F">Jadwal Kegiatan</a></li>
				<li><a href="/home/alat" style="color: #37474F">Alat LAB </a></li>
				<li><a href="/home/peminjam" style="color: #37474F">Cara Peminjaman</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right" style="margin-right: 1cm;">

				@yield('login')
			</ul>
		</div>
	</div>
</nav>
<div class="container-fluid" style="margin-top: 1.3cm">
	@yield('content')
	@yield('alert')
</div>

 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script> --}}

</body>
@yield("script")
</html>
