<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lat_dbase";
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
$sql = "CREATE TABLE tbl_mhs
(
	mhsID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName varchar(15),
    LastName varchar(15),
	Age int
);";
if ($conn->query($sql) === TRUE) {
    echo "tabel berhasil dibuat";
} else {
    echo "gagal membuat tabel: " . $conn->error;
}
$conn->close();
?>