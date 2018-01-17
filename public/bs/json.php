<?php

/* 
 * file untuk mengambil data dari database
 * dan mengubahnya ke format json
 * untuk ditampilkan di kalendar.
 */
// require 'koneksi.php';
$link = mysqli_connect('localhost','root','','si_lab');
$query = "SELECT * from ruangan ";
$result = mysqli_query($link, $query) or die(mysqli_error());

$arr = array();
while ($row = mysqli_fetch_assoc($result)) {
    $temp = array(
        "date" => $row["date"],       
        "title" => $row["title"],
        "description" => $row["description"]);

    array_push($arr, $temp);}
$data = json_encode($arr);
echo $data
        
?>