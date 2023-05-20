<?php include "koneksi.php";
$time = date("d M Y, H:i");
$articleID = $_GET['articleID'];

$judul = $_POST['title'];
$penulis = $_POST['author'];
$lead = $_POST['abstraksi'];
$content = $_POST['content'];

$perintah = "UPDATE articles SET 
                judul = '$judul',
                penulis = '$penulis',
                lead = '$lead',
                content = '$content',
                waktu = now()
            WHERE id = $articleID";
$hasil = $conn->query($perintah);
if ($hasil){
    echo "Artikel berhasil diupdate<br>";
    echo"<a href=\"tampil_articles.php\">List</a>";
} else {
    echo "Artikel gagal diupdate: " . $conn->error;
}
?>