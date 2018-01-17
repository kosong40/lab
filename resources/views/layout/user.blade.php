<head>
	@extends('layout.bs')
	<link type="shortcut icon" href="{{url('bs/img/favicon.ico')}}">
</head>

<nav class="navbar navbar-inverse" role="navigation">
</nav>

<div class="modal fade" id="modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ini Notifikasi</h4>
        </div>
        <div class="modal-body">
          <p>Apakah jadi Keluar</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
          <a href="/user/logout" class="btn btn-danger">Jadi</a>
        </div>
      </div>
      
    </div>
  </div>
  <body>
  @yield('form_login')	
  </body>
