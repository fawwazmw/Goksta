<?php include('Konrix/services/database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IDEKO - Personal Blog TailwindCSS Template</title>
  <link rel="icon" href="assets/imgs/template/favicon.svg" type="image/svg+xml" />
  <script src="assets/js/vendors/color-modes.js"></script>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/vendors/normalize.css">
  <link rel="stylesheet" href="assets/css/vendors/animate.min.css">
  <link rel="stylesheet" href="assets/css/vendors/swiper-bundle.css">
  <link rel="stylesheet" href="assets/css/vendors/lightbox.css">
  <link rel="stylesheet" href="assets/css/main.css">
</head>

<body class="bg-neutral-0 dark:bg-neutral-dark-0">
  <header class="main-header mx-auto w-full flex justify-center py-2 z-50 relative dark:bg-primary-dark-0">
    <div class="container flex justify-between items-center relative px-4">
      <h1>
        <a href="index.php">
          <img src="assets/imgs/template/logo.svg" alt="logo" class="flex-shrink-0 relative dark:hidden">
          <img src="assets/imgs/template/logo-white.svg" alt="logo" class="flex-shrink-0 relative hidden dark:inline-block">
        </a>
      </h1>
      <ul class="xl:flex hidden">
        <li class="relative group">
          <a class="menu-item" href="index.php">Home</a>
          <ul class="z-100 absolute px-6 py-4 rounded-md left-4 bg-neutral-0 dark:bg-neutral-dark-0 min-w-48 shadow-sm mt-8 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:mt-4 transition-all duration-500">
            <li><a href="index.php" class="menu-sub-item">Home page 01</a></li>
            <li><a href="index-2.php" class="menu-sub-item">Home page 02</a></li>
            <li><a href="index-3.php" class="menu-sub-item">Home page 03</a></li>
          </ul>
        </li>
        <li class="relative group">
          <a class="menu-item" href="#">Blog</a>
          <ul class="z-100 absolute px-6 py-4 rounded-md left-4 bg-neutral-0 dark:bg-neutral-dark-0 min-w-48 shadow-sm mt-8 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:mt-4 transition-all duration-500">
            <li><a href="category.php" class="menu-sub-item">Category 01</a></li>
            <li><a href="category-2.php" class="menu-sub-item">Category 02</a></li>
            <li><a href="category-3.php" class="menu-sub-item">Category 03</a></li>
            <li><a href="category-4.php" class="menu-sub-item">Category 04</a></li>
            <li><a href="single.php" class="menu-sub-item">Single 01</a></li>
            <li><a href="single-2.php" class="menu-sub-item">Single 02</a></li>
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
        <li class="group">
          <a href="#" class="menu-item group-hover:border-white">Features</a>
          <!-- MEGA MENU CONTENT -->
          <div class="w-full px-12 py-12 rounded-2xl bg-neutral-0 dark:bg-neutral-dark-0 shadow-sm absolute top-full left-0 mt-8 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:mt-4 transition-all duration-500">
            <h3 class="text-5xl mb-8 text-neutral-950 dark:text-neutral-dark-950">Featured <span class="font-bold">Posts</span></h3>
            <div class="grid grid-cols-3 w-full gap-10">
              <div class="flex flex-col gap-4">
                <div class="flex gap-6 content-center hover-up">
                  <div class="max-w-28">
                    <a class="inline-block md:mb-0 overflow-hidden rounded-2xl" href="single.php">
                      <img src="assets/imgs/pages/thumb-01.png" alt="ideko">
                    </a>
                  </div>
                  <div class="flex flex-col gap-3">
                    <a class="text-base font-bold text-neutral-950 dark:text-neutral-dark-950" href="single.php">
                      Beyond the Pixels: My Art-Tech Lifestyle Journey
                    </a>
                    <p class="text-sm font-medium text-neutral-700">
                      2 min read - June 8, 2023
                    </p>
                  </div>
                </div>
                <div class="flex gap-6 content-center hover-up">
                  <div class="max-w-28">
                    <a class="inline-block md:mb-0 overflow-hidden rounded-2xl" href="single.php">
                      <img src="assets/imgs/pages/thumb-02.png" alt="ideko">
                    </a>
                  </div>
                  <div class="flex flex-col gap-3">
                    <a class="text-base font-bold text-neutral-950 dark:text-neutral-dark-950" href="single.php">
                      Globetrotting in Style: A Journey Through My Lens
                    </a>
                    <p class="text-sm font-medium text-neutral-700">
                      2 min read - June 8, 2023
                    </p>
                  </div>
                </div>
              </div>

              <div class="flex flex-col gap-4">
                <div class="flex gap-6 content-center hover-up">
                  <div class="max-w-28">
                    <a class="inline-block md:mb-0 overflow-hidden rounded-2xl" href="single.php">
                      <img src="assets/imgs/pages/thumb-03.png" alt="ideko">
                    </a>
                  </div>
                  <div class="flex flex-col gap-3">
                    <a class="text-base font-bold text-neutral-950 dark:text-neutral-dark-950" href="single.php">
                      Canvas and Keyboard: An Art-Tech Affair
                    </a>
                    <p class="text-sm font-medium text-neutral-700">
                      2 min read - June 8, 2023
                    </p>
                  </div>
                </div>
                <div class="flex gap-6 content-center hover-up">
                  <div class="max-w-28">
                    <a class="inline-block md:mb-0 overflow-hidden rounded-2xl" href="single.php">
                      <img src="assets/imgs/pages/thumb-04.png" alt="ideko">
                    </a>
                  </div>
                  <div class="flex flex-col gap-3">
                    <a class="text-base font-bold text-neutral-950 dark:text-neutral-dark-950" href="single.php">
                      Beyond the Pixels: My Art-Tech Lifestyle Journey
                    </a>
                    <p class="text-sm font-medium text-neutral-700">
                      2 min read - June 8, 2023
                    </p>
                  </div>
                </div>
              </div>

              <div class="flex flex-col gap-4">
                <div class="flex gap-6 content-center hover-up">
                  <div class="max-w-28">
                    <a class="inline-block md:mb-0 overflow-hidden rounded-2xl" href="single.php">
                      <img src="assets/imgs/pages/thumb-05.png" alt="ideko">
                    </a>
                  </div>
                  <div class="flex flex-col gap-3">
                    <a class="text-base font-bold text-neutral-950 dark:text-neutral-dark-950" href="single.php">
                      Chasing Sunsets: A Lifestyle in Living Color
                    </a>
                    <p class="text-sm font-medium text-neutral-700">
                      2 min read - June 8, 2023
                    </p>
                  </div>
                </div>
                <div class="flex gap-6 content-center hover-up">
                  <div class="max-w-28">
                    <a class="inline-block md:mb-0 overflow-hidden rounded-2xl" href="single.php">
                      <img src="assets/imgs/pages/thumb-06.png" alt="ideko">
                    </a>
                  </div>
                  <div class="flex flex-col gap-3">
                    <a class="text-base font-bold text-neutral-950 dark:text-neutral-dark-950" href="single.php">
                      Exploring Life's Canvas: Style, Tech, and Beyond
                    </a>
                    <p class="text-sm font-medium text-neutral-700">
                      2 min read - June 8, 2023
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END MEGA MENU CONTENT -->
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
                <li class="has-children">
                  <a class="menu-mobile-item" href="#">Home</a>
                  <ul class="sub-menu">
                    <li><a class="menu-mobile-sub-item" href="index.php">Home page 01</a></li>
                    <li><a class="menu-mobile-sub-item" href="index-2.php">Home page 02</a></li>
                    <li><a class="menu-mobile-sub-item" href="index-3.php">Home page 03</a></li>
                  </ul>
                </li>
                <li class="has-children">
                  <a class="menu-mobile-item" href="#">Blog</a>
                  <ul class="sub-menu">
                    <li><a href="category.php" class="menu-mobile-sub-item">Category 01</a></li>
                    <li><a href="category-2.php" class="menu-mobile-sub-item">Category 02</a></li>
                    <li><a href="category-3.php" class="menu-mobile-sub-item">Category 03</a></li>
                    <li><a href="category-4.php" class="menu-mobile-sub-item">Category 04</a></li>
                    <li><a href="single.php" class="menu-mobile-sub-item">Single 01</a></li>
                    <li><a href="single-2.php" class="menu-mobile-sub-item">Single 02</a></li>
                  </ul>
                </li>
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
  <div class="header-bg absolute top-0 left-0 right-0 -z-50 w-full h-[1100px] bg-gradient-to-b from-primary-light-950/15 to-transparent max-h-[1100px] overflow-hidden"></div>

  <section class="py-32">
    <div class="container px-4">
      <div class="flex flex-col lg:flex-row gap-8 items-center">
        <div class="lg:pr-8 w-1/2">
          <img src="assets/imgs/template/404.png" alt="">
        </div>
        <div class="lg:pl-8  lg:w-1/2">
          <h1 class="text-9xl text-neutral-950 dark:text-neutral-dark-950 font-bold mb-2">404</h1>
          <h6 class="text-5xl text-neutral-950 dark:text-neutral-dark-950 font-bold mb-2">Oops! We Can’t find that page</h6>
          <p class="text-lg text-neutral-700 dark:text-neutral-dark-700 font-bold mb-12">Sorry, the page you are looking for doesn’t exits or has been moved. Try searching our site or <a href="index.php" class="text-neutral-950 dark:text-neutral-dark-950">Back to Home</a></p>

          <div class="relative mb-8 lg:max-w-[400px]">
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
    </div>
  </section>







  <!-- Footer -->
  <footer class="w-full py-20 bg-neutral-200 dark:bg-neutral-dark-200 ">
    <!--Newletter-->
    <div class="container px-4">
      <!-- <div class="grid grid-cols-1 justify-between items-start md:grid-cols-2 md:gap-4 lg:gap-8 md:justify-items-end md:items-center mb-8 md:mb-12"> -->
      <div class="flex flex-col md:flex-row justify-between md:items-end items-start mb-8 md:mb-20">
        <div class="pl-2 mb-8 md:mb-0 md:pl-0 md:max-w-[50%]">
          <h3 class="text-3xl md:text-4xl lg:text-6xl font-bold text-neutral-950 dark:text-neutral-dark-950 leading-tight"><span class="font-light">Subscribe to my weekly newsletter for priority</span> news, reviews and updates</h3>
        </div>
        <div class="mb-12 md:mb-0">
          <form class="max-w-full overflow-hidden" action="">
            <div class="flex flex-col md:flex-row mb-4 md:bg-neutral-0 dark:bg-neutral-dark-200 rounded-full p-1 md:border border-neutral-300 dark:border-neutral-dark-300">
              <input class="focus:outline-none transition duration-200 py-4 bg-neutral-0 dark:bg-neutral-dark-200 rounded-full pl-6 w-full mb-2 md:mb-0 md:border-0 border border-neutral-300 dark:border-neutral-dark-300 " type="text" placeholder="Email address">
              <button class="w-full sm:w-auto h-14 py-4 px-6 rounded-full bg-primary-light-950 dark:bg-primary-dark-950 transition duration-200 flex items-center justify-center gap-2" type="submit">
                <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 fill-neutral-950" preserveAspectRatio="none">
                  <path d="M19.8829 0.671875H2.8827C2.35277 0.673442 1.84497 0.890991 1.47025 1.277C1.09552 1.663 0.884334 2.18609 0.882812 2.73198V15.6118C0.884334 16.1577 1.09552 16.6807 1.47025 17.0668C1.84497 17.4528 2.35277 17.6703 2.8827 17.6719H19.8829C20.4129 17.6703 20.9207 17.4528 21.2954 17.0668C21.6701 16.6807 21.8813 16.1577 21.8828 15.6118V2.73198C21.8813 2.18609 21.6701 1.663 21.2954 1.277C20.9207 0.890991 20.4129 0.673442 19.8829 0.671875ZM19.6326 5.04989L11.3828 10.7158L3.13182 5.04989V2.98979L11.3817 8.65566L19.6315 2.98979L19.6326 5.04989Z"></path>
                </svg>
                <span class="text-neutral-950 font-medium text-2xl">Subscribe</span>
              </button>
            </div>
            <div class="flex items-start justify-start mt-8 pl-4">
              <input id="checkbox" type="checkbox" class="w-4 h-4 accent-primary-light-950  bg-primary-light-950 text-neutral-0  rounded cursor-pointer">
              <label for="checkbox" class="text-neutral-700 text-sm ml-2 cursor-pointer">I agree to the <a href="#" class="text-neutral-950 dark:text-neutral-dark-950 font-bold">Terms & conditions</a></label>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!--Footer-->
    <div class="container px-4">
      <div class="border-t border-neutral-950 dark:border-neutral-dark-500 pb-20 "></div>
      <div class="grid lg:grid-cols-2">
        <div class="mb-8 lg:mb-4 lg:max-w-96">
          <h1 class="mb-8">
            <a href="index.php">
              <img src="assets/imgs/template/logo.svg" alt="logo" class="flex-shrink-0 relative dark:hidden">
              <img src="assets/imgs/template/logo-white.svg" alt="logo" class="flex-shrink-0 relative hidden dark:inline-block">
            </a>
          </h1>
          <p class="font-medium text-neutral-950 dark:text-neutral-dark-950 mb-8 lg:mb-12 max-w-[350px]">
            It involves entrepreneurship, management, marketing, finance, and many other aspects. Businesses aim to generate
          </p>
          <div class="flex gap-2">
            <div class="w-12 h-12 rounded-[5px] flex justify-center items-center border border-neutral-300 dark:border-neutral-dark-300 cursor-pointer hover-up hover:bg-primary-light-200 dark:hover:bg-primary-dark-300">
              <svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" class="fill-neutral-950 dark:fill-neutral-dark-950">
                <path d="M8.03125 9H5.6875V16H2.5625V9H0V6.125H2.5625V3.90625C2.5625 1.40625 4.0625 0 6.34375 0C7.4375 0 8.59375 0.21875 8.59375 0.21875V2.6875H7.3125C6.0625 2.6875 5.6875 3.4375 5.6875 4.25V6.125H8.46875L8.03125 9Z" />
              </svg>
            </div>
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

        <div class="grid grid-cols- lg:grid-cols-3 md:grid-cols-3">
          <div class="mb-4">
            <h6 class="text-base font-bold text-neutral-700 dark:text-neutral-dark-700 mb-2">Category</h6>
            <ul>
              <li class="footer-menu">
                <a href="category.php" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Trending</a>
              </li>
              <li class="footer-menu">
                <a href="category-2.php" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Fashion</a>
              </li>
              <li class="footer-menu">
                <a href="category-3.php" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Technology</a>
              </li>
              <li class="footer-menu">
                <a href="category-4.php" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Healthy</a>
              </li>
            </ul>
          </div>
          <div class="mb-4">
            <h6 class="text-base font-bold text-neutral-700 dark:text-neutral-dark-700 mb-2">Pages</h6>
            <ul>
              <li class="footer-menu">
                <a href="page-about.php" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">About me</a>
              </li>
              <li class="footer-menu">
                <a href="page-contact.php" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Contact</a>
              </li>
              <li class="footer-menu">
                <a href="page-author.php" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Author</a>
              </li>
              <li class="footer-menu">
                <a href="page-search.php" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Search results</a>
              </li>
            </ul>
          </div>
          <div class="mb-4">
            <h6 class="text-base font-bold text-neutral-700 dark:text-neutral-dark-700 mb-2">Account</h6>
            <ul>
              <li class="footer-menu">
                <a href="page-register.php" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Register</a>
              </li>
              <li class="footer-menu">
                <a href="page-login.php" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Login</a>
              </li>
              <li class="footer-menu">
                <a href="page-forgot-password.php" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Forgot Password</a>
              </li>
              <li class="footer-menu">
                <a href="page-404.php" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">404</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
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