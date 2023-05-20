<?php
    $con = mysqli_connect("localhost","root","","dbBerita");
    if (!$con){
        die('Could not connect:'.mysqli_connect_error());
    }
    $sql="INSERT INTO tblKategori (idKategori, nama_kategori) VALUES ('$_POST[idkategori]','$_POST[namakategori]')";
    if (!mysqli_query($con,$sql))
    {
        die('Error:'.mysqli_error());
    }
    echo "1 record added";

    mysqli_close($con)
?>