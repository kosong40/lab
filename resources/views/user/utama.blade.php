
{{-- {!!dd($session)!!} --}}
@if($session =="")
<script>
	alert("Anda Belum Login");
	window.location.href = "/home/login";
</script>
@else
@foreach($user as $user)
@section('brand')
{{$user->kategori}}
@endsection
<title>{{$user->nama}}</title>
@endforeach
@extends('layout.coba')
@section('content')
<h1>{{$user->nama}}</h1>
<h4>{{session('user')}}</h4>
@endsection
@section('login')
{{$user->nama}}
@endsection
@endif