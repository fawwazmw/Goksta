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

  <?php include('partials/navbar.php'); ?>

  <div class="header-bg absolute top-0 left-0 right-0 -z-50 w-full h-[1100px] bg-gradient-to-b from-primary-light-950/15 to-transparent max-h-[1100px] overflow-hidden"></div>

  <section class="relative py-12 lg:pt-32 lg:pb-32">
    <div class="container px-4">
      <div class="grid grid-cols-1 lg:grid-cols-2">
        <div class="mr-12">
          <span class="h-12 px-7 py-3.5 bg-neutral-0 dark:bg-neutral-dark-0 rounded-3xl border border-neutral-300 dark:border-neutral-dark-300 text-neutral-700 dark:text-neutral-dark-700 text-base font-bold leading-none mb-4 inline-block">
            Welcome Back!
          </span>
          <h3 class="heading-3 mb-2">Forgot <span class="font-light"> Password?</span></h3>
          <p class="text-neutral-700 dark:text-neutral-dark-700 mb-16 font-medium text-2xl">No worries, we’ll send you reset instructions</p>
          <form action="">
            <div class="form-group mb-4">
              <label for="email" class="input-label">Email address or Username</label>
              <input type="email" placeholder="johndoe@site.com" class="input-lg">
            </div>
            <button type="submit" class="w-full btn bg-primary-light-950 dark:bg-primary-dark-950 rounded-full px-8 py-4 text-xl text-neutral-950 dark:text-neutral-dark-950 font-bold text-center">
              Reset Password
            </button>

            <p class="text-lg font-medium text-neutral-700 dark:text-neutral-dark-700 pt-8 pb-12">Do not have an account? <a href="page-register.html" class="text-neutral-950 dark:text-neutral-dark-950 underline">Create Now</a></p>
          </form>
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
            <a href="index.html">
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
                <a href="category.html" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Trending</a>
              </li>
              <li class="footer-menu">
                <a href="category-2.html" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Fashion</a>
              </li>
              <li class="footer-menu">
                <a href="category-3.html" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Technology</a>
              </li>
              <li class="footer-menu">
                <a href="category-4.html" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Healthy</a>
              </li>
            </ul>
          </div>
          <div class="mb-4">
            <h6 class="text-base font-bold text-neutral-700 dark:text-neutral-dark-700 mb-2">Pages</h6>
            <ul>
              <li class="footer-menu">
                <a href="page-about.html" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">About me</a>
              </li>
              <li class="footer-menu">
                <a href="page-contact.html" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Contact</a>
              </li>
              <li class="footer-menu">
                <a href="page-author.html" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Author</a>
              </li>
              <li class="footer-menu">
                <a href="page-search.html" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Search results</a>
              </li>
            </ul>
          </div>
          <div class="mb-4">
            <h6 class="text-base font-bold text-neutral-700 dark:text-neutral-dark-700 mb-2">Account</h6>
            <ul>
              <li class="footer-menu">
                <a href="page-register.html" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Register</a>
              </li>
              <li class="footer-menu">
                <a href="page-login.html" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Login</a>
              </li>
              <li class="footer-menu">
                <a href="page-forgot-password.html" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">Forgot Password</a>
              </li>
              <li class="footer-menu">
                <a href="page-404.html" class="text-base font-regular text-neutral-950 dark:text-neutral-dark-950">404</a>
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