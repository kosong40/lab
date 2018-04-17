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
	<div class="col-sm-7">
		<div class="row">
			<h3 style="margin-bottom: 1cm;text-align: center;">Daftar Praktikum </h3>
			<hr>
				<table class="table" id="Tprak"> 
					<thead>
					<tr class="success">
						<th>Praktikum</th>
						<th>Modul</th>
						<th>Judul</th>
						<th>Tanggal</th>
						<th>Status</th>
					</tr>
					</thead>
				<tbody>
					@foreach ($prak as $prak)
						<tr class="danger">
							<td>{{$prak->kegunaan}}</td>
							<td>{{$prak->tema}}</td>
							<td>{{$prak->keterangan}}</td>
							<td>{{$prak->tgl_pinjam}}</td>
							@if ($prak->status == 'belum aktif')
								<td><label class="label label-danger">Belum Aktif</label></td>
							@elseif($prak->status == 'aktif')
								<td><a href=""><label class="label label-warning">Aktif</label></a></td>
							@endif
						</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr class="success">
						<th>Praktikum</th>
						<th>Modul</th>
						<th>Judul</th>
						<th>Tanggal</th>
						<th>Status</th>
					</tr>
				</tfoot>
				</table>
		</div>
	</div>
	<div class="col-sm-4 col-sm-offset-1">
		<h3 style="margin-bottom: 1.4cm;text-align: center;">Atur Jadwal Praktikum:</h3>
			<form action="/admin/praktikum/jadwal" method="POST">
				<div style="margin-top: 0.3cm">
					<label>Praktikum</label>
					<select class="form-control" required name="prak">
					<option></option>
					@foreach ($matkul as $matkul)
						<option value="{!!$matkul->nama!!}">{!!$matkul->nama!!}</option>
					@endforeach
				</select>
				</div>

				<div style="margin-top: 0.3cm">
					<label>Modul</label>
					<select class="form-control" required name="modul">
					<option></option>
					<option value="modul 1">Modul 1</option>
					<option value="modul 2">Modul 2</option>
					<option value="modul 3">Modul 3</option>
					<option value="modul 4">Modul 4</option>
					<option value="modul 5">Modul 5</option>
					<option value="modul 6">Modul 6</option>
					<option value="modul 7">Modul 7</option>
					<option value="modul 8">Modul 8</option>
				</select>
				</div>
				<div style="margin-top: 0.3cm">
					<label>Judul Modul</label>
					<input type="text" name="judul" class="form-control" required>
				</div>
				<div style="margin-top: 0.3cm">
					<label>Tanggal</label>
					<input type="date" name="tgl" class="form-control" required>
				</div>
				<div style="margin-top: 0.5cm">
					{{csrf_field()}}
					<input name="_method" type="hidden" value="PUT">
					<input type="submit" name="" value="Simpan" class="form-control btn btn-primary">
				</div>
			</form>
			@if (session('praktikum'))
			    <div class="alert alert-success">
			        {{ session('praktikum') }}
			    </div>
			@endif
			<div style="margin-top: 2cm;">
				<table class="table">
					<tr>
						<th>Nama Praktikum</th>
						<th>Aksi</th>
					</tr>
					@foreach ($matkul2 as $matkul2)
						<tr>
							<td>{!!$matkul2->nama!!}</td>
							@if($matkul2->status == 'belum aktif')
							<td><a href="/admin/praktikum/aktif/{{$matkul2->nama}}" class="label label-success">Aktifkan</a></td>
							@elseif($matkul2->status == 'aktif')
							<td><a href="/admin/praktikum/tidak/{{$matkul2->nama}}" class="label label-warning">Nonaktif</a></td>
							@endif
						</tr>
					@endforeach
				</table>
			</div>
	</div>
</div>
@endsection
@section('title','Jadwal Praktikum')
@section('admin')
{{$user->nama}}
@endsection
@endforeach
@endif
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
    $('#Tprak').DataTable({
    	
    });
} );
</script>
@endsection