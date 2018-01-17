@extends('layout.master')
@section('title')
Home
@endsection
@section('content')
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



@endsection
@section('nav')
<a href="/home/login">Login</a>
@endsection
@section('login')
<li><a href="/home/login">Login</a></li>
@endsection
