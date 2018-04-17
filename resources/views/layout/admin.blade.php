<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {{-- buat sidebarnya --}}
    <link rel="stylesheet" type="text/css" href="{{url("bs/css/admin.css")}}">
    <title>Admin</title>
    {{-- ikon web --}}
    <link rel="shortcut icon" type="image/x-icon" href="">
    <link rel="stylesheet" type="text/css" href="{{url("bs/fa/css/font-awesome.min.css")}}">
</head>
<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Admin : @yield('admin')</h3>
                <strong><i class="glyphicon glyphicon-lock"></i></strong>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="/admin/user">
                        <i class="glyphicon glyphicon-user"></i>
                        Peminjam
                    </a>
                </li>
                <li>
                    <a href="#lab" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-wrench"></i>
                        Peralatan Lab
                    </a>
                    <ul class="collapse list-unstyled" id="lab">
                        <li><a href="/admin/alat"><i class="glyphicon glyphicon-briefcase"></i>Alat</a></li>
                        <li><a href="/admin/meja"><i class="fa fa-table"></i>Meja</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/admin/ruang">
                        <i class="glyphicon glyphicon-home"></i>
                        Ruang Lab
                    </a>
                </li>
                <li>
                   <a href="/admin/pengaturan">
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
                        <li><a href="/admin/logout"><i class="glyphicon glyphicon-ok"></i>Ya</a></li>
                        <li><a href="/admin/home"><i class="glyphicon glyphicon-remove"></i>Tidak</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="content">
            <button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn">
                <i class="glyphicon glyphicon-th-list"></i>
                Geser
            </button>
            <a type="button" href="/admin/home" class="btn btn-info">
                <i class="glyphicon glyphicon-home"></i>
                Halaman Utama
            </a>
            <!-- isi konten -->
            @yield('konten')
        </div>
    </div>
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
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
