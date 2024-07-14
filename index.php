<?php include('Konrix/services/database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php $title = "Home Page";
  include('partials/title-meta.php'); ?>

  <?php include('partials/head-css.php'); ?>

</head>

<body class="bg-neutral-0 dark:bg-neutral-dark-0">

  <?php include('partials/navbar.php'); ?>

  <!--Hero 2 -->
  <div class="header-bg absolute top-0 left-0 right-0 -z-50 w-full h-[1100px] bg-gradient-to-b from-primary-light-950/15 to-transparent max-h-[1100px] overflow-hidden"></div>

  <section class="relative pt-20 lg:pt-24">
    <div class="container px-4">
      <h1 class="heading-1">Hey, we’re Goksta. <span class="font-light">See our thoughts, stories & </span>ideas.</h1>
    </div>
  </section>

  <section class="my-20 py-16 flex flex-col gap-8 relative">
    <h3 class="text-3xl md:text-5xl text-neutral-950 dark:text-neutral-dark-950 font-light text-center z-10 relative">Subscribe to <span class="font-bold">New posts</span></h3>
    <div class=" z-10 relative">
      <div class="swiper-container post-slider-6">
        <div class="swiper-wrapper pt-4">
          <div class="swiper-slide hover-up">
            <div class="w-full h-52 relative rounded-3xl overflow-hidden">
              <a href="blog.php"><img class="left-0 top-0 absolute rounded-3xl" src="assets/imgs/pages/img-01.png" /></a>
              <div class="px-[13px] py-[9px] left-[10px] top-[150px] absolute bg-neutral-0 dark:bg-neutral-dark-0 rounded-[26px] justify-center items-center gap-2.5 inline-flex">
                <a href="blog.php" class="text-neutral-950 dark:text-neutral-dark-950 text-sm font-medium">Fashion</a>
                <div class="w-[22px] h-[22px] relative">
                  <div class="w-7 h-7 left-[-3px] top-[-3px] absolute bg-primary-light-950 rounded-full"></div>
                  <div class="left-[3px] top-[5px] absolute text-center text-neutral-950 text-xs font-medium  leading-3">15</div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide hover-up">
            <div class="w-full h-52 relative rounded-3xl overflow-hidden">
              <a href="blog.php"><img class="left-0 top-0 absolute rounded-3xl" src="assets/imgs/pages/img-02.png" /></a>
              <div class="px-[13px] py-[9px] left-[10px] top-[150px] absolute bg-neutral-0 dark:bg-neutral-dark-0 rounded-[26px] justify-center items-center gap-2.5 inline-flex">
                <a href="blog.php" class="text-neutral-950 dark:text-neutral-dark-950 text-sm font-medium">Health</a>
                <div class="w-[22px] h-[22px] relative">
                  <div class="w-7 h-7 left-[-3px] top-[-3px] absolute bg-primary-light-950 rounded-full"></div>
                  <div class="left-[3px] top-[5px] absolute text-center text-neutral-950 text-xs font-medium  leading-3">26</div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide hover-up">
            <div class="w-full h-52 relative rounded-3xl overflow-hidden">
              <a href="blog.php"><img class="left-0 top-0 absolute rounded-3xl" src="assets/imgs/pages/img-03.png" /></a>
              <div class="px-[13px] py-[9px] left-[10px] top-[150px] absolute bg-neutral-0 dark:bg-neutral-dark-0 rounded-[26px] justify-center items-center gap-2.5 inline-flex">
                <a href="blog.php" class="text-neutral-950 dark:text-neutral-dark-950 text-sm font-medium">Food</a>
                <div class="w-[22px] h-[22px] relative">
                  <div class="w-7 h-7 left-[-3px] top-[-3px] absolute bg-primary-light-950 rounded-full"></div>
                  <div class="left-[3px] top-[5px] absolute text-center text-neutral-950 text-xs font-medium  leading-3">37</div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide hover-up">
            <div class="w-full h-52 relative rounded-3xl overflow-hidden">
              <a href="blog.php"><img class="left-0 top-0 absolute rounded-3xl" src="assets/imgs/pages/img-04.png" /></a>
              <div class="px-[13px] py-[9px] left-[10px] top-[150px] absolute bg-neutral-0 dark:bg-neutral-dark-0 rounded-[26px] justify-center items-center gap-2.5 inline-flex">
                <a href="blog.php" class="text-neutral-950 dark:text-neutral-dark-950 text-sm font-medium">Travel</a>
                <div class="w-[22px] h-[22px] relative">
                  <div class="w-7 h-7 left-[-3px] top-[-3px] absolute bg-primary-light-950 rounded-full"></div>
                  <div class="left-[3px] top-[5px] absolute text-center text-neutral-950 text-xs font-medium  leading-3">48</div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide hover-up">
            <div class="w-full h-52 relative rounded-3xl overflow-hidden">
              <a href="blog.php"><img class="left-0 top-0 absolute rounded-3xl" src="assets/imgs/pages/img-05.png" /></a>
              <div class="px-[13px] py-[9px] left-[10px] top-[150px] absolute bg-neutral-0 dark:bg-neutral-dark-0 rounded-[26px] justify-center items-center gap-2.5 inline-flex">
                <a href="blog.php" class="text-neutral-950 dark:text-neutral-dark-950 text-sm font-medium">Sports</a>
                <div class="w-[22px] h-[22px] relative">
                  <div class="w-7 h-7 left-[-3px] top-[-3px] absolute bg-primary-light-950 rounded-full"></div>
                  <div class="left-[3px] top-[5px] absolute text-center text-neutral-950 text-xs font-medium  leading-3">59</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="flex justify-between items-center gap-8 lg:gap-32 flex-col lg:flex-row z-10 relative">
      <form class="max-w-full overflow-hidden mx-auto pt-4" action="">
        <div class="flex flex-col md:flex-row mb-4 md:bg-neutral-0 dark:bg-neutral-dark-200 rounded-full p-1 md:border border-neutral-300 dark:border-neutral-dark-300">
          <input class="focus:outline-none transition duration-200 py-4 bg-neutral-0 dark:bg-neutral-dark-200 rounded-full pl-6 w-full mb-2 md:mb-0 md:border-0 border border-neutral-300 dark:border-neutral-dark-300 " type="text" placeholder="Your email address">
          <button class="w-full sm:w-auto h-14 py-4 px-6 rounded-full bg-neutral-950 transition duration-200 flex items-center justify-center gap-2" type="submit">
            <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 fill-primary-light-950" preserveAspectRatio="none">
              <path d="M19.8829 0.671875H2.8827C2.35277 0.673442 1.84497 0.890991 1.47025 1.277C1.09552 1.663 0.884334 2.18609 0.882812 2.73198V15.6118C0.884334 16.1577 1.09552 16.6807 1.47025 17.0668C1.84497 17.4528 2.35277 17.6703 2.8827 17.6719H19.8829C20.4129 17.6703 20.9207 17.4528 21.2954 17.0668C21.6701 16.6807 21.8813 16.1577 21.8828 15.6118V2.73198C21.8813 2.18609 21.6701 1.663 21.2954 1.277C20.9207 0.890991 20.4129 0.673442 19.8829 0.671875ZM19.6326 5.04989L11.3828 10.7158L3.13182 5.04989V2.98979L11.3817 8.65566L19.6315 2.98979L19.6326 5.04989Z"></path>
            </svg>
            <span class="text-neutral-0 font-medium text-2xl">Subscribe</span>
          </button>
        </div>
    </div>
    </form>
    </div>
    <div class="absolute w-full top-0 left-0 z-0">
      <div class="container px-4">
        <div class="w-full h-[562px] bg-primary-light-950 dark:bg-primary-dark-950 rounded-[30px]"></div>
      </div>
    </div>
  </section>
  <!--Home 2 Section 1 -->
  <section class="relative pt-20 py-10 lg:pt-12 lg:pb-12">
    <div class="container px-4">
      <div class="flex flex-col md:flex-row justify-between gap-[58px]">
        <div class="grid md:grid-cols-1 lg:grid-cols-2 gap-x-[30px] gap-y-[65px] max-w-[850px]">
          <?php
          include('Konrix/services/database.php');
          // Query to fetch data for the content block
          $query = "SELECT p.*, u.full_name AS author_name, c.title AS category_title,
          IFNULL(p.slug, LOWER(REPLACE(REPLACE(p.title, ' ', '-'), ',', ''))) AS post_slug, p.image AS image
          FROM posts p
          LEFT JOIN users u ON p.author_id = u.id_user
          LEFT JOIN post_categories pc ON p.id_post = pc.post_id
          LEFT JOIN categories c ON pc.category_id = c.id_category
          WHERE p.published = true
          ORDER BY p.created_at DESC
          LIMIT 6";

          $result = mysqli_query($conn, $query);

          // Check if the query executed successfully
          if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              // Extracting data from the query result
              $post_slug = $row['post_slug']; // Get the post slug
              $image = $row['image'];
              $category_title = htmlspecialchars($row['category_title']);
              $author_name = htmlspecialchars($row['author_name']);
              $created_at = date('F j, Y', strtotime($row['created_at']));
              $summary = htmlspecialchars($row['summary']);
          ?>
              <div class="flex-col justify-start items-start gap-5 inline-flex hover-up">
                <a href="single.php?slug=<?php echo $post_slug; ?>" class="rounded-3xl overflow-hidden max-h-[606px]">
                  <img src="<?php echo $image; ?>" alt="Post Image" />
                </a>
                <div class="flex-col justify-start items-start gap-3.5 flex">
                  <div class="justify-start items-center gap-5 inline-flex">
                    <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                      <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none"><?php echo $category_title; ?></div>
                    </a>
                    <div class="justify-start items-center gap-2 flex">
                      <a href="author.php"><img class="w-9 h-9 rounded-3xl" src="assets/imgs/avatar/avatar-01.png" alt="Author Avatar" /></a>
                      <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700"><a href="author.php"><?php echo $author_name; ?></a> - <?php echo $created_at; ?></div>
                    </div>
                  </div>
                  <h3><a class="text-neutral-950 dark:text-neutral-dark-950 text-2xl font-bold leading-snug item-link" href="single.php?slug=<?php echo $post_slug; ?>"><?php echo $summary; ?></a></h3>
                </div>
              </div>
          <?php
            }
          } else {
            echo '<p>No published posts found.</p>';
          }

          // Free result set
          mysqli_free_result($result);

          // Close the connection (optional as PHP will automatically close it at the end of script execution)
          mysqli_close($conn);
          ?>
          <div class="mt-8">
            <a href="blog.php" class="button-4 hover-up">Load more posts</a>
          </div>
        </div>
        <!-- SIDEVER -->
        <div class="sidebar flex flex-col gap-12 md:max-w-[380px]">
          <!-- about box -->
          <div class="about p-12 rounded-3xl bg-primary-light-300 dark:bg-primary-dark-300">
            <h1 class="mb-8">
              <a href="index.php">
                <img src="assets/imgs/template/goksta-logo.svg" alt="logo" class="flex-shrink-0 relative dark:hidden" style="width: 10rem; height: auto;">
                <img src="assets/imgs/template/goksta-logo.svg" alt="logo" class="flex-shrink-0 relative hidden dark:inline-block" style="width: 10rem; height: auto;">
              </a>
            </h1>
            <p class="font-medium text-neutral-950 dark:text-neutral-dark-950 mb-8 lg:mb-12 max-w-[350px]">
              A digital platform that provides quality articles and information on various topics such as technology, business, education, lifestyle and health.
            </p>
            <div class="flex gap-2">
              <a href="https://www.facebook.com/FawwazMufidW" class="w-12 h-12 rounded-[5px] flex justify-center items-center border border-neutral-300 dark:border-neutral-dark-300 cursor-pointer hover-up hover:bg-primary-light-200 dark:hover:bg-primary-dark-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" class="fill-neutral-950 dark:fill-neutral-dark-950">
                  <path d="M8.03125 9H5.6875V16H2.5625V9H0V6.125H2.5625V3.90625C2.5625 1.40625 4.0625 0 6.34375 0C7.4375 0 8.59375 0.21875 8.59375 0.21875V2.6875H7.3125C6.0625 2.6875 5.6875 3.4375 5.6875 4.25V6.125H8.46875L8.03125 9Z" />
                </svg>
              </a>
              <div class="w-12 h-12 rounded-[5px] flex justify-center items-center border border-neutral-300 dark:border-neutral-dark-300 cursor-pointer hover-up hover:bg-primary-light-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" class="fill-neutral-950 dark:fill-neutral-dark-950">
                  <g clip-path="url(#clip0_191_5465)">
                    <path d="M10.083 6.77491L15.9113 0H14.5302L9.46951 5.88256L5.42755 0H0.765625L6.87786 8.89547L0.765625 16H2.14682L7.49104 9.78782L11.7596 16H16.4216L10.0827 6.77491H10.083ZM8.1913 8.97384L7.57201 8.08805L2.64448 1.03974H4.76591L8.74248 6.72795L9.36178 7.61374L14.5308 15.0075H12.4094L8.1913 8.97418V8.97384Z" />
                  </g>
                </svg>
              </div>
              <div class="w-12 h-12 rounded-[5px] flex justify-center items-center border border-neutral-300 dark:border-neutral-dark-300 cursor-pointer hover-up hover:bg-primary-light-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" class="fill-neutral-950 dark:fill-neutral-dark-950">
                  <path d="M7.60938 3.39062C9.57812 3.39062 11.2031 5.01562 11.2031 6.98438C11.2031 8.98438 9.57812 10.5781 7.60938 10.5781C5.60938 10.5781 4.01562 8.98438 4.01562 6.98438C4.01562 5.01562 5.60938 3.39062 7.60938 3.39062ZM7.60938 9.32812C8.89062 9.32812 9.92188 8.29688 9.92188 6.98438C9.92188 5.70312 8.89062 4.67188 7.60938 4.67188C6.29688 4.67188 5.26562 5.70312 5.26562 6.98438C5.26562 8.29688 6.32812 9.32812 7.60938 9.32812ZM12.1719 3.26562C12.1719 2.79688 11.7969 2.42188 11.3281 2.42188C10.8594 2.42188 10.4844 2.79688 10.4844 3.26562C10.4844 3.73438 10.8594 4.10938 11.3281 4.10938C11.7969 4.10938 12.1719 3.73438 12.1719 3.26562ZM14.5469 4.10938C14.6094 5.26562 14.6094 8.73438 14.5469 9.89062C14.4844 11.0156 14.2344 11.9844 13.4219 12.8281C12.6094 13.6406 11.6094 13.8906 10.4844 13.9531C9.32812 14.0156 5.85938 14.0156 4.70312 13.9531C3.57812 13.8906 2.60938 13.6406 1.76562 12.8281C0.953125 11.9844 0.703125 11.0156 0.640625 9.89062C0.578125 8.73438 0.578125 5.26562 0.640625 4.10938C0.703125 2.98438 0.953125 1.98438 1.76562 1.17188C2.60938 0.359375 3.57812 0.109375 4.70312 0.046875C5.85938 -0.015625 9.32812 -0.015625 10.4844 0.046875C11.6094 0.109375 12.6094 0.359375 13.4219 1.17188C14.2344 1.98438 14.4844 2.98438 14.5469 4.10938ZM13.0469 11.1094C13.4219 10.2031 13.3281 8.01562 13.3281 6.98438C13.3281 5.98438 13.4219 3.79688 13.0469 2.85938C12.7969 2.26562 12.3281 1.76562 11.7344 1.54688C10.7969 1.17188 8.60938 1.26562 7.60938 1.26562C6.57812 1.26562 4.39062 1.17188 3.48438 1.54688C2.85938 1.79688 2.39062 2.26562 2.14062 2.85938C1.76562 3.79688 1.85938 5.98438 1.85938 6.98438C1.85938 8.01562 1.76562 10.2031 2.14062 11.1094C2.39062 11.7344 2.85938 12.2031 3.48438 12.4531C4.39062 12.8281 6.57812 12.7344 7.60938 12.7344C8.60938 12.7344 10.7969 12.8281 11.7344 12.4531C12.3281 12.2031 12.8281 11.7344 13.0469 11.1094Z" />
                </svg>
              </div>
            </div>
          </div>
          <!-- Featured box -->
          <div class="flex flex-col gap-4">
            <h4 class="text-2xl text-neutral-950 font-bold dark:text-neutral-dark-950">Featured <span class="font-light">Posts</span></h4>
            <div class="flex flex-col gap-6">
              <div class="w-full flex items-center gap-2.5  hover-up">
                <div class="justify-start items-center gap-4 inline-flex">
                  <a href="single.php" class="rounded-2xl overflow-hidden max-h-[90px] max-w-[106px]">
                    <img src="assets/imgs/pages/thumb-01.png" />
                  </a>
                  <div class="flex-col justify-start items-start gap-4 inline-flex">
                    <h4>
                      <a class="text-neutral-950 dark:text-neutral-dark-950 text-base font-bold item-link" href="single.php">Canvas and Keyboard: An Art-Tech Affair</a>
                    </h4>
                    <p class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700">12 mins read - June 8, 2024</p>
                  </div>
                </div>
              </div>
              <div class="w-full flex items-center gap-2.5  hover-up">
                <div class="justify-start items-center gap-4 inline-flex">
                  <a href="single.php" class="rounded-2xl overflow-hidden max-h-[90px] max-w-[106px]">
                    <img src="assets/imgs/pages/thumb-02.png" />
                  </a>
                  <div class="flex-col justify-start items-start gap-4 inline-flex">
                    <h4>
                      <a class="text-neutral-950 dark:text-neutral-dark-950 text-base font-bold item-link" href="single.php">Tech Threads and Culinary Canvas: Lifestyle Palette</a>
                    </h4>
                    <p class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700">22 mins read - June 18, 2024</p>
                  </div>
                </div>
              </div>
              <div class="w-full flex items-center gap-2.5  hover-up">
                <div class="justify-start items-center gap-4 inline-flex">
                  <a href="single.php" class="rounded-2xl overflow-hidden max-h-[90px] max-w-[106px]">
                    <img src="assets/imgs/pages/thumb-03.png" />
                  </a>
                  <div class="flex-col justify-start items-start gap-4 inline-flex">
                    <h4>
                      <a class="text-neutral-950 dark:text-neutral-dark-950 text-base font-bold item-link" href="single.php">Living the Art-Tech Dream: My Multifaceted Life</a>
                    </h4>
                    <p class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700">14 mins read - Aug 23, 2024</p>
                  </div>
                </div>
              </div>
              <div class="w-full flex items-center gap-2.5  hover-up">
                <div class="justify-start items-center gap-4 inline-flex">
                  <a href="single.php" class="rounded-2xl overflow-hidden max-h-[90px] max-w-[106px]">
                    <img src="assets/imgs/pages/thumb-04.png" />
                  </a>
                  <div class="flex-col justify-start items-start gap-4 inline-flex">
                    <h4>
                      <a class="text-neutral-950 dark:text-neutral-dark-950 text-base font-bold item-link" href="single.php">Globetrotting in Style: A Journey Through My Lens</a>
                    </h4>
                    <p class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700">14 mins read - June 8, 2024</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Blog box -->
          <div class="flex flex-col gap-4">
            <h4 class="text-2xl text-neutral-950 dark:text-neutral-dark-950 font-bold">Explore <span class="font-light">Categories</span></h4>
            <div class="justify-start items-start gap-2 inline-flex flex-wrap">
              <a class="button-7 hover-up" href="blog.php">Art</a>
              <a class="button-7 hover-up" href="blog.php">Fashion</a>
              <a class="button-7 hover-up" href="blog.php">Health</a>
              <a class="button-7 hover-up" href="blog.php">Food</a>
              <a class="button-7 hover-up" href="blog.php">Travel</a>
              <a class="button-7 hover-up" href="blog.php">Technology</a>
              <a class="button-7 hover-up" href="blog.php">Sports</a>
            </div>
          </div>

          <!-- Banner box -->
          <div class="flex flex-col gap-4">
            <h4 class="text-2xl text-neutral-950 font-bold dark:text-neutral-dark-950">Sponsored <span class="font-light">Ads</span></h4>
            <div class="w-72 h-96 relative rounded-2xl">
              <img class="w-72 h-96 left-0 top-0 absolute rounded-2xl" src="assets/imgs/pages/banner1.png" />
              <div class="w-72 h-96 left-0 bottom-0 absolute bg-gradient-to-t from-neutral-950/50 to-transparent rounded-2xl"></div>
              <div class="w-full px-8 bottom-12 absolute text-center">
                <span class="text-xl text-neutral-0 font-bold">
                  <span class="font-light">It seeks to inspire and</span> motivate individuals
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--Home 2 Section 2 -->
  <section class="relative pt-20 py-10 lg:pt-12 lg:pb-24">
    <div class="container px-4">
      <div class="flex flex-col justify-start mb-16 items-start lg:flex-row lg:justify-between lg:items-end">
        <h3 class="heading-3 text-left mb-8 lg:mb-0 leading-none"><span class="font-light">Featured </span> Posts</h3>
        <div class="justify-start items-start gap-2 inline-flex flex-wrap">
          <a class="button-7 hover-up" href="blog.php">Art</a>
          <a class="button-7 hover-up" href="blog.php">Fashion</a>
          <a class="button-7 hover-up" href="blog.php">Health</a>
          <a class="button-7 hover-up" href="blog.php">Food</a>
          <a class="button-7 hover-up" href="blog.php">Travel</a>
          <a class="button-7 hover-up" href="blog.php">Sports</a>
        </div>
      </div>
      <!--Grid-->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-[30px]">
        <div class="w-full rounded-3xl border-2 border-neutral-300 dark:border-neutral-dark-300 flex-col justify-start items-start inline-flex  hover-up">
          <div class="justify-start items-center gap-4 flex flex-col">
            <a href="single.php" class="rounded-[18px] overflow-hidden max-h-[180px]">
              <img src="assets/imgs/pages/img-14.png" />
            </a>
            <div class="p-4 flex-col gap-4 inline-flex items-center md:items-start">
              <div class="justify-start items-center gap-2 inline-flex">
                <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                  <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Trending</div>
                </a>
                <div class="justify-start items-center gap-2 flex">
                  <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700">June 8, 2024</div>
                </div>
              </div>
              <h3 class="text-center md:text-start mb-4 md-mb-0">
                <a class="text-neutral-950 dark:text-neutral-dark-950 text-lg font-bold leading-tight item-link" href="single.php">Globetrotting in Style: A Journey Through My Lens</a>
              </h3>
            </div>
          </div>
        </div>
        <div class="w-full rounded-3xl border-2 border-neutral-300 dark:border-neutral-dark-300 flex-col justify-start items-start inline-flex  hover-up">
          <div class="justify-start items-center gap-4 flex flex-col">
            <a href="single.php" class="rounded-[18px] overflow-hidden max-h-[180px]">
              <img src="assets/imgs/pages/img-15.png" />
            </a>
            <div class="p-4 flex-col gap-4 inline-flex items-center md:items-start">
              <div class="justify-start items-center gap-2 inline-flex">
                <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                  <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Trending</div>
                </a>
                <div class="justify-start items-center gap-2 flex">
                  <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700">June 8, 2024</div>
                </div>
              </div>
              <h3 class="text-center md:text-start mb-4 md-mb-0">
                <a class="text-neutral-950 dark:text-neutral-dark-950 text-lg font-bold leading-tight item-link" href="single.php">Innovation in Space Exploration: New Frontiers</a>
              </h3>
            </div>
          </div>
        </div>
        <div class="w-full rounded-3xl border-2 border-neutral-300 dark:border-neutral-dark-300 flex-col justify-start items-start inline-flex  hover-up">
          <div class="justify-start items-center gap-4 flex flex-col">
            <a href="single.php" class="rounded-[18px] overflow-hidden max-h-[180px]">
              <img src="assets/imgs/pages/img-16.png" />
            </a>
            <div class="p-4 flex-col gap-4 inline-flex items-center md:items-start">
              <div class="justify-start items-center gap-2 inline-flex">
                <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                  <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Trending</div>
                </a>
                <div class="justify-start items-center gap-2 flex">
                  <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700">June 8, 2024</div>
                </div>
              </div>
              <h3 class="text-center md:text-start mb-4 md-mb-0">
                <a class="text-neutral-950 dark:text-neutral-dark-950 text-lg font-bold leading-tight item-link" href="single.php">Wildlife Conservation: Preserving Biodiversity</a>
              </h3>
            </div>
          </div>
        </div>
        <div class="w-full rounded-3xl border-2 border-neutral-300 dark:border-neutral-dark-300 flex-col justify-start items-start inline-flex  hover-up">
          <div class="justify-start items-center gap-4 flex flex-col">
            <a href="single.php" class="rounded-[18px] overflow-hidden max-h-[180px]">
              <img src="assets/imgs/pages/img-17.png" />
            </a>
            <div class="p-4 flex-col gap-4 inline-flex items-center md:items-start">
              <div class="justify-start items-center gap-2 inline-flex">
                <a href="blog.php" class="px-3 py-[8px] bg-neutral-200 dark:bg-neutral-dark-200 rounded-3xl border border-neutral-200 dark:border-neutral-dark-300 justify-center items-center gap-2.5 flex">
                  <div class="text-neutral-900 dark:text-neutral-dark-950 text-sm font-medium leading-none">Trending</div>
                </a>
                <div class="justify-start items-center gap-2 flex">
                  <div class="text-neutral-700 text-sm font-medium leading-none dark:text-neutral-dark-700">June 8, 2024</div>
                </div>
              </div>
              <h3 class="text-center md:text-start mb-4 md-mb-0">
                <a class="text-neutral-950 dark:text-neutral-dark-950 text-lg font-bold leading-tight item-link" href="single.php">Urban Gardening: Growing Plants in the Concrete Jungl</a>
              </h3>
            </div>
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