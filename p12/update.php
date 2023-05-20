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

$sql = "UPDATE tbl_mhs SET Age = '36' WHERE FirstName = 'Karina' AND LastName = 'Suwandi'";

if ($conn->query($sql) === TRUE) {
    echo "Tabel `tbl_mhs` berhasil di-update\n";
} else {
    echo "gagal meng-update tabel `tbl_mhs`: " . $conn->error . "\n";
}

?>