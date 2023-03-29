<?php
$backButtonActiveStyle = "disabled";
if (isset($_GET["materi"])) {
    $backButtonActiveStyle = "active";
}
function displayContent()
{

    if (!isset($_GET["materi"])) {
        displayMainForm();
        return;
    }
    $materi = $_GET["materi"];
    switch ($materi) {
        case 1:
            displayIfElse();
            break;
        case 2:
            displaySwitchCase();
            break;
        case 3:
            displayLooping();
            break;
        case 4:
            displayArray();
            break;
    }
}
function displayMainForm()
{
    ?>
        <form method="GET">
            <div class="mb-3">
                <label for="materi" class="form-label">Pilih materi yang ingin Anda pelajari</label>
                <select class="form-select" name="materi" id="materi">
                    <option value="1">[1] Penggunaan IF</option>
                    <option value="2">[2] Penggunaan SWITCH...CASE</option>
                    <option value="3">[3] Penggunaan Looping</option>
                    <option value="4">[4] Penggunaan Array</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php
}
function displayIfElse()
{
    ?>
        <div class="col-lg-8 mx-auto p-4 py-md-5">
            <h1 class="text-center">Kalkulator Kelulusan</h1>
            <?php
            if (isset($_POST["submit"])) {
                processIfElse();
            } else {
                displayFormGrading(1);
            }
            ?>
        </div>
    <?php
}
function displaySwitchCase()
{
    ?>
        <div class="col-lg-8 mx-auto p-4 py-md-5">
            <h1 class="text-center">Kalkulator Kelulusan</h1>
            <?php
            if (isset($_POST["submit"])) {
                processSwitchCase();
            } else {
                displayFormGrading(2);
            }
            ?>
        </div>
    <?php
}
function displayLooping()
{
    ?>
        <div class="col-lg-8 mx-auto p-4 py-md-5">
            <h1 class="text-center">Kalkulator Deret Bilangan Ganjil Mod 3</h1>
            <form method="POST" action="?materi=3">
                <div class="mb-3">
                    <label for="inputNilaiAwal" class="form-label">Nilai Awal</label>
                    <input type="number" class="form-control" name="inputNilaiAwal">
                </div>
                <div class="mb-3">
                    <label for="inputNilaiAkhir" class="form-label">Nilai Akhir</label>
                    <input type="number" class="form-control" name="inputNilaiAkhir">
                </div>
                <button type="submit" name="submit" value="Submit" class="btn btn-primary">Hitung</button>
            </form>
            <?php
            if (isset($_POST["submit"])) {
                $nilaiAwal = $_POST["inputNilaiAwal"];
                $nilaiAkhir = $_POST["inputNilaiAkhir"];;

                $deretStr = "";
                $jml = 0;
                $jmlNilai = 0;
                $jmlNilaiStr = "";

                if ($nilaiAwal > $nilaiAkhir) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            Nilai awal tidak boleh melebihi nilai akhir
                        </div>
                    <?php
                    return;
                }

                for ($x = $nilaiAwal + 3 - ($nilaiAwal % 3); $x <= $nilaiAkhir; $x += 3) {
                    if ($x % 2 == 0) {
                        continue;
                    }
                    if ($deretStr != "") {
                        $deretStr .= ", ";
                    }
                    $deretStr .= $x;
                    if ($jmlNilaiStr != "") {
                        $jmlNilaiStr .= "+<wbr>";
                    }
                    $jmlNilaiStr .= $x;
                    $jml++;
                    $jmlNilai += $x;
                }
                if ($jmlNilai != 0) {
                    $jmlNilaiStr .= " = " . $jmlNilai;
                    ?>
                        <div class="alert alert-success" role="alert">
                            Maka deret bilangan yang tampil: <?= $deretStr ?> <br>
                            Jumlah bilangan: <?= $jml ?> <br>
                            Jumlah nilai bilangan: <?= $jmlNilaiStr ?>
                        </div>
                    <?php
                } else {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            Tidak ada bilangan yang sesuai
                        </div>
                    <?php
                }
            }
            ?>
        </div>
    <?php
}
function displayArray()
{
    if (isset($_POST["submit"])) {
        processMatrix();
    } else {
        displayFormMatrix();
    }
}
function displayFormGrading($materi)
{
    ?>
        <form method="POST" action="?materi=<?= $materi ?>">
            <div class="mb-3">
                <label for="inputNama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="inputNama">
            </div>
            <div class="mb-3">
                <label for="inputNIM" class="form-label">NIM</label>
                <input type="text" class="form-control" name="inputNIM">
            </div>
            <div class="mb-3">
                <label for="inputMataKuliah" class="form-label">Mata Kuliah</label>
                <input type="text" class="form-control" name="inputMataKuliah">
            </div>
            <div class="mb-3">
                <label for="inputJumlahKehadiran" class="form-label">Jumlah Kehadiran</label>
                <input type="number" class="form-control" name="inputJumlahKehadiran">
            </div>
            <div class="mb-3">
                <label for="inputNilaiTugas" class="form-label">Nilai Tugas</label>
                <input type="number" class="form-control" name="inputNilaiTugas">
            </div>
            <div class="mb-3">
                <label for="inputNilaiUTS" class="form-label">Nilai UTS</label>
                <input type="number" class="form-control" name="inputNilaiUTS">
            </div>
            <div class="mb-3">
                <label for="inputNilaiUAS" class="form-label">Nilai UAS</label>
                <input type="number" class="form-control" name="inputNilaiUAS">
            </div>
            <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
        </form>
    <?php
}
function processIfElse()
{
    #region: vars
    $nama = $_POST["inputNama"];
    $nim = $_POST["inputNIM"];
    $matkul = $_POST["inputMataKuliah"];
    $kehadiran = $_POST["inputJumlahKehadiran"];
    $tugas = $_POST["inputNilaiTugas"];
    $uts = $_POST["inputNilaiUTS"];
    $uas = $_POST["inputNilaiUAS"];
    $nilaiAkhir = calculateNilaiAkhir($kehadiran, $tugas, $uts, $uas);
    #endregion: vars

    $grade = "E";
    if ($nilaiAkhir > 80) {
        $grade = "A";
    } else if ($nilaiAkhir > 70) {
        $grade = "B";
    } else if ($nilaiAkhir > 60) {
        $grade = "C";
    } else if ($nilaiAkhir > 50) {
        $grade = "D";
    }

    $keterangan = "Tidak Lulus";
    if ($nilaiAkhir > 65) {
        $keterangan = "Lulus";
    }

    displayNilaiAkhir($nama, $nim, $matkul, $kehadiran, $tugas, $uts, $uas, $keterangan, $nilaiAkhir, $grade);
}
function processSwitchCase()
{
    #region: vars
    $nama = $_POST["inputNama"];
    $nim = $_POST["inputNIM"];
    $matkul = $_POST["inputMataKuliah"];
    $kehadiran = $_POST["inputJumlahKehadiran"];
    $tugas = $_POST["inputNilaiTugas"];
    $uts = $_POST["inputNilaiUTS"];
    $uas = $_POST["inputNilaiUAS"];
    $nilaiAkhir = calculateNilaiAkhir($kehadiran, $tugas, $uts, $uas);
    #endregion: vars
    switch (true) {
        case ($nilaiAkhir > 80):
            $grade = "A";
            break;
        case ($nilaiAkhir > 70):
            $grade = "B";
            break;
        case ($nilaiAkhir > 60):
            $grade = "C";
            break;
        case ($nilaiAkhir > 50):
            $grade = "D";
            break;
        default:
            $grade = "E";
            break;
    }

    switch (true) {
        case ($nilaiAkhir > 65):
            $keterangan = "Lulus";
            break;
        default:
            $keterangan = "Tidak Lulus";
            break;
    }
    displayNilaiAkhir($nama, $nim, $matkul, $kehadiran, $tugas, $uts, $uas, $keterangan, $nilaiAkhir, $grade);
}
function calculateNilaiAkhir($kehadiran, $tugas, $uts, $uas)
{
    return ($kehadiran / 18 * 10) + ($tugas / 5) + ($uts * 3 / 10) + ($uas * 2 / 5);
}
function displayNilaiAkhir($nama, $nim, $matkul, $kehadiran, $tugas, $uts, $uas, $keterangan, $nilaiAkhir, $grade)
{
    ?>
        <div class="alert <?= $keterangan == "Lulus" ? "alert-success" : "alert-danger" ?>" role="alert">
            Nama = <?= $nama ?> <br>
            NIM = <?= $nim ?> <br>
            Mata Kuliah = <?= $matkul ?> <br>
            Jumlah Kehadiran = <?= $kehadiran ?> <br>
            Nilai Tugas = <?= $tugas ?> <br>
            Nilai UTS = <?= $uts ?> <br>
            Nilai UAS = <?= $uas ?> <br>
            Nilai Akhir = <?= $nilaiAkhir ?> <br>
            Grade = <?= $grade ?> <br>
            Keterangan = <?= $keterangan ?>
        </div>
    <?php
}
function processMatrix()
{
    #region: vars
    $matrixA = array();
    $matrixB = array();
    $barisA = $_POST["barisA"];
    $kolomA = $_POST["kolomA"];
    $barisB = $_POST["barisB"];
    $kolomB = $_POST["kolomB"];
    for ($i = 0; $i < $barisA; $i++) {
        $baris = array();
        for ($j = 0; $j < $kolomA; $j++) {
            array_push($baris, $_POST["A" . ($i + 1) . ($j + 1)]);
        }
        array_push($matrixA, $baris);
    }
    for ($i = 0; $i < $barisB; $i++) {
        $baris = array();
        for ($j = 0; $j < $kolomB; $j++) {
            array_push($baris, $_POST["B" . ($i + 1) . ($j + 1)]);
        }
        array_push($matrixB, $baris);
    }
    #endregion: vars
    $hasil = kalikanMatrix($matrixA, $matrixB);
    if (gettype($hasil) == "string") {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= $hasil ?>
            </div>
        <?php
        return;
    }
    $barisHasil = count($hasil);
    $kolomHasil = count($hasil[0]);
    ?>
    <div class="alert alert-success" role="alert">
        <table class="table">
            <tr>
                <th colspan="<?= $kolomHasil ?>">Matrix Hasil</th>
            </tr>
            <?php
            for ($i = 0; $i < $barisHasil; $i++) {
                ?>
                    <tr>
                        <?php
                        for ($j = 0; $j < $kolomHasil; $j++) {
                        ?>
                            <td>
                                <?= $hasil[$i][$j] ?>
                            </td>
                        <?php
                        }
                        ?>
                    </tr>
                <?php
            }
            ?>
        </table>
    </div>
<?php
}
function kalikanMatrix($m1, $m2)
{
    $m1Baris = count($m1);
    $m1Kolom = count($m1[0]);
    $m2Kolom = count($m2[0]);

    $m2Baris = count($m2);
    if ($m1Kolom != $m2Baris) {
        return "Matrix tidak bisa dikalikan: ordo matrix tidak kompatibel";
    }

    $result = array();
    for ($i = 0; $i < $m1Baris; $i++) {
        $row = array();
        for ($j = 0; $j < $m2Kolom; $j++) {
            $sum = 0;
            for ($k = 0; $k < $m1Kolom; $k++) {
                $sum += $m1[$i][$k] * $m2[$k][$j];
            }
            $row[] = $sum;
        }
        $result[] = $row;
    }

    return $result;
}
function displayFormMatrix()
{
    $barisA = 3;
    $kolomA = 3;
    $barisB = 3;
    $kolomB = 3;
    if (isset($_GET["customOrdo"])) {
        $barisA = $_GET["barisA"];
        $kolomA = $_GET["kolomA"];
        $barisB = $_GET["barisB"];
        $kolomB = $_GET["kolomB"];
    }
    ?>
    <form method="GET" class="col-sm-3 mb-3">
        <div class="mb-3">
            <input type="hidden" name="materi" id="materi" value="4">
            <div class="row">
                <div class="col">
                    <label for="barisA" class="form-label">Baris A</label>
                    <input class="form-control" type="number" name="barisA" id="barisA" value="<?= $barisA ?>">
                </div>
                <div class="col">
                    <label for="kolomA" class="form-label">Kolom A</label>
                    <input class="form-control" type="number" name="kolomA" id="kolomA" value="<?= $kolomA ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="barisB" class="form-label">Baris B</label>
                    <input class="form-control" type="number" name="barisB" id="barisB" value="<?= $barisB ?>">
                </div>
                <div class="col">
                    <label for="kolomB" class="form-label">Kolom B</label>
                    <input class="form-control" type="number" name="kolomB" id="kolomB" value="<?= $kolomB ?>">
                </div>
            </div>
        </div>
        <button type="submit" name="customOrdo" value="true" class="btn btn-primary">Submit</button>
    </form>
    <div class="container card">
        <form method="POST" action="?materi=4">
            <input type="hidden" name="barisA" value="<?= $barisA ?>">
            <input type="hidden" name="kolomA" value="<?= $kolomA ?>">
            <input type="hidden" name="barisB" value="<?= $barisB ?>">
            <input type="hidden" name="kolomB" value="<?= $kolomB ?>">
            <table class="table mx-1">
                <tr>
                    <th colspan="<?= $kolomA ?>">Matrix A</th>
                </tr>
                <?php
                for ($i = 0; $i < $barisA; $i++) {
                ?>
                    <tr>
                        <?php
                        for ($j = 0; $j < $kolomA; $j++) {
                        ?>
                            <td>
                                <input type="number" class="form-control" name="A<?= "" . ($i + 1) . ($j + 1) ?>">
                            </td>
                        <?php
                        }
                        ?>
                    </tr>
                <?php
                }
                ?>
            </table>

            <table class="table mx-1">
                <tr>
                    <th colspan="<?= $kolomB ?>">Matrix B</th>
                </tr>
                <?php
                for ($i = 0; $i < $barisB; $i++) {
                ?>
                    <tr>
                        <?php
                        for ($j = 0; $j < $kolomB; $j++) {
                            ?>
                                <td>
                                    <input type="number" class="form-control" name="B<?= "" . ($i + 1) . ($j + 1) ?>">
                                </td>
                            <?php
                        }
                        ?>
                    </tr>
                <?php
                }
                ?>
            </table>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
<?php
}
?>

