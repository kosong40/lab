@extends('layout.master')
@section('title','Alat LAB')
@section('login')
<li><a style="color: #37474F" href="/home/login" style="">Login <span class="glyphicon glyphicon-log-in"></span></a></li>
@endsection
@section('content')
<div class="container">
<h1 align="center">Alat Laboratorium </h1>
<div style="padding-top:1cm;">
  {{-- <table class="table table-resposive" id="myTable"> --}}
  <table class="table table-resposive thumbnail" id="example1">
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
  </table>
</div>
</div>
@endsection
@section("head")
  <link rel="stylesheet" href="{{url("assets/bootstrap/dist/css/bootstrap.min.css")}}">
  <link rel="stylesheet" href="{{url("assets/font-awesome/css/font-awesome.min.css")}}">
  <link rel="stylesheet" href="{{url("assets/Ionicons/css/ionicons.min.css")}}">
  <link rel="stylesheet" href="{{url("assets/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">
@endsection
@section("script")
<script src="{{url("assets/jquery/dist/jquery.min.js")}}"></script>
<script src="{{url("assets/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<script src="{{url("assets/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{url("assets/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script src="{{url("assets/jquery-slimscroll/jquery.slimscroll.min.js")}}"></script>
<script src="{{url("assets/fastclick/lib/fastclick.js")}}"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable( {
    buttons: [
        'copy', 'excel', 'pdf'
    ]
} );
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection
