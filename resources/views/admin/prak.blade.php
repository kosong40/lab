@if($session =="")
<script>
	alert("Anda Belum Login");
	window.location.href = "/admin";
</script>
@else
@foreach($user as $user)
@extends('layout.baru')
@section('konten')
<div class="row">
  <div class="col-sm-offset-2 col-sm-8">
    <form action="/admin/pengaturan/praktikum/{{$prak->id}}/proses" class="form-group" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <h2 align="center">{!!$prak->nama!!}</h2><br>
      </div>
        <div>
          <textarea id="editor1" name="posting" rows="5" cols="80" required>
            {!!$prak->keterangan!!}
          </textarea>
          {{csrf_field()}}
          <input name="_method" type="hidden" value="PUT">
        </div>
    </form>
  </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="{{url('bs/bootstrap-imageupload.js')}}"></script>
<script>
            var $imageupload = $('.imageupload');
            $imageupload.imageupload();
		
            $('#imageupload-disable').on('click', function() {
                $imageupload.imageupload('disable');
                $(this).blur();
            })

            $('#imageupload-enable').on('click', function() {
                $imageupload.imageupload('enable');
                $(this).blur();
            })

            $('#imageupload-reset').on('click', function() {
                $imageupload.imageupload('reset');
                $(this).blur();
            });
        </script>
@endsection
@section('title','ini admin')
@section('admin')
{{$user->nama}}
@endsection
@endforeach
@endif

