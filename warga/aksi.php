<?php
require_once '../penting/functions.php';

// Inisialisasi koneksi database
$db = new mysqli('localhost', 'root', '', 'sepatu');

if ($db->connect_error) {
    die("Koneksi database gagal: " . $db->connect_error);
}

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    
    /** LOGIN */
    if ($act == 'logout') {
        unset($_SESSION['login']);
        header("location:../index.php");
    }

    /** USER */
    else if ($act == 'user_hapus') {
        $db->query("DELETE FROM user WHERE id_user='$_GET[ID]'");
        header("location:user.php");
    } 

     /** METODE */
     else if ($act == 'metode_hapus') {
        $db->query("DELETE FROM metode WHERE id_metode='$_GET[ID]'");
        header("location:metode.php");
    }  
    /** LAYANAN */
    else if ($act == 'layanan_hapus') {
        $db->query("DELETE FROM layanan WHERE id_layanan='$_GET[ID]'");
        header("location:layanan.php");
    }
    /** LAYANAN */
    else if ($act == 'pesanan_hapus') {
        $db->query("DELETE FROM pesanan WHERE id_pesanan='$_GET[ID]'");
        header("location:transaksi.php");
    } 
}
?>
