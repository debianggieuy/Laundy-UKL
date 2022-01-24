<?php
session_start();
include "connection.php";
# sesion -> tempat penyimpanan data di sisi server
# yang dapat diakses secara global pada halaman web yang
# membutuhkan
if (isset($_POST["login"])) {
    # menampung data username dan password
    $username = $_POST["username"];
    $password = sha1($_POST["password"]);

    # ambil data karyawan sesuai username dan password 
    $sql = "select * from user where
    username='$username' and password='$password'";
    $hasil = mysqli_query($connect, $sql);
    echo $sql;

    # cek hasil query
    # mysqli_num_rows -> cek jumlah baris hasil query
   if (mysqli_num_rows($hasil) > 0) {
       # login berhasil
       # data disimpan ke dalam session
       $user = mysqli_fetch_array($hasil);
       $_SESSION["user"] = $user;
       header("location:list-paket.php");
   } else {
        # login gagal
        echo $sql;
        // header("location:login.php");
   }
}
?>
