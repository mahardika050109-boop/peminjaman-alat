<?php
session_start();
include "../../model/koneksi.php";

$data = mysqli_query($conn,"
SELECT pg.*, u.nama
FROM tabel_pengembalian pg
LEFT JOIN peminjaman p
ON pg.id_peminjam=p.id_peminjaman
LEFT JOIN tabel_user u
ON p.id_user=u.id_user
ORDER BY pg.id_pengembalian DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Data Pengembalian</title>

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

.tambah{
display:block;
background:#1976d2;
color:white;
text-align:center;
text-decoration:none;
padding:14px;
border-radius:15px;
font-weight:bold;
margin-bottom:15px;
}

.card{
background:white;
padding:18px;
border-radius:20px;
margin-bottom:15px;
box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.judul{
font-size:20px;
font-weight:bold;
color:#0d47a1;
margin-bottom:10px;
}

.info{
margin-bottom:8px;
color:#555;
}

.status{
display:inline-block;
background:#dbeafe;
color:#0d47a1;
padding:6px 12px;
border-radius:20px;
font-weight:bold;
margin-top:5px;
}

.aksi{
margin-top:15px;
}

.edit{
background:#f59e0b;
color:white;
padding:8px 14px;
text-decoration:none;
border-radius:10px;
margin-right:5px;
}

.hapus{
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

</style>
</head>
<body>

<div class="header">
<h2>🔄 Data Pengembalian</h2>
<p>Daftar pengembalian alat</p>
</div>

<a href="view_pengembalian_tambah.php" class="tambah">
➕ Tambah Pengembalian
</a>

<?php while($row=mysqli_fetch_array($data)){ ?>

<div class="card">

<div class="judul">
<?= $row['nama'] ? $row['nama'] : 'Peminjam'; ?>
</div>

<div class="info">
📅 Tanggal :
<?= $row['tanggal_pengembalian']; ?>
</div>

<div class="info">
🔧 Kondisi :
<?= $row['kondisi_pengembalian']; ?>
</div>

<div class="info">
💰 Denda :
Rp <?= number_format($row['denda']); ?>
</div>

<div class="status">
<?= $row['status']; ?>
</div>

<div class="aksi">

<a class="edit"
href="view_pengembalian_edit.php?id=<?= $row['id_pengembalian']; ?>">
✏ Edit
</a>

<a class="hapus"
onclick="return confirm('Hapus Data?')"
href="hapus.php?id=<?= $row['id_pengembalian']; ?>">
🗑 Hapus
</a>

</div>

</div>

<?php } ?>

<a href="../../dashboard.php" class="kembali">
🏠 Kembali ke Dashboard
</a>

</body>
</html>