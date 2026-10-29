<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login Peminjaman Alat</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
padding:20px;
background:
linear-gradient(135deg,#0d47a1,#2196f3);
overflow:hidden;
}

body::before{
content:'';
position:fixed;
top:-120px;
left:-120px;
width:250px;
height:250px;
border-radius:50%;
background:rgba(255,255,255,.12);
}

body::after{
content:'';
position:fixed;
bottom:-120px;
right:-120px;
width:250px;
height:250px;
border-radius:50%;
background:rgba(255,255,255,.12);
}

.card{
width:100%;
max-width:400px;
background:white;
border-radius:30px;
overflow:hidden;
box-shadow:0 15px 40px rgba(0,0,0,.25);
}

.top{
background:linear-gradient(135deg,#1565c0,#1e88e5);
padding:35px 25px;
color:white;
position:relative;
}

.top::after{
content:'';
position:absolute;
right:-40px;
top:-40px;
width:140px;
height:140px;
background:rgba(255,255,255,.1);
border-radius:50%;
}

.logo{
font-size:55px;
margin-bottom:10px;
}

.top h1{
font-size:22px;
margin-bottom:5px;
}

.top p{
opacity:.9;
}

.form{
padding:25px;
}

.input-box{
margin-bottom:18px;
}

.input-box input{
width:100%;
padding:15px;
border:none;
border-bottom:2px solid #ddd;
font-size:16px;
outline:none;
}

.input-box input:focus{
border-color:#1976d2;
}

.btn{
width:100%;
padding:15px;
border:none;
border-radius:15px;
background:linear-gradient(135deg,#1976d2,#0d47a1);
color:white;
font-size:18px;
font-weight:bold;
}

.footer{
text-align:center;
padding:0 25px 25px;
color:#666;
font-size:13px;
}

</style>
</head>

<body>

<div class="card">

<div class="top">
<div class="logo">🛠️</div>
<h1>Peminjaman Alat</h1>
<p>Silakan login untuk melanjutkan</p>
</div>

<div class="form">

<form action="proses_login.php" method="POST">

<div class="input-box">
<input
type="text"
name="username"
placeholder="Masukkan Username"
required>
</div>

<div class="input-box">
<input
type="password"
name="password"
placeholder="Masukkan Password"
required>
</div>

<button type="submit" class="btn">
Login
</button>

</form>

</div>

<div class="footer">
Mudah • Aman • Terpercaya
</div>

</div>

</body>
</html>