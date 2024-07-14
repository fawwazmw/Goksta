<?php
include('services/database.php');
include_once('services/session.php');

if (is_user_logged_in()) {
  $userId = $_SESSION['id_user'];

  // Update remember_token to NULL
  $stmt = $conn->prepare("UPDATE users SET remember_token = NULL WHERE id_user = ?");
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $stmt->close();

  // Call the logout function
  logout();

  // Redirect to login page or home page
  header('Location: index.php'); // Ganti sesuai kebutuhan Anda
  exit();
} else {
  // If there is no session, redirect to login page
  header('Location: index.php'); // Ganti sesuai kebutuhan Anda
  exit();
}
