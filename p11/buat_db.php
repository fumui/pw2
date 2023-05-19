<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
//Check connection
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
$sql = "CREATE DATABASE db_latihan11";
if ($conn->query($sql) === TRUE) {
    echo "database berhasil dibuat";
} else {
    echo "gagal membuat database:" . $conn->error;
}
$conn->close();
?>