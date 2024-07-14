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
  $category_id = isset($_POST['category_id']) ? mysqli_real_escape_string($conn, $_POST['category_id']) : null;
  $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

  if ($user_id !== null) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $content = str_replace("\r\n", "<br>", $content); // Mengganti \r\n dengan <br>
    $content = str_replace("\n", "<br>", $content);   // Mengganti \n dengan <br>
    $created_at = date('Y-m-d H:i:s'); // Current datetime
    $action = mysqli_real_escape_string($conn, $_POST['action']);

    $published = ($action === 'publish') ? 1 : 0;
    $published_at = ($action === 'publish') ? $created_at : NULL;

    $slug = generateSlug($title);

    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
      $upload_dir = 'assets/images/covers/';
      $image_name = uniqid() . '_' . basename($_FILES['image']['name']); // Menambahkan prefix unik
      $image_path = $upload_dir . $image_name;
      if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
        $image = 'Konrix/' . $image_path; // Format yang disimpan di database
      } else {
        echo "Failed to move uploaded file.";
        exit;
      }
    }

    $query = "INSERT INTO posts (author_id, title, meta_title, slug, summary, published, created_at, updated_at, published_at, content, image)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $query)) {
      $meta_title = htmlspecialchars($title);
      $summary = htmlspecialchars(substr($content, 0, 100));
      mysqli_stmt_bind_param($stmt, 'issssisssss', $user_id, $title, $meta_title, $slug, $summary, $published, $created_at, $created_at, $published_at, $content, $image);

      if (mysqli_stmt_execute($stmt)) {
        $post_id = mysqli_insert_id($conn);

        if ($category_id !== null) {
          $query_category = "INSERT INTO post_categories (post_id, category_id) VALUES (?, ?)";
          if ($stmt_category = mysqli_prepare($conn, $query_category)) {
            mysqli_stmt_bind_param($stmt_category, 'ii', $post_id, $category_id);
            mysqli_stmt_execute($stmt_category);
            mysqli_stmt_close($stmt_category);
          }
        }

        // Insert selected tags into post_tags table
        if (!empty($_POST['tags']) && is_array($_POST['tags'])) {
          foreach ($_POST['tags'] as $tag_id) {
            $tag_id = mysqli_real_escape_string($conn, $tag_id);
            $query_post_tag = "INSERT INTO post_tags (post_id, tag_id) VALUES (?, ?)";
            if ($stmt_post_tag = mysqli_prepare($conn, $query_post_tag)) {
              mysqli_stmt_bind_param($stmt_post_tag, 'ii', $post_id, $tag_id);
              mysqli_stmt_execute($stmt_post_tag);
              mysqli_stmt_close($stmt_post_tag);
            }
          }
        }

        $action_log = "Added new post with title: $title";
        $query_log = "INSERT INTO admin_logs (admin_id, action, logs_at) VALUES (?, ?, ?)";
        if ($stmt_log = mysqli_prepare($conn, $query_log)) {
          mysqli_stmt_bind_param($stmt_log, 'iss', $user_id, $action_log, $created_at);
          mysqli_stmt_execute($stmt_log);
          mysqli_stmt_close($stmt_log);
        }

        header('Location: posts-articles.php?notif=tambahberhasil');
        exit;
      } else {
        echo "Error: " . mysqli_stmt_error($stmt);
      }

      mysqli_stmt_close($stmt);
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  } else {
    echo "Error: user_id is not set in session.";
  }
}

mysqli_close($conn);
