<?php include('Konrix/services/database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php $title = "Blog";
  include('partials/title-meta.php'); ?>

  <?php include('partials/head-css.php'); ?>

</head>

<body class="bg-neutral-0 dark:bg-neutral-dark-0">

  <?php include('partials/navbar.php'); ?>

  <div class="header-bg absolute top-0 left-0 right-0 -z-50 w-full h-[1100px] bg-gradient-to-b from-primary-light-950/15 to-transparent max-h-[1100px] overflow-hidden"></div>

  <!-- Blog 1 Section 1 -->
  <section class="relative py-20 lg:py-12">
    <div class="container px-4">
      <div class="flex flex-col gap-8 items-center justify-center text-center">
        <!-- breadcrumb -->
        <div class="hidden md:flex gap-2.5  justify-start items-center h-12 px-7 py-3.5 bg-neutral-0 dark:bg-neutral-dark-0 rounded-3xl border border-neutral-300 dark:border-neutral-dark-300">
          <a href="index." class="text-neutral-700 dark:text-neutral-dark-700 text-base font-medium  leading-normal">Home</a>
          <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" class="fill-neutral-700 dark:fill-neutral-dark-700">
            <path d="M1.52344 11.9961C1.24219 11.9961 0.992188 11.9023 0.804688 11.7148C0.398438 11.3398 0.398438 10.6836 0.804688 10.3086L5.08594 5.99609L0.804688 1.71484C0.398438 1.33984 0.398438 0.683594 0.804688 0.308594C1.17969 -0.0976562 1.83594 -0.0976562 2.21094 0.308594L7.21094 5.30859C7.61719 5.68359 7.61719 6.33984 7.21094 6.71484L2.21094 11.7148C2.02344 11.9023 1.77344 11.9961 1.52344 11.9961Z" />
          </svg>
          <a href="blog.php" class="text-neutral-700 dark:text-neutral-dark-700 text-base font-medium leading-normal">Blog</a>
        </div>
        <h1 class="heading-1 mb-0">
          News & <span class="font-light">Articles</span>
        </h1>
        <p class="text-base md:text-lg font-medium text-neutral-950 dark:text-neutral-dark-950 max-w-3xl">Tech, fashion, lifestyle – your daily dose of innovation, style, and living. Explore the intersection in a byte-sized journey.</p>
      </div>
    </div>
  </section>
  <!-- Blog 1 Section 2 -->
  <section class="relative py-4 lg:py-12">
    <div class="container px-4">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-[30px]">
        <?php
        include('Konrix/services/database.php');
        // Query to fetch data for the content block (Main Post)
        $queryMain = "SELECT p.*, u.full_name AS author_name, c.title AS category_title, IFNULL(p.slug, LOWER(REPLACE(REPLACE(p.title, ' ', '-'), ',', ''))) AS post_slug, p.image AS image, p.title AS title
        FROM posts p
        LEFT JOIN users u ON p.author_id = u.id_user
        LEFT JOIN post_categories pc ON p.id_post = pc.post_id
        LEFT JOIN categories c ON pc.category_id = c.id_category
        WHERE p.published = true
        ORDER BY p.created_at DESC
        LIMIT 1";
        $resultMain = mysqli_query($conn, $queryMain);

        // Check if the query executed successfully for Main Post
        if ($resultMain && mysqli_num_rows($resultMain) > 0) {
          $rowMain = mysqli_fetch_assoc($resultMain);
          $postSlugMain = $rowMain['post_slug']; // Get the post slug
          $imageMain = $rowMain['image'];
          $categoryTitleMain = htmlspecialchars($rowMain['category_title']);
          $authorNameMain = htmlspecialchars($rowMain['author_name']);
          $createdAtMain = date('F j, Y', strtotime($rowMain['created_at']));
          $summaryMain = htmlspecialchars($rowMain['summary']);
          $titleMain = htmlspecialchars($rowMain['title']);
        ?>
          <!--Left col-->
          <div class="flex-col justify-start items-start gap-5 inline-flex hover-up">
            <a href="single.php?slug=<?php echo $postSlugMain; ?>" class="rounded-3xl overflow-hidden max-h-[370px]">
              <img src="<?php echo $imageMain; ?>" alt="Main Post Image" />
            </a>
            <div class="flex-col justify-start items-start gap-3.5 flex">
              <div class="justify-start items-center gap-5 inline-flex">
                <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                  <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none"><?php echo $categoryTitleMain; ?></div>
                </a>
                <div class="justify-start items-center gap-2 flex">
                  <a href="author.php"><img class="w-9 h-9 rounded-3xl" src="assets/imgs/avatar/avatar-01.png" /></a>
                  <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700"><a href="author.php"><?php echo $authorNameMain; ?></a> - <?php echo $createdAtMain; ?></div>
                </div>
              </div>
              <h3><a class="text-neutral-950 dark:text-neutral-dark-950 text-2xl font-bold leading-snug item-link" href="single.php?slug=<?php echo $postSlugMain; ?>"><?php echo $titleMain; ?></a></h3>
              <p class="text-neutral-700 text-sm md:text-base font-medium leading-relaxed dark:text-neutral-dark-600">
                <?php echo $summaryMain; ?>
              </p>
            </div>
          </div>
          <?php
        } else {
          echo '<p>No published posts found.</p>';
        }

        // Free result set for Main Post
        mysqli_free_result($resultMain);

        // Query to fetch data for the right column (Small Posts)
        $queryRight = "SELECT p.*, u.full_name AS author_name, c.title AS category_title,
               IFNULL(p.slug, LOWER(REPLACE(REPLACE(p.title, ' ', '-'), ',', ''))) AS post_slug
               FROM posts p
               LEFT JOIN users u ON p.author_id = u.id_user
               LEFT JOIN post_categories pc ON p.id_post = pc.post_id
               LEFT JOIN categories c ON pc.category_id = c.id_category
               WHERE p.published = true
               ORDER BY p.created_at DESC
               LIMIT 3 OFFSET 1"; // Offset 1 skips the main post
        $resultRight = mysqli_query($conn, $queryRight);

        // Check if the query executed successfully for Small Posts
        if ($resultRight && mysqli_num_rows($resultRight) > 0) {
          while ($rowRight = mysqli_fetch_assoc($resultRight)) {
            $postSlugRight = $rowRight['post_slug']; // Get the post slug
            $imageRight = $rowRight['image'];
            $categoryTitleRight = htmlspecialchars($rowRight['category_title']);
            $authorNameRight = htmlspecialchars($rowRight['author_name']);
            $createdAtRight = date('F j, Y', strtotime($rowRight['created_at']));
            $summaryRight = htmlspecialchars($rowRight['summary']);
          ?>
            <!--Right col-->
            <div class="flex flex-col gap-[30px]">
              <!--small post-->
              <div class="w-full border-neutral-300 dark:border-neutral-dark-300 flex-col justify-start items-start gap-2.5 inline-flex hover-up">
                <div class="justify-start items-center gap-8 flex flex-col md:flex-row">
                  <a href="single.php?slug=<?php echo $postSlugRight; ?>" class="rounded-[18px] overflow-hidden max-h-36 md:max-w-48">
                    <img src="<?php echo $imageRight; ?>" alt="Post Image" />
                  </a>
                  <div class="flex-col gap-4 inline-flex items-start">
                    <div class="justify-start items-center gap-5 inline-flex">
                      <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                        <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none"><?php echo $categoryTitleRight; ?></div>
                      </a>
                      <div class="justify-start items-center gap-2 flex">
                        <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700">2 mins read - <?php echo $createdAtRight; ?></div>
                      </div>
                    </div>
                    <h3 class="text-start mb-4 md-mb-0">
                      <a class="text-neutral-950 dark:text-neutral-dark-950 text-2xl font-bold leading-snug item-link" href="single.php?slug=<?php echo $postSlugRight; ?>"><?php echo $summaryRight; ?></a>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
        } else {
          echo '<p>No published posts found.</p>';
        }

        // Free result set for Small Posts
        mysqli_free_result($resultRight);

        // Close the connection (optional as PHP will automatically close it at the end of script execution)
        mysqli_close($conn);
        ?>

      </div>
    </div>
  </section>
  <!-- Blog 1 Section 3 -->
  <section class="relative pt-20 py-10 lg:pt-12 lg:pb-24">
    <div class="container px-4">
      <div class="flex flex-col justify-start mb-16 items-start lg:flex-row lg:justify-between lg:items-end">
        <h3 class="heading-2 text-left mb-4 lg:mb-0"><span class="font-light">Featured </span> Posts</h3>
        <div class="justify-start items-start gap-2 inline-flex flex-wrap mb-3">
          <a class="button-7 hover-up" href="blog.php">Fashion</a>
          <a class="button-7 hover-up" href="blog.php">Art</a>
          <a class="button-7 hover-up" href="blog.php">Health</a>
          <a class="button-7 hover-up" href="blog.php">Food</a>
          <a class="button-7 hover-up" href="blog.php">Travel</a>
          <a class="button-7 hover-up" href="blog.php">Sports</a>
        </div>
      </div>
      <div class="flex flex-col gap-16">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-[30px] gap-y-[65px]">
          <div class="flex-col justify-start items-start gap-5 inline-flex hover-up mb-4">
            <a href="single." class="rounded-3xl overflow-hidden max-h-[370px]">
              <img src="assets/imgs/pages/img-06.png" />
            </a>
            <div class="flex-col justify-start items-start gap-3.5 flex">
              <div class="justify-start items-center gap-5 inline-flex">
                <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                  <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Technology</div>
                </a>
                <div class="justify-start items-center gap-2 flex">
                  <a href="author."><img class="w-9 h-9 rounded-3xl" src="assets/imgs/avatar/avatar-01.png" /></a>
                  <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700"><a href="author.">Alice Johnson</a> - January 15, 2024</div>
                </div>
              </div>
              <h3><a class="text-neutral-950 dark:text-neutral-dark-950 text-2xl font-bold leading-snug item-link" href="single.">Transformative Learning: Adapting to Educational Innovations</a></h3>
            </div>
          </div>
          <div class="flex-col justify-start items-start gap-5 inline-flex hover-up mb-4">
            <a href="single." class="rounded-3xl overflow-hidden max-h-[370px]">
              <img src="assets/imgs/pages/img-07.png" />
            </a>
            <div class="flex-col justify-start items-start gap-3.5 flex">
              <div class="justify-start items-center gap-5 inline-flex">
                <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                  <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Science</div>
                </a>
                <div class="justify-start items-center gap-2 flex">
                  <a href="author."><img class="w-9 h-9 rounded-3xl" src="assets/imgs/avatar/avatar-02.png" /></a>
                  <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700"><a href="author.">Bob Smith</a> - February 22, 2024</div>
                </div>
              </div>
              <h3><a class="text-neutral-950 dark:text-neutral-dark-950 text-2xl font-bold leading-snug item-link" href="single.">Unraveling the Mysteries of Dark Matter</a></h3>
            </div>
          </div>
          <div class="flex-col justify-start items-start gap-5 inline-flex hover-up mb-4">
            <a href="single." class="rounded-3xl overflow-hidden max-h-[370px]">
              <img src="assets/imgs/pages/img-08.png" />
            </a>
            <div class="flex-col justify-start items-start gap-3.5 flex">
              <div class="justify-start items-center gap-5 inline-flex">
                <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                  <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Travel</div>
                </a>
                <div class="justify-start items-center gap-2 flex">
                  <a href="author."><img class="w-9 h-9 rounded-3xl" src="assets/imgs/avatar/avatar-03.png" /></a>
                  <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700"><a href="author.">Eva Davis</a> - March 10, 2024</div>
                </div>
              </div>
              <h3><a class="text-neutral-950 dark:text-neutral-dark-950 text-2xl font-bold leading-snug item-link" href="single.">A Journey Through the Enchanting Landscapes of New Zealand</a></h3>
            </div>
          </div>
          <div class="flex-col justify-start items-start gap-5 inline-flex hover-up mb-4">
            <a href="single." class="rounded-3xl overflow-hidden max-h-[370px]">
              <img src="assets/imgs/pages/img-09.png" />
            </a>
            <div class="flex-col justify-start items-start gap-3.5 flex">
              <div class="justify-start items-center gap-5 inline-flex">
                <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                  <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Health</div>
                </a>
                <div class="justify-start items-center gap-2 flex">
                  <a href="author."><img class="w-9 h-9 rounded-3xl" src="assets/imgs/avatar/avatar-04.png" /></a>
                  <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700"><a href="author.">Michael Anderson</a> - April 5, 2024</div>
                </div>
              </div>
              <h3><a class="text-neutral-950 dark:text-neutral-dark-950 text-2xl font-bold leading-snug item-link" href="single.">The Importance of Mental Health in Modern Society</a></h3>
            </div>
          </div>
          <div class="flex-col justify-start items-start gap-5 inline-flex hover-up mb-4">
            <a href="single." class="rounded-3xl overflow-hidden max-h-[370px]">
              <img src="assets/imgs/pages/img-10.png" />
            </a>
            <div class="flex-col justify-start items-start gap-3.5 flex">
              <div class="justify-start items-center gap-5 inline-flex">
                <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                  <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Fashion</div>
                </a>
                <div class="justify-start items-center gap-2 flex">
                  <a href="author."><img class="w-9 h-9 rounded-3xl" src="assets/imgs/avatar/avatar-05.png" /></a>
                  <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700"><a href="author.">Sophia Miller</a> - May 20, 2024</div>
                </div>
              </div>
              <h3><a class="text-neutral-950 dark:text-neutral-dark-950 text-2xl font-bold leading-snug item-link" href="single.">Trends to Watch: Fashion Forecast for the Next Season</a></h3>
            </div>
          </div>
          <div class="flex-col justify-start items-start gap-5 inline-flex hover-up mb-4">
            <a href="single." class="rounded-3xl overflow-hidden max-h-[370px]">
              <img src="assets/imgs/pages/img-11.png" />
            </a>
            <div class="flex-col justify-start items-start gap-3.5 flex">
              <div class="justify-start items-center gap-5 inline-flex">
                <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                  <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Food</div>
                </a>
                <div class="justify-start items-center gap-2 flex">
                  <a href="author."><img class="w-9 h-9 rounded-3xl" src="assets/imgs/avatar/avatar-06.png" /></a>
                  <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700"><a href="author.">David Carter</a> - June 8, 2024</div>
                </div>
              </div>
              <h3><a class="text-neutral-950 dark:text-neutral-dark-950 text-2xl font-bold leading-snug item-link" href="single.">Culinary Delights: Exploring Exotic Flavors Around the World</a></h3>
            </div>
          </div>
          <div class="flex-col justify-start items-start gap-5 inline-flex hover-up mb-4">
            <a href="single." class="rounded-3xl overflow-hidden max-h-[370px]">
              <img src="assets/imgs/pages/img-12.png" />
            </a>
            <div class="flex-col justify-start items-start gap-3.5 flex">
              <div class="justify-start items-center gap-5 inline-flex">
                <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                  <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Sports</div>
                </a>
                <div class="justify-start items-center gap-2 flex">
                  <a href="author."><img class="w-9 h-9 rounded-3xl" src="assets/imgs/avatar/avatar-07.png" /></a>
                  <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700"><a href="author.">Olivia White</a> - July 14, 2024</div>
                </div>
              </div>
              <h3><a class="text-neutral-950 dark:text-neutral-dark-950 text-2xl font-bold leading-snug item-link" href="single.">The Rise of E-Sports: A New Era in Competitive Gaming</a></h3>
            </div>
          </div>
          <div class="flex-col justify-start items-start gap-5 inline-flex hover-up mb-4">
            <a href="single." class="rounded-3xl overflow-hidden max-h-[370px]">
              <img src="assets/imgs/pages/img-13.png" />
            </a>
            <div class="flex-col justify-start items-start gap-3.5 flex">
              <div class="justify-start items-center gap-5 inline-flex">
                <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                  <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Business</div>
                </a>
                <div class="justify-start items-center gap-2 flex">
                  <a href="author."><img class="w-9 h-9 rounded-3xl" src="assets/imgs/avatar/avatar-08.png" /></a>
                  <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700"><a href="author.">Daniel Taylor</a> - August 2, 2024</div>
                </div>
              </div>
              <h3><a class="text-neutral-950 dark:text-neutral-dark-950 text-2xl font-bold leading-snug item-link" href="single.">Navigating the Challenges of Entrepreneurship in the Digital Age</a></h3>
            </div>
          </div>
          <div class="flex-col justify-start items-start gap-5 inline-flex hover-up mb-4">
            <a href="single." class="rounded-3xl overflow-hidden max-h-[370px]">
              <img src="assets/imgs/pages/img-06.png" />
            </a>
            <div class="flex-col justify-start items-start gap-3.5 flex">
              <div class="justify-start items-center gap-5 inline-flex">
                <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                  <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Sports</div>
                </a>
                <div class="justify-start items-center gap-2 flex">
                  <a href="author."><img class="w-9 h-9 rounded-3xl" src="assets/imgs/avatar/avatar-07.png" /></a>
                  <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700"><a href="author.">Olivia White</a> - July 14, 2024</div>
                </div>
              </div>
              <h3><a class="text-neutral-950 dark:text-neutral-dark-950 text-2xl font-bold leading-snug item-link" href="single.">The Rise of E-Sports: A New Era in Competitive Gaming</a></h3>
            </div>
          </div>
        </div>
        <div class="relative">
          <!-- pagination -->
          <div class="flex items-center justify-start">
            <nav class="flex items-center gap-2" aria-label="Pagination">
              <a href="#" class="text-neutral-950 rounded-full w-12 h-12 bg-primary-light-200 hover:bg-primary-light-300 dark:bg-primary-dark-200 dark:hover:bg-primary-dark-300 flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" class="fill-neutral-950 dark:fill-neutral-dark-950">
                  <path d="M17.4922 7.49023C17.4922 8.19336 16.9453 8.74023 16.2812 8.74023H4.28906L8.39062 12.8809C8.89844 13.3496 8.89844 14.1699 8.39062 14.6387C8.15625 14.873 7.84375 14.9902 7.53125 14.9902C7.17969 14.9902 6.86719 14.873 6.63281 14.6387L0.382812 8.38867C-0.125 7.91992 -0.125 7.09961 0.382812 6.63086L6.63281 0.380859C7.10156 -0.126953 7.92188 -0.126953 8.39062 0.380859C8.89844 0.849609 8.89844 1.66992 8.39062 2.13867L4.28906 6.24023H16.2812C16.9453 6.24023 17.4922 6.82617 17.4922 7.49023Z" />
                </svg>
              </a>
              <a href="#" class="active text-xl font-bold text-neutral-950 bg-primary-light-950 dark:text-neutral-dark-950 dark:bg-primary-dark-950 rounded-full w-12 h-12 flex items-center justify-center">1</a>
              <a href="#" class="text-xl font-bold text-neutral-950 rounded-full bg-primary-light-200 hover:bg-primary-light-300 dark:text-neutral-dark-950 dark:bg-primary-dark-200 dark:hover:bg-primary-dark-300 w-12 h-12 flex items-center justify-center">2</a>
              <a href="#" class="text-xl font-bold text-neutral-950 rounded-full bg-primary-light-200 hover:bg-primary-light-300 dark:text-neutral-dark-950 dark:bg-primary-dark-200 dark:hover:bg-primary-dark-300 w-12 h-12 flex items-center justify-center">3</a>
              <a href="#" class="text-xl font-bold text-neutral-950 rounded-full bg-primary-light-200 hover:bg-primary-light-300 dark:text-neutral-dark-950 dark:bg-primary-dark-200 dark:hover:bg-primary-dark-300 w-12 h-12 flex items-center justify-center">4</a>
              <a href="#" class="text-neutral-950 rounded-full w-12 h-12 bg-primary-light-200 hover:bg-primary-light-300 dark:bg-primary-dark-200 dark:hover:bg-primary-dark-300  flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" class="fill-neutral-950 dark:fill-neutral-dark-950">
                  <path d="M0 7.49023C0 8.19336 0.546875 8.74023 1.21094 8.74023H13.2031L9.10156 12.8809C8.59375 13.3496 8.59375 14.1699 9.10156 14.6387C9.33594 14.873 9.64844 14.9902 9.96094 14.9902C10.3125 14.9902 10.625 14.873 10.8594 14.6387L17.1094 8.38867C17.6172 7.91992 17.6172 7.09961 17.1094 6.63086L10.8594 0.380859C10.3906 -0.126953 9.57031 -0.126953 9.10156 0.380859C8.59375 0.849609 8.59375 1.66992 9.10156 2.13867L13.2031 6.24023H1.21094C0.546875 6.24023 0 6.82617 0 7.49023Z" />
                </svg>
              </a>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Blog 1 Section 3 -->
  <section class="relative pt-20 py-10 lg:pt-12 lg:pb-24">
    <div class="container px-4">
      <div class="mx-auto grid lg:grid-cols-2 gap-8 lg:gap-16 items-center justify-center max-w-[1070px] bg-primary-light-300 dark:bg-primary-dark-300 rounded-3xl px-8 py-12 md:px-16 md:py-24 overflow-hidden relative">
        <h2 class="text-5xl leading-tight md:text-6xl lg:text-6xl font-bold text-neutral-950 dark:text-neutral-dark-950 mb-0"><span class="font-light">Let's</span> explore, share, and inspire <span class="font-light">together!</span></h2>
        <div class="flex flex-col gap-8">
          <p class="text-lg font-medium text-neutral-700 dark:text-neutral-dark-300">Ready to dive into the blend of tech, fashion, and lifestyle? Join our vibrant community and be part of the conversation.</p>
          <div class="flex flex-col md:flex-row gap-4">
            <a href="page-login." class="group btn bg-primary-light-950 dark:bg-primary-dark-950 rounded-full px-8 py-4 text-xl text-neutral-950 dark:text-neutral-dark-950 flex gap-2 items-center">
              <span>Get Started</span>
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
            </a>
            <a href="page-contact." class="btn border border-neutral-950 dark:bg-neutral-dark-0 rounded-full px-8 py-4 text-xl text-neutral-950 dark:text-neutral-dark-950 items-center">Contact Us</a>
          </div>
        </div>
        <img src="assets/imgs/template/shape-1.svg" alt="" class="absolute top-0 left-0 opacity-10 ">
        <img src="assets/imgs/template/shape-2.svg" alt="" class="absolute bottom-0 right-0 opacity-10 ">
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="w-full py-20 bg-neutral-200 dark:bg-neutral-dark-200 ">
    <?php include('partials/footer.php'); ?>
  </footer>
  <!--Scripts-->
  <script src="assets/js/vendors/jquery-3.7.1.min.js"></script>
  <script src="assets/js/vendors/jquery-migrate-3.3.0.min.js"></script>
  <script src="assets/js/vendors/modernizr-3.6.0.min.js"></script>
  <script src="assets/js/vendors/jquery.scrollUp.min.js"></script>
  <script src="assets/js/vendors/swiper-bundle.js"></script>
  <script src="assets/js/vendors/waypoints.min.js"></script>
  <script src="assets/js/vendors/wow.min.js"></script>
  <script src="assets/js/vendors/lightbox.js"></script>
  <script src="assets/js/vendors/alpine.min.js"></script>

  <script src="assets/js/main.js"></script>
</body>

</html>