@if($session =="")
<script>
	alert("Anda Belum Login");
	window.location.href = "/admin";
</script>
@else
@foreach($user as $user)
@extends('layout.baru')
@section('konten')

<center><h1>Daftar Peminjam</h1>
	<p>"{{$user->nama}}"</p>
	<ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#alat">Alat</a></li>
    <li><a data-toggle="pill" href="#ruang">Ruangan</a></li>
    <li><a data-toggle="pill" href="#meja">Meja</a></li>
  </ul>
</center>
<div class="tab-content">
	<div id="alat" class="tab-pane fade in active">
		<div>
			<p style="color:#030303;" align="center"><label>Alat Lab</label></p>
		</div>
		<div class="table-responsive">
			<table class="table table-hover" id="tabelAlat">
		  <thead>
		    <tr>
		      <th scope="col" style="width:15%;">NIM</th>
		      <th scope="col" style="width:25%;">NAMA</th>
		      <th scope="col" style="width:20%;">Tanggal Pinjam</th>
		      <th scope="col" style="width:20%;">Tanggal Kembali</th>
		      <th scope="col" style="width:20%;">status</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($peminjam_asli as $peminjam)
		    <tr>
		      <td>{{$peminjam->nim}}</td>
		      <td>{{$peminjam->nama}}</td>
		      <td>{{$peminjam->tgl_pinjam}}</td>
		      <td>{{$peminjam->tgl_kembali}}</td>
		      
						@if($peminjam->status == "proses")
							<td>
								<span class="label label-warning"><a href="/admin/user/pinjam/{{$peminjam->id}}/{{$peminjam->tgl_pinjam}}/{{$peminjam->tgl_kembali}}/alat">Setujui</a></span>
								<span class="label label-info"><a data-toggle="modal" data-target="#alat{{$peminjam->nim}}{{$peminjam->tgl_pinjam}}{{$peminjam->tgl_kembali}}">Detail</a></span>
								<span class="label label-danger"><a href="/admin/user/pinjam/{{$peminjam->id}}/{{$peminjam->tgl_pinjam}}/{{$peminjam->tgl_kembali}}/alat/batal">Dibatalkan</a></span>
							</td>
							<div class="modal fade" id="alat{{$peminjam->nim}}{{$peminjam->tgl_pinjam}}{{$peminjam->tgl_kembali}}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">{{$peminjam->nama}}</h4>
										</div>
										<div class="modal-body">
											<div style="margin-bottom: 1cm;">
												<h6>No HP: {{$peminjam->no_hp}}</h6>
												<h6>Alamat: {{$peminjam->alamat}}</h6>
											</div>
											<div>
												<h6>TANGGAL PINJAM &nbsp;: &nbsp;{{$peminjam->tgl_pinjam}}</h6>
												<h6>TANGGAL KEMBALI&nbsp;: &nbsp;{{$peminjam->tgl_kembali}}</h6>
												
											</div>
											<div class="modal-body">
												<h4>Daftar Alat:</h4>
												<div class="row" style="margin-top: 0.5cm;">
													<div class="col-sm-4">
														<label>Nama Alat</label>
													</div>
													<div class="col-sm-2">
														<label>Jumlah</label>
													</div>
													<div class="col-sm-6">
														<label>Keterangan</label>
													</div>
												</div>

												@foreach ($alat->where('nim',$peminjam->nim)->where('tgl_pinjam',$peminjam->tgl_pinjam)->where('tgl_kembali',$peminjam->tgl_kembali) as $a)
												{{-- <li>{{$a->nama_alat}}&nbsp;( {{$a->jumlah}} )&nbsp;&nbsp;&nbsp;{{$a->keterangan}}</li> --}}
												<div class="row">
													<div class="col-sm-4">
														{{$a->nama_alat}}
													</div>
													<div class="col-sm-2">
														&nbsp;&nbsp;{{$a->jumlah}}
													</div>
													<div class="col-sm-6">
														{{$a->keterangan}}
													</div>
												</div>
												@endforeach
											</div>
											
										</div>
										<div class="modal-footer">
											
										</div>
									</div>
								</div>
							</div>
						@elseif($peminjam->status == "belum")
							<td><span class="label label-success"><a href="">Proses Pinjam</a></span></td>
						@elseif($peminjam->status == "Batal")
							<td><span class="label label-danger"><a href="">Sudah dibatalkan</a></span></td>
						@elseif($peminjam->status == "setuju")
							<td><span class="label label-success"><a data-toggle="modal" data-target="#alat{{$peminjam->nim}}{{$peminjam->tgl_pinjam}}{{$peminjam->tgl_kembali}}">Lihat</a></span></td><br><br>
							<div class="modal fade" id="alat{{$peminjam->nim}}{{$peminjam->tgl_pinjam}}{{$peminjam->tgl_kembali}}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">{{$peminjam->nama}}</h4>
										</div>
										<div class="modal-body">
											<div style="margin-bottom: 1cm;">
												<h6>No HP: {{$peminjam->no_hp}}</h6>
												<h6>Alamat: {{$peminjam->alamat}}</h6>
											</div>
											<div>
												<h6>TANGGAL PINJAM &nbsp;: &nbsp;{{$peminjam->tgl_pinjam}}</h6>
												<h6>TANGGAL KEMBALI&nbsp;: &nbsp;{{$peminjam->tgl_kembali}}</h6>
												
											</div>
											<div class="modal-body">
												<h4>Daftar Alat:</h4>
												<div class="row" style="margin-top: 0.5cm;">
													<div class="col-sm-4">
														<label>Nama Alat</label>
													</div>
													<div class="col-sm-2">
														<label>Jumlah</label>
													</div>
													<div class="col-sm-6">
														<label>Keterangan</label>
													</div>
												</div>

												@foreach ($alat->where('nim',$peminjam->nim)->where('tgl_pinjam',$peminjam->tgl_pinjam)->where('tgl_kembali',$peminjam->tgl_kembali) as $a)
												{{-- <li>{{$a->nama_alat}}&nbsp;( {{$a->jumlah}} )&nbsp;&nbsp;&nbsp;{{$a->keterangan}}</li> --}}
												<div class="row">
													<div class="col-sm-4">
														{{$a->nama_alat}}
													</div>
													<div class="col-sm-2">
														&nbsp;&nbsp;{{$a->jumlah}}
													</div>
													<div class="col-sm-6">
														{{$a->keterangan}}
													</div>
												</div>
												@endforeach
											</div>
											
										</div>
										<div class="modal-footer">
											
										</div>
									</div>
								</div>
							</div>

						@elseif($peminjam->status == "Proses Kembali")
							<td>
								<span class="label label-primary"><a href="/user/alat/terima/{{$peminjam->id}}/{{$peminjam->tgl_pinjam}}/{{$peminjam->tgl_kembali}}">Terima Alat</a></span>
							</td>
						@else
							<td><span class="label label-success"><a data-toggle="modal" data-target="#alat{{$peminjam->nim}}{{$peminjam->tgl_pinjam}}{{$peminjam->tgl_kembali}}">Terima</a></span></td>
							<div class="modal fade" id="alat{{$peminjam->nim}}{{$peminjam->tgl_pinjam}}{{$peminjam->tgl_kembali}}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">{{$peminjam->nama}}</h4>
										</div>
										<div class="modal-body">
											<div style="margin-bottom: 1cm;">
												<h6>No HP: {{$peminjam->no_hp}}</h6>
												<h6>Alamat: {{$peminjam->alamat}}</h6>
											</div>
											<div>
												<h6>TANGGAL PINJAM &nbsp;: &nbsp;{{$peminjam->tgl_pinjam}}</h6>
												<h6>TANGGAL KEMBALI&nbsp;: &nbsp;{{$peminjam->tgl_kembali}}</h6>
												
											</div>
											<div class="modal-body">
												<h4>Daftar Alat:</h4>
												<div class="row" style="margin-top: 0.5cm;">
													<div class="col-sm-4">
														<label>Nama Alat</label>
													</div>
													<div class="col-sm-2">
														<label>Jumlah</label>
													</div>
													<div class="col-sm-6">
														<label>Keterangan</label>
													</div>
												</div>

												@foreach ($alat->where('nim',$peminjam->nim)->where('tgl_pinjam',$peminjam->tgl_pinjam)->where('tgl_kembali',$peminjam->tgl_kembali) as $a)
												{{-- <li>{{$a->nama_alat}}&nbsp;( {{$a->jumlah}} )&nbsp;&nbsp;&nbsp;{{$a->keterangan}}</li> --}}
												<div class="row">
													<div class="col-sm-4">
														{{$a->nama_alat}}
													</div>
													<div class="col-sm-2">
														&nbsp;&nbsp;{{$a->jumlah}}
													</div>
													<div class="col-sm-6">
														{{$a->keterangan}}
													</div>
												</div>
												@endforeach
											</div>
										</div>
										<div class="modal-footer">
											
										</div>
										</div>
									</div>
								</div>
							
						@endif
		    </tr>
		    @endforeach
		  </tbody>
		  <tfoot>
		    <tr>
		      <th scope="col" style="width:15%;">NIM</th>
		      <th scope="col" style="width:25%;">NAMA</th>
		      <th scope="col" style="width:20%;">Tanggal Pinjam</th>
		      <th scope="col" style="width:20%;">Tanggal Kembali</th>
		      <th scope="col" style="width:20%;">status</th>
		    </tr>
		  </tfoot>
		</table>
	</div>
	
	</div>
	<div id="ruang" class="tab-pane fade">
		<div>
			<p style="color:#030303;" align="center"><label>Ruang</label></p>
		</div>
		<table class="table table-hover" id="tabelRuang">
			<thead>
			<tr>
		      <th scope="col" style="width:10%;">NIM</th>
		      <th scope="col" style="width:30%;">NAMA</th>
		      <th scope="col" style="width:20%;">Kegunaan</th>
		      <th scope="col" style="width:20% ">Tanggal</th>
		      <th scope="col" style="width:20%;">status</th>
		    </tr>
		    </thead>
		    <tbody>
		    @foreach ($ruang as $ruang)
		    	<tr>
		    		<td>{{$ruang->username}}</td>
		    		<td>{{$ruang->nama}}</td>
		    		<td>{{$ruang->kegunaan}}</td>
		    		<td>{{$ruang->tgl_pinjam}}</td>
		    		@if($ruang->status == "proses")
							<td>
								<span class="label label-warning"><a href="/admin/user/pinjam/{{$ruang->username}}/{{$ruang->tgl_pinjam}}/{{$ruang->kegunaan}}/ruang">Setujui</a></span>
								<span class="label label-info"><a href="" data-toggle="modal" data-target="#ruang{{$ruang->username}}{{$ruang->tgl_pinjam}}">Detail</a></span>
								<a href="{{$ruang->ktm}}"><span class="label label-success">Lihat Ktm</span></a>
								<div class="modal fade" id="ruang{{$ruang->username}}{{$ruang->tgl_pinjam}}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">{{$ruang->nama}}</h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-sm-4">
													<label>Nama</label><br>
													<label>NIM</label><br>
													<label>Nomor HP</label><br>
													<label>Kegunaan</label><br>
													<label>Tanggal Penggunaan</label><br>
													<label>Keterangan</label>
												</div>
												<div class="col-sm-1">
													<label>:</label><br>
													<label>:</label><br>
													<label>:</label><br>
													<label>:</label><br>
													<label>:</label><br>
													<label>:</label>
												</div>
												<div class="col-sm-7">
													<label>{{$ruang->nama}}</label><br>
													<label>{{$ruang->username}}</label><br>
													<label>{{$ruang->no_hp}}</label><br>
													<label>{{$ruang->kegunaan}}</label><br>
													<label>{{$ruang->tgl_pinjam}}</label><br>
													<label>{{$ruang->keterangan}}</label>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											
										</div>
										</div>
									</div>
								</div>
							</td>
						@elseif($ruang->status == "belum")
							<td><span class="label label-success"><a href="">Proses Pinjam</a></span></td>
						@elseif($ruang->status == "Dibatalkan")
							<td><span class="label label-danger"><a href="">Dibatalkan</a></span></td>
						@else
							<td><span class="label label-info"><a href="" data-toggle="modal" data-target="#ruang{{$ruang->username}}{{$ruang->tgl_pinjam}}">Detail</a></span>
								<div class="modal fade" id="ruang{{$ruang->username}}{{$ruang->tgl_pinjam}}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">{{$ruang->nama}}</h4>
										</div>
										
										<div class="modal-body">
											<div class="row">
												<div class="col-sm-4">
													<label>Nama</label><br>
													<label>NIM</label><br>
													<label>Nomor HP</label><br>
													<label>Kegunaan</label><br>
													<label>Tanggal Penggunaan</label><br>
													<label>Keterangan</label>
												</div>
												<div class="col-sm-1">
													<label>:</label><br>
													<label>:</label><br>
													<label>:</label><br>
													<label>:</label><br>
													<label>:</label><br>
													<label>:</label>
												</div>
												<div class="col-sm-7">
													<label>{{$ruang->nama}}</label><br>
													<label>{{$ruang->username}}</label><br>
													<label>{{$ruang->no_hp}}</label><br>
													<label>{{$ruang->kegunaan}}</label><br>
													<label>{{$ruang->tgl_pinjam}}</label><br>
													<label>{{$ruang->keterangan}}</label>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											
										</div>
										</div>
									</div>
								</div></td><br><br>
						@endif
		    	</tr>
		    @endforeach
		</tbody>
		    <tfoot>
			<tr>
		      <th scope="col" style="width:10%;">NIM</th>
		      <th scope="col" style="width:30%;">NAMA</th>
		      <th scope="col" style="width:20%;">Kegunaan</th>
		      <th scope="col" style="width:20% ">Tanggal</th>
		      <th scope="col" style="width:20%;">status</th>
		    </tr>
		    </tfoot>
		</table>
		
