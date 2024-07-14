<?php
include 'partials/main.php';
include('services/database.php');
include_once('services/session.php');
require_login();

// Check if comment ID is provided and it is a valid integer
$comment_id = $_GET['comment_id'] ?? null;
if (!isset($comment_id) || !filter_var($comment_id, FILTER_VALIDATE_INT)) {
  echo "Invalid request.";
  exit();
}

// Fetch comment data from the database
$query_comment = "SELECT * FROM post_comments WHERE id_comment = ?";
if ($stmt_comment = mysqli_prepare($conn, $query_comment)) {
  mysqli_stmt_bind_param($stmt_comment, "i", $comment_id);
  mysqli_stmt_execute($stmt_comment);
  $result_comment = mysqli_stmt_get_result($stmt_comment);
  $comment = mysqli_fetch_assoc($result_comment);
  mysqli_stmt_close($stmt_comment);

  if (!$comment) {
    echo "Comment not found.";
    exit();
  }
} else {
  echo "Error fetching comment: " . mysqli_error($conn);
  exit();
}

// Fetch all comments to use as parent_id options
$query_parents = "SELECT id_comment, name FROM post_comments WHERE id_comment != ?";
$parent_options = "";
if ($stmt_parents = mysqli_prepare($conn, $query_parents)) {
  $excluded_comment_id = $comment['id_comment'];
  mysqli_stmt_bind_param($stmt_parents, "i", $excluded_comment_id);
  mysqli_stmt_execute($stmt_parents);
  $result_parents = mysqli_stmt_get_result($stmt_parents);

  // Build options for select box
  while ($parent = mysqli_fetch_assoc($result_parents)) {
    $selected = ($parent['id_comment'] == $comment['parent_id']) ? 'selected' : '';
    $parent_options .= "<option value='{$parent[' id_comment']}' $selected>{$parent['id_comment']} - {$parent['name']}</option>";
  }
  mysqli_stmt_close($stmt_parents);
} else {
  echo "Error fetching parent comments: " . mysqli_error($conn);
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "Edit Comment";
  include 'partials/title-meta.php';
  ?>
  <!-- Dropzone Plugin Css -->
  <link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css">
  <?php include 'partials/head-css.php'; ?>
</head>

<body>

  <div class="flex wrapper">
    <?php include 'partials/menu.php'; ?>
    <div class="page-content">
      <?php include 'partials/topbar.php'; ?>
      <main class="flex-grow p-6">
        <?php
        $pageTitles = ["Konrix", "Data Masters", "Comments", "Edit Comment"];
        include 'partials/page-title.php';
        ?>

        <!-- Form untuk edit comment -->
        <form method="POST" action="auth-posts-comments-edit.php">
          <input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>">
          <div class="flex flex-col gap-6">
            <div class="lg:col-span-3 space-y-6">
              <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                  <p class="card-title">Edit Comment</p>
                  <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="mgc_transfer_line"></i>
                  </div>
                </div>

                <div class="flex flex-col gap-3">
                  <div class="">
                    <label for="name" class="mb-2 block">Name</label>
                    <input type="text" id="name" name="name" class="form-input" placeholder="Enter Name" value="<?php echo htmlspecialchars($comment['name']); ?>" required>
                  </div>

                  <div class="">
                    <label for="content" class="mb-2 block">Content</label>
                    <textarea id="content" name="content" class="form-input" rows="8" placeholder="Enter Content" required><?php echo htmlspecialchars($comment['content']); ?></textarea>
                  </div>

                  <div class="">
                    <label for="parent_id" class="mb-2 block">Parent Comment</label>
                    <select id="parent_id" name="parent_id" class="form-select">
                      <option value="">No Parent</option>
                      <?php echo $parent_options; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="lg:col-span-4 mt-5">
              <div class="flex justify-end gap-3">
                <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-red-500 hover:bg-red-700 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none" onclick="window.location.href='posts-comments.php'">
                  Cancel
                </button>
                <button type="submit" name="action" value="update" class="inline-flex items-center rounded-md border border-transparent bg-green-500 hover:bg-green-700 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none">
                  Update
                </button>
              </div>
            </div>
          </div>
        </form>
      </main>

      <?php include 'partials/footer.php'; ?>
    </div>
  </div>

  <?php include 'partials/customizer.php'; ?>
  <?php include 'partials/footer-scripts.php'; ?>
  <!-- Dropzone js -->
  <script src="assets/libs/dropzone/min/dropzone.min.js"></script>

</body>

</html>