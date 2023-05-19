<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
//Checkconnection
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
echo "Koneksi Berhasil";
?>