<?php
session_start();
include "../../model/koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,"
UPDATE peminjaman
SET status='Dikembalikan'
WHERE id_peminjaman='$id'
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
'Mengembalikan alat',
NOW()
)
");

}

header("Location: persetujuan.php");
exit;
?>