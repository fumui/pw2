<?php include "koneksi.php";

$judul = $_POST['title'];
$penulis = $_POST['author'];
$lead = $_POST['abstraksi'];
$content = $_POST['content'];

$lead = str_replace("\r\n", "<br>", $lead);
$content = str_replace("\r\n", "<br>", $content);
$sql = "INSERT INTO articles (judul, penulis, lead, content, waktu)
          VALUES ('$judul','$penulis','$lead','$content',now())";

if ($conn->query($sql) === TRUE) {
    echo "<h3 align='center'>Proses penambahan artikel berhasil</h3>";
    echo "<a href=\"tampil_articles.php\">List</a>";
} else {
    echo "<h2 align='center'>Proses penambahan artikel tidak berhasil</h2>";
    echo "<p align='center'>$conn->error</p>";
}
$conn->close();
?>