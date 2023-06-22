<?php
include "functions.php";

if (!isset($_SESSION['login'])) {
    header("location:index.php");
    exit();
}

$id_pesanan = isset($_GET['id_pesanan']) ? $_GET['id_pesanan'] : "";

$query = "SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan'";
$result = $db->query($query);

if (!$result || $result->num_rows == 0) {
    // Redirect or display an error message
}

$data = $result->fetch_object();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pesanan</title>
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
                        </span> Edit Layanan
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
                                                <form action="updatep.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id_pesanan" class="form-control" value="<?php echo $data->id_pesanan ?>" required readonly>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama" class="form-control" value="<?php echo $data->nama ?>" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <input type="text" name="alamat" class="form-control" value="<?php echo $data->alamat ?>" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                    <label for="id_layanan" class="text-black">Layanan</label>
                                                    <select class="form-control" name="id_layanan" required>
                                                    <?php
                                                            $query_layanan = "SELECT * FROM layanan";
                                                            $result_layanan = $db->query($query_layanan);
                                                            while ($row_layanan = $result_layanan->fetch_assoc()) {
                                                                $selected = $row_layanan['id_layanan'] == $data->id_layanan ? 'selected' : '';
                                                                echo "<option value='" . $row_layanan['id_layanan'] . "' $selected>" . $row_layanan['nama_layanan'] . "</option>";
                                                            }
                                                            ?>
                                                    </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No. Telepon</label>
                                                        <input type="text" name="no_telp" class="form-control" value="<?php echo $data->no_telp ?>" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Tanggal Pesanan</label>
                                                        <input type="date" name="tgl_pesanan" class="form-control" value="<?php echo $data->tgl_pesanan ?>" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Nama Metode</label>
                                                        <select name="id_metode" class="form-control" required>
                                                            <?php
                                                            $query_metode = "SELECT * FROM metode";
                                                            $result_metode = $db->query($query_metode);
                                                            while ($row_metode = $result_metode->fetch_assoc()) {
                                                                $selected = $row_metode['id_metode'] == $data->id_metode ? 'selected' : '';
                                                                echo "<option value='" . $row_metode['id_metode'] . "' $selected>" . $row_metode['nama_metode'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Status Pesanan</label>
                                                        <select name="status_pesanan" class="form-control" required>
                                                            <option value="pending" <?php echo $data->status_pesanan == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                                            <option value="diproses" <?php echo $data->status_pesanan == 'diproses' ? 'selected' : ''; ?>>Diproses</option>
                                                            <option value="selesai" <?php echo $data->status_pesanan == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                                                        </select>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Status Transaksi</label>
                                                        <select name="status_transaksi" class="form-control" required>
                                                            <option value="pending" <?php echo $data->status_transaksi == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                                            <option value="diproses" <?php echo $data->status_transaksi == 'diproses' ? 'selected' : ''; ?>>Diproses</option>
                                                            <option value="selesai" <?php echo $data->status_transaksi == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                                                        </select>
                                                    </div><br>
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
