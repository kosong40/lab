@extends('layout.master')
@section('title')
{{$post->judul}}
@endsection
@section('login')
<li><a style="color: #37474F" href="/home/login" style="">Login <span class="glyphicon glyphicon-log-in"></span></a></li>
@endsection
@section('content')
<style>
	#konten{
		margin-top: 1cm;
	}
	#konten p{
		color: black;
	}
</style>
<div class="container" style="margin-top:1cm; ">
	<div class="row">
		<div class="col-sm-8">
			<h1 align="center">{{$post->judul}}</h1>
			<div id="konten" class="thumbnail">
				{!!$post->posting!!}
			</div>
			<div>
				<h6 align="right"><label>{{$post->waktu}}</label></h6>
			</div>
		</div>
		<div class="col-sm-4">
			<h2>Berita Lainnya</h2>
				<ul class="list-group">
			@foreach ($lain as $lain)
					<li class="list-group-item"><a href="/home/berita/{{$lain->id}}"><label>{{$lain->judul}}</label></a></li>
			@endforeach
				</ul>
		</div>
	</div>
</div>
@endsection