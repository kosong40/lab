<!DOCTYPE html>
<html>
<head>
  <title>Coba Upload CSV</title>
</head>
<body>
<form action="/upload" enctype="multipart/form-data" method="">
  <input type="file" name="csv" required>
  <input name="_method" type="hidden" value="PUT">
  {{csrf_field()}}
  <input type="submit" name="" value="Simpan">
</form>
</body>
</html>