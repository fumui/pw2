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

$sql = "INSERT INTO tbl_nilai (nim, nama_mhs, matakuliah, uts, uas, tugas, jmlhadir)
        VALUES (
            '$_POST[nim]', '$_POST[nama]', '$_POST[matakuliah]', 
            $_POST[uts], $_POST[uas], $_POST[tugas], $_POST[jmlhadir]
        )";
if ($conn->query($sql) === TRUE) {
    echo "nilai $_POST[nama] ($_POST[nim]) berhasil di-insert\n";
} else {
    echo "gagal meng-insert nilai $_POST[nama] ($_POST[nim]): " . $conn->error . "\n";
}
$conn->close();
?>

<a href="./tugas2.php"> Lagi? </a>