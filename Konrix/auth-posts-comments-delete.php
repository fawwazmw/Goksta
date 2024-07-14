<?php
include('services/database.php');

// Check if comment ID is provided
if (isset($_GET['id'])) {
  $comment_id = $_GET['id'];

  // Delete comment from the database based on ID
  $query = "DELETE FROM post_comments WHERE id_comment = $comment_id";
  $result = mysqli_query($conn, $query);

  if ($result) {
    // If deletion is successful, redirect back to the comments page with a notification
    header('Location: posts-comments.php?notif=deleteberhasil');
    exit();
  } else {
    // If there is an error during deletion, display an error message
    echo "Error deleting comment.";
  }
} else {
  // If no ID parameter is provided, display an error message
  echo "Invalid request.";
}
