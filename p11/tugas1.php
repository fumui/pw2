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
$sql = "CREATE TABLE tbl_nilai
(
	nim varchar(9) NOT NULL PRIMARY KEY,
	nama_mhs varchar(30),
	matakuliah varchar(20),
	uts float(5,2),
	uas float(5,2),
	tugas float(5,2),
	jmlhadir int
);";
if ($conn->query($sql) === TRUE) {
    echo "tabel berhasil dibuat";
} else {
    echo "gagal membuat tabel: " . $conn->error;
}
$conn->close();
?>