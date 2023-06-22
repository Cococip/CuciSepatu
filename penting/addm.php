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
$id_metode = $_POST['id_metode'];
$nama_metode = $_POST['nama_metode'];
$no_metode = $_POST['no_metode'];
$atasnama = $_POST['atasnama'];

// Menyimpan data ke tabel 'metode'
$query = "INSERT INTO metode (id_metode, nama_metode, no_metode, atasnama) VALUES ('$id_metode', '$nama_metode', '$no_metode', '$atasnama')";

if (mysqli_query($con, $query)) {
    mysqli_close($con);
    echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='metode.php';</script>";
} else {
    mysqli_close($con);
    echo "<script>alert('Data gagal ditambahkan!'); window.location.href='tambah_metode.php';</script>";
}
?>
