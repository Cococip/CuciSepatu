<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sepatu";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Mengambil data dari form
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];
$email = $_POST['email'];

// Menyimpan data ke tabel 'user'
$query = "INSERT INTO user (nama, username, password, level, email) VALUES ('$nama', '$username', '$password', '$level', '$email')";

if (mysqli_query($con, $query)) {
    mysqli_close($con);
    echo "<script>alert('Data Pelanggan berhasil ditambahkan!'); window.location.href='user.php';</script>";
} else {
    mysqli_close($con);
    echo "<script>alert('Data Pelanggan gagal ditambahkan!'); window.location.href='addw.php';</script>";
}
?>
