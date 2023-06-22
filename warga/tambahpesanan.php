<?php
include "functions.php";

if (!isset($_SESSION['login'])) {
    header("location:index.php");
}
?>
<?php include("header.php"); ?>
<br><br>
<div class="container">
  <div class="row justify-content-center" style="color: black;">
    <div class="col-sm-5">
      <div class="card">
        <div class="card-body">
          <h1 class="text-center" style="color: black;">TAMBAH PESANAN</h1>
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
                                                    <!-- <div class="form-group">
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
                                                    </div><br> -->
                                                    <input type="hidden" name="status_pesanan" value="pending">
                                                    <input type="hidden" name="status_transaksi" value="pending">
                                                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">

                                                    <center>
                                                        <div class="form-group">
                                                            <input type="submit" name="proses" class="btn btn-primary btn-sm" value="Simpan">
                                                            <a class="btn btn-sm btn-danger d-inline" href="layanan.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                                                        </div>
                                                    </center>
                                                </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include("footer.php"); ?>