<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pertemuan 7 Lat 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        /* Custom default button */
        .btn-light,
        .btn-light:hover,
        .btn-light:focus {
            color: #333;
            text-shadow: none;
            /* Prevent inheritance from `body` */
        }

        /*
        * Base structure
        */

        .cover-container {
            max-width: 42em;
        }

        /*
        * Header
        */

        .nav-masthead .nav-link {
            color: rgba(0, 0, 0, .5);
            border-bottom: .25rem solid transparent;
        }

        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
            border-bottom-color: rgba(0, 0, 0, .25);
        }

        .nav-masthead .nav-link+.nav-link {
            margin-left: 1rem;
        }

        .nav-masthead .active {
            color: #000;
            border-bottom-color: #000;
        }
    </style>
</head>

<body class="d-flex h-100 text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0">Pertemuan 7</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="../">Home</a>
                    <a class="nav-link fw-bold py-1 px-0 <?= $backButtonActiveStyle ?>" aria-current="page" href="./tugas.php">Back</a>
                </nav>
            </div>
        </header>

        <main class="px-3 d-flex align-items-center flex-column">
            <h1>Materi Pemrograman PHP</h1>
            <?php displayContent() ?>
        </main>

        <footer class="mt-auto text-black-50">
            <p>Fuad Mustamirrul Ishlah (201011400093)</p>
        </footer>
    </div>
</body>

</html>