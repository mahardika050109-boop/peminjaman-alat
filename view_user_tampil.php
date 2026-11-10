<?php
session_start();
include "../../model/koneksi.php";

$data = mysqli_query($conn,"
SELECT * FROM tabel_user
ORDER BY id_user DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Data User</title>

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

.header h2{
font-size:26px;
}

.header p{
margin-top:5px;
opacity:.9;
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
border-radius:20px;
padding:18px;
margin-bottom:15px;
box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.nama{
font-size:20px;
font-weight:bold;
color:#0d47a1;
margin-bottom:10px;
}

.info{
margin-bottom:8px;
color:#555;
}

.level{
display:inline-block;
padding:6px 12px;
background:#dbeafe;
color:#0d47a1;
border-radius:20px;
font-size:14px;
font-weight:bold;
margin-top:5px;
}

.aksi{
margin-top:15px;
}

.edit{
background:#f59e0b;
color:white;
text-decoration:none;
padding:8px 14px;
border-radius:10px;
margin-right:5px;
}

.hapus{
background:#ef4444;
color:white;
text-decoration:none;
padding:8px 14px;
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
<h2>👤 Data User</h2>
<p>Daftar pengguna sistem</p>
</div>

<a href="view_user_tambah.php" class="tambah">
➕ Tambah User
</a>

<?php while($row=mysqli_fetch_array($data)){ ?>

<div class="card">

<div class="nama">
<?= $row['nama']; ?>
</div>

<div class="info">
👤 Username :
<?= $row['username']; ?>
</div>

<div class="level">
<?= ucfirst($row['level']); ?>
</div>

<div class="aksi">

<a class="edit"
href="view_user_edit.php?id=<?= $row['id_user']; ?>">
✏ Edit
</a>

<a class="hapus"
onclick="return confirm('Hapus Data User?')"
href="hapus.php?id=<?= $row['id_user']; ?>">
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