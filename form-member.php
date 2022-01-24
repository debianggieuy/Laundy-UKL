<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Member</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="Laundry/list-transaksi.php"> laundry</a>
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
                <h4 class="text-white">Form Member</h4>
            </div>

            <div class="card-body">
                <?php
                if(isset($_GET["id_member"])) {
                    include "connection.php";
                    $id = $_GET["id_member"];
                    $sql = "select * from member where id_member='$id_member'";
                    $hasil = mysqli_query($connect, $sql);
                    $member = mysqli_fetch_array($hasil);
                    ?>
                    <form action="process-member.php" method="post"
                    onsubmit="return comfirm('Apakah anda yakin untuk mengubah data ini?')">
                    
                    ID Member
                    <input type="text" name="id_member" 
                    class="form-control mb-2" required
                    value="<?=$member["id_member"];?>" />

                    Nama Member
                    <input type="text" name="nama_member" 
                    class="form-control mb-2" required
                    value="<?=$member["nama_member"];?>" />

                    Alamat Member
                    <input type="text" name="alamat_member" 
                    class="form-control mb-2" required
                    value="<?=$member["alamat_member"];?>" />

                    Jenis kelamin
                    <select name="jenis_kelamin" class="form-control mb-2" required>
                        <option value="laki-laki">laki-laki</option>
                        <option value="perempuan">perempuan</option>
                    </select>

                    Telepon
                    <input type="number" name="tlp" 
                    class="form-control mb-2" required
                    value="<?=$member["tlp"];?>"/>

                    <button type="submit" class="btn btn-success btn-block"
                    name="edit_member">
                        Simpan
                    </button>
                    </form>
                    <?php
                }else{
                    // jika false, maka member digunakan untuk insert
                    ?>
                    <form action="process-member.php" method="post">
                    ID Member
                    <input type="text" name="id_member" 
                    class="form-control mb-2" required />

                    Nama Member
                    <input type="text" name="nama_member" 
                    class="form-control mb-2" required />

                    Alamat Member
                    <input type="text" name="alamat_member" 
                    class="form-control mb-2" required />

                    Jenis kelamin
                    <select name="jenis_kelamin" class="form-control mb-2" required>
                        <option value="laki-laki">laki-laki</option>
                        <option value="perempuan">perempuan</option>
                    </select>

                    Telepon
                    <input type="text" name="tlp" 
                    class="form-control mb-2" required />

                    <button type="submit" class="btn btn-success btn-block"
                    name="simpan_member">
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

