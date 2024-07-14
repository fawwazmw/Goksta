<?php
include 'partials/main.php';
include('services/database.php');
include_once('services/session.php');
require_login();

// Check if category ID is provided and it is a valid integer
$category_id = $_GET['category_id'] ?? null;
if (!isset($category_id) || !filter_var($category_id, FILTER_VALIDATE_INT)) {
  echo "Invalid request.";
  exit();
}

// Fetch category data from the database
$query = "SELECT * FROM categories WHERE id_category = ?";
if ($stmt = mysqli_prepare($conn, $query)) {
  mysqli_stmt_bind_param($stmt, "i", $category_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $category = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);

  if (!$category) {
    echo "Category not found.";
    exit();
  }
} else {
  echo "Error fetching category: " . mysqli_error($conn);
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "Edit Category";
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
        $pageTitles = ["Konrix", "Data Masters", "Categories", "Edit Category"];
        include 'partials/page-title.php';
        ?>

        <!-- Form utama membungkus seluruh konten -->
        <form method="POST" action="auth-categories-edit.php">
          <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
          <div class="flex flex-col gap-6">
            <div class="lg:col-span-3 space-y-6">
              <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                  <p class="card-title">Edit Category</p>
                  <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="mgc_transfer_line"></i>
                  </div>
                </div>

                <div class="flex flex-col gap-3">
                  <div class="">
                    <label for="title" class="mb-2 block">Category Title</label>
                    <input type="text" id="title" name="title" class="form-input" placeholder="Enter Title" value="<?php echo htmlspecialchars($category['title']); ?>" required>
                  </div>

                  <div class="">
                    <label for="content" class="mb-2 block">Category Content</label>
                    <textarea id="content" name="content" class="form-input" rows="8" placeholder="Enter Content" required><?php echo htmlspecialchars($category['content']); ?></textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="lg:col-span-4 mt-5">
              <div class="flex justify-end gap-3">
                <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-red-500 hover:bg-red-700 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none" onclick="window.location.href='data-masters-categories.php'">
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