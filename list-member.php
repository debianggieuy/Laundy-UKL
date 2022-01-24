<?php 
session_start();
# jika saat load halaman ini, pastikan telah login sebagai user
if (!isset($_SESSION["user"])) {
} 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>List Member</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="Laundry/list-transaksi.php"> laundry ukl</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="list-member.php"> Member <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="list-user.php"> User <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="list-transaksi.php"> Transaksi <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="list-paket.php"> Paket <span class="sr-only">(current)</span></a>
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

                Daftar Member
                </h4>
            </div>

            <div class="card-body">
                <form action="list-pelanggan.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-2" placeholder="Pencarian" />
                </form>
                <ul class="list-group">
                    <?php
                    include "connection.php";
                    if (isset($_GET["search"])) {
                        $search = $_GET["search"];
                        $sql = "select * from member
                        where nama_member like '%$search%'
                        or alamat_member '%$search%'
                        or jenis_kelamin like '%$search%'
                         or tlp like'%$search%'";
                    } else {
                        $sql =" select * from member";
                    }
                    $hasil = mysqli_query($connect, $sql);
                    while ($member = mysqli_fetch_array($hasil)) {
                        ?>
                        <li class="list-group-item mb-2">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h4>
                                        <?=($member["nama_member"])?>
                                    </h4>
                                    <h6>telepon: <?=($member["tlp"])?></h6>
                                    <h6>Alamat: <?=($member["alamat_member"])?></h6>
                                </div>
                                <div class="col-lg-3">
                                <a href="form-member.php?id=<?php echo $member["id_member"];?>">
                                        <button class="btn btn-info btn-block mb-2">
                                            Edit
                                        </button>
                                </a>

                                </a>
                                
                                    <a href="delete-member.php?id_member=<?=$member["id_member"]?>"
                                    onClick="return confirm('Apakah Anda Yakin?')">

                                <button class="btn btn-block btn-danger">
                                    Hapus
                                    </button>
                                </a>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    
                </ul>

                <!-- button tambah data -->
                <a href="form-member.php">
                    <button class="btn btn-success">
                        Tambah Data member                
                     </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>















