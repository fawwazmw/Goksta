<?php
include 'partials/main.php';
include('services/database.php');
include_once('services/session.php');
require_login();

// Mendapatkan article_id dari URL
$article_id = isset($_GET['article_id']) ? $_GET['article_id'] : null;

if ($article_id) {
  // Query untuk mengambil detail artikel berdasarkan article_id
  $sql = "SELECT posts.*, users.full_name AS author_name, categories.title AS category_title
  FROM posts
  LEFT JOIN users ON posts.author_id = users.id_user
  LEFT JOIN post_categories ON posts.id_post = post_categories.post_id
  LEFT JOIN categories ON post_categories.category_id = categories.id_category
  WHERE posts.id_post = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $article_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if ($result && mysqli_num_rows($result) > 0) {
    $article = mysqli_fetch_assoc($result);

    // Mengambil tags
    $sql_tags = "SELECT tags.title
    FROM tags
    LEFT JOIN post_tags ON tags.id_tag = post_tags.tag_id
    WHERE post_tags.post_id = ?";
    $stmt_tags = mysqli_prepare($conn, $sql_tags);
    mysqli_stmt_bind_param($stmt_tags, "i", $article_id);
    mysqli_stmt_execute($stmt_tags);
    $result_tags = mysqli_stmt_get_result($stmt_tags);

    $tags = [];
    while ($tag = mysqli_fetch_assoc($result_tags)) {
      $tags[] = $tag['title'];
    }

    // Menghapus 7 huruf pertama dari gambar
    $image = $article['image'];
    if (!empty($image)) {
      $image = substr($image, 7);
    }

    // Konversi content ke teks normal
    $content = str_replace("\\r\\n", "<br>", $article['content']);
  } else {
    echo "Article not found.";
    exit();
  }

  mysqli_stmt_close($stmt);
  mysqli_stmt_close($stmt_tags);
  mysqli_close($conn);
} else {
  echo "Invalid article ID.";
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php $title = "Article Detail";
  include 'partials/title-meta.php'; ?>
  <?php include 'partials/head-css.php'; ?>
</head>

<body>

  <div class="flex wrapper">

    <?php include 'partials/menu.php'; ?>

    <div class="page-content">

      <?php include 'partials/topbar.php'; ?>

      <main class="flex-grow p-6">

        <?php
        $pageTitles = ["Konrix", "Posts", "Articles", "Article Detail"];
        include 'partials/page-title.php'; ?>

        <div class="flex flex-col gap-6">
          <div class="lg:col-span-2">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><?php echo $article['title'] ?></h4>
              </div>

              <div class="p-6">
                <div>
                  <div class="mb-6">
                    <h4 class="card-title my-3">Image</h4>
                    <img src="<?php echo $image; ?>" alt="Article Image">
                  </div>
                  <div class="mb-6">
                    <h4 class="card-title my-3">Content</h4>
                    <p class="text-gray-500 mb-4 text-sm"><?php echo $content; ?></p>
                  </div>

                  <div class="mb-6">
                    <h4 class="card-title my-3">Tags</h4>
                    <div class="uppercase flex gap-4">
                      <?php foreach ($tags as $tag) : ?>
                        <a href="#" class="inline-flex items-center font-semibold py-1 px-2 rounded text-xs bg-primary/20 text-primary"><?php echo $tag; ?></a>
                      <?php endforeach; ?>
                    </div>
                  </div>

                  <div class="grid grid-cols-4 gap-6">
                    <div class="">
                      <div class="">
                        <p class="mb-3 text-sm uppercase font-medium"><i class="uil-calender text-red-500 text-base"></i> Created At</p>
                        <h5 class="text-base text-gray-700 dark:text-gray-300 font-medium"><?php echo date("d M, Y", strtotime($article['created_at'])); ?></h5>
                      </div>
                    </div>
                    <div class="">
                      <p class="mb-3 text-sm uppercase font-medium"><i class="uil-calendar-slash text-red-500 text-base"></i> Updated At</p>
                      <h5 class="text-base text-gray-700 dark:text-gray-300 font-medium"><?php echo date("d M, Y", strtotime($article['updated_at'])); ?></h5>
                    </div>

                    <div class="">
                      <p class="mb-3 text-sm uppercase font-medium"><i class="uil-calendar-slash text-red-500 text-base"></i> Category</p>
                      <h5 class="text-base text-gray-700 dark:text-gray-300 font-medium"><?php echo $article['category_title']; ?></h5>
                    </div>

                    <div class="">
                      <p class="mb-3 text-sm uppercase font-medium"><i class="uil-user text-red-500 text-base"></i> Author</p>
                      <h5 class="text-base text-gray-700 dark:text-gray-300 font-medium"><?php echo $article['author_name']; ?></h5>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="lg:col-span-4 mt-5">
              <div class="flex justify-start gap-3">
                <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-red-500 hover:bg-red-700 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none" onclick="window.location.href='posts-articles.php'">
                  Back
                </button>
              </div>
            </div>
          </div>
        </div>
      </main>

      <?php include 'partials/footer.php'; ?>

    </div>

  </div>

  <?php include 'partials/customizer.php'; ?>

  <?php include 'partials/footer-scripts.php'; ?>

</body>

</html>