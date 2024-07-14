<?php
date_default_timezone_set('Asia/Jakarta');
include('services/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Input variables
  $post_id = $_POST['post_id'];
  $name = $_POST['name'];
  $content = $_POST['content'];
  $parent_id = !empty($_POST['parent_id']) ? $_POST['parent_id'][0] : null; // Ambil nilai parent_id jika ada

  // Validate Name and Content
  if (empty($name) || empty($content)) {
    header("Location: posts-comments.php?notif=tambahkosong&jenis=fieldkosong");
    exit();
  }

  // Set default values for additional columns
  $published = true; // Automatically set to true when published
  $current_time = date('Y-m-d H:i:s');

  // Construct SQL Query
  $sql = "INSERT INTO post_comments (post_id, parent_id, name, content, published, created_at, published_at)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

  // Prepare and bind
  if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "iississ", $post_id, $parent_id, $name, $content, $published, $current_time, $current_time);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
      header("Location: posts-comments.php?notif=tambahberhasil");
      exit(); // Exit after redirect
    } else {
      echo "Error adding comment: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
  } else {
    echo "Error preparing statement: " . mysqli_error($conn);
  }

  // Close the connection
  mysqli_close($conn);
} else {
  // Display message if invalid request method
  echo "Invalid request method.";
}
