<?php
include "../../model/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT * FROM tabel_user
WHERE id_user='$id'
");

$row = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edit User</title>

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

.card{
background:white;
padding:20px;
border-radius:20px;
box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.header{
background:linear-gradient(135deg,#0d47a1,#1976d2);
padding:20px;
border-radius:20px;
color:white;
margin-bottom:15px;
}

input,select{
width:100%;
padding:14px;
border:1px solid #ddd;
border-radius:12px;
margin-top:5px;
margin-bottom:15px;
}

label{
font-weight:bold;
color:#444;
}

button{
width:100%;
padding:14px;
background:#f59e0b;
color:white;
border:none;
border-radius:12px;
font-size:16px;
font-weight:bold;
}

.kembali{
display:block;
text-align:center;
margin-top:15px;
padding:14px;
background:#64748b;
color:white;
text-decoration:none;
border-radius:12px;
}

</style>
</head>
<body>

<div class="header">
<h2>✏ Edit User</h2>
</div>

<div class="card">

<form action="proses_edit.php" method="POST">

<input type="hidden"
name="id_user"
value="<?= $row['id_user'] ?>">

<label>Nama</label>
<input type="text"
name="nama"
value="<?= $row['nama'] ?>"
required>

<label>Username</label>
<input type="text"
name="username"
value="<?= $row['username'] ?>"
required>

<label>Password</label>
<input type="text"
name="password"
value="<?= $row['password'] ?>">

<label>Level</label>
<select name="level">

<option value="admin" <?= $row['level']=="admin"?"selected":"" ?>>
Admin
</option>

<option value="petugas" <?= $row['level']=="petugas"?"selected":"" ?>>
Petugas
</option>

<option value="peminjam" <?= $row['level']=="peminjam"?"selected":"" ?>>
Peminjam
</option>

</select>

<button type="submit">
💾 Update User
</button>

</form>

<a href="view_user_tampil.php" class="kembali">
← Kembali
</a>

</div>

</body>
</html>