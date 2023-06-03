<?php
    // Koneksi dengan basis data
    include 'koneksi.php';

    // Menampung data yang dikirim oleh form
    $nim = $_POST['nim'];
    $status = $_POST['status'];

    // Menginput data ke database
    $res = mysqli_query($conn, "CALL set_status_pembayaran('$nim', '$status')");
    if ($res != TRUE){
        echo mysqli_error($conn);
    }
    // Mengalihkan halaman kembali ke index.php
    header("location: tugas.php");
?>
