<?php
$brg1 = "Buku";
$brg2 = "Mouse";
$brg3 = "FlashDisk";
$brg4 = "Pulpen";

$harga1 = 17500;
$harga2 = 30000;
$harga3 = 70000;
$harga4 = 22300;

$jmlbrg1 = 2;
$jmlbrg2 = 5;
$jmlbrg3 = 1;
$jmlbrg4 = 3;

$th1 = $jmlbrg1 * $harga1;
$th2 = $jmlbrg2 * $harga2;
$th3 = $jmlbrg3 * $harga3;
$th4 = $jmlbrg4 * $harga4;

$tharga = $th1 + $th2 + $th3 + $th4;

$pot = 5;
$tpot = $pot * $tharga / 100;
$tdibayar = $tharga - $tpot;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 2 Lat 2</title>
    <style>
        body {
            font-size: 14pt;
        }

        table {
            font-size: 25;
        }
    </style>
</head>

<body>
    <center>
        <font face='comic sans serif' size=5 color='blue'>
            <table border=1 cellspacing="0" cellpadding="3">
                <tr>
                    <td colspan="4" align="center" valign="middle"><b>Pesanan Alat Kantor</b></td>
                </tr>
                <tr>
                    <td><b>Nama Alat</b></td>
                    <td><b>Kuantitas</b></td>
                    <td><b>Harga Satuan</b></td>
                    <td><b>Jumlah Harga</b></td>
                </tr>
                <?php
                // input data
                ?>
                <tr>
                    <td align="left"><?= $brg1 ?></td>
                    <td align="right"><?= $jmlbrg1 ?></td>
                    <td align="right"><?= $harga1 ?></td>
                    <td align="right"><?= $th1 ?></td>
                </tr>
                <tr>
                    <td align="left"><?= $brg2 ?></td>
                    <td align="right"><?= $jmlbrg2 ?></td>
                    <td align="right"><?= $harga2 ?></td>
                    <td align="right"><?= $th2 ?></td>
                </tr>
                <tr>
                    <td align="left"><?= $brg3 ?></td>
                    <td align="right"><?= $jmlbrg3 ?></td>
                    <td align="right"><?= $harga3 ?></td>
                    <td align="right"><?= $th3 ?></td>
                </tr>
                <tr>
                    <td align="left"><?= $brg4 ?></td>
                    <td align="right"><?= $jmlbrg4 ?></td>
                    <td align="right"><?= $harga4 ?></td>
                    <td align="right"><?= $th4 ?></td>
                </tr>
                <tr>
                    <td align="right" colspan="3">Total Harga</td>
                    <td align="right"><?= $tharga ?></td>
                </tr>
                <tr>
                    <td align="right" colspan="3">Diskon <?= $pot ?>%</td>
                    <td align="right"><?= $tpot ?></td>
                </tr>
                <tr>
                    <td align="right" colspan="3">Jumlah Harus dibayar</td>
                    <td align="right"><?= $tdibayar ?></td>
                </tr>
            </table>
        </font>
    </center>
</body>

</html>