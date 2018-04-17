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
<title>Alat Lab</title>
@extends('layout.user')
@section('content')
<table class="table table-resposive thumbnail" id="alat">
  <thead>
  	<center>
		<tr>
			<th>#</th>
  			<th style="width:20%; height:30%">Gambar</th>
			<th style="width:40%">Detail Alat</th>
			<th style="width:10%">Jumlah</th>
			<th style="width:30%">Keterangan</th>
			<th></th>
	  	</tr>
		</center>
  </thead>
	<tbody>
		@php
			$i =1;
		@endphp
		@foreach ($alat->where('id','<>',1) as $alat)
		<tr>
			<td>{{$i++}}</td>
			<td><img class="img-thumbnail" src="{{$alat->gambar}}"></td>
			<td>
				<div>Nama Alat</div>
				<div id="nama"><label>{{$alat->nama}}</label></div>
				<div>Stok</div>
				@if($alat->stok > 0 )
				<div><label>{{$alat->stok}}</label></div>
				@else
				<div><label>Stok Habis</label><div>
				@endif
				<div>Keterangan </div>
				<div><label><p style="color: #000000;font-size:12px" align="justify">{{$alat->keterangan}}</p></label></div>
			</td>
			<form action="/user/alat/tambahCart/{{$alat->id}}" method="post">
				<td><input type="number" class="form-control" name="jumlah" min="1" max="{{$alat->stok}}" required/></td>
				<td><textarea rows="1" class="form-control" name="ket" required></textarea></td>
				<td><button class="btn btn-success">Pilih</button></td>
				{{csrf_field()}}
				<input name="_method" type="hidden" value="PUT">
			</form>
		</tr>
		@endforeach
	</tbody>
	<tfoot>
		<tr>
			<th>></th>
  			<th style="width:20%; height:30%">Gambar</th>
			<th style="width:40%">Detail Alat</th>
			<th style="width:10%">Jumlah</th>
			<th style="width:30%">Keterangan</th>
			<th></th>
	  	</tr>
	  	</tfoot>
</table>

{{-- <table class="table table-resposive thumbnail" id="alat">
    <thead>
    <tr>
      <th style="width:30%;">Gambar</th>
      <th style="width:20%;">Nama alat</th>
      <th style="width:10%;">Alat tersedia</th>
      <th style="width:40%;">Keterangan</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($alat->where('id','<>',1) as $alat)
    <tr>
      <td><img class="img-responsive" src="{{$alat->gambar}}"/></td>
      <td>{{$alat->nama}}</td>
      <td>{{$alat->stok}}</td>
      <td><p style="color:black;" align="justify">{{$alat->keterangan}}</p></td>
    </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
      <th style="width:30%;">Gambar</th>
      <th style="width:20%;">Nama alat</th>
      <th style="width:10%;">Alat tersedia</th>
      <th style="width:40%;">Keterangan</th>
    </tr>
    </tfoot>
  </table> --}}

@endsection
@section('login')
{{$user->nama}}
@endsection
@endif

@section('head')
<a type="button" href="/user/alat/keranjang" class="btn btn-info navbar-btn"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;Pilihan Alat</a>
@endsection
@section("css")
  <link rel="stylesheet" href="{{url("assets/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
@endsection
@section("script")
<script src="{{url("assets/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{url("assets/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script>
  $(document).ready( function () {
    $('#alat').DataTable({
    	
    });
} );
</script>
@endsection
