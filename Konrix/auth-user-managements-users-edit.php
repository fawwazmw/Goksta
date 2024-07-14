<?php
date_default_timezone_set('Asia/Jakarta');
include('services/database.php');
include('services/session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
  $user_id = $_POST['user_id'];
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $roles = isset($_POST['roles']) ? $_POST['roles'] : [];

  // Handle file upload for user photo
  $image = $_FILES['image']['name'];
  if (!empty($image)) {
    $target_dir = "assets/images/users/";
    if (!is_dir($target_dir)) {
      mkdir($target_dir, 0755, true); // Create directory if it doesn't exist
    }

    // Create a unique file name
    $unique_file_name = uniqid() . '_' . basename($image);
    $target_file = $target_dir . $unique_file_name;

    // Check file size
    if ($_FILES['image']['size'] > 5000000) {
      echo "Sorry, your file is too large.";
      exit();
    }

    // Allow certain file formats
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      exit();
    }

    // Move the uploaded file to the target directory
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
      echo "Error uploading image.";
      exit();
    }
  }

  // Prepare the update query
  if (!empty($image)) {
    $image_path = "Konrix/" . $target_dir . $unique_file_name;
    $query = "UPDATE users SET full_name=?, email=?, profile=?, updated_at=NOW() WHERE id_user=?";
  } else {
    $query = "UPDATE users SET full_name=?, email=?, updated_at=NOW() WHERE id_user=?";
  }

  // Prepare and bind parameters
  if ($stmt = mysqli_prepare($conn, $query)) {
    if (!empty($image)) {
      mysqli_stmt_bind_param($stmt, "sssi", $full_name, $email, $image_path, $user_id);
    } else {
      mysqli_stmt_bind_param($stmt, "ssi", $full_name, $email, $user_id);
    }
    if (!mysqli_stmt_execute($stmt)) {
      echo "Error updating user: " . mysqli_stmt_error($stmt);
      mysqli_stmt_close($stmt);
      exit();
    }
    mysqli_stmt_close($stmt);
  } else {
    echo "Error preparing update statement: " . mysqli_error($conn);
    exit();
  }

  // Update user roles
  // First, delete existing roles for this user
  $delete_roles_query = "DELETE FROM user_roles WHERE user_id=?";
  if ($stmt = mysqli_prepare($conn, $delete_roles_query)) {
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    if (!mysqli_stmt_execute($stmt)) {
      echo "Error deleting existing roles: " . mysqli_stmt_error($stmt);
      mysqli_stmt_close($stmt);
      exit();
    }
    mysqli_stmt_close($stmt);
  } else {
    echo "Error preparing delete roles statement: " . mysqli_error($conn);
    exit();
  }

  // Insert new roles
  $insert_role_query = "INSERT INTO user_roles (user_id, role_id) VALUES (?, ?)";
  foreach ($roles as $role_id) {
    if ($stmt = mysqli_prepare($conn, $insert_role_query)) {
      mysqli_stmt_bind_param($stmt, "ii", $user_id, $role_id);
      if (!mysqli_stmt_execute($stmt)) {
        echo "Error inserting role: " . mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
        exit();
      }
      mysqli_stmt_close($stmt);
    } else {
      echo "Error preparing insert role statement: " . mysqli_error($conn);
      exit();
    }
  }

  header("Location: user-managements-users.php?notif=editberhasil");
  exit();
} else {
  echo "Invalid request.";
}
