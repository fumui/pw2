<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "dbBerita");

// Memeriksa apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data dari tabel tblBerita dengan join ke tblKategori
$query = "SELECT tblKategori.nama_kategori, tblBerita.judulberita, tblBerita.isiberita, tblBerita.penulis, tblBerita.tgldipublish
          FROM tblBerita
          INNER JOIN tblKategori ON tblBerita.idKategori = tblKategori.idKategori
          ORDER BY tblBerita.tgldipublish DESC";

$result = mysqli_query($koneksi, $query);

// Memeriksa apakah query berhasil dijalankan
if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}
?>

<html>
    <body>
        <h1>Data Berita</h1>
        <table border='1'>
            <tr>
                <th>Nama Kategori</th>
                <th>Judul Berita</th>
                <th>Isi Berita</th>
                <th>Penulis</th>
                <th>Tanggal Publish</th>
            </tr>
            <?php
            // Menampilkan hasil query
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['nama_kategori'] . "</td>";
                echo "<td>" . $row['judulberita'] . "</td>";
                echo "<td>" . $row['isiberita'] . "</td>";
                echo "<td>" . $row['penulis'] . "</td>";
                echo "<td>" . $row['tgldipublish'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>

<?php
// Menutup koneksi database
mysqli_close($koneksi);
?>
