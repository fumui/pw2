<?php
    session_start();
    if (isset($_SESSION['login'])) {
        echo "
            <h1>Selamat Jumpa kembali ". $_SESSION['login']. "</h1>
            <h2>Jika sudah login Anda dapat mengakses halaman ini</h2>
            <h2>Klik <a href='session3.php'>di sini(session3.php)</a> untuk LOGOUT</h2>
        ";
    } else {
        // jika belum login maka session tidak ada artinya
        die ("Anda belum login! Anda tidak berhak masuk ke halaman ini. Silakan login <a href='session1.php'> di sini</a>");
    }
?>