
{{-- {!!dd($session)!!} --}}
@if($session =="")
<script>
	alert("Anda Belum Login");
	window.location.href = "/home/login";
</script>
@else
@foreach($user as $user)
@section('brand')
@endsection
<title>{{$user->nama}}</title>
@endforeach
@extends('layout.user')
@section('content')
<h1>{{$user->nama}}</h1>
<h4>{{session('user')}}</h4>
<hr style="
	border: 4;
 	border-top: 1px solid #8c8c8c;
">
<div class="row">
	<div class="col-sm-6">
		<h4><i class="fa fa-wrench"></i>&nbsp;Peminjaman Alat</h4>
		<div class="row">
			<div class="col-sm-4">
				<select id="pAlat" onchange="alat()" class="form-control">
				  <option value="Semua">Semua
				  <option value="Terima">Terima
				  <option value="Sudah">Sudah Disetujui
				  <option value="Belum">Belum Disetujui
				  <option value="Pinjam">Proses Pinjam
				  <option value="Kembali">Proses Pengembalian
			  	  <option value="batal">Dibatalkan
				</select>
			</div>
		</div>
		<div style="padding-bottom: 0.5cm"></div>
		<table class="table table-condensed " id="alat">
			<thead>
				<tr class="info">
					<th style="width:20% "><label>Tanggal Pinjam</label></th>
					<th style="width:20%"><label>Tanggal Kembali</label></th>
					<th style="width:20%"><label>Kegunaan</label></th>
					<th style="width:10%"><label>Status</label></th>
					<th style="width:30% "><label>Aksi</label></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($pinjam as $pinjam)
				@if($pinjam->status =='setuju')
				<tr class="success">
					<td>{{$pinjam->tgl_pinjam}}</td>
					<td>{{$pinjam->tgl_kembali}}</td>
					<td>{{$pinjam->kegunaan}}</td>
					<td>{{$pinjam->status}}</td>
					<td>
						<div><a href="#{{$pinjam->status}}{{$pinjam->tgl_pinjam}}{{$pinjam->tgl_kembali}}" data-toggle="modal" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span>&nbsp;Detail</a>
						<a href="/user/alat/kembali/{{$pinjam->tgl_pinjam}}/{{$pinjam->tgl_kembali}}" class="btn btn-warning btn-sm"><span class="fa fa-arrow-left"></span>&nbsp;Balik</a></div>
						<div class="modal face" id="{{$pinjam->status}}{{$pinjam->tgl_pinjam}}{{$pinjam->tgl_kembali}}">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"&times;></button>
									</div>
									<div class="modal-body">
										<table class="table table-bordered">
											<tr>
												<th style="width: 50%">Nama Alat</th>
												<th style="width: 10%">Jumlah</th>
												<th style="width: 30%">Keterangan</th>
											</tr>
											@foreach ($detail->where('tgl_pinjam',$pinjam->tgl_pinjam)->where('tgl_kembali',$pinjam->tgl_kembali)->where('status',$pinjam->status) as $tampil)
											<tr>
												<td>{{$tampil->nama_alat}}</td>
												<td><center>{{$tampil->jumlah}}</center></td>
												<td>{{$tampil->keterangan}}</td>
												</tr>
											@endforeach
										</table>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
				@elseif($pinjam->status =='Terima')
				<tr class="warning">
					<td>{{$pinjam->tgl_pinjam}}</td>
					<td>{{$pinjam->tgl_kembali}}</td>
					<td>{{$pinjam->kegunaan}}</td>
					<td>{{$pinjam->status}}</td>
					<td>
						<div><a href="#{{$pinjam->status}}{{$pinjam->tgl_pinjam}}{{$pinjam->tgl_kembali}}" data-toggle="modal" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span>&nbsp;Detail</a>
						<a href="" class="btn btn-danger disabled btn-sm"><span class="fa fa-print"></span>&nbsp;Cetak</a></div>
						<div class="modal face" id="{{$pinjam->status}}{{$pinjam->tgl_pinjam}}{{$pinjam->tgl_kembali}}">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"&times;></button>
									</div>
									<div class="modal-body">
										<table class="table table-bordered">
											<tr>
												<th style="width: 50%">Nama Alat</th>
												<th style="width: 10%">Jumlah</th>
												<th style="width: 30%">Keterangan</th>
											</tr>
											@foreach ($detail->where('tgl_pinjam',$pinjam->tgl_pinjam)->where('tgl_kembali',$pinjam->tgl_kembali)->where('status',$pinjam->status) as $tampil)
											<tr>
												<td>{{$tampil->nama_alat}}</td>
												<td><center>{{$tampil->jumlah}}</center></td>
												<td>{{$tampil->keterangan}}</td>
												</tr>
											@endforeach
										</table>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
				@elseif($pinjam->status =='proses')
				<tr class="info">
					<td>{{$pinjam->tgl_pinjam}}</td>
					<td>{{$pinjam->tgl_kembali}}</td>
					<td>{{$pinjam->kegunaan}}</td>
					<td>{{$pinjam->status}}</td>
					<td>
						<div><a href="#{{$pinjam->status}}{{$pinjam->tgl_pinjam}}{{$pinjam->tgl_kembali}}" data-toggle="modal" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span>&nbsp;Detail</a>
						<a href="#cetak{{$pinjam->tgl_pinjam}}{{$pinjam->tgl_kembali}}" data-toggle="modal" class="btn btn-success btn-sm"><span class="fa fa-print"></span>&nbsp;Cetak</a></div>
						<div class="modal face" id="{{$pinjam->status}}{{$pinjam->tgl_pinjam}}{{$pinjam->tgl_kembali}}">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"&times;></button>
									</div>
									<div class="modal-body">
										<table class="table table-bordered">
											<tr>
												<th style="width: 50%">Nama Alat</th>
												<th style="width: 10%">Jumlah</th>
												<th style="width: 30%">Keterangan</th>
											</tr>
											@foreach ($detail->where('tgl_pinjam',$pinjam->tgl_pinjam)->where('tgl_kembali',$pinjam->tgl_kembali)->where('status',$pinjam->status) as $tampil)
											<tr>
												<td>{{$tampil->nama_alat}}</td>
												<td><center>{{$tampil->jumlah}}</center></td>
												<td>{{$tampil->keterangan}}</td>
												</tr>
											@endforeach
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="modal face" id="cetak{{$pinjam->tgl_pinjam}}{{$pinjam->tgl_kembali}}">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"&times;></button>
										<h4>Cetak Surat</h4>
									</div>
									<div class="modal-body">
										<form action="/user/cetak/alat/{{$pinjam->tgl_pinjam}}/{{$pinjam->tgl_kembali}}" method="post">
											<label>Judul</label><p><textarea class="form-control" name="judul" required></textarea></p>
											<label>Dosen Pembimbing 1</label><p><input type="text" name="dosen1" class="form-control" required></p>
											<label>Dosen Pembimbing 2</label><p><input type="text" name="dosen2" class="form-control" required></p>
											<input name="_method" type="hidden" value="PUT">
											{{csrf_field()}}
											<p><input type="submit" name="submit" class="form-control btn btn-success" value="cetak" ></p>
										</form>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
				@else
				<tr class="danger">
					<td>{{$pinjam->tgl_pinjam}}</td>
					<td>{{$pinjam->tgl_kembali}}</td>
					<td>{{$pinjam->kegunaan}}</td>
					<td>{{$pinjam->status}}</td>
					<td>
						<div><a href="#status{{$pinjam->tgl_pinjam}}{{$pinjam->tgl_kembali}}" data-toggle="modal" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span>&nbsp;Detail</a>
						<a href="" class="btn btn-danger disabled btn-sm"><span class="fa fa-print"></span>&nbsp;Cetak</a></div>
						<div class="modal face" id="status{{$pinjam->tgl_pinjam}}{{$pinjam->tgl_kembali}}">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"&times;></button>
									</div>
									<div class="modal-body">
										<table class="table table-bordered">
											<tr>
												<th style="width: 50%">Nama Alat</th>
												<th style="width: 10%">Jumlah</th>
												<th style="width: 30%">Keterangan</th>
											</tr>
											@foreach ($detail->where('tgl_pinjam',$pinjam->tgl_pinjam)->where('tgl_kembali',$pinjam->tgl_kembali)->where('status',$pinjam->status) as $tampil)
											<tr>
												<td>{{$tampil->nama_alat}}</td>
												<td><center>{{$tampil->jumlah}}</center></td>
												<td>{{$tampil->keterangan}}</td>
												</tr>
											@endforeach
										</table>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
		<center>
			{{-- <div>
				<a href="/user/alat/kembali" style="font-size: 15px;" class="label label-danger"><span class="fa fa-arrow-left"></span>&nbsp;Kembalikan</a>
				<a href="/user/alat/cetak/"></a>
			</div> --}}
		</center>
	</div>
	<div class="col-sm-6">
		<h4><i class="fa fa-home"></i>&nbsp;Peminjaman Ruangan</h4>
		<div class="row">
			<div class="col-sm-4">
				<select id="Truang" onchange="ruang()" class="form-control">
				  <option value="Semua">Semua
				  <option value="Proses">Proses
				  <option value="Setuju">Setuju
				  <option value="Batal">Dibatalkan
				</select>
			</div>
			<p id="demo"></p>
		</div>
			<div style="padding-bottom: 0.5cm"></div>
					<table class="table table-condensed " id="Tuang">
						<thead>
							<tr class="info">
								<th style="width: 40%"><label>Tanggal Pinjam</label></th>
								<th style="width: 20%"><label>Kegunaan</label></th>
								<th style="width: 20%"><label>Status</label></th>
								<th style="width: 20%"><label>Cetak</label></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($ruang as $ruang)
							@if ($ruang->status == 'setuju')
								<tr class="success">
									<td>{{$ruang->tgl_pinjam}}</td>
									<td>{{$ruang->kegunaan}}</td>
									<td>{{$ruang->status}}</td>
									<td><a class="btn btn-danger disabled" href="/user/cetak/ruang/{{$ruang->tgl_pinjam}}"><span class="glyphicon glyphicon-print">&nbsp;Cetak</span></a></td>
								</tr>
							@elseif($ruang->status == 'proses')
								<tr class="warning">
									<td>{{$ruang->tgl_pinjam}}</td>
									<td>{{$ruang->kegunaan}}</td>
									<td>{{$ruang->status}}</td>
									<td><a class="btn btn-success" href="/user/cetak/ruang/{{$ruang->tgl_pinjam}}/{{$ruang->kegunaan}}"><span class="glyphicon glyphicon-print">&nbsp;Cetak</span></a></td>
								</tr>
							@else
								<tr class="danger">
									<td>{{$ruang->tgl_pinjam}}</td>
									<td>{{$ruang->kegunaan}}</td>
									<td>{{$ruang->status}}</td>
									<td><a class="btn btn-danger disabled" href="/user/cetak/ruang/{{$ruang->tgl_pinjam}}"><span class="glyphicon glyphicon-print">&nbsp;Cetak</span></a></td>
								</tr>
							@endif
								
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
<script>
		function Talat(input) {
  var input, filter, table, tr, td, i;
  input;
  
  table = document.getElementById("alat");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      if (td.innerHTML.indexOf(input) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
	function alat() {
			var x = document.getElementById("pAlat").value;
			 if (x == "Semua") {
			 	Talat("");
			 }else if (x == "Terima") {
			 	Talat("Terima");
			 }else if(x == "Belum"){
			 	Talat("proses");
			 }else if(x == "Pinjam"){
			 	Talat("belum");
			 }else if(x == "Kembali"){
			 	Talat("Kembali");
			 }else if(x == "Sudah"){
			 	Talat("setuju");
			 }else if(x == "batal"){
			 	Talat("tal");
			 }
		}
		
		function Truang(input) {
		  var input, filter, table, tr, td, i;
		  input;
		  
		  table = document.getElementById("Tuang");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
		    td = tr[i].getElementsByTagName("td")[2];
		    if (td) {
		      if (td.innerHTML.indexOf(input) > -1) {
		        tr[i].style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
		    }       
		  }
		}
		function ruang() {
			var x = document.getElementById("Truang").value;
			// document.getElementById("demo").innerHTML = "You selected: " + x;
			 if (x == "Semua") {
			 	Truang("");
			 	// document.getElementById("demo").innerHTML = "You selected: " + x;
			 }else if (x == "Setuju") {
			 	Truang("setuju");
			 	// document.getElementById("demo").innerHTML = "You selected: " + x;
			 }else if(x == "Proses"){
			 	Truang("proses");
			 	// document.getElementById("demo").innerHTML = "You selected: " + x;
			 }else if(x == "Batal"){
			 	Truang("batal");
			 	// document.getElementById("demo").innerHTML = "You selected: " + x;
			 }
			 // document.getElementById("demo").innerHTML = "You selected: " + x;
		}
	</script>
@endsection
@section('login')
{{$user->nama}}
@endsection
@endif
