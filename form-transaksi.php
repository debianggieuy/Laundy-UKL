<?php 
session_start();
# jika saat load halaman ini, pastikan telah login sebagai member
if (!isset($_SESSION["member"])) {
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="Laundry/list-transaksi.php"> Laundry</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <a class="nav-item nav-link active" href="list-paket.php"> Paket <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="list-member.php"> Member <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="list-transaksi.php"> Transaksi <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="list-user.php"> User <span class="sr-only">(current)</span></a>

    </div>
  </div>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">
                    Form Transaksi
                </h4>
            </div>

            <div class="card-body">
            <form action="process-transaksi.php" method="post">
                    <!-- input kode transaksi -->
                    ID Transaksi
                      <input type="text" name="id" class="form-control mb-2" required>

                    <?php
                     date_default_timezone_set('Asia/Jakarta');
                    ?>
                      ID Member
                      <input type="text" name="id_member" class="form-control mb-2" required>

                    Tanggal
                    <input type="text" name="tgl" class="form-control mb-2" 
                    readonly value="<?=(date("Y-m-d H:i:s"))?>">

                    Batas waktu
                    <input type="text" name="batas_waktu" class="form-control mb-2" 
                    readonly value="<?=(date("Y-m-d H:i:s"))?>">


                    Tanggal Bayar
                    <input type="text" name="tgl_bayar" class="form-control mb-2" 
                    readonly value="<?=(date("Y-m-d H:i:s"))?>">
                    
                    <select name="status" class="form-control">
                       <option></option>
                      <option value="status">baru</option>
                    <option value="status">proses</option>
                    <option value="status">selesai</option>
                    <option value="status">diambil</option>
                      </select>

                      <select name="dibayar" class="form-control">
                       <option></option>
                      <option value="dibayar">dibayar</option>
                    <option value="dibayar">belum_dibayar</option>
                      </select>

                            <select name="jenis_paket" 
                            class="form-control mb-2" required>
                            <option value="kiloan">Kiloan</option>
                            <option value="selimut">Selimut</option>
                            <option value="bed_cover">Bed Cover</option>
                            <option value="kaos">Kaos</option>
                            </select>


                    ID User
                      <input type="text" name="id_user" class="form-control mb-2" required>

                    <!-- pilih pelanggan melalui nama -->
                    Pilih Data Member
                    <select name="id_member" class="form-control mb-2" required>
                    <?php
                      include "connection.php";
                      $sql = "select * from member";
                      $hasil = mysqli_query($connect, $sql);
                      while ($member = mysqli_fetch_array($hasil)) {
                    ?>

                 <option value="<?=($member["id_member"])?>">
                  <?=($member["nama_member"])?>
                 </option>

                 <?php
                 }
                 ?>
                </select>


               
                <button type="submit "class="btn btn-block btn-dark">
                    Bayar
                </button>
                </form>
            </div>
        </div>
    </div>
</body>  
</html>






