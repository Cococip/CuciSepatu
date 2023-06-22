<?php
include "functions.php";

if (!isset($_SESSION['login'])) {
    header("location:index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data</title>
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.ico" />
</head>

<body>
    <?php require "partials/navbar.php"; ?>
    <div class="container-fluid page-body-wrapper">
        <?php require "partials/sidebar.php"; ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-account-search-outline"></i>
                        </span> Tambah Data Pesanan
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <form action="addp.php" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="id_pesanan" value="">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama" class="form-control" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <input type="text" name="alamat" class="form-control" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>No. Telepon</label>
                                                        <input type="text" name="no_telp" class="form-control" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Layanan</label>
                                                        <select class="form-control" name="id_layanan" required>
                                                            <?php
                                                            // Koneksi ke database (ganti dengan koneksi database Anda)
                                                            $conn = mysqli_connect("localhost", "root", "", "sepatu");

                                                            // Query untuk mengambil data layanan
                                                            $query_layanan = "SELECT * FROM layanan";
                                                            $result_layanan = mysqli_query($conn, $query_layanan);

                                                            // Loop untuk menampilkan opsi layanan
                                                            while ($layanan = mysqli_fetch_assoc($result_layanan)) {
                                                                echo '<option value="' . $layanan['id_layanan'] . '">' . $layanan['nama_layanan'] . '</option>';
                                                            }

                                                            // Tutup koneksi database
                                                            mysqli_close($conn);
                                                            ?>
                                                        </select>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Tanggal Pesanan</label>
                                                        <input type="date" name="tgl_pesanan" class="form-control" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Metode Pembayaran</label>
                                                        <select class="form-control" name="id_metode" required>
                                                            <?php
                                                            // Koneksi ke database (ganti dengan koneksi database Anda)
                                                            $conn = mysqli_connect("localhost", "root", "", "sepatu");

                                                            // Query untuk mengambil data metode pembayaran
                                                            $query_metode = "SELECT * FROM metode";
                                                            $result_metode = mysqli_query($conn, $query_metode);

                                                            // Loop untuk menampilkan opsi metode pembayaran
                                                            while ($metode = mysqli_fetch_assoc($result_metode)) {
                                                                echo '<option value="' . $metode['id_metode'] . '">' . $metode['nama_metode'] . '</option>';
                                                            }

                                                            // Tutup koneksi database
                                                            mysqli_close($conn);
                                                            ?>
                                                        </select>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Status Pesanan</label>
                                                        <select class="form-control" name="status_pesanan" required>
                                                            <option value="pending">Pending</option>
                                                            <option value="diproses">Diproses</option>
                                                            <option value="selesai">Selesai</option>
                                                        </select>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Status Transaksi</label>
                                                        <select class="form-control" name="status_transaksi" required>
                                                            <option value="pending">Pending</option>
                                                            <option value="diproses">Diproses</option>
                                                            <option value="selesai">Selesai</option>
                                                        </select>
                                                    </div><br>
                                                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">

                                                    <center>
                                                        <div class="form-group">
                                                            <input type="submit" name="proses" class="btn btn-primary btn-sm" value="Simpan">
                                                            <a class="btn btn-sm btn-danger d-inline" href="pesanan.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                                                        </div>
                                                    </center>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/dashboard.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
</body>

</html>
