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
<title>Meja Tugas Akhir Lab</title>
@extends('layout.user')
@section('content')
<meta http-equiv="refresh" content="15">
<center><h1>Meja Tugas Akhir Laboratorium</h1></center>
  <div class="container" style="padding-top:1cm">
    <div class="row">
        @foreach ($meja as $meja)
        <div class="col-sm-3">
          <div class="panel panel-default">
            @if ($meja->status =='belum')
              <div class="panel-heading"
              style="
              border-color:#d32f2f ;
              color:white;
              background-color:#d32f2f ;
              "
              >
              <div class="row">
                <div class="col-sm-5">
                  <i class="fa fa-plus-circle fa-5x"></i>
                </div>
                <div class="col-sm-7">
                  <div><h4>Meja&nbsp;{{$meja->id}}</h4></div>
                  <div><label>{{$meja->status}}&nbsp;di pinjam</label></div>
                </div>
              </div>
            </div>
              <div style="padding-top:0.2cm;padding-bottom:0.2cm;" class="panel-content">
                <label><a href="/user/meja/{{$meja->id}}/add" >Pinjam &nbsp;<span class="pull-right"><i class="fa fa-arrow-right" aria-hidden="true"></i><span></a></label>
              </div>
						@elseif($meja->status =='proses')
							<div class="panel-heading"
							style="
							border-color:#f9a825;
							color:white;
							background-color:#f9a825;
							"
							>
							<div class="row">
								<div class="col-sm-5">
									<i class="fa fa-spinner fa-5x"></i>
								</div>
								<div class="col-sm-7">
									<div><h4>Meja&nbsp;{{$meja->id}}</h4></div>
									<div><label>Sedang&nbsp;di{{$meja->status}}</label></div>
								</div>
							</div>
						</div>
							<div style="padding-top:0.2cm;padding-bottom:0.2cm;" class="panel-content">
								<label>{{$meja->nama}}</label>

							</div>
            @else
              <div class="panel-heading"
              style="
              border-color:#2e7d32 ;
              color:white;
              background-color:#2e7d32 ;
              "
              >
              <div class="row">
                <div class="col-sm-5">
                  <i class="fa fa-check-circle fa-5x"></i>
                </div>
                <div class="col-sm-7">
                  <div><h4>Meja&nbsp;{{$meja->id}}</h4></div>
                  <div><label>{{$meja->status}}&nbsp;di pinjam</label></div>
                </div>
              </div>
            </div>
              <div style="padding-top:0.2cm;padding-bottom:0.2cm;" class="panel-content">
                <label>{{$meja->nama}}</label>
              </div>
            @endif

          </div>

        </div>
        @endforeach

  </div>

@endsection
@section('login')
{{$user->nama}}
@endsection
@endif

@section('head')

@endsection
