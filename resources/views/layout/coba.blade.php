<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	{{-- @extends('layout.bs') --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{url("bs/css/user.css")}}">
</head>
<body>
	<div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>@yield('brand')</h3>
                    <strong><i class="glyphicon glyphicon-education"></i></strong><br>
                {{-- </div> --}}
                {{-- <div class="sidebar-header"> --}}
                    
                    <a href="/user/profil">
                    <h3 style="font-size: 15px">@yield('login')</h3>
                    <strong><i class="glyphicon glyphicon-user"></i></strong>
                    </a>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="/user/alat">
                            <i class="glyphicon glyphicon-wrench"></i>
                            Peralatan Lab
                        </a>
                    </li>
                    <li>
                        <a href="#">
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
        <a type="button" href="/user" class="btn btn-success navbar-btn"><i class="glyphicon glyphicon-home"></i>&nbsp;Home</a>
        @yield('head')
        @yield('content')           
        </div>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
</body>
</html>