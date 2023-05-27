<?php
include "koneksi.php";
$query = 'SELECT * FROM matkul WHERE TRUE';
$nama = '';
if (isset($_POST['nama'])){
    $nama = $_POST['nama'];
    $query = $query . " AND nama LIKE '%$nama%'";
}
$kolom = 'id';
if (isset($_POST['kolom'])){
    $kolom = $_POST['kolom'];
}
$order = 'ASC';
if (isset($_POST['order'])){
    $order = $_POST['order'];
}
$query = $query . " ORDER BY $kolom $order";

$page = 1;
if (isset($_POST['page'])){
    $page = (int)$_POST['page'];
}
$limit = '2';
if (isset($_POST['limit'])){
    $limit = $_POST['limit'];
}
$offset = ($page - 1) * $limit;
$query = $query . " LIMIT $limit OFFSET $offset";
echo $query;
$hasil = mysqli_query($conn, $query);
?>
<html>

<body>
    <h3>Cari Matkul<h3>
    <form action="tugas3.php" method="post">
        <label>Masukan nama: </label> <input type="text" name="nama" value=<?=$nama?>><br>
        <label>Urut berdasarkan: </label> 
        <select name="kolom">
            <option value="id" <?=$kolom == "id" ? 'selected':''?>>id</option>
            <option value="nama" <?=$kolom == "nama" ? 'selected':''?>>nama</option>
            <option value="nilai" <?=$kolom == "nilai" ? 'selected':''?>>nilai</option>
            <option value="status" <?=$kolom == "status" ? 'selected':''?>>status</option>
        </select>
        <br>
        <label>Urutan: </label> 
        <select name="order">
            <option value="asc">menaik</option>
            <option value="desc">menurun</option>
        </select>
        <br>
        <label>Halaman: </label> 
        <input type="number" name="page" min="1" value=<?=$page?>>
        <br>
        <label>Data Per Halaman: </label> 
        <input type="limit" name="limit" min="1" value=<?=$limit?>>
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