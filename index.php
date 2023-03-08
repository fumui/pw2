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