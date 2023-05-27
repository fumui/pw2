<?php
include "koneksi.php";
$hasil = mysqli_query($conn, "SELECT * FROM customers ORDER BY customerNumber ASC");
?>
<html>

<body>
    <table>
        <tr>
            <th>customerNumber</th>
            <th>customerName</th>
            <th>phone</th>
            <th>addressLine1</th>
            <th>city</th>
        </tr>
        <?php
        while ($data = mysqli_fetch_array($hasil)) {
            ?>
            <tr>
                <td><?=$data['customerNumber']?></td>
                <td><?=$data['customerName']?></td>
                <td><?=$data['phone']?></td>
                <td><?=$data['addressLine1']?></td>
                <td><?=$data['city']?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>