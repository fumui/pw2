<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "dbBerita");

// Memeriksa apakah request POST telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai ID berita yang dikirimkan melalui form
    $idKategori = $_POST['idkategori'];

    // Mengeksekusi query untuk menghapus data berdasarkan ID berita
    $query = "DELETE FROM tblKategori WHERE idkategori = $idKategori";
    $result = mysqli_query($koneksi, $query);

    // Memeriksa apakah query berhasil dijalankan
    if ($result) {
        echo "Kategori berhasil dihapus.";
    } else {
        echo "Gagal menghapus data.";
    }
}
?>
