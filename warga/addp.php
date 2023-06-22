<?php
include "functions.php";

if (!isset($_SESSION['login'])) {
    header("location:index.php");
}

if (isset($_POST['proses'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sepatu";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Mengambil data dari form
    $id_pesanan = $_POST['id_pesanan'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_layanan = $_POST['id_layanan'];
    $tgl_pesanan = $_POST['tgl_pesanan'];
    $id_metode = $_POST['id_metode'];
    $status_pesanan = $_POST['status_pesanan'];
    $status_transaksi = $_POST['status_transaksi'];
    $id_user = $_POST['id_user'];

    // Menyimpan data ke tabel "pesanan"
    $query = "INSERT INTO pesanan (id_pesanan, nama, alamat, no_telp, id_layanan, tgl_pesanan, id_metode, status_pesanan, status_transaksi, id_user) VALUES ('$id_pesanan', '$nama', '$alamat', '$no_telp', '$id_layanan', '$tgl_pesanan', '$id_metode', '$status_pesanan', '$status_transaksi', '$id_user')";

    // Eksekusi query
    if (mysqli_query($con, $query)) {
        mysqli_close($con);
        echo "<script>alert('Transaksi berhasil ditambahkan!'); window.location.href='transaksi.php';</script>";
    } else {
        mysqli_close($con);
        echo "<script>alert('Transaksi gagal ditambahkan!'); window.location.href='tambahpesanan.php';</script>";
    }
}
?>
