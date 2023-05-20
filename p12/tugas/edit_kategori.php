<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "dbBerita");

// Memeriksa apakah request POST telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai yang dikirimkan melalui form
    $idKategori = $_POST['idkategori'];
    $namaKategori = $_POST['namakategori'];

    // Mengeksekusi query untuk mengupdate data kategori berdasarkan ID kategori
    $query = "UPDATE tblKategori SET nama_kategori = '$namaKategori' WHERE idkategori = $idKategori";
    $result = mysqli_query($koneksi, $query);

    // Memeriksa apakah query berhasil dijalankan
    if ($result) {
        echo "Kategori berhasil diupdate.";
    } else {
        echo "Gagal mengupdate data.";
    }
}
?>
