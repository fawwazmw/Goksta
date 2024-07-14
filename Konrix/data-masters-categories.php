<?php
include 'partials/main.php';
include('services/database.php');
include_once('services/session.php');
require_login();

// Define the number of results per page
$results_per_page = 5;

// Check if a search query is set
$search_query = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

// Find out the number of total categories in the database
$query = "SELECT COUNT(*) AS total FROM categories";
if ($search_query) {
  $query .= " WHERE title LIKE '%$search_query%'";
}
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_categories = $row['total'];

// Determine the total number of pages available
$total_pages = ceil($total_categories / $results_per_page);

// Determine which page number visitor is currently on
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Determine the SQL LIMIT starting number for the results on the displaying page
$start_from = ($page - 1) * $results_per_page;

?>

<head>
  <?php $title = "Categories";
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
        $pageTitles = ["Konrix", "Data Masters", "Categories"];
        include 'partials/page-title.php';
        ?>

        <div class="flex flex-col gap-6">
          <div class="card">
            <div class="card-header">
              <div class="flex justify-between items-center">
                <h4 class="card-title">Data Categories</h4>
                <div class="flex items-center gap-2">
                  <button class="btn border border-gray-700 text-gray-900 dark:text-gray-200 hover:bg-gray-700 hover:text-white transition duration-300 ease-in-out transform hover:scale-105" onclick="window.location.href='data-masters-categories-add.php'">
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
                        <label for="table-with-pagination-search" class="sr-only">Search</label>
                        <form method="GET" action="data-masters-categories.php">
                          <input type="text" name="search" id="table-with-pagination-search" class="form-input ps-11" placeholder="Search for items" value="<?php echo htmlspecialchars($search_query); ?>">
                          <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                            <svg class="h-3.5 w-3.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                            </svg>
                          </div>
                        </form>
                      </div>
                    </div>
                    <?php if (!empty($_GET['notif'])) : ?>
                      <?php if ($_GET['notif'] == "tambahberhasil") : ?>
                        <div class="bg-green-500 text-sm text-white rounded-md p-4 mx-2 mb-4" role="alert">
                          <span class="font-bold">Success</span> Your Category has been added!
                        </div>
                      <?php elseif ($_GET['notif'] == "editberhasil") : ?>
                        <div class="bg-green-500 text-sm text-white rounded-md p-4 mx-2 mb-4" role="alert">
                          <span class="font-bold">Success</span> Your Category has been edited!
                        </div>
                      <?php elseif ($_GET['notif'] == "deleteberhasil") : ?>
                        <div class="bg-green-500 text-sm text-white rounded-md p-4 mx-2 mb-4" role="alert">
                          <span class="font-bold">Success</span> Your Category has been deleted!
                        </div>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php
                    $query = "SELECT * FROM categories";
                    if ($search_query) {
                      $query .= " WHERE title LIKE '%$search_query%'";
                    }
                    $query .= " LIMIT $start_from, $results_per_page";
                    $result = mysqli_query($conn, $query);
                    ?>
                    <div class="overflow-hidden">
                      <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                          <tr>
                            <th scope="col" class="py-3 px-4 pe-0">
                              <div class="flex items-center h-5">
                                <input id="table-pagination-checkbox-all" type="checkbox" class="form-checkbox rounded">
                                <label for="table-pagination-checkbox-all" class="sr-only">Checkbox</label>
                              </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Meta Title</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Slug</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Content</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                          </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                          <?php
                          $no = $start_from + 1;
                          while ($row = mysqli_fetch_assoc($result)) {
                            $id_category = $row['id_category'];
                            $title = $row['title'];
                            $meta_title = $row['meta_title'];
                            $slug = $row['slug'];
                            $content = $row['content'];
                          ?>
                            <tr>
                              <td class="py-3 ps-4">
                                <div class="flex items-center h-5">
                                  <input id="table-pagination-checkbox-<?php echo $no; ?>" type="checkbox" class="form-checkbox rounded">
                                  <label for="table-pagination-checkbox-<?php echo $no; ?>" class="sr-only">Checkbox</label>
                                </div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"><?php echo $no; ?></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo $title; ?></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?php echo $meta_title; ?></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 max-w-5"><?php echo $slug; ?></td>
                              <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200"><?php echo $content; ?></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a class="text-blue-700 hover:text-blue-300 transition duration-300 ease-in-out transform hover:scale-105" href="data-masters-categories-edit.php?category_id=<?php echo $id_category; ?>">Edit</a>
                                <span class="mx-2">|</span>
                                <a class="text-danger hover:text-red-300 transition duration-300 ease-in-out transform hover:scale-105" href="auth-categories-delete.php?id_category=<?php echo $id_category; ?>" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                              </td>
                            </tr>
                          <?php
                            $no++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="py-1 px-4">
                      <nav class="flex items-center space-x-2">
                        <?php if ($page > 1) : ?>
                          <a class="text-gray-400 hover:text-primary p-4 inline-flex items-center gap-2 font-medium rounded-md" href="data-masters-categories.php?page=<?php echo $page - 1; ?>&search=<?php echo $search_query; ?>">
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                          <a class="w-10 h-10 
                          <?php if ($page == $i) echo 'bg-primary text-white';
                          else echo 'text-gray-400 hover:text-primary'; ?> p-4 inline-flex items-center text-sm font-medium rounded-full" href="data-masters-categories.php?page=<?php echo $i; ?>&search=<?php echo $search_query; ?>" aria-current="page"><?php echo $i; ?></a>
                        <?php endfor; ?>

                        <?php if ($page < $total_pages) : ?>
                          <a class="text-gray-400 hover:text-primary p-4 inline-flex items-center gap-2 font-medium rounded-md" href="data-masters-categories.php?page=<?php echo $page + 1; ?>&search=<?php echo $search_query; ?>">
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