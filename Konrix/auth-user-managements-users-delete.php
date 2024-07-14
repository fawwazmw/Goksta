<?php
include('services/database.php');

// Cek apakah ada parameter ID
if (isset($_GET['id'])) {
  $user_id = $_GET['id'];

  // Hapus pengguna dari database berdasarkan ID
  $query = "DELETE FROM users WHERE id_user = ?";

  // Prepared statement untuk mencegah SQL Injection
  if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
      header('Location: user-managements-users.php?notif=deleteberhasil');
      exit();
    } else {
      echo "Error deleting user: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
  } else {
    echo "Error preparing statement: " . mysqli_error($conn);
  }
} else {
  echo "Invalid request.";
}

mysqli_close($conn);
