<?php
include "koneksi.php";
$query = 'SELECT * FROM matkul WHERE TRUE';
if (isset($_POST['nama'])){
    $query = $query . " AND nama LIKE '%$_POST[nama]%'";
}
$kolom = 'id';
if (isset($_POST['kolom'])){
    $kolom = $_POST['kolom'];
}
$order = 'ASC';
if (isset($_POST['order'])){
    $order = $_POST['order'];
}

$hasil = mysqli_query($conn, $query . " ORDER BY $kolom $order");
?>
<html>

<body>
    <h3>Cari Matkul<h3>
    <form action="tugas2.php" method="post">
        <label>Masukan nama: </label> <input type="text" name="nama"><br>
        <label>Urut berdasarkan: </label> 
        <select name="kolom">
            <option value="id">id</option>
            <option value="nama">nama</option>
            <option value="nilai">nilai</option>
            <option value="status">status</option>
        </select>
        <br>
        <label>Urutan: </label> 
        <select name="order">
            <option value="asc">menaik</option>
            <option value="desc">menurun</option>
        </select>
        <br>
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