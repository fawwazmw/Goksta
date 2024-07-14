<?php
include_once 'services/database.php';
include_once 'services/session.php';

// Check if form is submitted and request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'update') {
  // Validate and sanitize inputs
  $comment_id = $_POST['comment_id'] ?? null;
  $name = $_POST['name'] ?? '';
  $content = $_POST['content'] ?? '';
  $parent_id = $_POST['parent_id'] ?? null;

  // Validate comment ID
  if (!filter_var($comment_id, FILTER_VALIDATE_INT)) {
    echo "Invalid comment ID.";
    exit();
  }

  // Prepare update query
  $query_update = "UPDATE post_comments SET name = ?, content = ?, parent_id = ? WHERE id_comment = ?";
  if ($stmt_update = mysqli_prepare($conn, $query_update)) {
    mysqli_stmt_bind_param($stmt_update, "ssii", $name, $content, $parent_id, $comment_id);
    if (mysqli_stmt_execute($stmt_update)) {
      header("Location: posts-comments.php?notif=editberhasil");
    } else {
      echo "Error updating comment: " . mysqli_stmt_error($stmt_update);
    }
    mysqli_stmt_close($stmt_update);
  } else {
    echo "Error preparing update statement: " . mysqli_error($conn);
  }

  mysqli_close($conn);
} else {
  echo "Invalid request.";
}
