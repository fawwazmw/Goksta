<?php
include('services/database.php');

// Check if tag ID is provided
if (isset($_GET['id_tag'])) {
  $tag_id = $_GET['id_tag'];

  // Delete tag from the database based on ID
  $query = "DELETE FROM tags WHERE id_tag = $tag_id";
  $result = mysqli_query($conn, $query);

  if ($result) {
    // If deletion is successful, redirect back to the tags page with a notification
    header('Location: data-masters-tags.php?notif=deleteberhasil');
    exit();
  } else {
    // If there is an error during deletion, display an error message
    echo "Error deleting tag.";
  }
} else {
  // If no ID parameter is provided, display an error message
  echo "Invalid request.";
}
