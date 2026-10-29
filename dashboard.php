<?php
session_start();

if(!isset($_SESSION['level'])){
    header("Location: login.php");
    exit;
}

if($_SESSION['level']!="admin"){

    if($_SESSION['level']=="petugas"){
        header("Location: dashboard_petugas.php");
        exit;
    }

    if($_SESSION['level']=="peminjam"){
        header("Location: dashboard_peminjam.php");
        exit;
    }

    header("Location: login.php");
    exit;
}

include "model/koneksi.php";

$total_alat = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tabel_alat"));
$total_user = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tabel_user"));
$total_pinjam = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM peminjaman"));
$total_kembali = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tabel_pengembalian"));
$total_kategori = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kategori"));

$aktivitas = mysqli_query($conn,"
SELECT *
FROM log_aktivitas
ORDER BY id_log DESC
LIMIT 5
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard Admin</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#eef7f8;
padding-bottom:100px;
}

.header{
background:linear-gradient(135deg,#14b8a6,#06b6d4);
padding:30px 20px 90px;
border-radius:0 0 40px 40px;
color:white;
}

.logo{
font-size:28px;
font-weight:bold;
}

.sub{
opacity:.9;
margin-top:5px;
}

.welcome{
margin-top:20px;
}

.welcome h3{
font-weight:400;
}

.welcome h1{
font-size:34px;
margin-top:5px;
}

.stat{
display:grid;
grid-template-columns:1fr 1fr;
gap:12px;
padding:15px;
margin-top:-55px;
}

.box{
background:white;
padding:18px;
border-radius:22px;
box-shadow:0 10px 25px rgba(0,0,0,.08);
text-align:center;
}

.box h4{
font-size:14px;
color:#666;
margin-bottom:10px;
}

.box span{
font-size:32px;
font-weight:bold;
color:#14b8a6;
}

.banner{
margin:15px;
padding:20px;
border-radius:25px;
background:linear-gradient(135deg,#14b8a6,#06b6d4);
color:white;
}

.banner h2{
margin-bottom:8px;
}

.menu{
padding:15px;
}

.judul{
font-size:22px;
font-weight:bold;
color:#0f172a;
margin-bottom:15px;
}

.grid{
display:grid;
grid-template-columns:repeat(2,1fr);
gap:15px;
}

.card{
background:white;
padding:20px;
border-radius:22px;
text-align:center;
text-decoration:none;
color:#333;
box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.icon{
font-size:38px;
margin-bottom:10px;
}

.card h4{
font-size:15px;
}

.aktivitas{
padding:15px;
}

.list{
background:white;
padding:15px;
border-radius:18px;
margin-bottom:12px;
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
box-shadow:0 -5px 15px rgba(0,0,0,.08);
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
🛠 Peminjaman Alat
</div>

<div class="sub">
Dashboard Administrator
</div>

<div class="welcome">
<h3>Selamat Datang</h3>
<h1><?= $_SESSION['nama']; ?></h1>
</div>

</div>

<div class="stat">

<div class="box">
<h4>Total Alat</h4>
<span><?= $total_alat; ?></span>
</div>

<div class="box">
<h4>Total User</h4>
<span><?= $total_user; ?></span>
</div>

<div class="box">
<h4>Total Peminjaman</h4>
<span><?= $total_pinjam; ?></span>
</div>

<div class="box">
<h4>Total Pengembalian</h4>
<span><?= $total_kembali; ?></span>
</div>

<div class="box">
<h4>Total Kategori</h4>
<span><?= $total_kategori; ?></span>
</div>

</div>

<div class="banner">
<h2>Sistem Peminjaman Alat</h2>
<p>Kelola data alat, peminjaman, pengembalian dan aktivitas sistem.</p>
</div>

<div class="menu">

<div class="judul">
Menu Utama
</div>

<div class="grid">

<a href="view/alat/view_alat_tampil.php" class="card">
<div class="icon">🧰</div>
<h4>Data Alat</h4>
</a>

<a href="view/user/view_user_tampil.php" class="card">
<div class="icon">👥</div>
<h4>Data User</h4>
</a>

<a href="view/peminjaman/view_peminjaman_tampil.php" class="card">
<div class="icon">📋</div>
<h4>Peminjaman</h4>
</a>

<a href="view/pengembalian/view_pengembalian_tampil.php" class="card">
<div class="icon">🔄</div>
<h4>Pengembalian</h4>
</a>

<a href="view/kategori/view_kategori_tampil.php" class="card">
<div class="icon">📁</div>
<h4>Kategori</h4>
</a>

<a href="view/log/view_log_tampil.php" class="card">
<div class="icon">📜</div>
<h4>Log Aktivitas</h4>
</a>

<a href="logout.php" class="card">
<div class="icon">🚪</div>
<h4>Logout</h4>
</a>

</div>

</div>

<div class="aktivitas">

<div class="judul">
Aktivitas Terbaru
</div>

<?php while($a=mysqli_fetch_array($aktivitas)){ ?>

<div class="list">
<b><?= $a['aktivitas']; ?></b><br>
<small><?= $a['tanggal']; ?></small>
</div>

<?php } ?>

</div>

<div class="bottom">

<a href="dashboard.php">🏠</a>
<a href="view/alat/view_alat_tampil.php">🧰</a>
<a href="view/peminjaman/view_peminjaman_tampil.php">📋</a>
<a href="logout.php">🚪</a>

</div>

</body>
</html>