<?php
session_start();
include "../../model/koneksi.php";

$data = mysqli_query($conn,"
SELECT *
FROM peminjaman
WHERE id_user='".$_SESSION['id_user']."'
AND status='Disetujui'
");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Pengembalian Alat</title>

<style>

body{
background:#f0fdfa;
padding:15px;
font-family:Arial;
}

.card{
background:white;
padding:15px;
border-radius:15px;
margin-bottom:10px;
box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.btn{
display:inline-block;
background:#14b8a6;
color:white;
padding:8px 12px;
border-radius:8px;
text-decoration:none;
}

.kembali{
display:block;
text-align:center;
margin-top:15px;
text-decoration:none;
color:#0f766e;
font-weight:bold;
}

</style>

</head>
<body>

<h2>🔄 Pengembalian Alat</h2>

<?php while($row=mysqli_fetch_array($data)){ ?>

<div class="card">

ID Peminjaman :
<?= $row['id_peminjaman']; ?>

<br><br>

Tanggal Pinjam :
<?= $row['tanggal_pinjam']; ?>

<br><br>

<a
class="btn"
href="kembalikan.php?id=<?= $row['id_peminjaman']; ?>">
Kembalikan
</a>

</div>

<?php } ?>

<a href="../../dashboard_peminjam.php" class="kembali">
🏠 Kembali ke Dashboard
</a>

</body>
</html>