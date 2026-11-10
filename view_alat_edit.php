<?php
include "../../model/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT * FROM tabel_alat
WHERE id_alat='$id'
");

$row = mysqli_fetch_array($data);

$kategori = mysqli_query($conn,"
SELECT * FROM kategori
ORDER BY nama_kategori ASC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edit Alat</title>

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

.header h2{
font-size:28px;
}

.header p{
margin-top:5px;
opacity:.9;
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
color:#333;
}

input,
select{
width:100%;
padding:14px;
border:1px solid #ddd;
border-radius:12px;
margin-bottom:15px;
font-size:16px;
}

.btn{
width:100%;
background:#f59e0b;
color:white;
border:none;
padding:15px;
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
text-decoration:none;
padding:14px;
border-radius:12px;
font-weight:bold;
}

</style>

</head>
<body>

<div class="header">
<h2>✏ Edit Alat</h2>
<p>Ubah data alat</p>
</div>

<div class="card">

<form action="proses_edit.php" method="POST">

<input
type="hidden"
name="id_alat"
value="<?= $row['id_alat']; ?>">

<label>Kategori</label>

<select name="id_kategori" required>

<?php while($k=mysqli_fetch_array($kategori)){ ?>

<option
value="<?= $k['id_kategori']; ?>"
<?= $row['id_kategori']==$k['id_kategori'] ? 'selected' : ''; ?>>

<?= $k['nama_kategori']; ?>

</option>

<?php } ?>

</select>

<label>Nama Alat</label>

<input
type="text"
name="nama_alat"
value="<?= $row['nama_alat']; ?>"
required>

<label>Stok</label>

<input
type="number"
name="stok"
value="<?= $row['stok']; ?>"
required>

<label>Kondisi Alat</label>

<select name="kondisi_alat">

<option
value="Baik"
<?= $row['kondisi_alat']=="Baik" ? "selected" : ""; ?>>
Baik
</option>

<option
value="Rusak Ringan"
<?= $row['kondisi_alat']=="Rusak Ringan" ? "selected" : ""; ?>>
Rusak Ringan
</option>

<option
value="Rusak Berat"
<?= $row['kondisi_alat']=="Rusak Berat" ? "selected" : ""; ?>>
Rusak Berat
</option>

</select>

<button type="submit" class="btn">
💾 Update Alat
</button>

</form>

<a href="view_alat_tampil.php" class="kembali">
← Kembali
</a>

</div>

</body>
</html>