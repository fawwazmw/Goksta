<?php
include('services/database.php');
include_once('services/session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Input variables
  if (empty($_POST['comment_id']) || empty($_POST['name']) || empty($_POST['content'])) {
    echo "Invalid input data.";
    exit();
  }

  $comment_id = $_POST['comment_id'];
  $name = $_POST['name'];
  $content = $_POST['content'];

  // Validate Name and Content
  if (empty($name) || empty($content)) {
    header("Location: posts-comments.php?notif=editkosong&jenis=fieldkosong");
    exit();
  }

  // Construct SQL Query
  $sql = "UPDATE post_comments SET name = ?, content = ? WHERE id_comment = ?";

  // Prepare and bind
  if ($stmt = mysqli_prepare($conn, $sql)) {
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssi", $name, $content, $comment_id);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
      header("Location: posts-comments.php?notif=editberhasil");
      exit(); // Exit after redirect
    } else {
      echo "Error updating comment: " . mysqli_error($conn);
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
