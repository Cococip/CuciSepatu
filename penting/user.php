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
    <title>Data Pengguna</title>
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
                        </span>Data Pengguna
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
                                                <a class="btn btn-primary" href="dataw_tambah.php"><span class="mdi mdi-library-plus"></span> Tambah</a>
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
                                                    <th>Nama</th>
                                                    <th>email</th>
                                                    <th>Username</th>
                                                    <th class="text-center">Password</th>
                                                    <th class="text-center">Level</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT * FROM user WHERE 
                                                    id_user LIKE '%$q%' OR
                                                    username LIKE '%$q%' OR
                                                    password LIKE '%$q%' OR
                                                    level LIKE '%$q%'
                                                    ORDER BY id_user";

                                                $result = $db->query($query);

                                                if ($result && $result->num_rows > 0) {
                                                    $nomor = 1;
                                                    while ($row = $result->fetch_object()) {
                                                        echo "<tr>";
                                                        echo "<td>{$nomor}</td>";
                                                        echo "<td>{$row->nama}</td>";
                                                        echo "<td>{$row->email}</td>";
                                                        echo "<td>{$row->username}</td>";
                                                        echo "<td>{$row->password}</td>";
                                                        echo "<td class='text-center'>" . ($row->level == 'warga' ? 'Pelanggan' : $row->level) . "</td>";
                                                        echo "<td class='text-center'>
                                                                <a class='btn btn-xs btn-warning' href='ubah.php?id_user={$row->id_user}'>Ubah</a> ||
                                                                <a class='btn btn-xs btn-danger' href='aksi.php?act=user_hapus&ID={$row->id_user}' onclick='return confirm(\"yakin ingin hapus user?\")'><span class='mdi mdi-delete'></span></a>
                                                            </td>";
                                                        echo "</tr>";
                                                        $nomor++;
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='5'>Tidak ada data yang ditemukan.</td></tr>";
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
