<?php
include "functions.php";
if (!isset($_SESSION['login'])) {
    header("location:index.php");
    exit();
}
include("header.php");

$id= $_SESSION['login']; // Mendapatkan id_mas dari session

$host = "localhost";
$username = "root";
$password = "";
$database = "sepatu";

$db = new mysqli($host, $username, $password, $database);

?>
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
            <h2><span class="yellow">Data</span><br>Transaksi</h2>
            </div>
         </div>
      </div>
   </div>
   <div class="card-body">
    <div class="table-responsive" style="color: black;">
        <table class="table table-bordered table-hover table-striped" >
            <thead>
                <tr class="nw">
                    <th>No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Alamat</th>
                    <!-- <th class="text-center">No. Telepon</th> -->
                    <th class="text-center">Layanan</th>                    
                    <th class="text-center">Harga</th>
                    <th class="text-center">Tanggal Pesanan</th>
                    <th class="text-center">BANK</th>
                    <th class="text-center">Status Pesanan</th>
                    <th class="text-center">Status Transaksi</th>                    
                    <th class="text-center">Bukti</th>
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
                WHERE u.id_user = '$id_user' AND p.status_pesanan = 'selesai' AND p.status_transaksi = 'selesai' ORDER BY p.id_pesanan";

                $result = $db->query($query);

                if ($result && $result->num_rows > 0) {
                    $nomor = 1;
                    while ($row = $result->fetch_object()) {
                        $status_pesanan = getStatusColor($row->status_pesanan);
                        $status_transaksi = getStatusColor($row->status_transaksi);

                        // Mendapatkan harga layanan
                        $layanan_id = $row->id_layanan;
                        $query_harga = "SELECT harga FROM layanan WHERE id_layanan = '$layanan_id'";
                        $result_harga = $db->query($query_harga);
                        $harga = $result_harga->fetch_object()->harga;

                        echo "<tr >";
                        echo "<td class='text-center'>{$nomor}</td>";
                        echo "<td>{$row->nama}</td>";
                        echo "<td>{$row->alamat}</td>";
                        // echo "<td>{$row->no_telp}</td>";
                        echo "<td>{$row->nama_layanan}</td>";                        
                        echo "<td class='text-center'>{$harga}</td>";
                        echo "<td class='text-center'>{$row->tgl_pesanan}</td>";
                        echo "<td class='text-center'>{$row->nama_metode}</td>";
                        echo "<td class='text-center'><span class='status {$status_pesanan}'>{$row->status_pesanan}</span></td>";
                        echo "<td class='text-center'><span class='status {$status_transaksi}'>{$row->status_transaksi}</span></td>";
                        echo "<td><a href='../bukti/{$row->bukti}' target='_blank'>{$row->bukti}</a></td>"; 
                        echo "<td class='text-center'>
                                    <a class='btn btn-sm btn-danger' href='aksi.php?act=pesanan_hapus&ID={$row->id_pesanan}' onclick='return confirm(\"Yakin ingin menghapus Pesanan?\")'>hapus</span></a>
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

<!-- end testimonial section -->

<?php include("footer.php"); ?>
