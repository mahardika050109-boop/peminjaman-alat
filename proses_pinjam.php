<?php
session_start();
include "../../model/koneksi.php";

$id_user = $_SESSION['id_user'];

$id_alat = $_POST['id_alat'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];

mysqli_query($conn,"
INSERT INTO peminjaman
(
id_user,
tanggal_pinjam,
tanggal_kembali,
status
)
VALUES
(
'$id_user',
'$tanggal_pinjam',
'$tanggal_kembali',
'Menunggu'
)
");

$id_peminjaman = mysqli_insert_id($conn);

mysqli_query($conn,"
INSERT INTO detail_peminjaman
(
id_peminjaman,
id_alat,
jumlah
)
VALUES
(
'$id_peminjaman',
'$id_alat',
'1'
)
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
'$id_user',
'Mengajukan peminjaman alat',
NOW()
)
");

header("Location: ../../dashboard_peminjam.php");
exit;
?>