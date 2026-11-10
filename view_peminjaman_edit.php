<?php
include "../../model/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT * FROM peminjaman
WHERE id_peminjaman='$id'
");

$row = mysqli_fetch_array($data);

$user = mysqli_query($conn,"
SELECT * FROM tabel_user
WHERE level='peminjam'
ORDER BY nama ASC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Peminjaman</title>

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
<h2>✏ Edit Peminjaman</h2>
</div>

<div class="card">

<form action="proses_edit.php" method="POST">

<input type="hidden"
name="id_peminjaman"
value="<?= $row['id_peminjaman']; ?>">

<label>Peminjam</label>

<select name="id_user">

<?php while($u=mysqli_fetch_array($user)){ ?>

<option
value="<?= $u['id_user']; ?>"
<?= $row['id_user']==$u['id_user'] ? 'selected' : ''; ?>>

<?= $u['nama']; ?>

</option>

<?php } ?>

</select>

<label>Tanggal Pinjam</label>

<input
type="date"
name="tanggal_pinjam"
value="<?= $row['tanggal_pinjam']; ?>">

<label>Tanggal Kembali</label>

<input
type="date"
name="tanggal_kembali"
value="<?= $row['tanggal_kembali']; ?>">

<label>Status</label>

<select name="status">

<option value="Dipinjam"
<?= $row['status']=="Dipinjam" ? "selected" : ""; ?>>
Dipinjam
</option>

<option value="Dikembalikan"
<?= $row['status']=="Dikembalikan" ? "selected" : ""; ?>>
Dikembalikan
</option>

</select>

<button type="submit" class="btn">
💾 Update Peminjaman
</button>

</form>

<a href="view_peminjaman_tampil.php" class="kembali">
← Kembali
</a>

</div>

</body>
</html>