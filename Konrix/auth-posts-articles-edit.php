<?php
date_default_timezone_set('Asia/Jakarta');
include('services/database.php');
include('services/session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
  $article_id = $_POST['article_id'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $category_id = $_POST['category_id'];
  $image = $_FILES['image']['name'];
  $action = $_POST['action'];
  $tags = isset($_POST['tags']) ? $_POST['tags'] : [];

  // Determine if the action is to publish the article
  $published = ($action == 'publish') ? 1 : 0;
  $published_at = ($published == 1) ? date('Y-m-d H:i:s') : null; // Set current timestamp if publishing

  // Handle file upload
  if (!empty($image)) {
    $target_dir = "assets/images/covers/";
    if (!is_dir($target_dir)) {
      mkdir($target_dir, 0755, true); // Create directory if it doesn't exist
    }

    $target_file = $target_dir . basename($image);
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      exit();
    }
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

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
      echo "Error uploading image.";
      exit();
    }
  }

  // Prepare the update query
  if (!empty($image)) {
    $image_path = "Konrix/assets/images/covers/" . basename($image);
    $query = "UPDATE posts SET title=?, content=?, image=?, updated_at=NOW(), published=?, published_at=? WHERE id_post=?";
  } else {
    $query = "UPDATE posts SET title=?, content=?, updated_at=NOW(), published=?, published_at=NOW() WHERE id_post=?";
  }

  // Prepare and bind
  if ($stmt = mysqli_prepare($conn, $query)) {
    if (!empty($image)) {
      mysqli_stmt_bind_param($stmt, "sssisi", $title, $content, $image_path, $published, $published_at, $article_id);
    } else {
      mysqli_stmt_bind_param($stmt, "ssisi", $title, $content, $published, $published_at, $article_id);
    }
    if (!mysqli_stmt_execute($stmt)) {
      echo "Error executing statement: " . mysqli_stmt_error($stmt);
      mysqli_stmt_close($stmt);
      exit();
    }
    mysqli_stmt_close($stmt);
  } else {
    echo "Error preparing statement: " . mysqli_error($conn);
    exit();
  }

  // Update or insert tags
  // First, delete existing tags for this article
  $delete_tags_query = "DELETE FROM post_tags WHERE post_id=?";
  if ($stmt = mysqli_prepare($conn, $delete_tags_query)) {
    mysqli_stmt_bind_param($stmt, "i", $article_id);
    if (!mysqli_stmt_execute($stmt)) {
      echo "Error deleting existing tags: " . mysqli_stmt_error($stmt);
      mysqli_stmt_close($stmt);
      exit();
    }
    mysqli_stmt_close($stmt);
  } else {
    echo "Error preparing delete tags statement: " . mysqli_error($conn);
    exit();
  }

  // Insert new tags
  $insert_tag_query = "INSERT INTO post_tags (post_id, tag_id) VALUES (?, ?)";
  foreach ($tags as $tag_id) {
    if ($stmt = mysqli_prepare($conn, $insert_tag_query)) {
      mysqli_stmt_bind_param($stmt, "ii", $article_id, $tag_id);
      if (!mysqli_stmt_execute($stmt)) {
        echo "Error inserting tag: " . mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
        exit();
      }
      mysqli_stmt_close($stmt);
    } else {
      echo "Error preparing insert tag statement: " . mysqli_error($conn);
      exit();
    }
  }

  // Update category
  $check_category_query = "SELECT COUNT(*) AS count FROM post_categories WHERE post_id = ?";
  if ($stmt = mysqli_prepare($conn, $check_category_query)) {
    mysqli_stmt_bind_param($stmt, "i", $article_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($count > 0) {
      // Update existing category
      $category_query = "UPDATE post_categories SET category_id=? WHERE post_id=?";
    } else {
      // Insert new category
      $category_query = "INSERT INTO post_categories (category_id, post_id) VALUES (?, ?)";
    }

    if ($stmt = mysqli_prepare($conn, $category_query)) {
      mysqli_stmt_bind_param($stmt, "ii", $category_id, $article_id);
      if (!mysqli_stmt_execute($stmt)) {
        echo "Error executing category statement: " . mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
        exit();
      }
      mysqli_stmt_close($stmt);
    } else {
      echo "Error preparing category statement: " . mysqli_error($conn);
      exit();
    }
  } else {
    echo "Error preparing check category statement: " . mysqli_error($conn);
    exit();
  }

  header("Location: posts-articles.php?notif=editberhasil");
  exit();
} else {
  echo "Invalid request.";
}
