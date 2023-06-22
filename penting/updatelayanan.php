<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sepatu";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id_layanan = $_POST['id_layanan'];
$nama_layanan = $_POST['nama_layanan'];
$info_layanan = $_POST['info_layanan'];
$harga = $_POST['harga'];

$sql = "UPDATE layanan SET nama_layanan='$nama_layanan', info_layanan='$info_layanan', harga='$harga' WHERE id_layanan='$id_layanan'";

if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    echo "<script>alert('Layanan berhasil diperbarui!'); window.location.href='layanan.php';</script>";
} else {
    mysqli_close($con);
    echo "<script>alert('Layanan gagal diperbarui!'); window.location.href='edit_layanan.php?id_layanan=$id_layanan';</script>";
}
?>
