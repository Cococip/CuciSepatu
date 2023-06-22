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

// Cek apakah ada file yang diunggah
if (isset($_FILES['bukti']) && $_FILES['bukti']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['bukti'];

    // Mendapatkan informasi file
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    // Mendapatkan ekstensi file
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Daftar ekstensi yang diperbolehkan
    $allowed_ext = ['jpg', 'jpeg', 'png', 'pdf'];

    // Memeriksa apakah ekstensi file diperbolehkan
    if (in_array($file_ext, $allowed_ext)) {
        // Generate nama unik untuk file
        $new_file_name = uniqid('bukti_') . '.' . $file_ext;

        // Menentukan lokasi penyimpanan file
        $target_path = '../bukti/' . $new_file_name;

        // Memindahkan file ke folder tujuan
        if (move_uploaded_file($file_tmp, $target_path)) {
            // Menyimpan nama file ke database
            $sql = "UPDATE pesanan SET nama='$nama', alamat='$alamat', no_telp='$no_telp', id_layanan='$id_layanan', tgl_pesanan='$tgl_pesanan', id_metode='$id_metode', status_pesanan='$status_pesanan', status_transaksi='$status_transaksi', bukti='$new_file_name' WHERE id_pesanan='$id_pesanan'";
            
            if (mysqli_query($con, $sql)) {
                mysqli_close($con);
                echo "<script>alert('Data berhasil diperbarui!'); window.location.href='transaksi.php';</script>";
            } else {
                mysqli_close($con);
                echo "<script>alert('Data gagal diperbarui!'); window.location.href='upload.php?id_pesanan=$id_pesanan';</script>";
            }
        } else {
            mysqli_close($con);
            echo "<script>alert('Terjadi kesalahan saat mengunggah file!'); window.location.href='upload.php?id_pesanan=$id_pesanan';</script>";
        }
    } else {
        mysqli_close($con);
        echo "<script>alert('Ekstensi file tidak diperbolehkan!'); window.location.href='upload.php?id_pesanan=$id_pesanan';</script>";
    }
} else {
    // Tidak ada file yang diunggah, simpan data tanpa bukti
    $sql = "UPDATE pesanan SET nama='$nama', alamat='$alamat', no_telp='$no_telp', id_layanan='$id_layanan', tgl_pesanan='$tgl_pesanan', id_metode='$id_metode', status_pesanan='$status_pesanan', status_transaksi='$status_transaksi' WHERE id_pesanan='$id_pesanan'";

    if (mysqli_query($con, $sql)) {
        mysqli_close($con);
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='transaksi.php';</script>";
    } else {
        mysqli_close($con);
        echo "<script>alert('Data gagal diperbarui!'); window.location.href='upload.php?id_pesanan=$id_pesanan';</script>";
    }
}
?>
