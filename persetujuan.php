<?php
ob_start();
session_start();

if(!isset($_SESSION['level'])){
    header("Location: ../../login.php");
    exit;
}

if($_SESSION['level'] != "petugas"){
    header("Location: ../../login.php");
    exit;
}

include "../../model/koneksi.php";

$data = mysqli_query($conn,"
SELECT p.*,u.nama
FROM peminjaman p
LEFT JOIN tabel_user u
ON p.id_user=u.id_user
ORDER BY p.id_peminjaman DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Persetujuan Peminjaman</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#f4f7fb;
padding-bottom:30px;
}

.header{
background:linear-gradient(135deg,#009688,#26c6da);
padding:25px;
border-radius:0 0 30px 30px;
color:white;
margin-bottom:20px;
}

.container{
padding:15px;
}

.card{
background:white;
padding:18px;
border-radius:18px;
margin-bottom:15px;
box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.nama{
font-size:18px;
font-weight:bold;
color:#009688;
margin-bottom:10px;
}

.info{
margin-bottom:8px;
color:#444;
}

.btn{
display:inline-block;
padding:10px 15px;
border-radius:10px;
text-decoration:none;
color:white;
font-weight:bold;
margin-top:10px;
margin-right:5px;
}

.setujui{
background:#22c55e;
}

.kembali-alat{
background:#0ea5e9;
}

.status{
margin-top:10px;
padding:12px;
border-radius:12px;
font-weight:bold;
text-align:center;
}

.sukses{
background:#dcfce7;
color:#166534;
}

.info-status{
background:#dbeafe;
color:#1e40af;
}

.selesai{
background:#ede9fe;
color:#6d28d9;
}

.kembali{
display:block;
text-align:center;
margin-top:20px;
background:#64748b;
padding:14px;
border-radius:12px;
color:white;
text-decoration:none;
font-weight:bold;
}

</style>
</head>

<body>

<div class="header">
<h2>✅ Persetujuan Peminjaman</h2>
<p>Kelola permintaan peminjaman alat</p>
</div>

<div class="container">

<?php while($row=mysqli_fetch_array($data)){ ?>

<div class="card">

<div class="nama">
👤 <?= $row['nama']; ?>
</div>

<div class="info">
📋 ID Peminjaman :
<?= $row['id_peminjaman']; ?>
</div>

<div class="info">
📅 Tanggal Pinjam :
<?= $row['tanggal_pinjam']; ?>
</div>

<div class="info">
📅 Tanggal Kembali :
<?= $row['tanggal_kembali']; ?>
</div>

<?php
$status = strtolower(trim($row['status']));

if($status=="menunggu"){
?>

<a
href="setujui.php?id=<?= $row['id_peminjaman']; ?>"
class="btn setujui">
✔ Setujui
</a>

<?php
}elseif($status=="disetujui"){
?>

<div class="status sukses">
✅ Sedang Dipinjam
</div>

<a
href="kembalikan.php?id=<?= $row['id_peminjaman']; ?>"
class="btn kembali-alat">
🔄 Kembalikan Alat
</a>

<?php
}elseif($status=="dikembalikan"){
?>

<div class="status selesai">
📦 Alat Sudah Dikembalikan
</div>

<?php
}else{
?>

<div class="status info-status">
📌 <?= $row['status']; ?>
</div>

<?php } ?>

</div>

<?php } ?>

<a href="../../dashboard_petugas.php" class="kembali">
← Kembali ke Dashboard
</a>

</div>

</body>
</html>

<?php
ob_end_flush();
?>