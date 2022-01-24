<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include("connection.php") ?>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white text-center">Daftar Transaksi</h4>
            </div>

            <div class="card-body">
                <ul class="list-group">
                    <?php
                        include("connection.php");
                        $sql="select 
                        transaksi.*,member.*,user.*
                        from transaksi inner join member
                        on member.id_member=transaksi.id_member
                        inner join user 
                        on transaksi.id_user=user.id_user
                        order by transaksi.tgl desc";

                        $hasil = mysqli_query($connect, $sql); 
                        while ($transaksi = mysqli_fetch_array($hasil)) {
                    ?>
                        <li class="list-group-item">   
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info">ID Transaksi</small>
                                    <h5><?=($transaksi["id_transaksi"])?></h5>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info"> ID Member</small>
                                    <h5><?=($transaksi["id_member"])?></h5>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info">Tgl</small>
                                    <h5><?=($transaksi["tgl"])?></h5>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info">Batas Waktu</small>
                                    <h5><?=($transaksi["batas_waktu"])?></h5>  
                                </div>

                          <div class="col-lg-3 col-md-6">
                                    <small class="text-info">ID User</small>
                                    <h5><?=($transaksi["id_user"])?></h5>  
                                
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
