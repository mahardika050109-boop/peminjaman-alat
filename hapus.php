<?php

session_start();
include "../../model/koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,"
DELETE FROM tabel_user
WHERE id_user='$id'
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
'Menghapus data user',
NOW()
)
");

header("Location:view_user_tampil.php");
exit();

?>