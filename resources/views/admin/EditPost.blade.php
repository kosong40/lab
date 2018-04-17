@if($session =="")
<script>
	alert("Anda Belum Login");
	window.location.href = "/admin";
</script>
@else
@foreach($user as $user)
@extends('layout.baru')
@section('konten')

<div class="container">
	<hr>
	<h3>Ubah Postingan:</h3>
	<div class="row">
		<div class="col-sm-12">
			<div class="">
				<form class="form-group" action="/admin/posting/edit/{{$posting->id}}/proses" method="post">
					<div>
						<input type="text" name="judul" class="form-control" placeholder="Judul" value="{{$posting->judul}}">
					</div>
					<textarea id="editor1" name="posting" rows="5" cols="80">
						{!!$posting->posting!!}
					</textarea>
					{{csrf_field()}}
					<input name="_method" type="hidden" value="PUT">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('title','ini admin')
@section('admin')
{{$user->nama}}
@endsection
@endforeach
@endif