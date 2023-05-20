<?php
include 'pkg/TugasItem.php';
include 'pkg/Pertemuan.php';
$listPertemuan = array(
    new Pertemuan(
        "Pertemuan #1",
        array(
            new TugasItem("p1/latihan1.php", "Latihan 1", "Hello World!", "2023-02-25"),
            new TugasItem("p1/latihan2.php", "Latihan 2", "Scope Variable", "2023-02-25"),
            new TugasItem("p1/latihan3.php", "Latihan 3", "Luas Lingkaran", "2023-02-25"),
        )
    ),
    new Pertemuan(
        "Pertemuan #2",
        array(
            new TugasItem("p2/latihan1.php", "Latihan 1", "String Concatenation", "2023-03-04"),
            new TugasItem("p2/latihan2.php", "Latihan 2", "Pesanan Alat Kantor", "2023-03-04"),
            new TugasItem("p2/latihan3.php", "Latihan 3", "Materi Pertama Web PHP", "2023-03-04"),
        )
    ),
    new Pertemuan(
        "Pertemuan #3",
        array(
            new TugasItem("p3", "Tugas", "Kalkulator Kelulusan", "2023-03-02"),
        )
    ),
    new Pertemuan(
        "Pertemuan #4",
        array(
            new TugasItem("p4/latihan2.php", "Latihan 2", "Tabel Perkalian", "2023-03-09"),
            new TugasItem("p4/latihan3.php", "Latihan 3", "Kalkulator Deret Bilangan Ganjil Mod 3", "2023-03-09"),
        )
    ),
    new Pertemuan(
        "Pertemuan #6",
        array(
            new TugasItem("p6/latihan1.php", "Latihan 1", "Array 1 Dimensi", "2023-03-15"),
            new TugasItem("p6/latihan2.php", "Latihan 2", "Array 2 Dimensi", "2023-03-15"),
        )
    ),
    new Pertemuan(
        "Pertemuan #7",
        array(
            new TugasItem("p7/latihan1.php", "Latihan 1", "Basic UDF", "2023-03-24"),
            new TugasItem("p7/latihan2.php", "Latihan 2", "Aritmatika Menggunakan Fungsi", "2023-03-24"),
            new TugasItem("p7/latihan3.php", "Latihan 3", "Repeat func", "2023-03-24"),
            new TugasItem("p7/tugas.php", "Tugas", "Materi Pemrograman PHP", "2023-03-24"),
        )
    ),
    new Pertemuan(
        "Pertemuan #8",
        array(
            new TugasItem("p8/latihan1.php", "Latihan 1", "Fungsi Tanggal", "2023-03-29"),
            new TugasItem("p8/latihan2.php", "Latihan 2", "Fungsi String", "2023-03-29"),
        )
    ),
    new Pertemuan(
        "Pertemuan #11",
        array(
            new TugasItem("p11/koneksi.php", "Latihan 1", "Koneksi", "2023-05-18"),
            new TugasItem("p11/buat_db.php", "Latihan 2", "Buat DB", "2023-05-18"),
            new TugasItem("p11/buat_tabel.php", "Latihan 3", "Buat Tabel", "2023-05-18"),
            new TugasItem("p11/insert.php", "Latihan 4", "Insert", "2023-05-18"),
            new TugasItem("p11/tampil_data.php", "Latihan 5", "Tampil Data", "2023-05-18"),
            new TugasItem("p11/tampil_data2.php", "Latihan 6", "Tampil Data 2", "2023-05-18"),
            new TugasItem("p11/tampil_jumlah.php", "Latihan 7", "Tampil Jumlah", "2023-05-18"),
            new TugasItem("p11/tutup.php", "Latihan 8", "Tutup Koneksi", "2023-05-18"),
            new TugasItem("p11/form_tambah.php", "Latihan 9", "Bekerja Dengan Form", "2023-05-18"),
            new TugasItem("p11/tugas1.php", "Tugas 1", "Membuat Tabel Nilai", "2023-05-19"),
            new TugasItem("p11/tugas2.php", "Tugas 2", "Form Penilaian", "2023-05-19"),
            new TugasItem("p11/tugas3.php", "Tugas 3", "Pemrosesan Nilai (hanya untuk `action` dari form, tidak untuk diakses langsung)", "2023-05-19"),
            new TugasItem("p11/tugas4.php", "Tugas 4", "Tampil Data Nilai", "2023-05-19"),
        )
    ),
    new Pertemuan(
        "Pertemuan #12",
        array(
            new TugasItem("p12/update.php", "Latihan 1", "Update", "2023-05-20"),
            new TugasItem("p12/delete.php", "Latihan 2", "Delete Prabowo", "2023-05-20"),
            new TugasItem("p12/add_article.php", "Latihan 3", "Form Tambah Article", "2023-05-20"),
            new TugasItem("p12/tampil_article.php", "Latihan 4", "Tampil Artikel", "2023-05-20"),
            new TugasItem("p12/edit_article.php", "Latihan 5", "Edit Artikel (disarankan akses dari Tampil Artikel)", "2023-05-20"),
            new TugasItem("p12/delete_article.php", "Latihan 6", "Hapus Artikel (disarankan akses dari Tampil Artikel)", "2023-05-20"),
            new TugasItem("p12/tugas/buat_db.php", "Tugas 1", "Buat DB", "2023-05-20"),
            new TugasItem("p12/tugas/buat_tabel.php", "Tugas 2", "Buat Tabel", "2023-05-20"),
            new TugasItem("p12/tugas/form_kategori.php", "Tugas 3", "Form Tambah, Edit, Hapus Kategori", "2023-05-20"),
            new TugasItem("p12/tugas/form_berita.php", "Tugas 4", "Form Tambah, Edit, Hapus Berita", "2023-05-20"),
            new TugasItem("p12/tugas/tampil_data.php", "Tugas 5", "Tampil Data", "2023-05-20"),
        )
    )
)
    ?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Pertemuan 3</title>
</head>

<body>
    <div class="col-lg-8 mx-auto p-4 py-md-5">
        <h1 class="text-center">Fuad Mustamirrul Ishlah</h1>
        <?php
        Pertemuan::printPertemuanListAsAccordion("accordion", $listPertemuan)
            ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>