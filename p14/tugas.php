<?php
    // Koneksi database
    include 'koneksi.php';
?>

<html>
<body>
    <h2>Tabel Status Pembayaran</h2>
    <table>
        <tr>
            <th>nim</th>
            <th>nama</th>
            <th>status</th>
        </tr>
        <?php
            $tabel1 = mysqli_query($conn, "SELECT * FROM status_pembayaran");
            while ($dataku = mysqli_fetch_row($tabel1)) {
                echo "<tr>
                    <td>$dataku[0]</td>
                    <td>$dataku[1]</td>
                    <td>$dataku[2]</td>
                </tr>";
            }
        ?>
    </table>

    <h2>Tabel Riwayat Status Pembayaran</h2>
    <table>
        <tr>
            <th>id</th>
            <th>nim</th>
            <th>status sebelumnya</th>
            <th>status terbaru</th>
            <th>waktu</th>
        </tr>
        <?php
            $tabel2 = mysqli_query($conn, "SELECT * FROM riwayat_status_pembayaran");
            while ($data2 = mysqli_fetch_row($tabel2)) {
                echo "<tr>
                    <td>$data2[0]</td>
                    <td>$data2[1]</td>
                    <td>$data2[2]</td>
                    <td>$data2[3]</td>
                    <td>$data2[4]</td>
                </tr>";
            }
        ?>
    </table>

    <h2>update status pembayaran</h2>
    <form action="aksi_tugas.php" method="post">
        <label>nim:</label>
        <select name="nim">
            <?php
                $tabel1 = mysqli_query($conn, "SELECT * FROM status_pembayaran");
                while ($data1 = mysqli_fetch_row($tabel1)) {
                    echo '<option value="' . $data1[0] . '">' . $data1[0] . '/' . $data1[1] . '</option>';
                }
            ?>
        </select><br><br>
        <label>status:</label>
        <select name="status">
            <option value="BELUM LUNAS">BELUM LUNAS</option>
            <option value="LUNAS">LUNAS</option>
        </select>
        <br>
        <input type="submit" value="kirim">
    </form>
</body>
</html>
