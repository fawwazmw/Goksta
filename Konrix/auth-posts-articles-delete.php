<?php
include('services/database.php');

// Cek apakah ada parameter ID
if (isset($_GET['id'])) {
  $article_id = $_GET['id'];

  // Hapus artikel dari database berdasarkan ID
  $query = "DELETE FROM posts WHERE id_post = $article_id";
  $result = mysqli_query($conn, $query);

  if ($result) {
    header('Location: posts-articles.php?notif=deleteberhasil');
  } else {
    echo "Error deleting article.";
  }
} else {
  echo "Invalid request.";
}
