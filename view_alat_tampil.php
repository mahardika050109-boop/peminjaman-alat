<?php
session_start();

if(!isset($_SESSION['level'])){
    header("Location: ../../login.php");
    exit;
}

if($_SESSION['level'] != "admin"){
    header("Location: ../../login.php");
    exit;
}

include "../../model/koneksi.php";

$data = mysqli_query($conn,"
SELECT a.*, k.nama_kategori
FROM tabel_alat a
LEFT JOIN kategori k
ON a.id_kategori = k.id_kategori
ORDER BY a.id_alat DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Data Alat</title>

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
padding-bottom:40px;
}

.header{
background:linear-gradient(135deg,#2563eb,#60a5fa);
padding:25px;
border-radius:25px;
color:white;
margin-bottom:20px;
}

.header h2{
font-size:32px;
margin-bottom:5px;
}

.header p{
font-size:17px;
}

.tambah{
display:block;
background:#2563eb;
color:white;
text-align:center;
text-decoration:none;
padding:15px;
border-radius:15px;
font-weight:bold;
font-size:17px;
margin-bottom:20px;
}

.card{
background:white;
padding:20px;
border-radius:20px;
margin-bottom:15px;
box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.nama{
font-size:22px;
font-weight:bold;
color:#1e3a8a;
margin-bottom:12px;
}

.item{
font-size:17px;
margin:8px 0;
color:#555;
}

.aksi{
margin-top:15px;
display:flex;
gap:10px;
flex-wrap:wrap;
}

.edit{
background:#f59e0b;
color:white;
padding:10px 15px;
text-decoration:none;
border-radius:10px;
font-weight:bold;
}

.hapus{
background:#ef4444;
color:white;
padding:10px 15px;
text-decoration:none;
border-radius:10px;
font-weight:bold;
}

.kembali{
display:block;
text-align:center;
background:#2563eb;
color:white;
padding:15px;
border-radius:15px;
text-decoration:none;
font-weight:bold;
margin-top:20px;
}

.kosong{
background:white;
padding:20px;
border-radius:20px;
text-align:center;
color:#666;
}

</style>
</head>

<body>

<div class="header">
<h2>🧰 Data Alat</h2>
<p>Kelola daftar alat yang tersedia</p>
</div>

<a href="view_alat_tambah.php" class="tambah">
➕ Tambah Alat
</a>

<?php if(mysqli_num_rows($data) > 0){ ?>

<?php while($d = mysqli_fetch_array($data)){ ?>

<div class="card">

<div class="nama">
<?= $d['nama_alat']; ?>
</div>

<div class="item">
📁 Kategori :
<?= $d['nama_kategori']; ?>
</div>

<div class="item">
📦 Stok :
<?= $d['stok']; ?>
</div>

<div class="item">
🔧 Kondisi :
<?= $d['kondisi_alat']; ?>
</div>

<div class="aksi">

<a
href="view_alat_edit.php?id=<?= $d['id_alat']; ?>"
class="edit">
✏ Edit
</a>

<a
href="hapus.php?id=<?= $d['id_alat']; ?>"
class="hapus"
onclick="return confirm('Yakin ingin menghapus alat ini?')">
🗑 Hapus
</a>

</div>

</div>

<?php } ?>

<?php }else{ ?>

<div class="kosong">
Belum ada data alat.
</div>

<?php } ?>

<a href="../../dashboard.php" class="kembali">
← Kembali ke Dashboard
</a>

</body>
</html>