<?php
include "model/koneksi.php";

$data = mysqli_query($conn,"
SELECT *
FROM tabel_pengembalian
ORDER BY id_pengembalian DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Laporan Pengembalian</title>

<style>

body{
font-family:Arial,sans-serif;
background:#f4f8ff;
margin:0;
padding:15px;
}

.header{
background:linear-gradient(135deg,#0d47a1,#1976d2);
color:white;
padding:20px;
border-radius:20px;
margin-bottom:15px;
}

.card{
background:white;
padding:15px;
border-radius:15px;
margin-bottom:12px;
box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.judul{
font-size:18px;
font-weight:bold;
color:#0d47a1;
margin-bottom:10px;
}

.info{
margin-bottom:5px;
}

.btn{
display:block;
width:100%;
padding:14px;
border:none;
border-radius:12px;
margin-top:10px;
font-size:16px;
font-weight:bold;
}

.cetak{
background:#1976d2;
color:white;
}

.kembali{
background:#64748b;
color:white;
text-decoration:none;
text-align:center;
line-height:50px;
height:50px;
display:block;
border-radius:12px;
margin-top:10px;
}

@media print{

.btn,
.kembali{
display:none;
}

body{
background:white;
}

.card{
box-shadow:none;
border:1px solid #ddd;
}

}

</style>
</head>

<body>

<div class="header">
<h2>🔄 Laporan Pengembalian</h2>
<p>Sistem Peminjaman Alat</p>
</div>

<?php while($row=mysqli_fetch_array($data)){ ?>

<div class="card">

<div class="judul">
Pengembalian #<?= $row['id_pengembalian']; ?>
</div>

<div class="info">
ID Peminjaman :
<?= $row['id_peminjam']; ?>
</div>

<div class="info">
Tanggal Pengembalian :
<?= $row['tanggal_pengembalian']; ?>
</div>

<div class="info">
Kondisi :
<?= $row['kondisi_pengembalian']; ?>
</div>

<div class="info">
Status :
<?= $row['status']; ?>
</div>

<div class="info">
Denda :
Rp <?= number_format($row['denda']); ?>
</div>

</div>

<?php } ?>

<button onclick="window.print()" class="btn cetak">
🖨️ Cetak Laporan
</button>

<a href="laporan.php" class="kembali">
← Kembali
</a>

</body>
</html>