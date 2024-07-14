<?php
include 'partials/main.php';
include('services/database.php');
include_once('services/session.php');
require_login();

// Check if article ID is provided
if (!isset($_GET['article_id'])) {
  echo "Invalid request.";
  exit();
}

$article_id = $_GET['article_id'];

// Fetch article data from the database
$query = "SELECT * FROM posts WHERE id_post=$article_id";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $article = mysqli_fetch_assoc($result);
} else {
  echo "Article not found.";
  exit();
}

// Fetch categories
$category_query = "SELECT * FROM categories";
$category_result = mysqli_query($conn, $category_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "Edit Article";
  include 'partials/title-meta.php';
  ?>
  <!-- Dropzone Plugin Css -->
  <link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css">
  <link href="assets/libs/nice-select2/css/nice-select2.css" rel="stylesheet" type="text/css">
  <?php include 'partials/head-css.php'; ?>
</head>

<body>

  <div class="flex wrapper">
    <?php include 'partials/menu.php'; ?>
    <div class="page-content">
      <?php include 'partials/topbar.php'; ?>
      <main class="flex-grow p-6">
        <?php
        $pageTitles = ["Konrix", "Posts", "Articles", "Edit Article"];
        include 'partials/page-title.php';
        ?>

        <!-- Form utama membungkus seluruh konten -->
        <form action="auth-posts-articles-edit.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
          <div class="grid lg:grid-cols-4 gap-6">
            <div class="col-span-1 flex flex-col gap-6">
              <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                  <h4 class="card-title">Edit Article Images</h4>
                  <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="mgc_add_line"></i>
                  </div>
                </div>

                <!-- Form untuk gambar menggunakan Dropzone -->
                <div class="dropzone flex items-center justify-center text-gray-700 dark:text-gray-300 h-52">
                  <div class="fallback">
                    <input name="image" type="file" multiple="multiple">
                  </div>
                  <!-- <div class="dz-message needsclick w-full">
                    <i class="mgc_pic_2_line text-8xl"></i>
                  </div> -->
                </div>
              </div>

              <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                  <p class="card-title">Edit Category</p>
                  <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="mgc_compass_line"></i>
                  </div>
                </div>

                <div>
                  <label for="select-label-category" class="mb-2 block">Category</label>
                  <select id="select-label-category" name="category_id" class="selectize" required>
                    <?php
                    // Query to fetch tags from tags table
                    $category_query = "SELECT * FROM categories";
                    $category_result = mysqli_query($conn, $category_query);

                    // Check if there are tags available
                    if ($category_result && mysqli_num_rows($category_result) > 0) {
                      while ($row = mysqli_fetch_assoc($category_result)) {
                        // Check if the tag is associated with the current article
                        $category_selected = isCategorySelected($article_id, $row['id_category'], $conn) ? 'selected' : '';

                        echo "<option value='" . $row['id_category'] . "' $category_selected>" . $row['title'] . "</option>";
                      }
                    } else {
                      echo "<option disabled>No category available</option>";
                    }

                    // Function to check if a tag is selected for the current article
                    function isCategorySelected($article_id, $category_id, $conn)
                    {
                      $query = "SELECT * FROM post_categories WHERE post_id = $article_id AND category_id = $category_id";
                      $result = mysqli_query($conn, $query);
                      return (mysqli_num_rows($result) > 0);
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="lg:col-span-3 space-y-6">
              <!-- Form untuk artikel -->
              <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                  <p class="card-title">Edit Article Content</p>
                  <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="mgc_transfer_line"></i>
                  </div>
                </div>

                <div class="flex flex-col gap-3">
                  <div class="">
                    <label for="title" class="mb-2 block">Article Title</label>
                    <input type="text" id="title" name="title" class="form-input" placeholder="Enter Title" value="<?php echo $article['title']; ?>" required>
                  </div>

                  <div class="">
                    <label for="content" class="mb-2 block">Article Content</label>
                    <textarea id="content" name="content" class="form-input" rows="8" placeholder="Enter Content" required><?php echo $article['content']; ?></textarea>
                  </div>

                  <div class="grid md:grid-cols-2 gap-3">
                    <div class="">
                      <label for="created_at" class="mb-2 block">Article Updated</label>
                      <input type="datetime-local" class="form-input" id="created_at" name="created_at" value="<?php echo date('Y-m-d\TH:i', strtotime($article['created_at'])); ?>" required>
                    </div>
                  </div>

                  <div>
                    <label for="selectize" class="mb-2 block">Edit Tag</label>
                    <select id="selectize" name="tags[]" class="selectize" multiple>
                      <?php
                      // Query to fetch tags from tags table
                      $tag_query = "SELECT * FROM tags";
                      $tag_result = mysqli_query($conn, $tag_query);

                      // Check if there are tags available
                      if ($tag_result && mysqli_num_rows($tag_result) > 0) {
                        while ($row = mysqli_fetch_assoc($tag_result)) {
                          // Check if the tag is associated with the current article
                          $tag_selected = isTagSelected($article_id, $row['id_tag'], $conn) ? 'selected' : '';

                          echo "<option value='" . $row['id_tag'] . "' $tag_selected>" . $row['title'] . "</option>";
                        }
                      } else {
                        echo "<option disabled>No tags available</option>";
                      }

                      // Function to check if a tag is selected for the current article
                      function isTagSelected($article_id, $tag_id, $conn)
                      {
                        $query = "SELECT * FROM post_tags WHERE post_id = $article_id AND tag_id = $tag_id";
                        $result = mysqli_query($conn, $query);
                        return (mysqli_num_rows($result) > 0);
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="lg:col-span-4 mt-5">
                <div class="flex justify-end gap-3">
                  <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-red-500 hover:bg-red-700 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none" onclick="window.location.href='posts-articles.php'">
                    Cancel
                  </button>
                  <button type="submit" name="action" value="save" class="inline-flex items-center rounded-md bg-gray-800 hover:bg-gray-700 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none">
                    Save
                  </button>
                  <button type="submit" name="action" value="publish" class="inline-flex items-center rounded-md border border-transparent bg-green-500 hover:bg-green-700 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none">
                    Publish
                  </button>
                </div>
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
  <script src="assets/libs/nice-select2/js/nice-select2.js"></script>
  <!-- Dropzone js -->
  <script src="assets/libs/dropzone/min/dropzone.min.js"></script>
  <script src="assets/js/pages/form-select.js"></script>

</body>

</html>