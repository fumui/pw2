<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "dbBerita");

// Memeriksa apakah request POST telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai yang dikirimkan melalui form
    $idBerita = $_POST['idberita'];
    $idKategori = $_POST['idKategori'];
    $judulBerita = $_POST['judulberita'];
    $isiBerita = $_POST['isiberita'];
    $penulis = $_POST['penulis'];
    $tglDipublish = $_POST['tgl'];

    // Mengeksekusi query untuk mengupdate data berita berdasarkan ID berita
    $query = "UPDATE tblBerita SET idKategori = $idKategori, judulberita = '$judulBerita', isiberita = '$isiBerita', penulis = '$penulis', tgldipublish = '$tglDipublish' WHERE idBerita = $idBerita";
    $result = mysqli_query($koneksi, $query);

    // Memeriksa apakah query berhasil dijalankan
    if ($result) {
        echo "Data berhasil diupdate.";
    } else {
        echo "Gagal mengupdate data.";
    }
}
?>
