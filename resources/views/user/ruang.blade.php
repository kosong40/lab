@if($session =="")
<script>
	alert("Anda Belum Login");
	window.location.href = "/home/login";
</script>
@else
@foreach($user as $user)
{{-- <title>{{$user->nama}}</title> --}}
@endforeach
@section('brand')
{{$user->kategori}}
@endsection
<title>Ruang Lab</title>
@extends('layout.user')
@section('content')
<h1>{{$user->nama}}</h1>
<h4>{{session('user')}}</h4>
@endsection
@section('login')
{{$user->nama}}
@endsection
@endif
