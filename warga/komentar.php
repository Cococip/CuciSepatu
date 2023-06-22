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
          <h1 class="text-center" style="color: black;">TAMBAH REVIEW</h1>
          <form action="addreview.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="id_review" value="">
            </div>
            <div class="form-group">
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
            </div>
            <div class="form-group">
                <label>Kualitas</label>
                <input type="text" name="kualitas" class="form-control" required>
            </div><br>
            <div class="form-group">
                <label>Keterangan Review</label>
                <textarea name="ket_review" class="form-control" required></textarea>
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

<?php include("footer.php"); ?>
