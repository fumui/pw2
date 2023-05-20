<?php
$koneksi = mysqli_connect("localhost", "root", "", "dbBerita");

// Membuat tabel tblKategori
$sqlKategori = "CREATE TABLE tblKategori (
    idKategori INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (idKategori),
    nama_kategori VARCHAR(50)
)";
mysqli_query($koneksi, $sqlKategori);

// Membuat tabel tblBerita
$sqlBerita = "CREATE TABLE tblBerita (
    idBerita INT PRIMARY KEY,
    idKategori INT,
    judulberita VARCHAR(100),
    isiberita TEXT,
    penulis VARCHAR(50),
    tgldipublish DATE,
    FOREIGN KEY (idKategori) REFERENCES tblKategori(idKategori)
)";
mysqli_query($koneksi, $sqlBerita);
?>
