<?php
    $base = 12;
    $startingCoeficient = 15;
    $totalRow = 20;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 4 Lat 2</title>
    <style>
        body {
            font-size: 14pt;
        }

        table {
            font-size: 25;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <center>
        <table cellspacing="0" cellpadding="3" class="table table-sm table-hover w-auto p-3">
            <tr>
                <td colspan="5" align="center" valign="middle"><b>Tabel Perkalian</b></td>
            </tr>
            <?php
            for ($i = 0; $i < $totalRow; $i++){
                $coeficient = $startingCoeficient + (2 * $i);
                ?>
                    <tr>
                        <td><?= $base ?></td>
                        <td>*</td>
                        <td><?= $coeficient ?></td>
                        <td>=</td>
                        <td><?= $base * $coeficient ?></td>
                    </tr>
                <?php
            }
            ?>
        </table>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>