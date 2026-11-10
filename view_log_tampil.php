<?php
session_start();

if(!isset($_SESSION['level'])){
    header("Location: ../../login.php");
    exit;
}

include "../../model/koneksi.php";

$data = mysqli_query($conn,"
SELECT l.*,u.nama,u.level
FROM log_aktivitas l
LEFT JOIN tabel_user u
ON l.id_user=u.id_user
ORDER BY l.id_log DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Log Aktivitas</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#f4f7fb;
padding:15px;
padding-bottom:90px;
}

.header{
background:linear-gradient(135deg,#0d47a1,#1976d2);
padding:25px;
border-radius:25px;
color:white;
margin-bottom:15px;
}

.card{
background:white;
padding:18px;
border-radius:20px;
margin-bottom:15px;
box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.nama{
font-size:20px;
font-weight:bold;
color:#0d47a1;
margin-bottom:10px;
}

.level{
display:inline-block;
background:#dbeafe;
color:#1d4ed8;
padding:6px 12px;
border-radius:20px;
font-size:13px;
font-weight:bold;
margin-bottom:10px;
}

.info{
margin-bottom:8px;
color:#555;
}

.hapus{
display:inline-block;
margin-top:10px;
background:#ef4444;
color:white;
padding:8px 14px;
text-decoration:none;
border-radius:10px;
}

.kembali{
display:block;
margin-top:15px;
text-align:center;
background:#0d47a1;
color:white;
text-decoration:none;
padding:14px;
border-radius:15px;
font-weight:bold;
}

.kosong{
background:white;
padding:20px;
border-radius:20px;
text-align:center;
color:#666;
box-shadow:0 3px 10px rgba(0,0,0,.08);
}

</style>
</head>
<body>

<div class="header">
<h2>📜 Log Aktivitas</h2>
<p>Riwayat aktivitas seluruh pengguna sistem</p>
</div>

<?php
if(mysqli_num_rows($data) > 0){
while($row=mysqli_fetch_array($data)){
?>

<div class="card">

<div class="nama">
👤 <?= $row['nama'] ? $row['nama'] : 'User Dihapus'; ?>
</div>

<div class="level">
<?= ucfirst($row['level']); ?>
</div>

<div class="info">
📌 Aktivitas :
<?= $row['aktivitas']; ?>
</div>

<div class="info">
🕒 Tanggal :
<?= $row['tanggal']; ?>
</div>

<a class="hapus"
onclick="return confirm('Hapus log ini?')"
href="hapus.php?id=<?= $row['id_log']; ?>">
🗑 Hapus
</a>

</div>

<?php
}
}else{
?>

<div class="kosong">
Belum ada data log aktivitas.
</div>

<?php } ?>

<a href="../../dashboard.php" class="kembali">
🏠 Kembali ke Dashboard
</a>

</body>
</html>