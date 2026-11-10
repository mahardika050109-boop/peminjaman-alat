<?php
include "../../model/koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM tabel_user");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data User</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#f4f6f9;
    padding:20px;
}

.container{
    max-width:1200px;
    margin:auto;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.header h2{
    color:#333;
}

.btn-tambah{
    background:#0d6efd;
    color:white;
    text-decoration:none;
    padding:10px 15px;
    border-radius:8px;
}

.card{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#0d6efd;
    color:white;
    padding:12px;
}

td{
    padding:12px;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f5f5f5;
}

.edit{
    background:orange;
    color:white;
    padding:6px 10px;
    border-radius:5px;
    text-decoration:none;
}

.hapus{
    background:red;
    color:white;
    padding:6px 10px;
    border-radius:5px;
    text-decoration:none;
}

.role{
    background:#28a745;
    color:white;
    padding:5px 10px;
    border-radius:20px;
}

</style>

</head>
<body>

<div class="container">

<div class="header">
    <h2>👤 Data User</h2>

    <a href="tambah.php" class="btn-tambah">
        + Tambah User
    </a>
</div>

<div class="card">

<table>

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Username</th>
    <th>Role</th>
    <th>Aksi</th>
</tr>

<?php while($row=mysqli_fetch_assoc($data)){ ?>

<tr>

<td><?= $row['id_user']; ?></td>

<td><?= $row['nama_user']; ?></td>

<td><?= $row['username']; ?></td>

<td>
    <span class="role">
        <?= $row['role']; ?>
    </span>
</td>

<td>

<a href="edit.php?id=<?= $row['id_user']; ?>" class="edit">
Edit
</a>

<a href="hapus.php?id=<?= $row['id_user']; ?>"
class="hapus"
onclick="return confirm('Yakin ingin menghapus user ini?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>