<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Dashboard</h2>
    <?php 
        if(isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'gagal') {
                echo 'Login gagal! username dan password salah!';
            } else if ($_GET['pesan'] == 'logout') {
                echo 'Anda telah berhasil logout';   
            } else if ($_GET['pesan'] == 'belum_login') {
                echo 'Anda harus login untuk mengakses halaman admin';
            }
        } else {
            
            header('location:login.php?pesan=belum_login');
        }
    ?>
    <br>
    <h3>Halaman ini tampil karena anda berhasil login</h3>
    <a href="logout.php">Logout</a>
</body>
</html>