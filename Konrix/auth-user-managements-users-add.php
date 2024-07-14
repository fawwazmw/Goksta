<?php
date_default_timezone_set('Asia/Jakarta');
include('services/database.php');
include_once('services/session.php');

function generateSlug($title)
{
  $random_string = bin2hex(random_bytes(8));
  $slug = preg_replace('/[^A-Za-z0-9]+/', '-', $title);
  $slug .= '-' . $random_string;
  $slug = strtolower($slug);
  return $slug;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $full_name = isset($_POST['full_name']) ? mysqli_real_escape_string($conn, $_POST['full_name']) : '';
  $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
  $password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';
  $roles = isset($_POST['roles']) ? $_POST['roles'] : [];

  // Check if all required fields are filled
  if (!empty($full_name) && !empty($email) && !empty($password) && !empty($roles)) {
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Upload profile image
    $profile_image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
      $upload_dir = 'assets/images/users/';
      $image_name = uniqid() . '_' . basename($_FILES['image']['name']);
      $image_path = $upload_dir . $image_name;
      if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
        $profile_image = $image_path;
      } else {
        echo "Failed to move uploaded file.";
        exit;
      }
    }

    // Begin transaction
    mysqli_begin_transaction($conn);

    // Insert into users table
    $user_query = "INSERT INTO `users` (`full_name`, `email`, `password`, `profile`, `register_at`, `updated_at`) 
                  VALUES (?, ?, ?, ?, NOW(), NOW())";
    $stmt_user = mysqli_prepare($conn, $user_query);
    mysqli_stmt_bind_param($stmt_user, 'ssss', $full_name, $email, $hashed_password, $profile_image);

    // Insert into user_roles table
    $role_query = "INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES (?, ?)";
    $stmt_role = mysqli_prepare($conn, $role_query);

    if ($stmt_user && $stmt_role) {
      if (mysqli_stmt_execute($stmt_user)) {
        $user_id = mysqli_insert_id($conn); // Get the newly inserted user ID

        foreach ($roles as $role_id) {
          mysqli_stmt_bind_param($stmt_role, 'ii', $user_id, $role_id);
          if (!mysqli_stmt_execute($stmt_role)) {
            mysqli_rollback($conn); // Rollback if any role assignment fails
            echo "Error: " . mysqli_stmt_error($stmt_role);
            exit;
          }
        }

        mysqli_commit($conn); // Commit transaction if both queries succeed
        header("Location: user-managements-users.php?notif=registerSuccess");
        exit();
      } else {
        echo "Error: " . mysqli_stmt_error($stmt_user);
      }
    } else {
      echo "Error: " . mysqli_error($conn);
    }

    // Close statements
    mysqli_stmt_close($stmt_user);
    mysqli_stmt_close($stmt_role);
  } else {
    echo "Error: Please fill out all fields (full name, email, password) and select at least one role.";
  }
}

mysqli_close($conn);
