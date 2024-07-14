<?php
session_start();
include('services/database.php'); // Menghubungkan ke file koneksi database
include_once('services/session.php'); // Mengimpor file session.php

if (isset($_POST['login'])) {
    $user = $_POST['email'];
    $pass = $_POST['password'];
    $email = mysqli_real_escape_string($conn, $user);
    $password = mysqli_real_escape_string($conn, $pass);

    if (empty($email)) {
        header("Location: index.php?gagal=emailKosong");
        exit();
    }
    if (empty($password)) {
        header("Location: index.php?gagal=passKosong");
        exit();
    }

    $sql = "SELECT `id_user`, `password` FROM `users` WHERE `email` = '$email'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) == 1) {
        $data = mysqli_fetch_assoc($query);
        $stored_password = $data['password'];

        if (password_verify($pass, $stored_password)) {
            $userId = $data['id_user'];
            $roleQuery = "
                SELECT r.name
                FROM user_roles ur
                JOIN roles r ON ur.role_id = r.id_role
                WHERE ur.user_id = $userId
            ";
            $roleResult = mysqli_query($conn, $roleQuery);

            $roles = [];
            while ($roleRow = mysqli_fetch_assoc($roleResult)) {
                $roles[] = $roleRow['name'];
            }

            if (in_array('admin', array_map('strtolower', $roles))) {
                $getNameQuery = "SELECT full_name, profile FROM users WHERE id_user = $userId";
                $nameResult = mysqli_query($conn, $getNameQuery);
                if ($nameResult && mysqli_num_rows($nameResult) > 0) {
                    $userData = mysqli_fetch_assoc($nameResult);
                    $full_name = $userData['full_name'];
                    $profile = $userData['profile'];
                } else {
                    $full_name = 'User';
                    $profile = ''; // Contoh fallback jika tidak ada nama lengkap yang ditemukan
                }

                set_user_session($userId, $roles, $full_name, $profile);

                if (isset($_POST['remember_me'])) {
                    $token = bin2hex(random_bytes(50));
                    $update_token_sql = "UPDATE users SET remember_token = '$token' WHERE email = '$email'";
                    $update_token_result = mysqli_query($conn, $update_token_sql);

                    if ($update_token_result) {
                        setcookie('remember_token', $token, time() + (30 * 24 * 60 * 60), '/');
                    } else {
                        error_log("Gagal menyimpan remember_token: " . mysqli_error($conn));
                    }
                }

                header("Location: dashboard.php");
                exit();
            } else {
                header("Location: index.php?gagal=notAdmin");
                exit();
            }
        } else {
            header("Location: index.php?gagal=passSalah");
            exit();
        }
    } else {
        header("Location: index.php?gagal=emailpassSalah");
        exit();
    }
}
