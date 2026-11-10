<?php
session_start();
include "../../model/koneksi.php";

$alat = mysqli_query($conn,"SELECT * FROM tabel_alat");
?>

<!DOCTYPE html>
<html>
<head>
<title>Ajukan Peminjaman</title>

<style>
body{
    font-family:Arial;
    background:#f0fdfa;
    padding:15px;
}

.card{
    background:white;
    padding:20px;
    border-radius:15px;
}

input,select,button{
    width:100%;
    padding:12px;
    margin-top:10px;
    box-sizing:border-box;
}

button{
    background:#14b8a6;
    border:none;
    color:white;
    font-weight:bold;
    cursor:pointer;
}
</style>

</head>
<body>

<h2>📝 Ajukan Peminjaman</h2>

<div class="card">

<form action="proses_pinjam.php" method="POST">

<input type="hidden"
name="id_user"
value="<?php echo $_SESSION['id_user']; ?>">

<label>Alat</label>

<select name="id_alat" required>
<option value="">-- Pilih Alat --</option>

<?php while($a=mysqli_fetch_assoc($alat)){ ?>

<option value="<?php echo $a['id_alat']; ?>">
<?php echo $a['nama_alat']; ?>
</option>

<?php } ?>

</select>

<label>Tanggal Pinjam</label>

<input type="date"
name="tanggal_pinjam"
required>

<label>Tanggal Kembali</label>

<input type="date"
name="tanggal_kembali"
required>

<button type="submit">
Ajukan Peminjaman
</button>

</form>

</div>

</body>
</html>