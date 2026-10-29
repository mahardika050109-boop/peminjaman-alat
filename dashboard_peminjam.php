<?php
session_start();

if(!isset($_SESSION['level'])){
    header("Location: login.php");
    exit;
}

if($_SESSION['level'] != "peminjam"){
    header("Location: login.php");
    exit;
}

include "model/koneksi.php";

$total_alat = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM tabel_alat")
);

$id_user = $_SESSION['id_user'];

$total_pinjam = mysqli_num_rows(
mysqli_query($conn,"
SELECT * FROM peminjaman
WHERE id_user='$id_user'
")
);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard Peminjam</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#eef5ff;
padding-bottom:90px;
}

.header{
background:linear-gradient(135deg,#2563eb,#60a5fa);
padding:25px;
color:white;
border-radius:0 0 35px 35px;
box-shadow:0 8px 20px rgba(37,99,235,.3);
}

.logo{
font-size:24px;
font-weight:bold;
}

.sub{
font-size:13px;
opacity:.9;
}

.welcome{
margin-top:20px;
}

.welcome h1{
font-size:18px;
}

.welcome h2{
font-size:34px;
}

.stat{
padding:15px;
display:grid;
gap:15px;
}

.box{
background:white;
padding:20px;
border-radius:20px;
box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.box h3{
font-size:14px;
color:#666;
margin-bottom:10px;
}

.box span{
font-size:36px;
font-weight:bold;
color:#2563eb;
}

.banner{
margin:15px;
padding:20px;
border-radius:20px;
background:linear-gradient(135deg,#2563eb,#3b82f6);
color:white;
}

.menu{
padding:15px;
}

.judul{
font-size:22px;
font-weight:bold;
margin-bottom:15px;
color:#2563eb;
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
text-decoration:none;
color:#333;
box-shadow:0 5px 15px rgba(0,0,0,.08);
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
box-shadow:0 5px 15px rgba(0,0,0,.08);
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
font-size:22px;
text-decoration:none;
}

</style>
</head>

<body>

<div class="header">

<div class="logo">
🙋 Dashboard Peminjam
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
<h3>Total Alat</h3>
<span><?= $total_alat; ?></span>
</div>

<div class="box">
<h3>Peminjaman Saya</h3>
<span><?= $total_pinjam; ?></span>
</div>

</div>

<div class="banner">
<h2>Peminjaman Alat</h2>
<p>Ajukan peminjaman dan lakukan pengembalian alat dengan mudah.</p>
</div>

<div class="menu">

<div class="judul">
Menu Peminjam
</div>

<div class="grid">

<a href="view/peminjaman/daftar_alat.php" class="card">
<div class="icon">🧰</div>
<h4>Daftar Alat</h4>
</a>

<a href="view/peminjaman/view_peminjaman_tambah.php" class="card">
<div class="icon">📝</div>
<h4>Ajukan Peminjaman</h4>
</a>

<a href="view/pengembalian/view_pengembalian_tambah.php" class="card">
<div class="icon">🔄</div>
<h4>Pengembalian</h4>
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
🧰 Lihat daftar alat yang tersedia.
</div>

<div class="list">
📝 Ajukan peminjaman alat yang dibutuhkan.
</div>

<div class="list">
🔄 Lakukan pengembalian setelah selesai menggunakan alat.
</div>

</div>

<div class="bottom">

<a href="dashboard_peminjam.php">🏠</a>

<a href="view/peminjaman/daftar_alat.php">🧰</a>

<a href="view/peminjaman/view_peminjaman_tambah.php">📝</a>

<a href="logout.php">🚪</a>

</div>

</body>
</html>