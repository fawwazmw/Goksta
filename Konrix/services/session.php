<?php
session_start();

// Fungsi untuk mengatur session id_user, roles, full_name, dan profile
function set_user_session($user_id, $roles, $full_name, $profile)
{
  $_SESSION['id_user'] = $user_id;
  $_SESSION['roles'] = $roles;
  $_SESSION['full_name'] = $full_name;
  $_SESSION['profile'] = $profile;
}

// Fungsi untuk memeriksa apakah pengguna telah login
function is_user_logged_in()
{
  return isset($_SESSION['id_user']);
}

// Fungsi untuk memeriksa apakah pengguna memiliki peran tertentu
function user_has_role($role)
{
  return isset($_SESSION['roles']) && in_array($role, $_SESSION['roles']);
}

// Fungsi untuk keluar dari sesi
function logout()
{
  session_unset();
  session_destroy();
}

// Fungsi untuk memeriksa apakah pengguna telah login, jika tidak, redirect ke halaman login
function require_login()
{
  if (!is_user_logged_in()) {
    header("Location: index.php");
    exit();
  }
}
