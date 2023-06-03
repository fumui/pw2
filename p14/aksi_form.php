<?php
    // Koneksi dengan basis data
    include 'koneksi.php';

    // Menampung data yang dikirim oleh form
    $kode = $_POST['kode'];
    $jumlah = $_POST['jumlah'];

    // Menginput data ke database
    $res = mysqli_query($conn, "CALL update_datatable('$kode', '$jumlah')");
    if ($res != TRUE){
        echo mysqli_error($conn);
    }
    // Mengalihkan halaman kembali ke index.php
    header("location: form.php");
?>
