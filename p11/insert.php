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

$sql = "INSERT INTO tbl_mhs (FirstName, LastName, Age)
        VALUES              ('Karina', 'Suwandi',29)";
if ($conn->query($sql) === TRUE) {
    echo "Karina Suwandi berhasil di-insert\n";
} else {
    echo "gagal meng-insert Karina Suwandi: " . $conn->error . "\n";
}

$sql = "INSERT INTO tbl_mhs (FirstName, LastName, Age)
        VALUES              ('Glenn', 'Gandari',32)";
if ($conn->query($sql) === TRUE) {
    echo "Glenn Gandari berhasil di-insert\n";
} else {
    echo "gagal meng-insert Glenn Gandari: " . $conn->error . "\n";
}
$conn->close();
?>