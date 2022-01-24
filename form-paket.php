<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Form Paket</title>
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
                    Form Paket
                </h4>
            </div>

            <div class="card-body">
                <?php
                if (isset($_GET["id_paket"])) {
                    # form untuk edit
                    $id_paket = $_GET["id_mobil"];
                    $sql = "select * from paket where id_paket='$id_paket'";

                    include "connection.php";
                    #ekseukusi SQL
                    $hasil = mysqli_query($connect, $sql);

                    #konversi ke array
                    $paket = mysqli_fetch_array($hasil);
                    ?>
                    <form action="process-paket.php" method="post" enctype="multipart/form-data">
                    Id Paket
                    <input type="text" name="id_paket" class="form-control mb-2" required
                    value="<?=$paket["id_paket"];?>" readonly>

                           Jenis Paket
                            <select name="jenis_paket" 
                            class="form-control mb-2" required>
                            <option value="kiloan">Kiloan</option>
                            <option value="selimut">Selimut</option>
                            <option value="bed_cover">Bed Cover</option>
                            <option value="kaos">Kaos</option>
                            </select>

                      Harga
                    <input type="text" name="harga" class="form-control mb-2" required
                    value="<?=$paket["harga"];?>">



                    <button type="submit" class="btn btn-info btn-block" name="update_paket">
                        Simpan
                    </button>
                </form>
                    <?php
                } else {
                    # form untuk insert
                    ?>
                    <form action="process-paket.php" method="post" enctype="multipart/form-data">
                    Id Paket
                    <input type="text" name="id_paket" class="form-control mb-2" required>

                    Jenis Paket
                            <select name="jenis_paket" 
                            class="form-control mb-2" required>
                            <option value="kiloan">Kiloan</option>
                            <option value="selimut">Selimut</option>
                            <option value="bed_cover">Bed Cover</option>
                            <option value="kaos">Kaos</option>
                            </select>

                    Harga
                    <input type="text" name="harga" class="form-control mb-2" required>


                    <button type="submit" class="btn btn-info btn-block" name="simpan_paket">
                        Simpan
                    </button>
                </form>
                    <?php
                }
                
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>

