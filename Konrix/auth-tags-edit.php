<?php
include('services/database.php');
include_once('services/session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Input variables
  if (empty($_POST['tag_id']) || empty($_POST['title']) || empty($_POST['content'])) {
    echo "Invalid input data.";
    exit();
  }

  $tag_id = $_POST['tag_id'];
  $title = $_POST['title'];
  $content = $_POST['content'];

  // Validate Title and Content
  if (empty($title) || empty($content)) {
    header("Location: data-masters-tags.php?notif=editkosong&jenis=fieldkosong");
    exit();
  }

  // Generate meta_title (assuming it's a modified version of the title)
  $meta_title = $title; // You can modify this based on your requirement

  // Generate slug (assuming it's a modified version of the title)
  $slug = strtolower(str_replace(' ', '-', $title)); // Convert to lowercase and replace spaces with dashes

  // Construct SQL Query
  $sql = "UPDATE tags SET title = ?, content = ?, meta_title = ?, slug = ? WHERE id_tag = ?";

  // Prepare and bind
  if ($stmt = mysqli_prepare($conn, $sql)) {
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssi", $title, $content, $meta_title, $slug, $tag_id);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
      header("Location: data-masters-tags.php?notif=editberhasil");
      exit(); // Exit after redirect
    } else {
      echo "Error updating tag: " . mysqli_error($conn);
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
