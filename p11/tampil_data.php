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

$sql = "SELECT * FROM tbl_mhs";
$rows = $conn->query($sql);
while($data = mysqli_fetch_row($rows)){
    echo"$data[0] $data[1] $data[2]<br>";
}
$conn->close();
?>