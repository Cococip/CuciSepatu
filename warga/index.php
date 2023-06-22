<?php include("header.php"); ?>
<!-- end header inner -->
<!-- end header -->
<!-- banner -->

<!-- end banner -->

<!-- testimonial -->
<div class="testimonial">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2><span class="yellow">Review</span><br>Pengguna</h2>
            </div>
         </div>
      </div>
   </div>
   <div id="testimoni" class="carousel slide testimonial_Carousel" data-ride="carousel">
      <ol class="carousel-indicators">
         <li data-target="#testimoni" data-slide-to="0" class="active"></li>
         <li data-target="#testimoni" data-slide-to="1"></li>
         <li data-target="#testimoni" data-slide-to="2"></li>
         <li data-target="#testimoni" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
         <?php
         include "../penting/koneksi.php";

         // Query untuk mengambil testimonial
         $sql = "SELECT review.id_review, user.nama, review.kualitas, review.ket_review
                  FROM review
                  INNER JOIN user ON review.id_user = user.id_user";

         $result = $koneksi->query($sql);

         $active = true;

         while ($row = $result->fetch_assoc()) {
            $idReview = $row["id_review"];
            $nama = $row["nama"];
            $kualitas = $row["kualitas"];
            $ketReview = $row["ket_review"];
         ?>
         <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
            <div class="container">
               <div class="carousel-caption">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        <div class="test_box">
                           <h3><?php echo $nama; ?></h3><br>
                           <p><?php echo $ketReview; ?></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php
            $active = false;
         }
         ?>
      </div>
     </div>
</div>
<!-- end testimonial section -->

<?php include("footer.php"); ?>
