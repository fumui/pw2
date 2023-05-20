<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lat_dbase";
$conn = new mysqli($servername, $username, $password, $dbname);
//Checkconnection
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
echo "Koneksi Berhasil";
?>