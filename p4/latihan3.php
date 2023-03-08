<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>Pertemuan 4 Lat 3</title>
    </head>
    <body>
    <div class="col-lg-8 mx-auto p-4 py-md-5">
        <h1 class="text-center">Kalkulator Deret Bilangan Ganjil Mod 3</h1>
        <form method="POST">
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
            if(isset($_POST["submit"])){
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

                for ($x = $nilaiAwal + 3 - ($nilaiAwal % 3); $x <= $nilaiAkhir; $x += 3){
                    if ($x % 2 == 0){
                        continue;
                    }
                    if ($deretStr != ""){
                        $deretStr .= ", ";
                    }
                    $deretStr .= $x;
                    if ($jmlNilaiStr != ""){
                        $jmlNilaiStr .= "+";
                    }
                    $jmlNilaiStr .= $x;
                    $jml++;
                    $jmlNilai += $x;
                }
                if ($jmlNilai != 0){
                    $jmlNilaiStr .= " = " . $jmlNilai;
                    ?>
                    <div class="alert alert-success" role="alert">
                        Maka deret bilangan yang tampil: <?= $deretStr?> <br>
                        Jumlah bilangan: <?= $jml?> <br>
                        Jumlah nilai bilangan: <?= $jmlNilaiStr?>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    </body>
</html>