<?php include "koneksi.php";
$time = date("d M Y, H:i");
$articleID = $_GET['articleID'];

$perintah = "DELETE FROM articles WHERE id = $articleID";
$hasil = $conn->query($perintah);
if ($hasil){
    echo "Artikel berhasil dihapus<br>";
    echo"<a href=\"tampil_articles.php\">List</a>";
} else {
    echo "Artikel gagal dihapus: " . $conn->error;
}
?>