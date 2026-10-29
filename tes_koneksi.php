<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "TES 1 <br>";

include "model/koneksi.php";

echo "TES 2 <br>";

if($conn){
    echo "Koneksi Berhasil";
}else{
    echo "Koneksi Gagal";
}

?>