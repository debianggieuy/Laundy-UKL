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
    <title>Daftar Paket</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="Laundry/list-transaksi.php"> Laundry Ukl</a>
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
                <h3 class="text-white text-center">
                    Daftar Paket
                </h3>
                <a href="form-paket.php">
                    <button class="btn btn-success form-control"> 
                        Add Paket
                    </button>
                </a>
            </div>

            <div class="card-body">
                <form action="list-paket.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-2" placeholder="cari">
                </form>

                <ul class="list-group"> 
                <?php
                include("connection.php");
                if (isset($_GET["search"])) {
                    $cari = $_GET["search"];
                    $sql = "select * from paket where
                    id_paket like '%$cari%'
                    or jenis like '%$cari%'
                    or harga like '%$cari%'";
                }else{
                    $sql = "select * from paket";
                }

                # eksekusi SQL
                $hasil = mysqli_query($connect, $sql);
                while ($paket = mysqli_fetch_array($hasil)) {
                ?>
                    <li class="list-group-item ">
                        <div class="row">
                            

                            <div class="col-lg-6 mt-2">
                                <!-- untuk deskripsi -->
                                <h6>ID : <?=$paket["id_paket"]?></h6>
                                <h6>Jenis: <?=$paket["jenis"]?></h6>
                                <h6>harga : <?=$paket["harga"]?></h6>
                            </div>

                            <div class="col-lg-2">
                                <a href="form-paket.php?id_paket=<?=$paket["id_paket"]?>">
                                    <button class="btn btn-info btn-block mb-2">
                                        Edit
                                    </button>
                                </a>

                                <a href="delete-paket.php?id_paket=<?=$paket["id_paket"];?>"
                                    onclick="return confirm('Are you sure delete this person?')">
                                    <button class="btn btn-danger btn-block">

                                        Delete
                                    </button>
                                    </a>
                                    </a>
                            </div>
                        </div>
                    </li>
                    <?php
                }
                ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
