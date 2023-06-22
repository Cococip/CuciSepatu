<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sepatu";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];
// $password = $_POST['password'];
$level = $_POST['level'];
$email = $_POST['email'];

$sql = "UPDATE user SET nama='$nama', username='$username', level='$level', email='$email' WHERE id_user='$id_user'";

if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    echo "<script>alert('Data berhasil diperbarui!'); window.location.href='user.php';</script>";
} else {
    mysqli_close($con);
    echo "<script>alert('Data gagal diperbarui!'); window.location.href='ubah.php?id_user=$id_user';</script>";
}
?>
