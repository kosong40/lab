<!DOCTYPE html>
<html>
<head>
	<link href="{{url('fullcalendar/fullcalendar.min.css')}}">
	<link href="{{url('fullcalendar/fullcalendar.print.min.css')}}">
	<script src="{{url('fullcalendar/fullcalendar.min.js')}}"></script>
	<script src="{{url('fullcalendar/lib/moment.min.js')}}"></script>
	<script src="{{url('fullcalendar/lib/jquery.min.js')}}"></script>
  <script src="{{url('calendar.js')}}"></script>
  <style>
  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size:14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>
<div id="calendar"></div>
</body>
</html>