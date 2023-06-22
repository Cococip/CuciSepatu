<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sepatu";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id_pesanan = $_POST['id_pesanan'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$id_layanan = $_POST['id_layanan'];
$tgl_pesanan = $_POST['tgl_pesanan'];
$id_metode = $_POST['id_metode'];
$status_pesanan = $_POST['status_pesanan'];
$status_transaksi = $_POST['status_transaksi'];

$sql = "UPDATE pesanan SET nama='$nama', alamat='$alamat', no_telp='$no_telp', id_layanan='$id_layanan', tgl_pesanan='$tgl_pesanan', id_metode='$id_metode', status_pesanan='$status_pesanan', status_transaksi='$status_transaksi' WHERE id_pesanan='$id_pesanan'";

if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    echo "<script>alert('Data berhasil diperbarui!'); window.location.href='pesanan.php';</script>";
} else {
    mysqli_close($con);
    echo "<script>alert('Data gagal diperbarui!'); window.location.href='ubahpesanan.php?id_pesanan=$id_pesanan';</script>";
}
?>
