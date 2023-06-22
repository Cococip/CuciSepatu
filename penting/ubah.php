<?php
include "functions.php";

if (!isset($_SESSION['login'])) {
    header("location:index.php");
    exit();
}

$id_user = isset($_GET['id_user']) ? $_GET['id_user'] : "";

$query = "SELECT * FROM user WHERE id_user = '$id_user'";
$result = $db->query($query);

if (!$result || $result->num_rows == 0) {
    // Redirect or display an error message
    header("location:user_not_found.php");
    exit();
}

$user = $result->fetch_object();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ubah Data Pengguna</title>
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
                        </span> Ubah Data Pengguna
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
                                                <form action="updatea.php" method="POST">
                                                    <div class="form-group">
                                                        <!-- <label>ID User</label> -->
                                                        <input type="hidden" name="id_user" class="form-control" value="<?php echo $user->id_user ?>" required readonly>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama" class="form-control" value="<?php echo $user->nama ?>" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" name="username" class="form-control" value="<?php echo $user->username ?>" required>
                                                    </div><br>
                                                    <!-- <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="password" class="form-control" value="<?php echo $user->password ?>" required>
                                                    </div><br> -->
                                                    <div class="form-group">
                                                        <label>Level</label>
                                                        <select class="form-control" name="level" required>
                                                            <option value="">- - - Pilih Level - - -</option>
                                                            <option value="warga" <?php echo $user->level == 'warga' ? 'selected' : '' ?>>Pelanggan</option>
                                                            <option value="admin" <?php echo $user->level == 'admin' ? 'selected' : '' ?>>Admin</option>
                                                        </select>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control" value="<?php echo $user->email ?>" required>
                                                    </div><br>
                                                    <center>
                                                        <div class="form-group">
                                                            <input type="submit" name="proses" class="btn btn-primary" value="Update">
                                                            <a href="user.php" class="btn btn-danger">Batal</a>
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
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/template.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
</body>

</html>
