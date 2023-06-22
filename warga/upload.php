<?php
include "functions.php";

if (!isset($_SESSION['login'])) {
    header("location:index.php");
    exit();
}
include "header.php";

$id_pesanan = isset($_GET['id_pesanan']) ? $_GET['id_pesanan'] : "";

$query = "SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan'";
$result = $db->query($query);

if (!$result || $result->num_rows == 0) {
    // Redirect or display an error message
}

$data = $result->fetch_object();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengunggah file bukti
    if ($_FILES['bukti']['error'] == 0) {
        $file_name = $_FILES['bukti']['name'];
        $file_tmp = $_FILES['bukti']['tmp_name'];
        $file_destination = '../bukti/' . $file_name;

        if (move_uploaded_file($file_tmp, $file_destination)) {
            // File berhasil diunggah, lakukan sesuatu jika diperlukan
        } else {
            // Gagal mengunggah file, lakukan sesuatu jika diperlukan
        }
    }

    $status_pesanan = $_POST['status_pesanan'];
    $status_transaksi = $_POST['status_transaksi'];

    // Menyimpan data ke database
    $query = "UPDATE pesanan SET status_pesanan = '$status_pesanan', status_transaksi = '$status_transaksi' WHERE id_pesanan = '$id_pesanan'";
    $result = $db->query($query);

    $query_no_metode = "SELECT no_metode FROM metode WHERE id_metode = '$metode_id'";

    if ($result) {
        // Redirect atau lakukan sesuatu jika data berhasil diperbarui
    } else {
        // Gagal menyimpan data, lakukan sesuatu jika diperlukan
    }
}
?>

<br><br>
<div class="container">
  <div class="row justify-content-center" style="color: black;">
    <div class="col-sm-5">
      <div class="card">
        <div class="card-body">
          <h1 class="text-center" style="color: black;">UPLOAD BUKTI PEMBAYARAN</h1>
          <form action="updatep.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <input type="hidden" name="id_pesanan" class="form-control" value="<?php echo $data->id_pesanan ?>" required readonly>
            </div>
            <div class="form-group">
              <input type="hidden" name="nama" class="form-control" value="<?php echo $data->nama ?>" required>
            </div>
            <div class="form-group">
              <input type="hidden" name="alamat" class="form-control" value="<?php echo $data->alamat ?>" required>
            </div>
            <div class="form-group">
              <input type="hidden" name="id_layanan" class="form-control" value="<?php echo $data->id_layanan ?>" required>
            </div>
            <div class="form-group">
              <input type="hidden" name="no_telp" class="form-control" value="<?php echo $data->no_telp ?>" required>
            </div>
            <div class="form-group">
              <input type="hidden" name="tgl_pesanan" class="form-control" value="<?php echo $data->tgl_pesanan ?>" required>
            </div>
            <div class="form-group">
              <input type="hidden" name="id_metode" class="form-control" value="<?php echo $data->id_metode ?>" required>
            </div>
            <div class="form-group">
              <input type="hidden" name="status_pesanan" class="form-control" value="<?php echo $data->status_pesanan ?>" required>
            </div>
            <div class="form-group">
              <input type="hidden" name="status_transaksi" class="form-control" value="<?php echo $data->status_transaksi ?>" required>
            </div>
            <div class="form-group">
              <label>Bukti</label>
              <input type="file" name="bukti" class="form-control-file">
            </div>
            <center>
              <div class="form-group">
                <input type="submit" name="proses" class="btn btn-primary btn-sm" value="Simpan">
                <a class="btn btn-sm btn-danger d-inline" href="transaksi.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
              </div>
            </center>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>
