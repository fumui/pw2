<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "dbBerita");

// Memeriksa apakah request POST telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai ID berita yang dikirimkan melalui form
    $idBerita = $_POST['idberita'];

    // Mengeksekusi query untuk menghapus data berdasarkan ID berita
    $query = "DELETE FROM tblBerita WHERE idBerita = $idBerita";
    $result = mysqli_query($koneksi, $query);

    // Memeriksa apakah query berhasil dijalankan
    if ($result) {
        echo "Berita berhasil dihapus.";
    } else {
        echo "Gagal menghapus data.";
    }
}
?>