</div>
<div id="meja" class="tab-pane fade">
	<div>
		<p style="color:#030303;" align="center"><label>Meja</label></p>
	</div>
	<div class="row">
		<div class="table-responsive">
			<div >
				<table class="table table-hover" id="tabelMeja">
			  <thead>
			    <tr>
			      <th scope="col"></th>
			      <th scope="col" style="width:30%;">Nomor Meja</th>
			      <th scope="col" style="width:50%;">Peminjam</th>
						<th scope="col" style="width:20%;">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
				@foreach ($meja as $meja)
					@if ($meja->nama =='')
						<tr>
						<td></td>
						<td>{{$meja->id}}</td>
						<td>Belum di Pinjam</td>
						<td><a class="label label-success">Kosong</a></td>
					</tr>
				@elseif($meja->status =='sudah')
						<tr>
							<td></td>
							<td>{{$meja->id}}</td>
							<td>{{$meja->nama}}&nbsp;({{$meja->username}})</td>
							<td>
								<div class="">
									<a href="/admin/meja/{{$meja->id}}/hapus" class="label label-danger">Batal</a>
								</div>
							</td>
						</tr>
					@else
					<tr>
						<td></td>
						<td>{{$meja->id}}</td>
						<td>{{$meja->nama}}&nbsp;({{$meja->username}})</td>
						<td>
							<div class="">
								<a href="/admin/meja/{{$meja->id}}/edit" class="label label-warning">Setujui</a>
								<a href="/admin/meja/{{$meja->id}}/hapus" class="label label-danger">Batal</a>
							</div>
						</td>
					</tr>
					@endif
				@endforeach
			</tbody>
			<tfoot>
			    <tr>
			      <th scope="col"></th>
			      <th scope="col" style="width:30%;">Nomor Meja</th>
			      <th scope="col" style="width:50%;">Peminjam</th>
						<th scope="col" style="width:20%;">Aksi</th>
			    </tr>
			  </tfoot>
			</table>
		</div>
		</div>
	</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
@endsection
@section('title','ini admin')
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
    $('#tabelAlat').DataTable({
    	
    });
    $('#tabelRuang').DataTable({
    	// dom: 'Bfrtip',
     //    buttons: [
     //        'csv', 'excel', 'pdf'
     //    ]
    });
    $('#tabelMeja').DataTable({
    	
    });
} );
</script>
@endsection

