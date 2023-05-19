<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lat_dbase";
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
$sql = "SELECT *, 
            CASE 
                WHEN nilai_akhir > 80 THEN 'A'
                WHEN nilai_akhir > 70 THEN 'B'
                WHEN nilai_akhir > 60 THEN 'C'
                WHEN nilai_akhir > 50 THEN 'D'
                ELSE 'E'
            END AS grade 
        FROM (
            SELECT *, 
                (0.1 * jmlhadir / 18 * 100) +
                (0.2 * tugas) +
                (0.3 * uts) +
                (0.4 * uas) AS nilai_akhir
            FROM tbl_nilai
        ) as with_na
        ORDER BY nilai_akhir DESC";
$rows = $conn->query($sql);
if (!$rows){
    die("query failed:" . $conn->error);
}
?>
<html>
<body>
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Mata Kuliah</th>
            <th>Nilai Kehadiran</th>
            <th>Tugas</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>Nilai Akhir</th>
            <th>Grade</th>
        </tr>
        <?php
            while($data = mysqli_fetch_array($rows)){
                ?>
                <tr>
                    <td><?=$data['nim']?></td>
                    <td><?=$data['nama_mhs']?></td>
                    <td><?=$data['matakuliah']?></td>
                    <td><?=$data['uts']?></td>
                    <td><?=$data['uas']?></td>
                    <td><?=$data['tugas']?></td>
                    <td><?=$data['jmlhadir']?></td>
                    <td><?=number_format($data['nilai_akhir'],2)?></td>
                    <td><?=$data['grade']?></td>
                </tr>
                <?php
            }
        ?>
    </table>
</body>
</html>