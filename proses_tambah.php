<?php

session_start();
include "../../model/koneksi.php";

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

mysqli_query($conn,"
INSERT INTO tabel_user
(
nama,
username,
password,
level
)
VALUES
(
'$nama',
'$username',
'$password',
'$level'
)
");

if(isset($_SESSION['id_user'])){

    mysqli_query($conn,"
    INSERT INTO log_aktivitas
    (
    id_user,
    aktivitas,
    tanggal
    )
    VALUES
    (
    '".$_SESSION['id_user']."',
    'Menambah data user',
    NOW()
    )
    ");

}

header("Location:view_user_tampil.php");
exit();

?>