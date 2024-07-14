<?php
include 'partials/main.php';
include('services/database.php');
include_once('services/session.php');
require_login();

?>

<head>
  <?php
  $title = "Add User";
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
        $pageTitles = ["Konrix", "User Managements", "Users", "Add User"];
        include 'partials/page-title.php';
        ?>

        <!-- Form utama membungkus seluruh konten -->
        <form action="auth-user-managements-users-add.php" method="POST" enctype="multipart/form-data">
          <div class="grid lg:grid-cols-4 gap-6">
            <div class="col-span-1 flex flex-col gap-6">
              <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                  <h4 class="card-title">Add User Photo Profile</h4>
                  <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="mgc_add_line"></i>
                  </div>
                </div>

                <!-- Form untuk gambar menggunakan Dropzone -->
                <div class="dropzone flex items-center justify-center text-gray-700 dark:text-gray-300 h-52">
                  <div class="fallback">
                    <input name="image" type="file" multiple="multiple">
                  </div>
                </div>
              </div>
            </div>

            <div class="lg:col-span-3 space-y-6">
              <!-- Form untuk artikel -->
              <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                  <p class="card-title">Add User Content</p>
                  <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="mgc_transfer_line"></i>
                  </div>
                </div>

                <div class="flex flex-col gap-3">
                  <div class="">
                    <label for="full_name" class="mb-2 block">Full Name</label>
                    <input type="text" id="full_name" name="full_name" class="form-input" placeholder="Enter Full Name" aria-describedby="input-helper-text" required>
                  </div>

                  <div class="">
                    <label for="email" class="mb-2 block">Email</label>
                    <input type="text" id="email" name="email" class="form-input" placeholder="Enter Email" aria-describedby="input-helper-text" required>
                  </div>

                  <div class="flex flex-col gap-3">
                    <div class="">
                      <label for="password" class="mb-2 block">Password</label>
                      <input type="password" id="password" name="password" class="form-input" placeholder="Enter Password" aria-describedby="input-helper-text" required>
                    </div>
                  </div>

                  <div class="flex flex-col gap-3">
                    <div class="">
                      <label for="roles" class="mb-2 block">Select Role</label>
                      <select id="roles" name="roles[]" class="selectize" multiple required>
                        <?php
                        // Query to fetch roles from roles table
                        $role_query = "SELECT * FROM roles";
                        $role_result = mysqli_query($conn, $role_query);

                        // Check if there are results from the query
                        if ($role_result && mysqli_num_rows($role_result) > 0) {
                          // Loop through each row of the result and display as dropdown options
                          while ($row = mysqli_fetch_assoc($role_result)) {
                            echo "<option value='" . $row['id_role'] . "'>" . htmlspecialchars($row['name']) . "</option>";
                          }
                        } else {
                          echo "<option disabled>No roles available</option>";
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