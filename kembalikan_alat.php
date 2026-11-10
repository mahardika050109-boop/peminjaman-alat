<?php
include "../../model/koneksi.php";

$data = mysqli_query($conn,"
SELECT *
FROM peminjaman
WHERE status='Disetujui'
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Kembalikan Alat</title>

<style>

body{
font-family:Arial;
background:#f0fdfa;
padding:15px;
}

form{
background:white;
padding:20px;
border-radius:15px;
}

select,input,button{
width:100%;
padding:12px;
margin-top:10px;
}

button{
background:#14b8a6;
border:none;
color:white;
font-weight:bold;
}

</style>

</head>
<body>

<h2>🔄 Pengembalian Alat</h2>

<form action="proses_kembali.php" method="POST">

Pilih Peminjaman

<select name="id_peminjam">

<?php while($row=mysqli_fetch_array($data)){ ?>

<option value="<?= $row['id_peminjaman']; ?>">
Peminjaman #<?= $row['id_peminjaman']; ?>
</option>

<?php } ?>

</select>

Tanggal Pengembalian

<input
type="date"
name="tanggal_pengembalian"
required>

<button type="submit">
Kembalikan Alat
</button>

</form>

</body>
</html>