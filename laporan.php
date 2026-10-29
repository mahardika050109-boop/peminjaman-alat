<?php
session_start();

if(!isset($_SESSION['level'])){
    header("Location: login.php");
    exit;
}

include "model/koneksi.php";

$peminjaman = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM peminjaman")
);

$pengembalian = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM tabel_pengembalian")
);

$alat = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM tabel_alat")
);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Laporan</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#f4f8ff;
padding-bottom:30px;
}

.header{
background:linear-gradient(135deg,#0d47a1,#1976d2);
padding:25px;
color:white;
border-radius:0 0 35px 35px;
}

.header h2{
font-size:26px;
}

.header p{
margin-top:5px;
opacity:.9;
}

.container{
padding:15px;
}

.card{
background:white;
padding:20px;
border-radius:20px;
margin-bottom:15px;
box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.card h3{
color:#0d47a1;
margin-bottom:10px;
}

.total{
font-size:35px;
font-weight:bold;
color:#1976d2;
}

.btn{
display:block;
width:100%;
padding:15px;
text-align:center;
text-decoration:none;
border-radius:15px;
font-weight:bold;
margin-top:10px;
}

.cetak{
background:#1976d2;
color:white;
}

.kembali{
background:#64748b;
color:white;
}

</style>

</head>
<body>

<div class="header">
<h2>🖨️ Cetak Laporan</h2>
<p>Laporan Sistem Peminjaman Alat</p>
</div>

<div class="container">

<div class="card">
<h3>Total Alat</h3>
<div class="total">
<?= $alat; ?>
</div>
</div>

<div class="card">
<h3>Total Peminjaman</h3>
<div class="total">
<?= $peminjaman; ?>
</div>
</div>

<div class="card">
<h3>Total Pengembalian</h3>
<div class="total">
<?= $pengembalian; ?>
</div>
</div>

<div class="card">

<h3>Pilih Laporan</h3>

<a href="laporan_peminjaman.php"
class="btn cetak">
📋 Cetak Laporan Peminjaman
</a>

<a href="laporan_pengembalian.php"
class="btn cetak">
🔄 Cetak Laporan Pengembalian
</a>

</div>

<a href="dashboard_petugas.php"
class="btn kembali">
← Kembali ke Dashboard
</a>

</div>

</body>
</html>