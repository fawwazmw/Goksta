<?php include 'partials/main.php';
include('services/database.php');
include_once('services/session.php');
require_login();

// Check if tag ID is provided and it is a valid integer
$tag_id = $_GET['tag_id'] ?? null;
if (!isset($tag_id) || !filter_var($tag_id, FILTER_VALIDATE_INT)) {
  echo "Invalid request.";
  exit();
}

// Fetch tag data from the database
$query = "SELECT * FROM tags WHERE id_tag = ?";
if ($stmt = mysqli_prepare($conn, $query)) {
  mysqli_stmt_bind_param($stmt, "i", $tag_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $tag = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);

  if (!$tag) {
    echo "Tag not found.";
    exit();
  }
} else {
  echo "Error fetching tag: " . mysqli_error($conn);
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "Edit Tag";
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
        $pageTitles = ["Konrix", "Data Masters", "Tags", "Edit Tag"];
        include 'partials/page-title.php';
        ?>

        <!-- Form utama membungkus seluruh konten -->
        <form method="POST" action="auth-tags-edit.php">
          <input type="hidden" name="tag_id" value="<?php echo $tag_id; ?>">
          <div class="flex flex-col gap-6">
            <div class="lg:col-span-3 space-y-6">
              <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                  <p class="card-title">Edit Tag</p>
                  <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="mgc_transfer_line"></i>
                  </div>
                </div>

                <div class="flex flex-col gap-3">
                  <div class="">
                    <label for="title" class="mb-2 block">Tag Title</label>
                    <input type="text" id="title" name="title" class="form-input" placeholder="Enter Title" value="<?php echo htmlspecialchars($tag['title']); ?>" required>
                  </div>

                  <div class="">
                    <label for="content" class="mb-2 block">Tag Content</label>
                    <textarea id="content" name="content" class="form-input" rows="8" placeholder="Enter Content" required><?php echo htmlspecialchars($tag['content']); ?></textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="lg:col-span-4 mt-5">
              <div class="flex justify-end gap-3">
                <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-red-500 hover:bg-red-700 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none" onclick="window.location.href='data-masters-tags.php'">
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