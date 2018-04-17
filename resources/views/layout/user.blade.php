<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Sistem Informasi Lab Sistem Tertanam dan Robotika">
        <meta name="keywords" content="SI Lab Embedded Undip">
        <meta name="author" content="Muchammad Dwi Cahyo Nugroho">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="{{ url('img/logo.png') }}" sizes="32x32">
        @yield("css")
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('bs/css/style_user.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" type="text/css" href="{{url("bs/fa/css/font-awesome.min.css")}}">
				<link rel="stylesheet" href="{{url('calendar/fullcalendar.css')}}">
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <script src="{{url('calendar/lib/jquery.min.js')}}"></script>
         <script src="{{url('calendar/lib/moment.min.js')}}"></script>
         <script src="{{url('calendar/locale-all.js')}}"></script>
         <script src="{{url('calendar/fullcalendar.js')}}"></script>
         <script src="{{url('js/ckeditor/ckeditor.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    </head>
    <style>
  body
  {
    background-color: #B3E5FC;
  }

  
</style>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div id="dismiss">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                </div>
                <div class="sidebar-header">
                    <h3>@yield('brand')</h3>
										<h3 style="font-size: 15px">@yield('login')</h3>
                </div><ul class="list-unstyled components">
                    <li>
                      <a href="#lab" data-toggle="collapse" aria-expanded="false">
                          <i class="glyphicon glyphicon-wrench"></i>
                          Peralatan Lab
                      </a>
                      <ul class="collapse list-unstyled" id="lab">
                          <li><a href="/user/alat"><i class="glyphicon glyphicon-briefcase pull-right"></i>&nbsp;Alat</a></li>
                          <li><a href="/user/meja"><i class="fa fa-table pull-right"></i>&nbsp;Meja</a></li>
                      </ul>
                    </li>
                    <li>
                      <a href="/user/ruangan">
                          <i class="glyphicon glyphicon-home"></i>
                          Ruang Lab
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
                            <li><a href="/user/logout"><i class="glyphicon glyphicon-ok pull-right"></i>&nbsp;Ya</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-remove pull-right"></i>&nbsp;Tidak</a></li>
                        </ul>
                    </li>
                </ul>


            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container">
                        <div class="navbar-header">
													<button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn">
														 <i class="glyphicon glyphicon-th-list"></i>
														 &nbsp;Navigasi
													</button>
                            <a type="button" href="/user" class="btn btn-info">
                                <i class="glyphicon glyphicon-home"></i>
                                Halaman Utama
                            </a>
														@yield('head')
                          </div>
                          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <ul class="nav navbar-nav navbar-right">
                                @yield('pengguna')
                              </ul>
                          </div>
                        </div>
                </nav>
                <div class="container">

       
									@yield('content')
                </div>
            </div>
        </div>



        <div class="overlay"></div>
 
<script>
  $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#dismiss, .overlay').on('click', function () {
                    $('#sidebar').removeClass('active');
                    $('.overlay').fadeOut();
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').addClass('active');
                    $('.overlay').fadeIn();
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });
</script> 
   
    </body>
    @yield("script")  
</html>
