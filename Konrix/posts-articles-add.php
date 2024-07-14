<?php
include 'partials/main.php';
include('services/database.php');
include_once('services/session.php');
require_login();

?>

<head>
  <?php
  $title = "Add Article";
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
        $pageTitles = ["Konrix", "Posts", "Articles", "Add Article"];
        include 'partials/page-title.php';
        ?>

        <!-- Form utama membungkus seluruh konten -->
        <form action="auth-articles-add.php" method="POST" enctype="multipart/form-data">
          <div class="grid lg:grid-cols-4 gap-6">
            <div class="col-span-1 flex flex-col gap-6">
              <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                  <h4 class="card-title">Add Article Images</h4>
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
                  <p class="card-title">Add Category</p>
                  <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="mgc_compass_line"></i>
                  </div>
                </div>

                <div class="flex flex-col gap-3">
                  <div class="">
                    <label for="select-label-category" class="mb-2 block">Category</label>
                    <select id="select-label-category" name="category_id" class="selectize" required>
                      <option value="">Select</option>
                      <?php
                      // Query untuk mengambil data kategori dari tabel categories
                      $category_query = "SELECT * FROM categories";
                      $category_result = mysqli_query($conn, $category_query);

                      // Periksa apakah ada hasil dari query
                      if ($category_result && mysqli_num_rows($category_result) > 0) {
                        // Loop melalui setiap baris hasil query dan tampilkan sebagai pilihan dropdown
                        while ($row = mysqli_fetch_assoc($category_result)) {
                          echo "<option value='" . $row['id_category'] . "'>" . $row['title'] . "</option>";
                        }
                      } else {
                        echo "<option disabled>No categories available</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="lg:col-span-3 space-y-6">
              <!-- Form untuk artikel -->
              <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                  <p class="card-title">Add Article Content</p>
                  <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="mgc_transfer_line"></i>
                  </div>
                </div>

                <div class="flex flex-col gap-3">
                  <div class="">
                    <label for="title" class="mb-2 block">Article Title</label>
                    <input type="text" id="title" name="title" class="form-input" placeholder="Enter Title" aria-describedby="input-helper-text" required>
                  </div>

                  <div class="">
                    <label for="content" class="mb-2 block">Article Content</label>
                    <textarea id="content" name="content" class="form-input" rows="8" placeholder="Enter Content" required></textarea>
                  </div>

                  <div class="flex flex-col gap-3">
                    <div class="">
                      <label for="created_at" class="mb-2 block">Article Created</label>
                      <input type="datetime-local" class="form-input" id="created_at" name="created_at" required>
                    </div>
                  </div>

                  <div class="flex flex-col gap-3">
                    <div class="">
                      <label for="selectize" class="mb-2 block">Add Tag</label>
                      <select id="selectize" name="tags[]" class="selectize" multiple>
                        <?php
                        // Query untuk mengambil data tag dari tabel tags
                        $tag_query = "SELECT * FROM tags";
                        $tag_result = mysqli_query($conn, $tag_query);

                        // Periksa apakah ada hasil dari query
                        if ($tag_result && mysqli_num_rows($tag_result) > 0) {
                          // Loop melalui setiap baris hasil query dan tampilkan sebagai pilihan dropdown
                          while ($row = mysqli_fetch_assoc($tag_result)) {
                            echo "<option value='" . $row['id_tag'] . "'>" . htmlspecialchars($row['title']) . "</option>";
                          }
                        } else {
                          echo "<option disabled>No tags available</option>";
                        }
                        ?>
                      </select>
                    </div>
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