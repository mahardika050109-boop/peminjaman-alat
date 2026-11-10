<?php
session_start();

if(!isset($_SESSION['level'])){
    header("Location: ../../login.php");
    exit;
}

include "../../model/koneksi.php";

$data = mysqli_query($conn,"
SELECT a.*,k.nama_kategori
FROM tabel_alat a
LEFT JOIN kategori k
ON a.id_kategori=k.id_kategori
ORDER BY a.id_alat DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Daftar Alat</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#eef5ff;
padding:15px;
padding-bottom:90px;
}

.header{
background:linear-gradient(135deg,#2563eb,#60a5fa);
padding:25px;
border-radius:0 0 30px 30px;
color:white;
margin-bottom:20px;
}

.header h2{
font-size:28px;
}

.card{
background:white;
padding:18px;
border-radius:18px;
margin-bottom:15px;
box-shadow:0 4px 12px rgba(0,0,0,.08);
}

.nama{
font-size:20px;
font-weight:bold;
color:#2563eb;
margin-bottom:10px;
}

.info{
font-size:15px;
color:#555;
margin:6px 0;
}

.kembali{
display:block;
width:100%;
padding:15px;
background:#2563eb;
color:white;
text-decoration:none;
text-align:center;
border-radius:15px;
font-weight:bold;
margin-top:15px;
}

</style>
</head>

<body>

<div class="header">
<h2>🧰 Daftar Alat</h2>
<p>Alat yang tersedia untuk dipinjam</p>
</div>

<?php while($d=mysqli_fetch_array($data)){ ?>

<div class="card">

<div class="nama">
<?= $d['nama_alat']; ?>
</div>

<div class="info">
📁 Kategori : <?= $d['nama_kategori']; ?>
</div>

<div class="info">
📦 Stok : <?= $d['stok']; ?>
</div>

<div class="info">
🔧 Kondisi : <?= $d['kondisi_alat']; ?>
</div>

</div>

<?php } ?>

<a href="../../dashboard_peminjam.php" class="kembali">
← Kembali ke Dashboard
</a>

</body>
</html>