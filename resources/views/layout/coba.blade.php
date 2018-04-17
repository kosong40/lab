<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	{{-- @extends('layout.bs') --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{url("bs/css/user.css")}}">
	{{-- <link rel="stylesheet" href="{{url('bs/css/style3.css')}}"> --}}
	<link rel="stylesheet" href="{{url('calendar/fullcalendar.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url("bs/fa/css/font-awesome.min.css")}}">
</head>
<body>
	<div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>@yield('brand')</h3>
                    {{-- <h3>cob</h3> --}}
                    <strong><i class="glyphicon glyphicon-education"></i></strong><br>
                {{-- </div> --}}
                {{-- <div class="sidebar-header"> --}}

                    <h3 style="font-size: 15px">@yield('login')</h3>
                    <strong><i class="glyphicon glyphicon-user"></i></strong>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="#lab" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-wrench"></i>
                            Peralatan Lab
                        </a>
                        <ul class="collapse list-unstyled" id="lab">
                            <li><a href="/user/alat"><i class="glyphicon glyphicon-briefcase"></i>&nbsp;Alat</a></li>
                            <li><a href="/user/meja"><i class="glyphicon glyphicon-blackboard"></i>&nbsp;Meja</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/user/ruangan">
                            <i class="glyphicon glyphicon-home"></i>
                            Ruangan
                        </a>
                    </li>
                    <li>
                        <a href="/user/pengaturan">
                            <i class="glyphicon glyphicon-cog"></i>
                            Pengaturan
                        </a>
                    </li>
                    <li>
                        <a href="#keluar" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-log-out"></i>
                            Keluar
                        </a>
                        <ul class="collapse list-unstyled" id="keluar">
                            <li><a href="/user/logout"><i class="glyphicon glyphicon-ok"></i>&nbsp;Ya</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-remove"></i>&nbsp;Tidak</a></li>
                        </ul>
                    </li>
                </ul>


            </nav>
	<div id="content">
		<button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn">
           <i class="glyphicon glyphicon-th-list"></i>
           &nbsp;Geser
        </button>
        <a type="button" href="/user" class="btn btn-success navbar-btn"><i class="glyphicon glyphicon-home"></i>&nbsp;Halaman Utama</a>
        @yield('head')
        @yield('content')
        </div>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				 <script src="{{url('calendar/lib/jquery.min.js')}}"></script>
				 <script src="{{url('calendar/lib/moment.min.js')}}"></script>
				 {{-- <script src="{{url('calendar/locale/id.js')}}"></script> --}}
				 <script src="{{url('calendar/locale-all.js')}}"></script>
				 <script src="{{url('calendar/fullcalendar.js')}}"></script>
				 <script src="{{url('js/ckeditor/ckeditor.js')}}"></script>
				 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script> --}}
         <script type="text/javascript">
             $(document).ready(function () {
							 // var initialLocaleCode = 'id';
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });

								 $('#calendar').fullCalendar({

									 header: {
							      right: 'prev,next today',
							      center: 'title',
							      left: 'listDay,listWeek,month'
							    },
							    views: {
							      listDay: { buttonText: 'list day' },
							      listWeek: { buttonText: 'list week' }
							    },
									// locale: initialLocaleCode,
									locale: 'id',
							    defaultView: 'month',
							    defaultDate: '{{date('Y-m-d')}}',
							    navLinks: true, // can click day/week names to navigate views
							    editable: true,
							    eventLimit: true,
									events: [
							      {
											title: 'My Event',
										 start: '2018-01-01',
										 description: 'This is a cool event'
							      }
									]

								 });
             });
         </script>
</body>
</html>
