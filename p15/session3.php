<?php
    session_start();
    if (isset($_SESSION['login'])) {
        unset($_SESSION);
        session_destroy();

        echo "
            <h1>Anda sudah berhasil LOGOUT</h1>
            <h2>Klik <a href='session1.php'>di sini(session3.php)</a> untuk LOGIN kembali</h2>
            <h2>Anda sekarang tidak bisa masuk ke halaman <a href='session2.php'>session2.php</a> lagi </h2>
        ";
    } else {
        // jika belum login maka session tidak ada artinya
        die ("Anda belum login! Anda tidak berhak masuk ke halaman ini. Silakan login <a href='session1.php'> di sini</a>");
    }
?>