<?php include "koneksi.php";

$sql = "SELECT * FROM articles ORDER BY id DESC";
$rows = $conn->query($sql);
echo("
    <h2>List Artikel</h2>
    <br><ul>
");
if ($rows === FALSE) {
    echo $conn->connect_error;
}
while($row = mysqli_fetch_array($rows)){
    echo("
    <li>
        $row[1]&nbsp;
        $row[2]&nbsp;
        $row[waktu]&nbsp;
        <a href=\"edit_article.php?articleID=$row[0]\"> Edit </a>&nbsp;
        <a href=\"delete_article.php?articleID=$row[0]\"> Hapus </a>
    </li><br>");
    }
    echo("</table>");
    echo"<br><a href=\"add_article.php\">Tambah</a>";
    echo"<br><a href=\"adminpanel.php\">Admin Panel</a>";
?>