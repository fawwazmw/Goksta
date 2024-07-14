<?php
include('Konrix/services/database.php');

// Function to handle errors
function handle_error($message)
{
  echo htmlspecialchars($message);
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate input data
  $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
  $parent_id = isset($_POST['parent_id']) ? ($_POST['parent_id'] != 0 ? intval($_POST['parent_id']) : NULL) : NULL;
  $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
  $comment = isset($_POST['comment']) ? htmlspecialchars($_POST['comment']) : '';

  if ($post_id == 0 || empty($name) || empty($comment)) {
    handle_error("Invalid input data.");
  }

  try {
    // Check if the post exists
    $sql_check_post = "SELECT slug FROM posts WHERE id_post = ?";
    $stmt_check_post = $conn->prepare($sql_check_post);
    if ($stmt_check_post === false) {
      throw new Exception('Unable to prepare statement for post check.');
    }
    $stmt_check_post->bind_param('i', $post_id);
    $stmt_check_post->execute();
    $result_post = $stmt_check_post->get_result();

    if ($result_post->num_rows == 0) {
      $stmt_check_post->close();
      handle_error("No post found with the specified id.");
    }

    $row_post = $result_post->fetch_assoc();
    $slug = $row_post['slug'];
    $stmt_check_post->close();

    // Insert comment into database
    $sql_insert_comment = "INSERT INTO post_comments (post_id, parent_id, name, content, created_at) VALUES (?, ?, ?, ?, NOW())";
    $stmt_insert_comment = $conn->prepare($sql_insert_comment);
    if ($stmt_insert_comment === false) {
      throw new Exception('Unable to prepare statement for comment insertion.');
    }
    $stmt_insert_comment->bind_param('iiss', $post_id, $parent_id, $name, $comment);
    $stmt_insert_comment->execute();
    $stmt_insert_comment->close();

    // Redirect to the post page using the slug
    header("Location: single.php?slug=$slug");
    exit();
  } catch (Exception $e) {
    handle_error("Error: " . $e->getMessage());
  }
}

// Close database connection
$conn->close();
