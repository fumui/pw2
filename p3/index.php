<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>Pertemuan 3</title>
    </head>
    <body>
    <div class="col-lg-8 mx-auto p-4 py-md-5">
        <h1 class="text-center">Kalkulator Kelulusan</h1>
        <?php
            if(isset($_POST["submit"])){
                $nama = $_POST["inputNama"];
                $nim = $_POST["inputNIM"];
                $matkul = $_POST["inputMataKuliah"];
                $kehadiran = $_POST["inputJumlahKehadiran"];
                $tugas = $_POST["inputNilaiTugas"];
                $uts = $_POST["inputNilaiUTS"];
                $uas = $_POST["inputNilaiUAS"];
                $nilaiAkhir = ($kehadiran/18*10) + ($tugas/5) + ($uts*3/10) + ($uas*2/5);

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
                
                ?>
                <div class="alert <?= $keterangan == "Lulus" ? "alert-success" : "alert-danger"?>" role="alert">
                    Nama = <?= $nama?> <br>
                    NIM = <?= $nim?> <br>
                    Mata Kuliah = <?= $matkul?> <br>
                    Jumlah Kehadiran = <?= $kehadiran?> <br>
                    Nilai Tugas = <?= $tugas?> <br>
                    Nilai UTS = <?= $uts?> <br>
                    Nilai UAS = <?= $uas?> <br>
                    Nilai Akhir = <?= $nilaiAkhir?> <br>
                    Grade = <?= $grade?> <br>
                    Keterangan = <?= $keterangan?> 
                </div>
                <?php
            } else {
                ?>
                <form method="POST">
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
        ?>
        </div>
    </body>
</html>