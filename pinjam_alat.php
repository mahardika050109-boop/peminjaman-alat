l<?php
session_start();
include "../../model/koneksi.php";

$alat = mysqli_query($conn,"
SELECT * FROM tabel_alat
ORDER BY nama_alat
");
?>

<form action="proses_pinjam.php" method="POST">

<input type="hidden"
name="id_user"
value="<?= $_SESSION['id_user']; ?>">

Pilih Alat

<select name="id_alat" required>

<option value="">
-- Pilih Alat --
</option>

<?php while($a=mysqli_fetch_array($alat)){ ?>

<option value="<?= $a['id_alat']; ?>">
<?= $a['nama_alat']; ?>
</option>

<?php } ?>

</select>

<br><br>

Jumlah

<input
type="number"
name="jumlah"
min="1"
required>

<br><br>

Tanggal Pinjam

<input
type="date"
name="tanggal_pinjam"
required>

<br><br>

Tanggal Kembali

<input
type="date"
name="tanggal_kembali"
required>

<br><br>

<button type="submit">
Ajukan Peminjaman
</button>

</form>