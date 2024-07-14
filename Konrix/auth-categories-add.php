<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  session_start();
  include('services/database.php');

  // Input variables
  $title = $_POST['title'];
  $content = $_POST['content'];
  $parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : NULL;
  $action = $_POST['action'];

  // Generate meta_title and slug
  $meta_title = $title;
  $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));

  // Validate Title and Content
  if (empty($title) || empty($content)) {
    header("Location:data-masters-categories-add.php?notif=tambahkosong&jenis=fieldkosong");
    exit();
  }

  // Additional validation if action is publish
  if ($action === 'publish') {
    // Any specific validation for publishing can be added here
    // Currently, we are just ensuring title and content are not empty
  }

  // Construct SQL Query
  $sql = "INSERT INTO categories (parent_id, title, meta_title, slug, content)
            VALUES (?, ?, ?, ?, ?)";

  // Prepare and bind
  if ($stmt = mysqli_prepare($conn, $sql)) {
    // Check if parent_id is set, otherwise set it to NULL
    if ($parent_id === NULL || !is_numeric($parent_id)) {
      $stmt->bind_param("issss", $parent_id, $title, $meta_title, $slug, $content);
    } else {
      $stmt->bind_param("issss", $parent_id, $title, $meta_title, $slug, $content);
    }

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
      if ($action === 'publish') {
        header("Location:data-masters-categories.php?notif=tambahberhasil");
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      // Close the statement
      mysqli_stmt_close($stmt);
    } else {
      echo "Error: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
  } else {
    // Display message if invalid request method
    echo "Invalid request method.";
  }
}
