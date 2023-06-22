<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sepatu";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id_metode = $_POST['id_metode'];
$nama_metode = $_POST['nama_metode'];
$no_metode = $_POST['no_metode'];
$atasnama = $_POST['atasnama'];

$sql = "UPDATE metode SET nama_metode='$nama_metode', no_metode='$no_metode', atasnama='$atasnama' WHERE id_metode='$id_metode'";

if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    echo "<script>alert('metode berhasil diperbarui!'); window.location.href='metode.php';</script>";
} else {
    mysqli_close($con);
    echo "<script>alert('metode gagal diperbarui!'); window.location.href='ubahm.php';</script>";
}
?>
