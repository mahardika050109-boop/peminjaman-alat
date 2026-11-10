<?php
session_start();
include "../../model/koneksi.php";

if(!isset($_SESSION['level'])){
    header("Location: ../../login.php");
    exit;
}

$user = mysqli_query($conn,"
SELECT * FROM tabel_user
WHERE level='peminjam'
ORDER BY nama ASC
");

$alat = mysqli_query($conn,"
SELECT * FROM tabel_alat
ORDER BY nama_alat ASC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Tambah Peminjaman</title>

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
}

.header{
background:linear-gradient(135deg,#2563eb,#60a5fa);
padding:25px;
border-radius:25px;
color:white;
margin-bottom:15px;
}

.card{
background:white;
padding:20px;
border-radius:20px;
box-shadow:0 5px 15px rgba(0,0,0,.08);
}

label{
display:block;
font-weight:bold;
margin-top:15px;
margin-bottom:8px;
}

input,
select{
width:100%;
padding:14px;
border:1px solid #ddd;
border-radius:12px;
}

.btn{
width:100%;
padding:15px;
background:#2563eb;
color:white;
border:none;
border-radius:12px;
font-size:16px;
font-weight:bold;
margin-top:20px;
}

.kembali{
display:block;
margin-top:15px;
padding:14px;
background:#64748b;
color:white;
text-decoration:none;
text-align:center;
border-radius:12px;
}

</style>
</head>
<body>

<div class="header">
<h2>📋 Tambah Peminjaman</h2>
<p>Input data peminjaman alat</p>
</div>

<div class="card">

<form action="proses_tambah.php" method="POST">

<label>Nama Peminjam</label>
<select name="id_user" required>
<option value="">-- Pilih Peminjam --</option>

<?php while($u=mysqli_fetch_array($user)){ ?>
<option value="<?= $u['id_user']; ?>">
<?= $u['nama']; ?>
</option>
<?php } ?>

</select>

<label>Nama Alat</label>
<select name="id_alat" required>
<option value="">-- Pilih Alat --</option>

<?php while($a=mysqli_fetch_array($alat)){ ?>
<option value="<?= $a['id_alat']; ?>">
<?= $a['nama_alat']; ?>
</option>
<?php } ?>

</select>

<label>Jumlah Pinjam</label>
<input
type="number"
name="jumlah"
min="1"
required>

<label>Tanggal Pinjam</label>
<input
type="date"
name="tanggal_pinjam"
required>

<label>Tanggal Kembali</label>
<input
type="date"
name="tanggal_kembali"
required>

<input
type="hidden"
name="status"
value="Menunggu">

<button type="submit" class="btn">
💾 Simpan Peminjaman
</button>

</form>

<a href="../../dashboard.php" class="kembali">
← Kembali ke Dashboard
</a>

</div>

</body>
</html>