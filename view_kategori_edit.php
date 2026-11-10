<?php

include "../../model/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT * FROM kategori
WHERE id_kategori='$id'
");

$row = mysqli_fetch_array($data);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edit Kategori</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI,sans-serif;
}

body{
background:#eef7f7;
padding:20px;
}

.card{
max-width:700px;
margin:auto;
background:white;
padding:30px;
border-radius:20px;
box-shadow:0 10px 30px rgba(0,0,0,0.1);
}

h2{
color:#0f766e;
margin-bottom:25px;
}

label{
display:block;
margin-bottom:8px;
font-weight:600;
color:#444;
}

input,
textarea,
select{
width:100%;
padding:14px;
border:1px solid #ddd;
border-radius:12px;
margin-bottom:20px;
font-size:15px;
}

textarea{
height:120px;
resize:none;
}

button{
width:100%;
background:#14b8a6;
color:white;
border:none;
padding:15px;
border-radius:12px;
font-size:16px;
font-weight:bold;
cursor:pointer;
}

button:hover{
background:#0f766e;
}

</style>

</head>

<body>

<div class="card">

<h2>📁 Edit Kategori</h2>

<form action="proses_edit.php" method="POST">

<input
type="hidden"
name="id_kategori"
value="<?= $row['id_kategori'] ?>">

<label>Nama Kategori</label>

<input
type="text"
name="nama_kategori"
value="<?= $row['nama_kategori'] ?>"
required>

<label>Keterangan</label>

<textarea
name="keterangan"
required><?= $row['keterangan'] ?></textarea>

<label>Status</label>

<select name="status">

<option value="Aktif"
<?= ($row['status']=="Aktif") ? "selected" : "" ?>>
Aktif
</option>

<option value="Tidak Aktif"
<?= ($row['status']=="Tidak Aktif") ? "selected" : "" ?>>
Tidak Aktif
</option>

</select>

<button type="submit">
Update Kategori
</button>

</form>

</div>

</body>
</html>