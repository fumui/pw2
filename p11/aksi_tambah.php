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
        VALUES              ('$_POST[firstname]', '$_POST[lastname]',$_POST[age])";
if ($conn->query($sql) === TRUE) {
    echo "$_POST[firstname] $_POST[lastname] berhasil di-insert\n";
} else {
    echo "gagal meng-insert $_POST[firstname] $_POST[lastname]: " . $conn->error . "\n";
}
$conn->close();
?>