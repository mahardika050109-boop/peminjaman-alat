<?php

session_start();
include "../../model/koneksi.php";

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

mysqli_query($conn,"
UPDATE tabel_user
SET
nama='$nama',
username='$username',
password='$password',
level='$level'
WHERE id_user='$id_user'
");

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
'Mengubah data user',
NOW()
)
");

header("Location:view_user_tampil.php");
exit();

?>