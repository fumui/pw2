<?php
include "koneksi.php";
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$hasil = mysqli_query($conn, "SELECT * FROM tabel_mahasiswa WHERE nama LIKE '%$nama%' OR '%$jurusan%' ORDER BY nama ASC");
?>
<html>

<body>
    <table>
        <tr>
            <th>NIM</th>
            <th>nama</th>
            <th>alamat</th>
            <th>jurusan</th>
        </tr>
        <?php
        while ($data = mysqli_fetch_array($hasil)) {
            ?>
            <tr>
                <td><?=$data['nim']?></td>
                <td><?=$data['nama']?></td>
                <td><?=$data['alamat']?></td>
                <td><?=$data['jurusan']?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>