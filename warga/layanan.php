<?php include("header.php"); ?>

<style>
   .card:hover {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
   }
   .row {
      margin-top: 20px; /* Jarak antara baris pertama dan baris-baris berikutnya */
   }
   .col-md-4 {
      margin-bottom: 20px; /* Jarak antara kolom pertama dan kolom-kolom berikutnya */
   }
</style>

<br>
<!-- end testimonial section -->

<!-- Layanan -->
<div class="container">
   <div class="row">
      <?php
      include "../penting/koneksi.php";
      // Query untuk mengambil layanan
      $layananSql = "SELECT * FROM layanan";
      $layananResult = $koneksi->query($layananSql);

      while ($layananRow = $layananResult->fetch_assoc()) {
         $idLayanan = $layananRow["id_layanan"];
         $namaLayanan = $layananRow["nama_layanan"];
         $infoLayanan = $layananRow["info_layanan"];
         $hargaLayanan = $layananRow["harga"];
         $formattedHarga = number_format($hargaLayanan, 0, ',', '.');
      ?>
      <div class="col-md-4">
         <div class="card h-100 bg-light">
            <div class="card-body d-flex flex-column justify-content-between">
               <h5 class="card-title text-center font-weight-bold" style="font-size: 24px; color: black;"><?php echo $namaLayanan; ?></h5>
               <p class="card-text text-dark text-center mb-3" style="font-size: 18px; color: black;"><?php echo $infoLayanan; ?></p>
               <p class="card-text text-dark text-center mb-4" style="font-size: 18px; color: black;"><span style="color: black;"><?php echo "Rp " . $formattedHarga; ?></span></p>
               <div class="text-center">
                  <a href="tambahpesanan.php" class="btn btn-primary">Pesan Sekarang</a>
               </div>
            </div>
         </div>
      </div>
      <?php
      }
      ?>
   </div>
</div>
<!-- End Layanan -->

<?php include("footer.php"); ?>
