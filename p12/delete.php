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

$sql = "DELETE FROM tbl_mhs WHERE LastName='Prabowo'";

if ($conn->query($sql) === TRUE) {
    echo "Data Prabowo di tabel `tbl_mhs` berhasil dihapus\n";
} else {
    echo "gagal menghapus Prabowo pada tabel `tbl_mhs`: " . $conn->error . "\n";
}

?>
