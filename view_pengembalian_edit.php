<?php
include "../../model/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT *
FROM tabel_pengembalian
WHERE id_pengembalian='$id'
");

$row = mysqli_fetch_array($data);

$peminjaman = mysqli_query($conn,"
SELECT p.*,u.nama
FROM peminjaman p
LEFT JOIN tabel_user u
ON p.id_user=u.id_user
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edit Pengembalian</title>

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
padding:20px;
border-radius:20px;
box-shadow:0 3px 10px rgba(0,0,0,.08);
}

label{
display:block;
font-weight:bold;
margin-bottom:8px;
}

input,
select{
width:100%;
padding:14px;
border:1px solid #ddd;
border-radius:12px;
margin-bottom:15px;
}

.btn{
width:100%;
padding:15px;
background:#f59e0b;
color:white;
border:none;
border-radius:12px;
font-size:16px;
font-weight:bold;
}

.kembali{
display:block;
margin-top:15px;
text-align:center;
background:#64748b;
color:white;
padding:14px;
border-radius:12px;
text-decoration:none;
}

</style>

</head>
<body>

<div class="header">
<h2>✏ Edit Pengembalian</h2>
</div>

<div class="card">

<form action="proses_edit.php" method="POST">

<input
type="hidden"
name="id_pengembalian"
value="<?= $row['id_pengembalian']; ?>">

<label>Peminjaman</label>

<select name="id_peminjam">

<?php while($p=mysqli_fetch_array($peminjaman)){ ?>

<option
value="<?= $p['id_peminjaman']; ?>"
<?= $row['id_peminjam']==$p['id_peminjaman'] ? 'selected' : ''; ?>>

<?= $p['nama']; ?>

</option>

<?php } ?>

</select>

<label>Tanggal Pengembalian</label>

<input
type="date"
name="tanggal_pengembalian"
value="<?= $row['tanggal_pengembalian']; ?>">

<label>Kondisi Pengembalian</label>

<select name="kondisi_pengembalian">

<option value="Baik"
<?= $row['kondisi_pengembalian']=="Baik" ? "selected" : ""; ?>>
Baik
</option>

<option value="Rusak Ringan"
<?= $row['kondisi_pengembalian']=="Rusak Ringan" ? "selected" : ""; ?>>
Rusak Ringan
</option>

<option value="Rusak Berat"
<?= $row['kondisi_pengembalian']=="Rusak Berat" ? "selected" : ""; ?>>
Rusak Berat
</option>

</select>

<label>Status</label>

<select name="status">

<option value="Dikembalikan"
<?= $row['status']=="Dikembalikan" ? "selected" : ""; ?>>
Dikembalikan
</option>

<option value="Terlambat"
<?= $row['status']=="Terlambat" ? "selected" : ""; ?>>
Terlambat
</option>

</select>

<label>Denda</label>

<input
type="number"
name="denda"
value="<?= $row['denda']; ?>">

<button type="submit" class="btn">
💾 Update Pengembalian
</button>

</form>

<a href="view_pengembalian_tampil.php" class="kembali">
← Kembali
</a>

</div>

</body>
</html>