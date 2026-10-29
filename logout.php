<?php
session_start();
include "model/koneksi.php";

$id_user = $_SESSION['id_user'];

mysqli_query($conn,"
INSERT INTO log_aktivitas
(
id_user,
aktivitas,
tanggal
)
VALUES
(
'$id_user',
'Logout dari sistem',
NOW()
)
");

session_destroy();

header("Location: login.php");
exit;
?>