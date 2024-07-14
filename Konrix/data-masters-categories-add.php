<?php
include 'partials/main.php';
include('services/database.php');
include_once('services/session.php');
require_login();

?>

<head>
  <?php $title = "Add Category";
  include 'partials/title-meta.php'; ?>

  <!-- Dropzone Plugin Css -->
  <link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css">

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
        $pageTitles = ["Konrix", "Data Masters", "Categories", "Add Category"];
        include 'partials/page-title.php';
        ?>

        <form method="POST" action="auth-categories-add.php">
          <div class="flex flex-col gap-6">
            <div class="lg:col-span-3 space-y-6">
              <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                  <p class="card-title">Data Category</p>
                  <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="mgc_transfer_line"></i>
                  </div>
                </div>

                <div class="flex flex-col gap-3">
                  <div class="">
                    <label for="title" class="mb-2 block">Title Category</label>
                    <input type="text" id="title" name="title" class="form-input" placeholder="Enter Title" aria-describedby="input-helper-text" required>
                  </div>

                  <div class="">
                    <label for="content" class="mb-2 block">Content Category <span class="text-red-500">*</span></label>
                    <textarea id="content" name="content" class="form-input" rows="8" required></textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="lg:col-span-4 mt-5">
              <div class="flex justify-end gap-3">
                <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-red-500 hover:bg-red-700 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none" onclick="window.location.href='data-masters-categories.php'">
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

  <!-- Dropzone js -->
  <script src="assets/libs/dropzone/min/dropzone.min.js"></script>

</body>

</html>