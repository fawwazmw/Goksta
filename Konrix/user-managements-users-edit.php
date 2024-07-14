<?php
include 'partials/main.php';
include('services/database.php');
include_once('services/session.php');
require_login();

// Check if article ID is provided
if (!isset($_GET['user_id'])) {
  echo "Invalid request.";
  exit();
}

$user_id = $_GET['user_id'];

// Fetch article data from the database
$query = "SELECT * FROM users WHERE id_user=$user_id";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $user = mysqli_fetch_assoc($result);
} else {
  echo "Article not found.";
  exit();
}
// // Ensure there is a valid user ID parameter
// if (!isset($_GET['id'])) {
//   echo "Invalid user ID.";
//   exit;
// }

// // Retrieve the user ID from the URL parameter
// $user_id = intval($_GET['id']);

// // Validate the user ID
// if ($user_id <= 0) {
//   echo "Invalid user ID.";
//   exit;
// }

// Query to fetch user data based on ID
$query = "SELECT * FROM users WHERE id_user = ?";
if ($stmt = mysqli_prepare($conn, $query)) {
  mysqli_stmt_bind_param($stmt, 'i', $user_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $user = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);

  // Check if user exists
  if (!$user) {
    echo "User not found.";
    exit;
  }

  // Query to fetch user roles
  $queryRoles = "SELECT role_id FROM user_roles WHERE user_id = ?";
  if ($stmtRoles = mysqli_prepare($conn, $queryRoles)) {
    mysqli_stmt_bind_param($stmtRoles, 'i', $user_id);
    mysqli_stmt_execute($stmtRoles);
    $resultRoles = mysqli_stmt_get_result($stmtRoles);
    $user_roles = [];
    while ($rowRoles = mysqli_fetch_assoc($resultRoles)) {
      $user_roles[] = $rowRoles['role_id'];
    }
    mysqli_stmt_close($stmtRoles);
  } else {
    echo "Error fetching user roles: " . mysqli_error($conn);
    exit;
  }
} else {
  echo "Error fetching user data: " . mysqli_error($conn);
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "Edit User";
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
        $pageTitles = ["Konrix", "User Managements", "Users", "Edit User"];
        include 'partials/page-title.php';
        ?>

        <!-- Main form wrapping all content -->
        <form action="auth-user-managements-users-edit.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="user_id" value="<?php echo $user['id_user']; ?>">
          <div class="grid lg:grid-cols-4 gap-6">
            <div class="col-span-1 flex flex-col gap-6">
              <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                  <h4 class="card-title">Edit User Photo Profile</h4>
                  <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="mgc_add_line"></i>
                  </div>
                </div>

                <!-- Form for image using Dropzone -->
                <div class="dropzone flex items-center justify-center text-gray-700 dark:text-gray-300 h-52">
                  <div class="fallback">
                    <input name="image" type="file" multiple="multiple">
                  </div>
                </div>
              </div>
            </div>

            <div class="lg:col-span-3 space-y-6">
              <!-- Form for user details -->
              <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                  <p class="card-title">Edit User Content</p>
                  <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="mgc_transfer_line"></i>
                  </div>
                </div>

                <div class="flex flex-col gap-3">
                  <div class="">
                    <label for="full_name" class="mb-2 block">Full Name</label>
                    <input type="text" id="full_name" name="full_name" class="form-input" placeholder="Enter Full Name" aria-describedby="input-helper-text" required value="<?php echo htmlspecialchars($user['full_name']); ?>">
                  </div>

                  <div class="">
                    <label for="email" class="mb-2 block">Email</label>
                    <input type="text" id="email" name="email" class="form-input" placeholder="Enter Email" aria-describedby="input-helper-text" required value="<?php echo htmlspecialchars($user['email']); ?>">
                  </div>

                  <div class="flex flex-col gap-3">
                    <div class="">
                      <label for="roles" class="mb-2 block">Select Role</label>
                      <select id="roles" name="roles[]" class="selectize" multiple required>
                        <?php
                        // Query to fetch roles from roles table
                        $role_query = "SELECT r.id_role, r.name 
                        FROM roles r 
                        LEFT JOIN user_roles ur ON r.id_role = ur.role_id AND ur.user_id = ?";

                        if ($stmt = mysqli_prepare($conn, $role_query)) {
                          mysqli_stmt_bind_param($stmt, 'i', $user_id);
                          mysqli_stmt_execute($stmt);
                          $role_result = mysqli_stmt_get_result($stmt);

                          // Check if there are roles available
                          if ($role_result && mysqli_num_rows($role_result) > 0) {
                            while ($row = mysqli_fetch_assoc($role_result)) {
                              $selected = in_array($row['id_role'], array_column($user_roles, 'role_id')) ? 'selected' : '';
                              echo "<option value='" . $row['id_role'] . "' $selected>" . htmlspecialchars($row['name']) . "</option>";
                            }
                          } else {
                            echo "<option disabled>No roles available</option>";
                          }

                          mysqli_stmt_close($stmt);
                        } else {
                          echo "<option disabled>Error fetching roles</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="lg:col-span-4 mt-5">
                <div class="flex justify-end gap-3">
                  <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-red-500 hover:bg-red-700 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none" onclick="window.location.href='user-managements-users.php'">
                    Cancel
                  </button>
                  <button type="submit" name="action" value="update" class="inline-flex items-center rounded-md border border-transparent bg-green-500 hover:bg-green-700 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none">
                    Update
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