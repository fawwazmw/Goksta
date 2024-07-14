<?php
include 'partials/main.php';
include('services/database.php');
include_once('services/session.php');
require_login();

?>

<head>
  <?php $title = "Users";
  include 'partials/title-meta.php'; ?>

  <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

  <?php include 'partials/head-css.php'; ?>

</head>

<body>

  <div class="flex wrapper">

    <?php include 'partials/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start Page Users here -->
    <!-- ============================================================== -->

    <div class="page-content">

      <?php include 'partials/topbar.php'; ?>

      <main class="flex-grow p-6">

        <?php
        $pageTitles = ["Konrix", "User Management", "Users"];
        include 'partials/page-title.php';
        ?>

        <div class="flex flex-col gap-6">
          <div class="card">
            <div class="card-header">
              <div class="flex justify-between items-center">
                <h4 class="card-title">Data Users</h4>
                <div class="flex items-center gap-2">
                  <button class="btn border border-gray-700 text-gray-900 dark:text-gray-200 hover:bg-gray-700 hover:text-white transition duration-300 ease-in-out transform hover:scale-105" onclick="window.location.href='user-managements-users-add.php'">
                    <i class="mgc_add_circle_fill text-lg"></i>
                    <span class="ms-2">Add</span>
                  </button>
                </div>
              </div>
            </div>
            <div class="p-6">
              <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                  <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                    <div class="py-3 px-4">
                      <div class="relative max-w-xs">
                        <form method="GET" action="">
                          <label for="table-with-pagination-search" class="sr-only">Search</label>
                          <input type="text" name="search" id="table-with-pagination-search" class="form-input ps-11" placeholder="Search for items" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                          <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                            <svg class="h-3.5 w-3.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                            </svg>
                          </div>
                        </form>
                      </div>
                    </div>
                    <?php if (!empty($_GET['notif'])) : ?>
                      <?php if ($_GET['notif'] == "registerSuccess") : ?>
                        <div class="bg-green-500 text-sm text-white rounded-md p-4 mx-2 mb-4" role="alert">
                          <span class="font-bold">Success</span> New user has been added!
                        </div>
                      <?php elseif ($_GET['notif'] == "editberhasil") : ?>
                        <div class="bg-green-500 text-sm text-white rounded-md p-4 mx-2 mb-4" role="alert">
                          <span class="font-bold">Success</span> User information has been updated!
                        </div>
                      <?php elseif ($_GET['notif'] == "deleteberhasil") : ?>
                        <div class="bg-green-500 text-sm text-white rounded-md p-4 mx-2 mb-4" role="alert">
                          <span class="font-bold">Success</span> User has been deleted!
                        </div>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php
                    // Pagination Variables
                    $limit = 5; // Limit per page
                    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page
                    $search = isset($_GET['search']) ? $_GET['search'] : ''; // Search query

                    // Query to get total number of users
                    $queryCount = "SELECT COUNT(*) as total FROM users WHERE full_name LIKE '%$search%'";
                    $resultCount = mysqli_query($conn, $queryCount);
                    $rowCount = mysqli_fetch_assoc($resultCount)['total'];

                    // Calculate total pages
                    $totalPages = ceil($rowCount / $limit);

                    // Calculate offset
                    $offset = ($page - 1) * $limit;

                    // Query to fetch users with pagination and search
                    $query = "SELECT u.*, r.name AS role_name 
                    FROM users u 
                    LEFT JOIN user_roles ur ON u.id_user = ur.user_id 
                    LEFT JOIN roles r ON ur.role_id = r.id_role 
                    WHERE u.full_name LIKE '%$search%'
                    LIMIT $limit OFFSET $offset";
                    $result = mysqli_query($conn, $query);
                    ?>
                    <div class="overflow-hidden">
                      <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <!-- Table Headings -->
                        <thead class="bg-gray-50 dark:bg-gray-700">
                          <tr>
                            <th scope="col" class="py-3 px-4 pe-0">
                              <div class="flex items-center h-5">
                                <input id="table-pagination-checkbox-all" type="checkbox" class="form-checkbox rounded">
                                <label for="table-pagination-checkbox-all" class="sr-only">Checkbox</label>
                              </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Full Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Account Created</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                          </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                          <?php
                          $no = ($page - 1) * $limit + 1; // Calculate starting number for the current page
                          while ($row = mysqli_fetch_assoc($result)) {
                            $full_name = isset($row['full_name']) ? htmlspecialchars($row['full_name']) : '';
                            $email = isset($row['email']) ? htmlspecialchars($row['email']) : '';
                            $role_name = isset($row['role_name']) ? htmlspecialchars($row['role_name']) : '';
                            $register_at = isset($row['register_at']) ? htmlspecialchars($row['register_at']) : '';
                            $user_id = isset($row['id_user']) ? $row['id_user'] : '';
                          ?>
                            <tr>
                              <td class="py-3 ps-4">
                                <div class="flex items-center h-5">
                                  <input id="table-pagination-checkbox-<?php echo $user_id; ?>" type="checkbox" class="form-checkbox rounded">
                                </div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"><?php echo $no; ?></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo $full_name; ?></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo $email; ?></td>
                              <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200"><?php echo $role_name ? $role_name : 'No role assigned'; ?></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo $register_at; ?></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a class="text-blue-700 hover:text-blue-300 transition duration-300 ease-in-out transform hover:scale-105" href="user-managements-users-edit.php?user_id=<?php echo $user_id; ?>">
                                  Edit
                                </a>
                                <span class="mx-2">|</span>
                                <a class="text-danger hover:text-red-300 transition duration-300 ease-in-out transform hover:scale-105" href="auth-user-managements-users-delete.php?id=<?php echo $user_id; ?>" onclick="return confirm('Are you sure you want to delete this user?');">
                                  Delete
                                </a>
                              </td>
                            </tr>
                          <?php
                            $no++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- Pagination -->
                    <div class="py-1 px-4">
                      <nav class="flex items-center space-x-2">
                        <?php if ($page > 1) : ?>
                          <a href="?page=<?php echo ($page - 1); ?><?php echo $search ? '&search=' . $search : ''; ?>" class="text-gray-400 hover:text-primary p-4 inline-flex items-center gap-2 font-medium rounded-md">
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                          <a href="?page=<?php echo $i; ?><?php echo $search ? '&search=' . $search : ''; ?>" class="w-10 h-10 <?php echo $page == $i ? 'bg-primary text-white' : 'text-gray-400 hover:text-primary'; ?> p-4 inline-flex items-center text-sm font-medium rounded-full"><?php echo $i; ?></a>
                        <?php endfor; ?>
                        <?php if ($page < $totalPages) : ?>
                          <a href="?page=<?php echo ($page + 1); ?><?php echo $search ? '&search=' . $search : ''; ?>" class="text-gray-400 hover:text-primary p-4 inline-flex items-center gap-2 font-medium rounded-md">
                            <span class="sr-only">Next</span>
                            <span aria-hidden="true">»</span>
                          </a>
                        <?php endif; ?>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end card -->
        </div>

      </main>
      <!-- ============================================================== -->
      <!-- End Page Users -->
      <!-- ============================================================== -->

      <?php include 'partials/footer.php'; ?>

    </div>

  </div>

  <?php include 'partials/customizer.php'; ?>

  <?php include 'partials/highlight-scripts.php'; ?>

  <?php include 'partials/footer-scripts.php'; ?>

  <!-- Sweet Alerts js -->
  <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

  <!-- Sweet alert init js-->
  <script src="assets/js/pages/extended-sweetalert.js"></script>

</body>

</html>