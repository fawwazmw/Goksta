<?php
// Akses file koneksi database
date_default_timezone_set('Asia/Jakarta');
include('services/database.php');

if (isset($_POST['register'])) {
    $name = $_POST['full_name'];
    $user = $_POST['email'];
    $pass = $_POST['password'];
    $full_name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $user);
    $password = password_hash($pass, PASSWORD_BCRYPT);

    // Cek input kosong
    if (empty($name)) {
        header("Location:index.php?gagal=nameKosong");
        exit();
    } else if (empty($user)) {
        header("Location:index.php?gagal=emailKosong");
        exit();
    } else if (empty($pass)) {
        header("Location:index.php?gagal=passKosong");
        exit();
    }

    // Query untuk memasukkan data ke tabel users dengan waktu registrasi dan update
    $sql = "INSERT INTO `users` (`full_name`, `email`, `password`, `register_at`, `updated_at`) 
            VALUES ('$full_name', '$email', '$password', NOW(), NOW())";
    $query_r = mysqli_query($conn, $sql);

    if ($query_r) {
        header("Location:index.php?success=registerSuccess");
    } else {
        header("Location:index.php?gagal=registerGagal");
    }
}
