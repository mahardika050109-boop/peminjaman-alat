<?php
include "../../model/koneksi.php";

$peminjaman = mysqli_query($conn,"
SELECT p.*,u.nama
FROM peminjaman p
LEFT JOIN tabel_user u
ON p.id_user=u.id_user
WHERE p.status='Disetujui'
ORDER BY p.id_peminjaman DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Tambah Pengembalian</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#eef5ff;
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
color:#333;
}

input,
select{
width:100%;
padding:14px;
border:1px solid #ddd;
border-radius:12px;
margin-bottom:15px;
font-size:15px;
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
cursor:pointer;
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
<h2>🔄 Tambah Pengembalian</h2>
<p>Input data pengembalian alat</p>
</div>

<div class="card">

<form action="proses_tambah.php" method="POST">

<label>Pilih Peminjaman</label>

<select name="id_peminjam" required>

<option value="">
-- Pilih Peminjaman --
</option>

<?php while($p=mysqli_fetch_array($peminjaman)){ ?>

<option value="<?= $p['id_peminjaman']; ?>">
<?= $p['nama']; ?> | <?= $p['tanggal_pinjam']; ?>
</option>

<?php } ?>

</select>

<label>Tanggal Pengembalian</label>

<input
type="date"
name="tanggal_pengembalian"
required>

<label>Kondisi Pengembalian</label>

<select name="kondisi_pengembalian" required>
<option value="Baik">Baik</option>
<option value="Rusak Ringan">Rusak Ringan</option>
<option value="Rusak Berat">Rusak Berat</option>
</select>

<label>Status</label>

<select name="status" required>
<option value="Dikembalikan">Dikembalikan</option>
<option value="Terlambat">Terlambat</option>
</select>

<label>Denda</label>

<input
type="number"
name="denda"
value="0"
required>

<button type="submit" class="btn">
💾 Simpan Pengembalian
</button>

</form>

<a href="view_pengembalian_tampil.php" class="kembali">
← Kembali
</a>

</div>

</body>
</html>