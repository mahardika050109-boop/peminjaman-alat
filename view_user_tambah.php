<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Tambah User</title>

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

.header h2{
font-size:24px;
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
background:#1976d2;
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
<h2>👤 Tambah User</h2>
</div>

<div class="card">

<form action="proses_tambah.php" method="POST">

<label>Nama</label>
<input type="text" name="nama" required>

<label>Username</label>
<input type="text" name="username" required>

<label>Password</label>
<input type="password" name="password" required>

<label>Level</label>
<select name="level">
<option value="admin">Admin</option>
<option value="petugas">Petugas</option>
<option value="peminjam">Peminjam</option>
</select>

<button type="submit">
💾 Simpan User
</button>

</form>

<a href="view_user_tampil.php" class="kembali">
← Kembali
</a>

</div>

</body>
</html>