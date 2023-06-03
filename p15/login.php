<?php
    include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Login</h2><br>
    <?php
        if(isset($_GET['pesan'])) {
            if($_GET['pesan'] == 'gagal') {
                echo "Login gagal! username dan password salah!";
            } else if ($_GET['pesan'] == 'logout') {
                echo 'Anda telah berhasil logout';
            } else if ($_GET['pesan'] == 'belum_login') {
                echo 'Anda harus login untuk mengakses halaman admin';
            } else {
                echo 'Anda berhasil Logout, silakan login kembali';
            }
        }
    ?>
    <br/><br/>
    <form action="cek_login.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" placeholder="Masukkan username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="text" name="password" placeholder="Masukkan password"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="login"></td>
            </tr>
        </table>
    </form>
</body>
</html>