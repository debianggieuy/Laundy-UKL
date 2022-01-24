<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form User</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="list-paket.php">Laundry</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="list-member.php">Member <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="list-user.php">User <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="form-paket.php"> Paket <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="list-transaksi.php"> Transaksi <span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
  </div>
</nav>
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white">Form User</h4>
            </div>

            <div class="card-body">
                <?php
                if(isset($_GET["id_user"])){
                    // memeriksa ketika load file ini,
                    // apakah membawa data GET dengan nama id_user
                    // jika ture, maka form anggota digunakan untuk edit

                    # mengakses data anggota dari id_member yg dikirim
                    include "connection.php";
                    $id_user = $_GET["id_user"];
                    $sql = "select * from user where id_user='$id_user'";
                    // eksekusiperintah SQL
                    $hasil = mysqli_query($connect, $sql);
                    # konversi hasil query ke bentuk array
                    $user = mysqli_fetch_array($hasil);
                    ?>
                    <form action="process-user.php" method="post">

                       ID User
                        <input type="text" name="id_user"
                        class="form-control mb-2" required
                        value="<?=$user["id_user"];?>" readonly>

                        Nama User
                        <input type="text" name="nama_user"
                        class="form-control mb-2" required
                        value="<?=$user["nama_user"];?>">

                        Username
                        <input type="text" name="username"
                        class="form-control mb-2" required
                        value="<?=$user["username"];?>">

                        Password
                        <input type="password" name="password"
                        class="form-control mb-2"
                        value="<?=$user["password"];?>">

                        Role
                        <select name="role" 
                        class="form-control mb-2" required>
                        <option value="admin">admin</option>
                        <option value="kasir">kasir</option>
                        </select>

                    <button type="submit" class="btn btn-success btn-block"
                    name="edit_user">
                        Simpan
                    </button>
                    </form>
                    <?php
                }else{

                    // jika false, maka form user digunakan untuk insert
                    ?>
                    <form action="process-user.php" method="post">


                    ID User
                    <input type="text" name="id_user" 
                    class="form-control mb-2" required />

                    Nama User
                    <input type="text" name="nama_user" 
                    class="form-control mb-2" required />

                     Username
                    <input type="text" name="username" 
                    class="form-control mb-2" required />

                    Password
                    <input type="text" name="password" 
                    class="form-control mb-2" required />

                        Role
                        <select name="role" 
                        class="form-control mb-2" required>
                        <option value="admin">admin</option>
                        <option value="kasir">kasir</option>
                        </select>


                    <button type="submit"
                    class="btn btn-success btn-block"
                    name="simpan_user">
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
