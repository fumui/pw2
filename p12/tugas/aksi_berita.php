<?php
    $con = mysqli_connect("localhost","root","","dbBerita");
    if (!$con){
        die('Could not connect:'.mysqli_connect_error());
    }
    $sql="INSERT INTO tblberita (idBerita, idKategori, judulberita, isiberita, penulis, tgldipublish) VALUES ('$_POST[idberita]','$_POST[idKategori]','$_POST[judulberita]','$_POST[isiberita]','$_POST[penulis]','$_POST[tgl]')";
    if (!mysqli_query($con,$sql))
    {
        die('Error:'.mysqli_error());
    }
    echo "1 record added";

    mysqli_close($con)
?>