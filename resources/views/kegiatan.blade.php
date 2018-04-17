@extends('layout.master')
@section('title','Kegiatan')
@section('login')
<li><a style="color: #37474F" href="/home/login" style="">Login <span class="glyphicon glyphicon-log-in"></span></a></li>
@endsection
{{-- @section('content')
  <div id='calendar'></div>
@endsection --}}

@section('content')
<center><h2>Ruang Laboratorium Sistem Tertanam dan Robotika</h2></center>
<div class="container container-fluid" style="margin-top:5%;margin-bottom: 3cm;">
		<div class="row">
      <div class="col-sm-offset-2 col-sm-8">
        <div class="thumbnail" id="calendar"></div>
      </div>
    </div>

		<script type="text/javascript">
	  	 $(document).ready(function () {
	  			 $('#calendar').fullCalendar({

	  				 header: {
	  					right: 'prev,next today',
	  					center: 'title',
	  					left: 'listWeek,listDay,month'
	  				},
	  				views: {
	  					listDay: { buttonText: 'list day' },
	  					listWeek: { buttonText: 'list week' }
	  				},
	  				// locale: initialLocaleCode,
	  				locale: 'id',
	  				defaultView: 'month',
	  				defaultDate: '{{date('Y-m-d')}}',
	  				navLinks: true,
	  				
	  				eventLimit: true,
	  				events: [
							@foreach ($pinjam->where('status','setuju') as $alat)


							{
								title: '{{$alat->nama.'\n'.$alat->username.'\n'.$alat->kegunaan.'\n'.$alat->keterangan}}',
								start  :'{{$alat->tgl_pinjam}}',
								description: '{{$alat->tema}}',
								@if ($alat->kegunaan == 'Praktikum')
									color: '#0288d1'
								@elseif($alat->kegunaan == 'Seminar KP')
									color: '#0097a7'
								@elseif($alat->kegunaan == 'Seminar TA')
									color: '#00796b'
								@elseif($alat->kegunaan == 'Penelitian')
									color: '#b71c1c'
								@endif
								
							},
							@endforeach
							@foreach ($prak as $prak)
							{
								title: '{{$prak->kegunaan.'\n'.$prak->tema.'\n'.$prak->keterangan}}',
								start: '{{$prak->tgl_pinjam}}',
								description: '{{$prak->keteragan}}',

								
								
							},
						@endforeach
	  				],
						// eventRender: function(event, element) {
        		// element.qtip({
            // content: event.description
        		// });
    				// }

	  			 });
	  	 });
	  </script>

@endsection
