<?php
include 'partials/main.php';
include('services/database.php');
include_once('services/session.php');
require_login();

?>

<head>
  <?php
  $title = "Add Comment";
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

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="page-content">

      <?php include 'partials/topbar.php'; ?>

      <main class="flex-grow p-6">

        <?php
        $pageTitles = ["Konrix", "Data Masters", "Comments", "Add Comment"];
        include 'partials/page-title.php';
        ?>

        <form method="POST" action="auth-posts-comments-add.php">
          <div class="flex flex-col gap-6">
            <div class="lg:col-span-3 space-y-6">
              <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                  <p class="card-title">Add Comment</p>
                  <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="mgc_transfer_line"></i>
                  </div>
                </div>

                <div class="flex flex-col gap-3">
                  <div class="">
                    <label for="post_id" class="mb-2 block">Select Post</label>
                    <select id="post_id" name="post_id" class="selectize" required>
                      <?php
                      // Query untuk mengambil data post dari tabel posts
                      $post_query = "SELECT * FROM posts";
                      $post_result = mysqli_query($conn, $post_query);

                      // Periksa apakah ada hasil dari query
                      if ($post_result && mysqli_num_rows($post_result) > 0) {
                        // Loop melalui setiap baris hasil query dan tampilkan sebagai pilihan dropdown
                        while ($row = mysqli_fetch_assoc($post_result)) {
                          echo "<option value='" . $row['id_post'] . "'>" . htmlspecialchars($row['title']) . "</option>";
                        }
                      } else {
                        echo "<option disabled>No posts available</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="">
                    <label for="parent_id" class="mb-2 block">Select Parent Comment (Optional)</label>
                    <select id="parent_id" name="parent_id[]" class="selectize">
                      <option value="">No Parent Comment</option>
                      <?php
                      // Query untuk mengambil data comment dari tabel post_comments
                      $comment_query = "SELECT * FROM post_comments ORDER BY created_at DESC"; // Misalnya diurutkan berdasarkan waktu
                      $comment_result = mysqli_query($conn, $comment_query);

                      // Periksa apakah ada hasil dari query
                      if ($comment_result && mysqli_num_rows($comment_result) > 0) {
                        // Loop melalui setiap baris hasil query dan tampilkan sebagai pilihan dropdown
                        while ($row = mysqli_fetch_assoc($comment_result)) {
                          echo "<option value='" . $row['id_comment'] . "'>" . htmlspecialchars($row['name']) . "</option>";
                        }
                      } else {
                        echo "<option disabled>No Parent Comments available</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="">
                    <label for="name" class="mb-2 block">Name <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" class="form-input" placeholder="Enter Name" required>
                  </div>

                  <div class="">
                    <label for="content" class="mb-2 block">Content <span class="text-red-500">*</span></label>
                    <textarea id="content" name="content" class="form-input" rows="8" required></textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="lg:col-span-4 mt-5">
              <div class="flex justify-end gap-3">
                <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-red-500 hover:bg-red-700 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none" onclick="window.location.href='posts-comments.php'">
                  Cancel
                </button>
                <button type="submit" name="action" value="publish" class="inline-flex items-center rounded-md border border-transparent bg-green-500 hover:bg-green-700 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none">
                  Publish
                </button>
              </div>
            </div>
          </div>
        </form>

      </main>

      <?php include 'partials/footer.php'; ?>

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

  </div>

  <?php include 'partials/customizer.php'; ?>

  <?php include 'partials/footer-scripts.php'; ?>

  <script src="assets/libs/nice-select2/js/nice-select2.js"></script>

  <!-- Dropzone js -->
  <script src="assets/libs/dropzone/min/dropzone.min.js"></script>
  <script src="assets/js/pages/form-select.js"></script>
</body>

</html>