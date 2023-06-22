<?php
session_start();

require_once "koneksi.php";

// Fungsi untuk melakukan redirect menggunakan JavaScript
function redirect_js($url)
{
  echo "<script>window.location.href='$url';</script>";
  exit;
}

if (isset($_POST['register'])) {
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $level = "warga";

  // Enkripsi password dengan MD5
  $encryptedPass = md5($password);

  // Menambahkan data ke tabel masyarakat
  $query = "INSERT INTO user (nama, username, password, email, level) VALUES ('$nama', '$username', '$encryptedPass', '$email', '$level')";
  $result = $koneksi->query($query);
  if ($result) {
    echo "<script>alert('Registrasi berhasil. Silakan gunakan username dan password untuk login.'); window.location.href='index.php';</script>";
  } else {
    echo "<script>alert('Registrasi gagal.');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sepatuku</title>
  <link rel="stylesheet" href="penting/admin/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="penting/admin/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="penting/admin/assets/css/style.css">
  <link rel="shortcut icon" href="penting/admin/assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-7 mx-auto">
            <div class="auth-form-light text-left p-5" style="border-radius: 10px;">
              <h6 class="font-weight-light">Registrasi Akun</h6>

              <form class="pt-3 mb-4" method="post" action="">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control form-control-lg" name="nama" placeholder="Nama" autofocus required />
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" required />
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required />
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="mail" class="form-control form-control-lg" name="email" placeholder="Email" required />
                </div>
                <input type="hidden" name="level" value="warga">
                <div class="d-flex justify-content-center flex-wrap">
                  <input type="submit" name="register" class="btn btn-gradient-primary btn-lg font-weight-medium auth-form-btn mt-3 mx-2" value="Register">
                  <button onclick="window.location.href='index.php'" class="btn btn-danger btn-lg font-weight-medium auth-form-btn mt-3 mx-2">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="penting/admin/assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="penting/admin/assets/js/off-canvas.js"></script>
  <script src="penting/admin/assets/js/hoverable-collapse.js"></script>
  <script src="penting/admin/assets/js/misc.js"></script>
</body>

</html>
