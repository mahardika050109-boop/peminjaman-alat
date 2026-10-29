<?php
ob_start();
session_start();

include "model/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn,"
SELECT *
FROM tabel_user
WHERE username='$username'
AND password='$password'
");

if(mysqli_num_rows($query) > 0){

    $data = mysqli_fetch_assoc($query);

    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['level'] = $data['level'];

    if($data['level']=="admin"){
        header("Location: dashboard.php");
        exit;
    }

    if($data['level']=="petugas"){
        header("Location: dashboard_petugas.php");
        exit;
    }

    if($data['level']=="peminjam"){
        header("Location: dashboard_peminjam.php");
        exit;
    }

}else{

    echo "
    <script>
    alert('Username atau Password Salah');
    window.location='login.php';
    </script>
    ";

}
?>