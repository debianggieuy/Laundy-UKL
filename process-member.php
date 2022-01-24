<?php
include("connection.php");
if (isset($_POST["simpan_member"])) {
    // tampung data input member dari user
    

    $id_member = $_POST["id_member"];
    $nama_member = $_POST["nama_member"];
    $alamat_member = $_POST["alamat_member"];
    $jenis_kelamin=$_POST["jenis_kelamin"];
    $tlp = $_POST["tlp"];


        //membuat perintah sql untuk insert data ke table member
         $sql = "insert into member values
        ('id_member','$nama_member','$alamat_member','$jenis_kelamin','$tlp')";


        //eksekusi perintah sql
    

    //direct ke halaman list-member
    if (mysqli_query($connect, $sql)) {
        header('Location:list-member.php');
    } else {
        printf('Gagal'.mysqli_error($connect));
        exit();
    }

# untuk update

}else if(isset($_POST["edit_member"])){
        # menampung dulu data yang akan di update
        $id = $_POST["id_member"];
        $nama_member = $_POST["nama_member"];
        $alamat_member = $_POST["alama_member"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $tlp= $_POST["tlp"];
        
        $sql = "update member set id_member='$id_member',
        nama_member='$nama_member', alamat_member='$alamat_member',jenis_kelamin='$jenis_kelamin',
        tlp='$tlp' where id_member='$id_member'";        

        
        if (mysqli_query($connect, $sql)) {
            header('Location:list-member.php');
        } else {
            printf('Gagal'.mysqli_error($connect));
            exit();
        }
        
}
?>
