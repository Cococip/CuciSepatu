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

    $id_user = $_SESSION['id_user'];
    $kualitas = $_POST['kualitas'];
    $ket_review = $_POST['ket_review'];

    // Menyimpan data ke tabel "review"
    $query = "INSERT INTO review (id_user, kualitas, ket_review) VALUES ('$id_user', '$kualitas', '$ket_review')";

    // Eksekusi query
    if (mysqli_query($con, $query)) {
        mysqli_close($con);
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='index.php';</script>";
    } else {
        mysqli_close($con);
        echo "<script>alert('Data gagal ditambahkan!'); window.location.href='komentar.php';</script>";
    }
}
?>
