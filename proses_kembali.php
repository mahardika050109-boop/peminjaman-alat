<?php

include "../../model/koneksi.php";

$id_peminjam = $_POST['id_peminjam'];
$tanggal = $_POST['tanggal_pengembalian'];

mysqli_query($conn,"
INSERT INTO tabel_pengembalian
(
id_peminjam,
tanggal_pengembalian,
kondisi_pengembalian,
status,
denda
)
VALUES
(
'$id_peminjam',
'$tanggal',
'Baik',
'Dikembalikan',
'0'
)
");

header("Location: ../../dashboard_peminjam.php");
exit;
?>