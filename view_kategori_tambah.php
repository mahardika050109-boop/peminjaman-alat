<?php
session_start();
include "../../model/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Tambah Kategori</title>

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
border-radius:0 0 30px 30px;
color:white;
margin:-15px -15px 20px -15px;
}

.header h2{
font-size:24px;
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
textarea,
select{
width:100%;
padding:14px;
border:1px solid #ddd;
border-radius:12px;
margin-bottom:15px;
font-size:16px;
}

textarea{
height:120px;
resize:none;
}

.btn{
width:100%;
padding:15px;
background:#1976d2;
color:white;
border:none;
border-radius:12px;
font-size:16px;
font-weight:bold;
}

.btn:hover{
background:#1565c0;
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
font-weight:bold;
}

</style>
</head>
<body>

<div class="header">
<h2>📁 Tambah Kategori</h2>
<p>Input kategori alat baru</p>
</div>

<div class="card">

<form action="proses_tambah.php" method="POST">

<label>Nama Kategori</label>

<input
type="text"
name="nama_kategori"
required>

<label>Keterangan</label>

<textarea
name="keterangan"
required></textarea>

<label>Status</label>

<select name="status">

<option value="Aktif">
Aktif
</option>

<option value="Nonaktif">
Nonaktif
</option>

</select>

<button type="submit" class="btn">
💾 Simpan Kategori
</button>

</form>

<a href="view_kategori_tampil.php" class="kembali">
← Kembali
</a>

</div>

</body>
</html>