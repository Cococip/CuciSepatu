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
$nama_layanan = $_POST['nama_layanan'];
$info_layanan = $_POST['info_layanan'];
$harga = $_POST['harga'];

// Menyimpan data ke tabel 'layanan'
$query = "INSERT INTO layanan (nama_layanan, info_layanan, harga) VALUES ('$nama_layanan', '$info_layanan', '$harga')";

if (mysqli_query($con, $query)) {
    mysqli_close($con);
    echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='layanan.php';</script>";
} else {
    mysqli_close($con);
    echo "<script>alert('Data gagal ditambahkan!'); window.location.href='tambah_layanan.php';</script>";
}
?>
