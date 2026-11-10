<?php

$host = "127.0.0.1";
$user = "root";
$pass = "root";
$db   = "peminjaman_alat";

$conn = mysqli_connect($host,$user,$pass,$db);

if(!$conn){
    die("Koneksi Gagal : ".mysqli_connect_error());
}

?>