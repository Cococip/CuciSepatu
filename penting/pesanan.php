<?php
include "functions.php";

if (!isset($_SESSION['login'])) {
    header("location:index.php");
    exit();
}

$q = isset($_GET['q']) ? $_GET['q'] : "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Pesanan</title>
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
                        </span>Data Pesanan
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
                                        <form class="form-inline">
                                            <div class="form-group" style="float:right;">
                                                <a class="btn btn-primary" href="tambahpesanan.php"><span class="mdi mdi-library-plus"></span> Tambah</a>
                                            </div>
                                            <input type="hidden" name="m" value="relasi" />
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Pencarian" name="q" value="<?= $q ?>" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr class="nw">
                                                    <th>No</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center">Alamat</th>
                                                    <th class="text-center">No. Telepon</th>
                                                    <th class="text-center">Layanan</th>
                                                    <th class="text-center">Tanggal Pesanan</th>
                                                    <th class="text-center">Metode Pembayaran</th>
                                                    <th class="text-center">Status Pesanan</th>
                                                    <th class="text-center">Status Transaksi</th>
                                                    <th class="text-center">User</th>
                                                    <th class="text-center">Bukti Transfer</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT p.*, l.nama_layanan, m.nama_metode, u.username
                                                    FROM pesanan p
                                                    LEFT JOIN layanan l ON p.id_layanan = l.id_layanan
                                                    LEFT JOIN metode m ON p.id_metode = m.id_metode
                                                    LEFT JOIN user u ON p.id_user = u.id_user
                                                    WHERE p.nama LIKE '%$q%'
                                                    ORDER BY p.id_pesanan";

                                                $result = $db->query($query);

                                                if ($result && $result->num_rows > 0) {
                                                    $nomor = 1;
                                                    while ($row = $result->fetch_object()) {
                                                        $status_pesanan = getStatusColor($row->status_pesanan);
                                                        $status_transaksi = getStatusColor($row->status_transaksi);

                                                        echo "<tr>";
                                                        echo "<td>{$nomor}</td>";
                                                        echo "<td>{$row->nama}</td>";
                                                        echo "<td>{$row->alamat}</td>";
                                                        echo "<td>{$row->no_telp}</td>";
                                                        echo "<td>{$row->nama_layanan}</td>";
                                                        echo "<td>{$row->tgl_pesanan}</td>";
                                                        echo "<td>{$row->nama_metode}</td>";
                                                        echo "<td><span class='status {$status_pesanan}'>{$row->status_pesanan}</span></td>";
                                                        echo "<td><span class='status {$status_transaksi}'>{$row->status_transaksi}</span></td>";
                                                        echo "<td>{$row->username}</td>";
                                                        echo "<td><a href='../bukti/{$row->bukti}' target='_blank'>{$row->bukti}</a></td>"; 
                                                        echo "<td class='text-center'>
                                                                <a class='btn btn-xs btn-warning' href='ubahpesanan.php?id_pesanan={$row->id_pesanan}'>Ubah</a> ||
                                                                <a class='btn btn-xs btn-danger' href='aksi.php?act=pesanan_hapus&ID={$row->id_pesanan}' onclick='return confirm(\"Yakin ingin menghapus Pesanan?\")'><span class='mdi mdi-delete'></span></a>
                                                            </td>";
                                                        echo "</tr>";
                                                        $nomor++;
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='11'>Tidak ada data yang ditemukan.</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
