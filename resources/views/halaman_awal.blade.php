@extends('layout.master')
@section('title')
Home
@endsection
@section('content')
<style>
  #judul{
    padding-top: 0.7cm;
    padding-bottom: 0.5cm;
    background-color: #e0e0e0;
  }
  #thumbnail{
    background-color: #e0e0e0;
  }
  #thumbnail img{
    /*padding-top: 1cm*/
    margin-top: 1cm;
  }
</style>
<center><h1></h1></center>
<div class>
    <div id="slide" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#slide" data-slide-to="0" class="active"></li>
      <li data-target="#slide" data-slide-to="1"></li>
      <li data-target="#slide" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="item active">
        <a href="#" class="thumbnail">
        		<img src="{{ url('bs/img/1.jpg') }}" style="height: 250px">
        </a>
      </div>

      <div class="item">
          <a href="#" class="thumbnail">
        		<img src="{{ url('bs/img/2.jpg') }}" style="height: 250px">
        </a>
      </div>
    
      <div class="item">
           <a href="#" class="thumbnail">
        		<img src="{{ url('bs/img/3.jpg') }}" style="height: 250px">
        </a>
      </div>
    </div>
    <a class="left carousel-control" href="#slide" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#slide" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="row" style="padding-top:0.7cm;">
  <h2 style="margin-bottom: 0.8cm;" align="center">PRAKTIKUM</h2>
  <div class="col-sm-1"></div>
  @foreach ($prak as $prak)
  <div class="col-sm-2">
    <div class="thumbnail" id="thumbnail">
      <img src="{{$prak->gambar }}" class="img-rounded">
      <div id="judul">
        <h4 align="center">{{$prak->nama}}</h4>
      </div>
      <div id="isi">
        <p align="justify">
          {!!$prak->keterangan!!}
        </p>
      </div>
      <div id="tombol">
        <p align="center"><a href="/home/kegiatan" class="btn btn-primary btn-xs">Jadwal Praktikum &nbsp;<span class="glyphicon glyphicon-arrow-right">&nbsp;</span></a></p>
      </div>
    </div>
  </div>
  @endforeach
</div>
<div class="container">
  <div style="margin-bottom: 0.5cm;margin-top: 0.5cm;"><h1 align="center">Berita Terbaru</h1></div>
  <div class="timeline-centered" style="margin-bottom: 5cm;">
    @if (count($post)==0)
      <h4>Belum ada postingan</h4>
    @endif
    @foreach ($post as $posting)
    <article class="timeline-entry">
        <div class="timeline-entry-inner">
            <div class="timeline-icon fa fa-pencil bg-info">
                <i class="entypo-feather"></i>
            </div>
            <div class="timeline-label">
                <h2><a href="/home/berita/{{$posting->id}}">{{$posting->judul}}</a> <p>Posting:&nbsp;{{$posting->waktu}}</p></h2>
                <div>
                  {!!$posting->posting!!}
                </div>
            </div>
        </div>
      </article>
    @endforeach
  </div>
</div>
@endsection
@section('nav')
<a href="/home/login">Login</a>
@endsection
@section('login')
<li><a style="color: #37474F" href="/home/login" style="">Login <span class="glyphicon glyphicon-log-in"></span></a></li>
@endsection
