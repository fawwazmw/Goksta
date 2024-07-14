<?php include('Konrix/services/database.php'); ?>

<?php
include('Konrix/services/database.php');
// Ambil slug dari URL
if (isset($_GET['slug'])) {
  $slug = $_GET['slug'];

  // Query menggunakan prepared statement
  $query = "SELECT p.title AS post_title, p.image AS post_image, p.summary AS post_summary, p.created_at AS post_created_at, p.content AS post_content, c.title AS category_title, u.full_name AS author_name
  FROM posts p
  INNER JOIN post_categories pc ON p.id_post = pc.post_id
  INNER JOIN categories c ON pc.category_id = c.id_category
  INNER JOIN users u ON p.author_id = u.id_user
  WHERE p.slug = ?";

  // Prepare statement
  $stmt = $conn->prepare($query);
  $stmt->bind_param('s', $slug);
  $stmt->execute();
  $result = $stmt->get_result();

  // Periksa apakah ada hasil
  if ($result->num_rows > 0) {
    $post = $result->fetch_assoc();
  } else {
    die("No post found with the specified slug.");
  }

  $stmt->close();
} else {
  die("No slug provided in the URL.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php $title = "Single Post";
  include('partials/title-meta.php'); ?>

  <?php include('partials/head-css.php'); ?>
</head>

<body class="bg-neutral-0 dark:bg-neutral-dark-0">

  <?php include('partials/navbar.php'); ?>

  <div class="header-bg absolute top-0 left-0 right-0 -z-50 w-full h-[1100px] bg-gradient-to-b from-primary-light-950/15 to-transparent max-h-[1100px] overflow-hidden"></div>

  <!-- Single 1 Section 1 -->
  <section class="relative py-4 lg:py-12">
    <div class="container px-4">
      <div class="flex w-full justify-center item-center mb-16">
        <!-- breadcrumb -->
        <div class="hidden md:flex gap-2.5  justify-start items-center h-12 px-7 py-3.5 bg-neutral-0 dark:bg-neutral-dark-0 rounded-3xl border border-neutral-300 dark:border-neutral-dark-300">
          <a href="index.php" class="text-neutral-700 dark:text-neutral-dark-700 text-base font-medium  leading-normal">Home</a>
          <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" class="fill-neutral-700 dark:fill-neutral-dark-700">
            <path d="M1.52344 11.9961C1.24219 11.9961 0.992188 11.9023 0.804688 11.7148C0.398438 11.3398 0.398438 10.6836 0.804688 10.3086L5.08594 5.99609L0.804688 1.71484C0.398438 1.33984 0.398438 0.683594 0.804688 0.308594C1.17969 -0.0976562 1.83594 -0.0976562 2.21094 0.308594L7.21094 5.30859C7.61719 5.68359 7.61719 6.33984 7.21094 6.71484L2.21094 11.7148C2.02344 11.9023 1.77344 11.9961 1.52344 11.9961Z" />
          </svg>
          <a href="blog.php" class="text-neutral-700 dark:text-neutral-dark-700 text-base font-medium leading-normal">Blog</a>
          <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" class="fill-neutral-700 dark:fill-neutral-dark-700">
            <path d="M1.52344 11.9961C1.24219 11.9961 0.992188 11.9023 0.804688 11.7148C0.398438 11.3398 0.398438 10.6836 0.804688 10.3086L5.08594 5.99609L0.804688 1.71484C0.398438 1.33984 0.398438 0.683594 0.804688 0.308594C1.17969 -0.0976562 1.83594 -0.0976562 2.21094 0.308594L7.21094 5.30859C7.61719 5.68359 7.61719 6.33984 7.21094 6.71484L2.21094 11.7148C2.02344 11.9023 1.77344 11.9961 1.52344 11.9961Z" />
          </svg>
          <span class="text-neutral-900 dark:text-neutral-dark-950 text-base font-bold leading-snug"><?= htmlspecialchars($post['post_title']) ?></span>
        </div>
      </div>
      <div class="swiper-container post-slider-1 mb-12">
        <div class="swiper-wrapper pt-4">
          <div class="swiper-slide">
            <img src="<?= htmlspecialchars($post['post_image']) ?>" class="rounded-e-3xl" alt="">
          </div>
          <!-- Tambahkan slide swiper lebih banyak jika diperlukan -->
        </div>
      </div>

      <div class="flex flex-col gap-4 items-center justify-center text-center">
        <div class="justify-center items-center gap-4 flex flex-col md:flex-row">
          <a href="category.php" class="inline-flex  px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-300 dark:border-neutral-dark-300 justify-center items-center gap-2.5">
            <span class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none"><?= htmlspecialchars($post['category_title']) ?></span>
          </a>
          <div class="justify-start items-center gap-2 flex">
            <a href="author.php"><img class="w-9 h-9 rounded-3xl" src="assets/imgs/avatar/avatar-10.png" /></a>
            <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700"><a href="author.php"><?= htmlspecialchars($post['author_name']) ?></a> - <?= date('j F Y', strtotime($post['post_created_at'])) ?></div>
          </div>
        </div>
        <h1 class="text-4xl lg:text-6xl font-bold text-neutral-950 dark:text-neutral-dark-950 max-w-5xl leading-snug">
          <?= htmlspecialchars($post['post_title']) ?>
        </h1>
        <p class="text-base md:text-lg font-medium text-neutral-950 dark:text-neutral-dark-950 max-w-3xl"><?= htmlspecialchars($post['post_summary']) ?></p>
      </div>
    </div>
  </section>
  <!-- Single 2 Section 2 -->
  <section class="relative py-12">
    <div class="container px-4">
      <div class="flex justify-center">
        <div class="post-content max-w-[850px]">
          <!-- Single Content -->
          <div class="single-content text-base font-medium text-neutral-950 dark:text-neutral-dark-950 leading-relaxed max-w-[850px]">
            <img src="<?= htmlspecialchars($post['post_image']) ?>" class="rounded-3xl mb-8" alt="">
            <?php
            // Ambil konten dari $post['post_content']
            $content = $post['post_content']; // Tidak perlu htmlspecialchars di sini karena kita ingin merender teks HTML

            // Ganti \r\n dengan \n
            $content = str_replace("\r\n", "\n", $content);

            // Konversi newline menjadi <br>
            $content = nl2br($content);

            // Tampilkan konten dengan tag <p>
            echo "<p class='mb-4'>$content</p>";
            ?>
            <div class="grid md:grid-cols-2 gap-4 mt-8">
              <img src="<?= htmlspecialchars($post['post_image']) ?>" class="rounded-3xl mb-8" alt="">
              <img src="<?= htmlspecialchars($post['post_image']) ?>" class="rounded-3xl mb-8" alt="">
            </div>
          </div>
          <!-- Single Content -->
          <div class="single-bottom mt-16 py-8 border-t border-neutral-300 dark:border-neutral-dark-300 text-lg font-bold text-neutral-950 dark:text-neutral-dark-950 leading-relaxed max-w-[850px]">
            <div class="flex flex-col md:flex-row justify-between gap-8">
              <div>
                <h6 class="text-lg font-bold mb-4">Popular Tag</h6>
                <div class="flex flex-wrap gap-2">
                  <a href="category.php" class="hover-up px-5 py-2 rounded-full border border-neutral-300 dark:border-neutral-dark-300  text-base font-medium hover:bg-neutral-300  hover:dark:bg-neutral-dark-300 transition-all duration-300">Art</a>
                  <a href="category-2.php" class="hover-up px-5 py-2 rounded-full border border-neutral-300 dark:border-neutral-dark-300  text-base font-medium hover:bg-neutral-300  hover:dark:bg-neutral-dark-300 transition-all duration-300">Fashion</a>
                  <a href="category-3.php" class="hover-up px-5 py-2 rounded-full border border-neutral-300 dark:border-neutral-dark-300  text-base font-medium hover:bg-neutral-300  hover:dark:bg-neutral-dark-300 transition-all duration-300">Health</a>
                  <a href="category-4.php" class="hover-up px-5 py-2 rounded-full border border-neutral-300 dark:border-neutral-dark-300  text-base font-medium hover:bg-neutral-300  hover:dark:bg-neutral-dark-300 transition-all duration-300">Food</a>
                </div>
              </div>
              <div>
                <h6 class="text-lg font-bold mb-4">Share:</h6>
                <div class="flex gap-2">
                  <div class="size-9 rounded-full flex justify-center items-center border border-neutral-300 dark:border-neutral-dark-300 cursor-pointer hover-up hover:bg-neutral-300 dark:hover:bg-neutral-dark-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" class="fill-neutral-950 dark:fill-neutral-dark-950">
                      <path d="M8.03125 9H5.6875V16H2.5625V9H0V6.125H2.5625V3.90625C2.5625 1.40625 4.0625 0 6.34375 0C7.4375 0 8.59375 0.21875 8.59375 0.21875V2.6875H7.3125C6.0625 2.6875 5.6875 3.4375 5.6875 4.25V6.125H8.46875L8.03125 9Z" />
                    </svg>
                  </div>
                  <div class="size-9 rounded-full flex justify-center items-center border border-neutral-300 dark:border-neutral-dark-300 cursor-pointer hover-up hover:bg-neutral-300 dark:hover:bg-neutral-dark-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" class="fill-neutral-950 dark:fill-neutral-dark-950">
                      <g clip-path="url(#clip0_191_5465)">
                        <path d="M10.083 6.77491L15.9113 0H14.5302L9.46951 5.88256L5.42755 0H0.765625L6.87786 8.89547L0.765625 16H2.14682L7.49104 9.78782L11.7596 16H16.4216L10.0827 6.77491H10.083ZM8.1913 8.97384L7.57201 8.08805L2.64448 1.03974H4.76591L8.74248 6.72795L9.36178 7.61374L14.5308 15.0075H12.4094L8.1913 8.97418V8.97384Z" />
                      </g>
                    </svg>
                  </div>
                  <div class="size-9 rounded-full flex justify-center items-center border border-neutral-300 dark:border-neutral-dark-300 cursor-pointer hover-up hover:bg-neutral-300 dark:hover:bg-neutral-dark-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" class="fill-neutral-950 dark:fill-neutral-dark-950">
                      <path d="M7.60938 3.39062C9.57812 3.39062 11.2031 5.01562 11.2031 6.98438C11.2031 8.98438 9.57812 10.5781 7.60938 10.5781C5.60938 10.5781 4.01562 8.98438 4.01562 6.98438C4.01562 5.01562 5.60938 3.39062 7.60938 3.39062ZM7.60938 9.32812C8.89062 9.32812 9.92188 8.29688 9.92188 6.98438C9.92188 5.70312 8.89062 4.67188 7.60938 4.67188C6.29688 4.67188 5.26562 5.70312 5.26562 6.98438C5.26562 8.29688 6.32812 9.32812 7.60938 9.32812ZM12.1719 3.26562C12.1719 2.79688 11.7969 2.42188 11.3281 2.42188C10.8594 2.42188 10.4844 2.79688 10.4844 3.26562C10.4844 3.73438 10.8594 4.10938 11.3281 4.10938C11.7969 4.10938 12.1719 3.73438 12.1719 3.26562ZM14.5469 4.10938C14.6094 5.26562 14.6094 8.73438 14.5469 9.89062C14.4844 11.0156 14.2344 11.9844 13.4219 12.8281C12.6094 13.6406 11.6094 13.8906 10.4844 13.9531C9.32812 14.0156 5.85938 14.0156 4.70312 13.9531C3.57812 13.8906 2.60938 13.6406 1.76562 12.8281C0.953125 11.9844 0.703125 11.0156 0.640625 9.89062C0.578125 8.73438 0.578125 5.26562 0.640625 4.10938C0.703125 2.98438 0.953125 1.98438 1.76562 1.17188C2.60938 0.359375 3.57812 0.109375 4.70312 0.046875C5.85938 -0.015625 9.32812 -0.015625 10.4844 0.046875C11.6094 0.109375 12.6094 0.359375 13.4219 1.17188C14.2344 1.98438 14.4844 2.98438 14.5469 4.10938ZM13.0469 11.1094C13.4219 10.2031 13.3281 8.01562 13.3281 6.98438C13.3281 5.98438 13.4219 3.79688 13.0469 2.85938C12.7969 2.26562 12.3281 1.76562 11.7344 1.54688C10.7969 1.17188 8.60938 1.26562 7.60938 1.26562C6.57812 1.26562 4.39062 1.17188 3.48438 1.54688C2.85938 1.79688 2.39062 2.26562 2.14062 2.85938C1.76562 3.79688 1.85938 5.98438 1.85938 6.98438C1.85938 8.01562 1.76562 10.2031 2.14062 11.1094C2.39062 11.7344 2.85938 12.2031 3.48438 12.4531C4.39062 12.8281 6.57812 12.7344 7.60938 12.7344C8.60938 12.7344 10.7969 12.8281 11.7344 12.4531C12.3281 12.2031 12.8281 11.7344 13.0469 11.1094Z" />
                    </svg>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- Single pagination -->
          <div class="relative single-pagination mt-16 p-8 border border-neutral-300 dark:border-neutral-dark-300 rounded-xl text-lg font-bold text-neutral-950 dark:text-neutral-dark-950 leading-relaxed max-w-[850px]">
            <div class="flex flex-col md:flex-row justify-between gap-8">
              <div class="prev flex gap-4  hover-up">
                <a href="#" class="text-neutral-950 rounded-full w-12 h-12 min-w-12 bg-primary-light-950 dark:bg-primary-dark-200 flex justify-center items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" class="fill-neutral-950 dark:fill-neutral-dark-950">
                    <path d="M17.4922 7.49023C17.4922 8.19336 16.9453 8.74023 16.2812 8.74023H4.28906L8.39062 12.8809C8.89844 13.3496 8.89844 14.1699 8.39062 14.6387C8.15625 14.873 7.84375 14.9902 7.53125 14.9902C7.17969 14.9902 6.86719 14.873 6.63281 14.6387L0.382812 8.38867C-0.125 7.91992 -0.125 7.09961 0.382812 6.63086L6.63281 0.380859C7.10156 -0.126953 7.92188 -0.126953 8.39062 0.380859C8.89844 0.849609 8.89844 1.66992 8.39062 2.13867L4.28906 6.24023H16.2812C16.9453 6.24023 17.4922 6.82617 17.4922 7.49023Z" />
                  </svg>
                </a>
                <a href="single.php">Fashionable Bytes: Blending Style with Tech Savvy</a>
              </div>
              <div class="next flex gap-4 text-end hover-up">
                <a href="single.php">Living the Art-Tech Dream: My Multifaceted Life</a>
                <a href="#" class="text-neutral-950 rounded-full w-12 h-12 min-w-12 bg-primary-light-950  dark:bg-primary-dark-200 flex justify-center items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" class="fill-neutral-950 dark:fill-neutral-dark-950">
                    <path d="M0 7.49023C0 8.19336 0.546875 8.74023 1.21094 8.74023H13.2031L9.10156 12.8809C8.59375 13.3496 8.59375 14.1699 9.10156 14.6387C9.33594 14.873 9.64844 14.9902 9.96094 14.9902C10.3125 14.9902 10.625 14.873 10.8594 14.6387L17.1094 8.38867C17.6172 7.91992 17.6172 7.09961 17.1094 6.63086L10.8594 0.380859C10.3906 -0.126953 9.57031 -0.126953 9.10156 0.380859C8.59375 0.849609 8.59375 1.66992 9.10156 2.13867L13.2031 6.24023H1.21094C0.546875 6.24023 0 6.82617 0 7.49023Z" />
                  </svg>
                </a>
              </div>
            </div>
            <div class="v-divider w-64 h-[1px] md:h-12 md:w-[1px] bg-neutral-300 dark:bg-neutral-dark-300 absolute top-1/2 left-10 md:left-1/2 md:top-10"></div>
          </div>
          <!-- Single Comment form -->
          <div class="relative single-comment-form mt-20 max-w-[850px]">
            <h3 class="font-bold text-5xl mb-8 text-neutral-950 dark:text-neutral-dark-950">Leave <span class="font-light"> a reply</span></h3>
            <form id="commentForm" method="POST" action="auth-comment.php">
              <?php
              // Include database connection
              include('Konrix/services/database.php');

              // Check if slug is provided in URL
              if (isset($_GET['slug']) && !empty($_GET['slug'])) {
                $slug = $_GET['slug'];

                // Query to fetch post_id based on slug
                $sql_post_id = "SELECT id_post FROM posts WHERE slug = ?";
                $stmt = $conn->prepare($sql_post_id);
                $stmt->bind_param('s', $slug);
                $stmt->execute();
                $result_post_id = $stmt->get_result();

                // If post_id found, set the hidden input field
                if ($result_post_id->num_rows > 0) {
                  $row = $result_post_id->fetch_assoc();
                  $post_id = $row['id_post'];
                  echo '<input type="hidden" name="post_id" id="post_id" value="' . $post_id . '">';
                }
                $stmt->close();
              }
              $conn->close();
              ?>
              <input type="hidden" name="parent_id" id="parent_id" value="0">
              <div class="grid md:grid-cols-3 gap-4 mb-4 md:mb-0">
                <input type="text" name="name" placeholder="Name" class="input-default" required>
              </div>
              <textarea name="comment" placeholder="Comment" class="textarea-default" required></textarea>
              <div class="flex items-center mb-8">
                <input type="checkbox" id="save-info" class="w-4 h-4 accent-primary-light-950 bg-primary-light-950 text-neutral-0 rounded cursor-pointer mr-2">
                <label for="save-info" class="text-sm text-neutral-950 dark:text-neutral-dark-950">Save my name and website in this browser for the next time</label>
              </div>
              <button type="submit" class="group btn bg-primary-light-950 dark:bg-primary-dark-950 rounded-full px-8 py-4 text-xl text-neutral-950 dark:text-neutral-dark-950 flex gap-2 items-center">
                <span>Submit</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" class="fill-neutral-950 dark:fill-neutral-dark-950 group-hover:translate-x-1 transition-all duration-300">
                  <g clip-path="url(#clip0_253_4238)">
                    <path d="M23.6164 11.0663L14.9491 2.39884C14.7017 2.15143 14.372 2.01562 14.0204 2.01562C13.6684 2.01562 13.3388 2.15162 13.0914 2.39884L12.3045 3.18596C12.0573 3.43298 11.9211 3.76293 11.9211 4.11473C11.9211 4.46634 12.0573 4.80741 12.3045 5.05443L17.3608 10.1219H1.29657C0.572288 10.1219 0 10.6889 0 11.4134V12.5262C0 13.2507 0.572288 13.8748 1.29657 13.8748H17.4182L12.3047 18.9706C12.0575 19.218 11.9213 19.539 11.9213 19.8908C11.9213 20.2422 12.0575 20.5679 12.3047 20.8151L13.0916 21.5997C13.339 21.8471 13.6686 21.9819 14.0206 21.9819C14.3722 21.9819 14.7019 21.8453 14.9493 21.5979L23.6166 12.9307C23.8646 12.6825 24.001 12.3512 24 11.999C24.0008 11.6456 23.8646 11.3141 23.6164 11.0663Z"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_253_4238">
                      <rect width="24" height="24"></rect>
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </form>
            <?php include('Konrix/services/database.php'); ?>

            <div class="mt-20">
              <h3 class="font-bold text-4xl mb-8 text-neutral-950 dark:text-neutral-dark-950">Comments</h3>
              <div id="commentsContainer">
                <?php
                // Include database connection
                include('Konrix/services/database.php');

                // Ambil slug dari URL
                if (!isset($_GET['slug']) || empty($_GET['slug'])) {
                  echo "Slug tidak diberikan.";
                  exit();
                }
                $slug = htmlspecialchars($_GET['slug']);

                // Debugging: Output the slug value
                echo "Slug: " . $slug . "<br>";

                // Fetch post_id based on previously validated slug
                $sql_get_post_id = "SELECT id_post FROM posts WHERE slug = ? LIMIT 1";
                $stmt_get_post_id = $conn->prepare($sql_get_post_id);
                if ($stmt_get_post_id === false) {
                  echo "Error preparing statement.";
                  exit();
                }
                $stmt_get_post_id->bind_param('s', $slug);
                $stmt_get_post_id->execute();
                $result_post_id = $stmt_get_post_id->get_result();

                if ($result_post_id->num_rows > 0) {
                  $row = $result_post_id->fetch_assoc();
                  $post_id = $row['id_post'];

                  // Display comments
                  $comments_html = fetchComments($conn, $post_id);
                  echo $comments_html;

                  $stmt_get_post_id->close();
                } else {
                  echo "Komentar tidak dapat dimuat karena tidak ada postingan dengan slug yang diberikan.";
                }

                // Close database connection
                $conn->close();

                // Function to fetch comments recursively
                function fetchComments($conn, $post_id, $parent_id = NULL, $level = 0)
                {
                  $sql_comments = "SELECT * FROM post_comments WHERE post_id = ? AND " . ($parent_id === NULL ? "parent_id IS NULL" : "parent_id = ?") . " AND published = 1 ORDER BY created_at DESC";
                  $stmt_comments = $conn->prepare($sql_comments);
                  if ($stmt_comments === false) {
                    return "Error preparing statement for comments.";
                  }
                  if ($parent_id === NULL) {
                    $stmt_comments->bind_param('i', $post_id);
                  } else {
                    $stmt_comments->bind_param('ii', $post_id, $parent_id);
                  }
                  $stmt_comments->execute();
                  $result_comments = $stmt_comments->get_result();

                  $comments_html = '';
                  while ($comment = $result_comments->fetch_assoc()) {
                    // Build HTML for each comment
                    $comments_html .= '<div class="comment mb-8 p-4 rounded-lg border border-neutral-300 dark:border-neutral-dark-300 bg-neutral-100 dark:bg-neutral-dark-800" data-post-id="' . $post_id . '" data-comment-id="' . $comment['id_comment'] . '" style="margin-left: ' . ($level * 20) . 'px;">';
                    $comments_html .= '<div class="flex items-start mb-4">';
                    $comments_html .= '<img src="assets/imgs/avatar/avatar-01.png" alt="Avatar" class="w-12 h-12 rounded-full mr-4">';
                    $comments_html .= '<div style="margin-left: 1rem;">';
                    $comments_html .= '<h4 class="text-xl font-bold text-neutral-950 dark:text-neutral-dark-950">' . htmlspecialchars($comment['name']) . '</h4>';
                    $comments_html .= '<p class="text-sm text-neutral-700 dark:text-neutral-dark-600">' . date('F j, Y', strtotime($comment['created_at'])) . '</p>';
                    $comments_html .= '<p class="text-neutral-700 dark:text-neutral-dark-600 mb-2">' . htmlspecialchars($comment['content']) . '</p>';
                    $comments_html .= '<button class="reply-button text-sm text-primary-light-950 dark:text-primary-dark-950 mt-4" data-reply-to="' . $comment['id_comment'] . '">Reply</button>';
                    $comments_html .= '</div>';
                    $comments_html .= '</div>';
                    // Recursive call to fetch and append replies
                    $comments_html .= '<div class="ml-16" id="replies-' . $comment['id_comment'] . '">' . fetchComments($conn, $post_id, $comment['id_comment'], $level + 1) . '</div>';
                    $comments_html .= '</div>';
                  }

                  $stmt_comments->close();
                  return $comments_html;
                }
                ?>
              </div>
            </div>

            <script>
              document.addEventListener('DOMContentLoaded', function() {
                // Get slug from URL
                const slug = window.location.pathname.split('/').filter(Boolean).pop();

                fetch(`single.php?slug=${slug}`)
                  .then(response => response.text())
                  .then(data => {
                    const commentsContainer = document.getElementById('commentsContainer');
                    commentsContainer.innerHTML = data;

                    // Get post_id from the first comment
                    const firstComment = commentsContainer.querySelector('.comment');
                    if (firstComment) {
                      const postId = firstComment.dataset.postId;
                      document.getElementById('post_id').value = postId;
                    }

                    // Add event listeners for reply buttons
                    const replyButtons = document.querySelectorAll('.reply-button');
                    replyButtons.forEach(button => {
                      button.addEventListener('click', function() {
                        const replyTo = this.getAttribute('data-reply-to');
                        document.getElementById('parent_id').value = replyTo;
                        window.scrollTo({
                          top: document.getElementById('commentForm').offsetTop,
                          behavior: 'smooth'
                        });
                      });
                    });
                  })
                  .catch(error => console.error('Error:', error));
              });
            </script>

            <style>
              .comment {
                padding: 1rem;
                border-radius: 0.5rem;
                border: 1px solid #ccc;
                background-color: #f9f9f9;
                margin-bottom: 1rem;
              }

              .comment h4 {
                font-size: 1.25rem;
                font-weight: bold;
              }

              .comment p {
                font-size: 1rem;
                color: #555;
              }

              .reply-button {
                color: #007bff;
                cursor: pointer;
              }

              .dark .comment {
                border-color: #444;
                background-color: #333;
              }

              .dark .comment h4,
              .dark .comment p {
                color: #ccc;
              }

              .dark .reply-button {
                color: #bbb;
              }
            </style>
          </div>
        </div>
      </div>
  </section>
  <!-- Single 1 Section 3 -->
  <section class="relative py-8 lg:py-12 lg:mb-16">
    <div class="container px-4">
      <h3 class="heading-3 text-left mb-8 lg:mb-12 leading-none"><span class="font-light">Related</span> Posts</h3>
      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-[30px]">
        <div class="flex-col justify-start items-start gap-5 inline-flex hover-up border-2 border-neutral-300 dark:border-neutral-dark-300 rounded-3xl overflow-hidden">
          <a href="single.php" class="rounded-2xl overflow-hidden max-h-[180px]">
            <img src="assets/imgs/pages/img-02.png" />
          </a>
          <div class="flex-col justify-start items-start gap-3.5 flex px-4 pb-4">
            <div class="justify-start items-center gap-5 inline-flex">
              <a href="category.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Trending</div>
              </a>
              <div class="justify-start items-center gap-2 flex">
                <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700">June 8, 2024</div>
              </div>
            </div>
            <h3><a class="text-neutral-950 dark:text-neutral-dark-950 text-base font-bold leading-snug item-link" href="single.php">Globetrotting in Style: A Journey Through My Lens</a></h3>
          </div>
        </div>
        <div class="flex-col justify-start items-start gap-5 inline-flex hover-up border-2 border-neutral-300 dark:border-neutral-dark-300 rounded-3xl overflow-hidden">
          <a href="single.php" class="rounded-2xl overflow-hidden max-h-[180px]">
            <img src="assets/imgs/pages/img-03.png" />
          </a>
          <div class="flex-col justify-start items-start gap-3.5 flex px-4 pb-4">
            <div class="justify-start items-center gap-5 inline-flex">
              <a href="category.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Trending</div>
              </a>
              <div class="justify-start items-center gap-2 flex">
                <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700">June 8, 2024</div>
              </div>
            </div>
            <h3><a class="text-neutral-950 dark:text-neutral-dark-950 text-base font-bold leading-snug item-link" href="single.php">Globetrotting in Style: A Journey Through My Lens</a></h3>
          </div>
        </div>
        <div class="flex-col justify-start items-start gap-5 inline-flex hover-up border-2 border-neutral-300 dark:border-neutral-dark-300 rounded-3xl overflow-hidden">
          <a href="single.php" class="rounded-2xl overflow-hidden max-h-[180px]">
            <img src="assets/imgs/pages/img-04.png" />
          </a>
          <div class="flex-col justify-start items-start gap-3.5 flex px-4 pb-4">
            <div class="justify-start items-center gap-5 inline-flex">
              <a href="category.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Trending</div>
              </a>
              <div class="justify-start items-center gap-2 flex">
                <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700">June 8, 2024</div>
              </div>
            </div>
            <h3><a class="text-neutral-950 dark:text-neutral-dark-950 text-base font-bold leading-snug item-link" href="single.php">Globetrotting in Style: A Journey Through My Lens</a></h3>
          </div>
        </div>
        <div class="flex-col justify-start items-start gap-5 inline-flex hover-up border-2 border-neutral-300 dark:border-neutral-dark-300 rounded-3xl overflow-hidden">
          <a href="single.php" class="rounded-2xl overflow-hidden max-h-[180px]">
            <img src="assets/imgs/pages/img-05.png" />
          </a>
          <div class="flex-col justify-start items-start gap-3.5 flex px-4 pb-4">
            <div class="justify-start items-center gap-5 inline-flex">
              <a href="category.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Trending</div>
              </a>
              <div class="justify-start items-center gap-2 flex">
                <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700">June 8, 2024</div>
              </div>
            </div>
            <h3><a class="text-neutral-950 dark:text-neutral-dark-950 text-base font-bold leading-snug item-link" href="single.php">Globetrotting in Style: A Journey Through My Lens</a></h3>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="w-full py-20 bg-neutral-200 dark:bg-neutral-dark-200 ">
    <?php include('partials/footer.php') ?>
  </footer>

  <?php include('partials/footer-script.php'); ?>
</body>

</html>