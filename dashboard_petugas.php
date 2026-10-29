<?php
session_start();

if(!isset($_SESSION['level'])){
    header("Location: login.php");
    exit;
}

if($_SESSION['level'] != "petugas"){
    header("Location: login.php");
    exit;
}

include "model/koneksi.php";

$total_peminjaman = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM peminjaman")
);

$total_pengembalian = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM tabel_pengembalian")
);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard Petugas</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#f4f8ff;
padding-bottom:90px;
}

.header{
background:linear-gradient(135deg,#0d47a1,#1976d2);
padding:25px;
color:white;
border-radius:0 0 35px 35px;
}

.logo{
font-size:26px;
font-weight:bold;
}

.sub{
font-size:14px;
opacity:.9;
}

.welcome{
margin-top:25px;
}

.welcome h1{
font-size:20px;
}

.welcome h2{
font-size:38px;
}

.stat{
display:grid;
grid-template-columns:1fr;
gap:12px;
padding:15px;
}

.box{
background:white;
padding:18px;
border-radius:18px;
box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.box h3{
font-size:15px;
color:#666;
}

.box span{
font-size:35px;
font-weight:bold;
color:#1976d2;
}

.banner{
margin:15px;
padding:20px;
border-radius:20px;
background:linear-gradient(135deg,#1976d2,#26c6da);
color:white;
}

.menu{
padding:15px;
}

.judul{
font-size:24px;
font-weight:bold;
margin-bottom:15px;
color:#0d47a1;
}

.grid{
display:grid;
grid-template-columns:repeat(2,1fr);
gap:15px;
}

.card{
background:white;
padding:20px;
border-radius:20px;
text-align:center;
box-shadow:0 3px 10px rgba(0,0,0,.08);
text-decoration:none;
color:#333;
}

.icon{
font-size:35px;
margin-bottom:10px;
}

.card h4{
font-size:15px;
}

.info{
padding:15px;
}

.list{
background:white;
padding:15px;
border-radius:15px;
margin-bottom:10px;
box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.bottom{
position:fixed;
bottom:0;
left:0;
right:0;
background:white;
display:flex;
justify-content:space-around;
padding:15px;
box-shadow:0 -3px 10px rgba(0,0,0,.08);
}

.bottom a{
text-decoration:none;
font-size:24px;
}

</style>
</head>
<body>

<div class="header">

<div class="logo">
👨‍💼 Dashboard Petugas
</div>

<div class="sub">
Sistem Peminjaman Alat
</div>

<div class="welcome">
<h1>Selamat Datang,</h1>
<h2><?= $_SESSION['nama']; ?></h2>
</div>

</div>

<div class="stat">

<div class="box">
<h3>Total Peminjaman</h3>
<span><?= $total_peminjaman; ?></span>
</div>

<div class="box">
<h3>Total Pengembalian</h3>
<span><?= $total_pengembalian; ?></span>
</div>

</div>

<div class="banner">
<h2>Panel Petugas</h2>
<p>Kelola persetujuan peminjaman dan pengembalian alat.</p>
</div>

<div class="menu">

<div class="judul">
Menu Petugas
</div>

<div class="grid">

<a href="view/peminjaman/persetujuan.php" class="card">
<div class="icon">✅</div>
<h4>Persetujuan</h4>
</a>

<a href="view/pengembalian/view_pengembalian_tampil.php" class="card">
<div class="icon">🔄</div>
<h4>Pengembalian</h4>
</a>

<a href="laporan.php" class="card">
<div class="icon">🖨️</div>
<h4>Cetak Laporan</h4>
</a>

<a href="logout.php" class="card">
<div class="icon">🚪</div>
<h4>Logout</h4>
</a>

</div>

</div>

<div class="info">

<div class="judul">
Informasi
</div>

<div class="list">
📋 Periksa dan setujui peminjaman yang masuk.
</div>

<div class="list">
🔄 Pantau seluruh data pengembalian alat.
</div>

<div class="list">
🖨️ Cetak laporan peminjaman dan pengembalian.
</div>

</div>

<div class="bottom">

<a href="dashboard_petugas.php">🏠</a>

<a href="view/peminjaman/persetujuan.php">✅</a>

<a href="view/pengembalian/view_pengembalian_tampil.php">🔄</a>

<a href="logout.php">🚪</a>

</div>

</body>
</html>