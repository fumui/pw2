<?php
include "koneksi.php";
$query = 'SELECT * FROM matkul';
if (isset($_POST['nama'])){
    $query = $query . " WHERE nama LIKE '%$_POST[nama]%'";
}
$query = $query . " ORDER BY id ASC";
$hasil = mysqli_query($conn, $query);
?>
<html>

<body>
    <h3>Cari Matkul<h3>
    <form action="tugas.php" method="post">
        <label>Masukan nama: </label>
        <input type="text" name="nama"><br>
        <p><input type="submit" value="Search"><input type="reset" value="Hapus"></p>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Status</th>
        </tr>
        <?php
        while ($data = mysqli_fetch_array($hasil)) {
            ?>
            <tr>
                <td>
                    <?= $data['id'] ?>
                </td>
                <td>
                    <?= $data['nama'] ?>
                </td>
                <td>
                    <?= $data['nilai'] ?>
                </td>
                <td>
                    <?= $data['status'] ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>