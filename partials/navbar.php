<?php include('Konrix/services/database.php'); ?>

<header class="main-header mx-auto w-full flex justify-center py-2 z-50 relative dark:bg-primary-dark-0">
  <div class="container flex justify-between items-center relative px-4">
    <h1>
      <a href="index.php">
        <img src="assets/imgs/template/goksta-logo.svg" alt="logo" class="flex-shrink-0 relative dark:hidden" style="width: 12rem; height: auto;">
        <img src="assets/imgs/template/goksta-logo.svg" alt="logo" class="flex-shrink-0 relative hidden dark:inline-block" style="width: 12rem; height: auto;">
      </a>
    </h1>
    <ul class="xl:flex hidden">
      <li class="relative"><a href="index.php" class="menu-item">Home</a></li>

      <li class="relative"><a href="blog.php" class="menu-item">Blog</a></li>

      <li class="relative group">
        <a class="menu-item" href="#">Categories</a>
        <ul class="z-100 absolute px-6 py-4 rounded-md left-4 bg-neutral-0 dark:bg-neutral-dark-0 min-w-48 shadow-sm mt-8 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:mt-4 transition-all duration-500">
          <?php
          $sql = "SELECT title FROM categories";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
              echo '<li><a href="category.php?title=' . urlencode($row["title"]) . '" class="menu-sub-item">' . htmlspecialchars($row["title"]) . '</a></li>';
            }
          } else {
            echo '<li><a href="#" class="menu-sub-item">No categories</a></li>';
          }
          $conn->close();
          ?>
        </ul>
      </li>

      <li class="relative group">
        <a class="menu-item" href="#">Pages</a>
        <ul class="z-100 absolute px-6 py-4 rounded-md left-4 bg-neutral-0 dark:bg-neutral-dark-0 min-w-48 shadow-sm mt-8 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:mt-4 transition-all duration-500">
          <li><a href="page-about.php" class="menu-sub-item">About me</a></li>
          <li><a href="page-author.php" class="menu-sub-item">Author</a></li>
          <li><a href="page-search.php" class="menu-sub-item">Search Results</a></li>
          <li><a href="page-contact.php" class="menu-sub-item">Contact</a></li>
          <li><a href="page-login.php" class="menu-sub-item">Login</a></li>
          <li><a href="page-register.php" class="menu-sub-item">Register</a></li>
          <li><a href="page-forgot-password.php" class="menu-sub-item">Forgot Password</a></li>
          <li><a href="page-404.php" class="menu-sub-item">Error 404</a></li>
        </ul>
      </li>
      <li class="relative"><a href="page-contact.php" class="menu-item">Contact</a></li>
    </ul>
    <div class="flex justify-end align-middle content-center items-center relative gap-4">
      <div class="language-switcher py-4 relative z-10">
        <!-- BEGIN: Language Select Box -->
        <div class="relative size-6 z-10">
          <div class="language absolute inline-flex flex-col gap-[2px] overflow-hidden min-w-32 h-[24px] top-0 left-0">
            <div class="language__el bg-neutral-0 dark:bg-neutral-dark-0 cursor-pointer is-active " data-lang="en">
              <div class="language__link flex gap-2 items-center">
                <img class="language__img size-6" alt="en" src="assets/imgs/template/flag-england.svg" />
                <span class="language__text text-sm text-neutral-700 dark:text-neutral-dark-300">English</span>
              </div>
            </div>
            <div class="language__el bg-neutral-0 dark:bg-neutral-dark-0 cursor-pointer" data-lang="fr">
              <div class="language__link flex gap-2 items-center">
                <img class="language__img size-6" alt="fr" src="assets/imgs/template/flag-france.svg" />
                <span class="language__text text-sm text-neutral-700 dark:text-neutral-dark-300">French</span>
              </div>
            </div>
            <div class="language__el bg-neutral-0 dark:bg-neutral-dark-0 cursor-pointer" data-lang="vn">
              <div class="language__link flex gap-2 items-center">
                <img class="language__img size-6" alt="vn" src="assets/imgs/template/flag-vietnam.svg" />
                <span class="language__text text-sm text-neutral-700 dark:text-neutral-dark-300">Vietnamese</span>
              </div>
            </div>
            <div class="language__el bg-neutral-0 dark:bg-neutral-dark-0 cursor-pointer" data-lang="ge">
              <div class="language__link flex gap-2 items-center">
                <img class="language__img size-6" alt="ge" src="assets/imgs/template/flag-germany.svg" />
                <span class="language__text text-sm text-neutral-700 dark:text-neutral-dark-300">German</span>
              </div>
            </div>
            <div class="language__el bg-neutral-0 dark:bg-neutral-dark-0 cursor-pointer" data-lang="sp">
              <div class="language__link flex gap-2 items-center">
                <img class="language__img size-6" alt="sp" src="assets/imgs/template/flag-spain.svg" />
                <span class="language__text text-sm text-neutral-700 dark:text-neutral-dark-300">Spanish</span>
              </div>
            </div>
            <div class="language__el bg-neutral-0 dark:bg-neutral-dark-0 cursor-pointer" data-lang="cn">
              <div class="language__link flex gap-2 items-center">
                <img class="language__img size-6" alt="cn" src="assets/imgs/template/flag-china.svg" />
                <span class="language__text text-sm text-neutral-700 dark:text-neutral-dark-300">中国人</span>
              </div>
            </div>
          </div>
        </div>
        <!-- END: Language Select Box -->
      </div>

      <div class="dark-light cursor-pointer flex relative z-20">
        <img src="assets/imgs/template/icon-dark-light.svg" alt="dark/light" class="dark:hidden">
        <img src="assets/imgs/template/icon-dark-light-white.svg" alt="dark/light" class="hidden dark:inline-block">
      </div>
      <div class="search-box flex relative py-4 z-20">
        <div class="search-icon cursor-pointer flex pr-2">
          <img src="assets/imgs/template/icon-search.svg" alt="dark/light" class="flex-shrink-0 relative dark:hidden">
          <img src="assets/imgs/template/icon-search-white.svg" alt="dark/light" class="flex-shrink-0 relative hidden dark:inline-block">
        </div>
        <div class="search-box-content absolute top-full right-0 p-10  mr-[-50px] max-w-[360px] md:max-w-none bg-neutral-0 dark:bg-neutral-dark-200 rounded-2xl shadow-sm hidden invisible mt-8 transition-all duration-300">
          <h1 class="text-5xl font-bold text-neutral-950 dark:text-neutral-0 mb-4">Search <span class="font-light">Content</span></h1>
          <div class="relative mb-8">
            <form action="">
              <div class="flex gap-4 mb-4 bg-neutral-0 dark:bg-neutral-dark-200 rounded-full p-1 pl-9 border border-neutral-300 dark:border-neutral-dark-300">
                <input class="flex-1 focus:outline-none transition duration-200 bg-transparent max-w-[175px] md:max-w-none" type="text" placeholder="Enter your key words">
                <button class="min-w-12 size-12 rounded-full bg-primary-light-950 transition duration-200 flex items-center justify-center gap-2" type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                    <g clip-path="url(#clip0_135_1647)">
                      <path d="M15.4202 17.2452L19.8183 21.6443C20.0585 21.8716 20.3775 22 20.7093 22C21.417 21.999 21.9991 21.416 21.9991 20.7084C21.9991 20.3775 21.8717 20.0585 21.6443 19.8183L17.2452 15.421C20.1162 11.6554 19.8321 6.24979 16.3946 2.81137L16.3882 2.80496L16.1333 2.55012C16.0977 2.51274 16.0577 2.47981 16.0142 2.45204C12.2467 -0.932293 6.43592 -0.814043 2.8105 2.81137C-0.936833 6.55962 -0.936833 12.6463 2.8105 16.3927C6.24983 19.832 11.6563 20.1171 15.4202 17.2452ZM14.5356 4.66946C17.2397 7.37637 17.2397 11.8286 14.5356 14.5355C11.8287 17.2388 7.37733 17.2388 4.67042 14.5355C1.96533 11.8286 1.96533 7.37637 4.67042 4.66946C7.37733 1.96529 11.8287 1.96529 14.5356 4.66946Z" fill="#151618" />
                    </g>
                    <defs>
                      <clipPath id="clip0_135_1647">
                        <rect width="22" height="22" fill="white" />
                      </clipPath>
                    </defs>
                  </svg>
                </button>
              </div>
            </form>
            <div class="flex-col justify-start items-start gap-3 inline-flex mt-8">
              <div class="text-neutral-950 dark:text-neutral-dark-950 text-base font-bold">Suggested</div>
              <div class="flex flex-wrap gap-4">
                <a href="#" class="font-regular text-base text-neutral-700 link-hover hover:text-neutral-950 dark:text-neutral-0 dark:hover:text-neutral-dark-600">Events</a>
                <a href="#" class="font-regular text-base text-neutral-700 link-hover hover:text-neutral-950 dark:text-neutral-0 dark:hover:text-neutral-dark-600">Shop</a>
                <a href="#" class="font-regular text-base text-neutral-700 link-hover hover:text-neutral-950 dark:text-neutral-0 dark:hover:text-neutral-dark-600">Tech</a>
                <a href="#" class="font-regular text-base text-neutral-700 link-hover hover:text-neutral-950 dark:text-neutral-0 dark:hover:text-neutral-dark-600">Fashion</a>
                <a href="#" class="font-regular text-base text-neutral-700 link-hover hover:text-neutral-950 dark:text-neutral-0 dark:hover:text-neutral-dark-600">Books</a>
                <a href="#" class="font-regular text-base text-neutral-700 link-hover hover:text-neutral-950 dark:text-neutral-0 dark:hover:text-neutral-dark-600">Travel</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="py-4 hover-up xl:flex hidden relative z-20">
        <a class="btn-primary" href="page-login.php">
          Sign in
        </a>
      </div>
      <button class="navbar-burger self-center xl:hidden">
        <svg class="fill-neutral-950 dark:fill-neutral-dark-950" id="fi_2976215" enable-background="new 0 0 464.205 464.205" height="26" viewBox="0 0 464.205 464.205" width="26" xmlns="http://www.w3.org/2000/svg">
          <g>
            <g id="grip-solid-horizontal_1_">
              <path d="m435.192 406.18h-406.179c-16.024 0-29.013-12.99-29.013-29.013s12.989-29.013 29.013-29.013h406.18c16.023 0 29.013 12.99 29.013 29.013-.001 16.023-12.99 29.013-29.014 29.013z"></path>
              <path d="m435.192 261.115h-406.179c-16.024 0-29.013-12.989-29.013-29.012s12.989-29.013 29.013-29.013h406.18c16.023 0 29.013 12.989 29.013 29.013s-12.99 29.012-29.014 29.012z"></path>
              <path d="m435.192 116.051h-406.179c-16.024 0-29.013-12.989-29.013-29.013s12.989-29.013 29.013-29.013h406.18c16.023 0 29.013 12.989 29.013 29.013s-12.99 29.013-29.014 29.013z"></path>
            </g>
          </g>
        </svg>
      </button>
    </div>
    <!--Mobile Menu-->
    <div class="navbar-menu fixed top-0 left-0 z-50 w-full h-full bg-neutral-950 bg-opacity-30 hidden">
      <div class="fixed top-0 left-0 bottom-0 w-5/6 max-w-xs bg-neutral-0 dark:bg-neutral-dark-0">
        <nav class="relative p-6 h-full overflow-y-auto">
          <div class="flex flex-col h-full">
            <h1 class="pt-2 pb-6">
              <a href="index.php">
                <img src="assets/imgs/template/logo.svg" alt="logo" class="flex-shrink-0 relative dark:hidden">
                <img src="assets/imgs/template/logo-white.svg" alt="logo" class="flex-shrink-0 relative hidden dark:inline-block">
              </a>
            </h1>
            <ul class="py-6 mb-6 border-y border-neutral-300 dark:border-neutral-dark-300">
              <li class="relative"><a href="index.php" class="menu-item">Home</a></li>
              <li class="relative"><a href="blog.php" class="menu-item">Blog</a></li>
              <!-- <li class="has-children">
                  <a class="menu-mobile-item" href="#">Blog</a>
                  <ul class="sub-menu">
                    <li><a href="blog.php" class="menu-mobile-sub-item">Category 01</a></li>
                    <li><a href="category-2.php" class="menu-mobile-sub-item">Category 02</a></li>
                    <li><a href="category-3.php" class="menu-mobile-sub-item">Category 03</a></li>
                    <li><a href="category-4.php" class="menu-mobile-sub-item">Category 04</a></li>
                    <li><a href="single.php" class="menu-mobile-sub-item">Single 01</a></li>
                    <li><a href="single-2.php" class="menu-mobile-sub-item">Single 02</a></li>
                  </ul>
                </li> -->
              <li class="has-children">
                <a class="menu-mobile-item" href="#">Pages</a>
                <ul class="sub-menu">
                  <li><a href="page-about.php" class="menu-mobile-sub-item">About me</a></li>
                  <li><a href="page-author.php" class="menu-mobile-sub-item">Author</a></li>
                  <li><a href="page-search.php" class="menu-mobile-sub-item">Search Results</a></li>
                  <li><a href="page-contact.php" class="menu-mobile-sub-item">Contact</a></li>
                  <li><a href="page-login.php" class="menu-mobile-sub-item">Login</a></li>
                  <li><a href="page-register.php" class="menu-mobile-sub-item">Register</a></li>
                  <li><a href="page-forgot-password.php" class="menu-mobile-sub-item">Forgot Password</a></li>
                  <li><a href="page-404.php" class="menu-mobile-sub-item">Error 404</a></li>
                </ul>
              </li>
              <li><a class="menu-mobile-item" href="page-about.php">About</a></li>
              <li><a class="menu-mobile-item" href="page-contact.php">Contact</a></li>
            </ul>
            <div class="flex flex-wrap flex-col mt-4">
              <h4 class="text-lg text-neutral-950 dark:text-neutral-dark-950 font-bold mb-4">Stay Connectted</h4>
              <p class="text-sm text-neutral-700 font-medium mb-4 leading-5">Imagine waking up to a dose of positivity, lifestyle hacks, and inspiration tailored just for you. That's what you get when you subscribe!</p>
              <a href="page-login.php" class="w-full p-4 text-neutral-950 bg-primary-light-950 rounded-md font-bold text-sm">Subscribe Now</a>
            </div>
          </div>
        </nav>
        <a class="navbar-close absolute top-5 p-4 right-3" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" class="fill-neutral-950 dark:fill-neutral-dark-950">
            <g clip-path="url(#clip0_85_6880)">
              <path d="M1.42193 15.7358C1.05417 15.7571 0.692494 15.6349 0.413167 15.3948C-0.137722 14.8406 -0.137722 13.9456 0.413167 13.3914L12.4758 1.32871C13.0488 0.792556 13.9479 0.82236 14.484 1.39533C14.9689 1.91347 14.9971 2.70986 14.5502 3.26103L2.41647 15.3948C2.14074 15.6314 1.78487 15.7534 1.42193 15.7358Z" />
              <path d="M13.4712 15.7338C13.0985 15.7322 12.7412 15.5843 12.4766 15.3218L0.413906 3.25906C-0.0964635 2.66307 -0.027076 1.76613 0.568917 1.25571C1.10086 0.800179 1.88536 0.800179 2.41725 1.25571L14.551 13.3184C15.1238 13.8547 15.1534 14.7538 14.6171 15.3267C14.5958 15.3495 14.5738 15.3715 14.551 15.3928C14.2539 15.6512 13.8629 15.7747 13.4712 15.7338Z" />
            </g>
            <defs>
              <clipPath id="clip0_85_6880">
                <rect width="15" height="15" fill="white" transform="translate(0 0.828125)" />
              </clipPath>
            </defs>
          </svg>
        </a>
      </div>
    </div>
  </div>
</header>