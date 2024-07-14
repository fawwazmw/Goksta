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

  <!-- Register Section 1 -->
  <section class="relative py-12 lg:pt-32">
    <div class="container px-4">
      <div class="grid grid-cols-1 lg:grid-cols-2">
        <div class="mr-12 lg:pl-12">
          <span class="h-12 px-7 py-3.5 bg-neutral-0 dark:bg-neutral-dark-0 rounded-3xl border border-neutral-300 dark:border-neutral-dark-300 text-neutral-700 dark:text-neutral-dark-700 text-base font-bold leading-none mb-4 inline-block">
            Sign Up
          </span>
          <h3 class="heading-3 mb-2">Create <span class="font-light">an Account</span></h3>
          <p class="text-neutral-700 dark:text-neutral-dark-700 mb-16 font-medium text-2xl">Create a new account and enjoy premium content</p>
          <form action="">
            <div class="grid md:grid-cols-2 gap-4 mb-4">
              <div class="form-group">
                <label for="last-name" class="input-label">First Name</label>
                <input type="text" placeholder="First name" class="input-lg">
              </div>
              <div class="form-group">
                <label for="last-name" class="input-label">Last Name</label>
                <input type="text" placeholder="Last name" class="input-lg">
              </div>
            </div>
            <div class="form-group mb-4">
              <label for="email" class="input-label">Email</label>
              <input type="email" placeholder="Email" class="input-lg">
            </div>
            <div class="form-group mb-4">
              <label for="password" class="input-label">Password</label>
              <input type="password" placeholder="Password" class="input-lg">
            </div>
            <div class="form-group flex justify-between mb-4 mt-6">
              <div class="flex items-center mb-8">
                <input type="checkbox" id="save-info" class="w-4 h-4 accent-primary-light-950  bg-primary-light-950 text-neutral-0  rounded cursor-pointer mr-2">
                <label for="save-info" class="text-sm text-neutral-950 dark:text-neutral-dark-950">I agree to the <a href="#" class="font-bold">Terms & conditions</a></label>
              </div>
              <a href="#" class="text-neutral-950 dark:text-neutral-dark-950 underline text-sm">Need help?</a>
            </div>
            <button type="submit" class="w-full btn bg-primary-light-950 dark:bg-primary-dark-950 rounded-full px-8 py-4 text-xl text-neutral-950 dark:text-neutral-dark-950 font-bold text-center">
              Sign Up
            </button>
            <p class="text-center text-lg font-medium text-neutral-700 dark:text-neutral-dark-700 pt-12 pb-4">Or continue with</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <button class="h-[58px] px-4 gap-2 rounded-lg flex justify-center items-center border border-neutral-300 dark:border-neutral-dark-300 cursor-pointer hover-up hover:bg-primary-light-200 text-base font-bold text-neutral-950 dark:text-neutral-dark-950">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                  <path d="M31.1985 12.9643H29.95V12.9H16V19.1H24.7598C23.4818 22.7092 20.0478 25.3 16 25.3C10.8641 25.3 6.7 21.1359 6.7 16C6.7 10.8641 10.8641 6.7 16 6.7C18.3707 6.7 20.5275 7.59435 22.1698 9.05522L26.5539 4.67105C23.7856 2.09107 20.0827 0.5 16 0.5C7.44012 0.5 0.5 7.44012 0.5 16C0.5 24.5599 7.44012 31.5 16 31.5C24.5599 31.5 31.5 24.5599 31.5 16C31.5 14.9607 31.393 13.9462 31.1985 12.9643Z" fill="#FFC107" />
                  <path d="M2.28711 8.78553L7.37963 12.5203C8.75758 9.1087 12.0947 6.7 16 6.7C18.3707 6.7 20.5275 7.59435 22.1697 9.05523L26.5539 4.67105C23.7856 2.09108 20.0827 0.5 16 0.5C10.0464 0.5 4.88336 3.86118 2.28711 8.78553Z" fill="#FF3D00" />
                  <path d="M16 31.4988C20.0037 31.4988 23.6415 29.9666 26.392 27.475L21.5948 23.4155C19.9863 24.6388 18.0208 25.3004 16 25.2988C11.9685 25.2988 8.54532 22.7281 7.25572 19.1406L2.20117 23.035C4.76642 28.0547 9.97597 31.4988 16 31.4988Z" fill="#4CAF50" />
                  <path d="M31.1985 12.9628H29.95V12.8984H16V19.0984H24.7598C24.1485 20.8162 23.0474 22.3171 21.5924 23.416L21.5947 23.4144L26.392 27.4739C26.0525 27.7823 31.5 23.7484 31.5 15.9984C31.5 14.9592 31.393 13.9447 31.1985 12.9628Z" fill="#1976D2" />
                </svg>
                Sign up with Google
              </button>
              <button class="h-[58px] px-4 gap-2 rounded-lg flex justify-center items-center border border-neutral-300 dark:border-neutral-dark-300 cursor-pointer hover-up hover:bg-primary-light-200 text-base font-bold text-neutral-950 dark:text-neutral-dark-950">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 23 30" class="fill-neutral-950 dark:fill-neutral-dark-950">
                  <path d="M22.7122 21.0883C22.9901 21.2914 23.0802 21.6632 22.923 21.9661C20.3931 26.9225 18.3749 29.3912 16.531 29.3912C15.6724 29.3912 14.8291 29.119 14.0068 28.59C13.4167 28.2111 12.7333 28.0027 12.0321 27.9878C11.331 27.9729 10.6393 28.1521 10.0336 28.5057C9.03697 29.0902 8.08823 29.3912 7.18741 29.3912C4.47536 29.3912 0 21.2128 0 16.726C0 11.9344 2.56638 8.28125 6.46867 8.28125C8.30481 8.28125 9.88988 8.54575 11.2219 9.08432C11.7854 9.31049 12.4237 9.29515 12.9738 9.03641C14.0547 8.52658 15.4807 8.28125 17.2479 8.28125C19.4079 8.28125 21.292 9.3354 22.856 11.3766C22.9125 11.4502 22.9538 11.5345 22.9772 11.6243C23.0006 11.7141 23.0058 11.8077 22.9924 11.8996C22.979 11.9915 22.9473 12.0797 22.8992 12.1591C22.851 12.2385 22.7875 12.3074 22.7122 12.3618C20.9662 13.6459 20.1247 15.0853 20.1247 16.726C20.1247 18.3647 20.9662 19.806 22.7122 21.0883Z" fill="black" />
                  <path d="M12.2187 6.24253C12.1254 6.24354 12.0327 6.22615 11.946 6.19134C11.8594 6.15654 11.7804 6.10501 11.7137 6.03969C11.6469 5.97437 11.5937 5.89655 11.5571 5.81066C11.5204 5.72477 11.501 5.6325 11.5 5.53912C11.5 2.81749 13.754 0.613346 16.5293 0.613346C16.6227 0.61208 16.7155 0.629298 16.8023 0.66401C16.889 0.698722 16.9681 0.750243 17.0349 0.815612C17.1017 0.88098 17.1549 0.958906 17.1915 1.04491C17.228 1.13091 17.2473 1.2233 17.248 1.31675C17.248 4.03839 14.996 6.24253 12.2187 6.24253Z" fill="black" />
                  <path d="M12.2186 6.24253C12.1252 6.24354 12.0325 6.22615 11.9459 6.19134C11.8592 6.15654 11.7803 6.10501 11.7135 6.03969C11.6468 5.97437 11.5936 5.89655 11.5569 5.81066C11.5202 5.72477 11.5009 5.6325 11.4999 5.53912C11.4999 2.81749 13.7538 0.613346 16.5291 0.613346C16.6226 0.61208 16.7154 0.629298 16.8021 0.66401C16.8889 0.698722 16.968 0.750243 17.0347 0.815612C17.1015 0.88098 17.1548 0.958906 17.1913 1.04491C17.2279 1.13091 17.2471 1.2233 17.2479 1.31675C17.2479 4.03839 14.9958 6.24253 12.2186 6.24253ZM22.7122 21.0601C22.9901 21.2633 23.0802 21.6351 22.923 21.9379C20.3931 26.8944 18.3749 29.363 16.531 29.363C15.6724 29.363 14.8291 29.0908 14.0068 28.5618C13.4167 28.1829 12.7333 27.9745 12.0321 27.9597C11.331 27.9448 10.6393 28.124 10.0336 28.4775C9.03697 29.0621 8.08823 29.363 7.18741 29.363C4.47536 29.363 0 21.1847 0 16.6978C0 11.9062 2.56638 8.25308 6.46867 8.25308C8.30481 8.25308 9.88988 8.51758 11.2219 9.05616C11.7854 9.28232 12.4237 9.26699 12.9738 9.00824C14.0547 8.49841 15.4807 8.25308 17.2479 8.25308C19.4079 8.25308 21.292 9.30724 22.856 11.3485C22.9125 11.4221 22.9538 11.5063 22.9772 11.5961C23.0006 11.6859 23.0058 11.7796 22.9924 11.8714C22.979 11.9633 22.9473 12.0515 22.8992 12.1309C22.851 12.2103 22.7875 12.2792 22.7122 12.3336C20.9662 13.6178 20.1247 15.0572 20.1247 16.6978C20.1247 18.3365 20.9662 19.7779 22.7122 21.0601Z" />
                </svg>
                Sign up with Apple ID
              </button>
            </div>
            <p class="text-center text-lg font-medium text-neutral-700 dark:text-neutral-dark-700 pt-8 pb-12">Already have an account? <a href="page-login.php" class="text-neutral-950 dark:text-neutral-dark-950 underline">Sign In</a></p>
          </form>
        </div> <!--Left col-->
        <div class="lg:pl-12 hidden lg:block">
          <div class="w-full md:max-w-[565px] rounded-[26px] bg-gradient-to-t from-primary-light-950 via-primary-light-300 to-primary-light-200 p-2">
            <img class="rounded-3xl md:max-w-[550px]" src="assets/imgs/pages/img-31.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Register Section 2 -->
  <section class="relative">
    <div class="container px-4">
      <div class="flex flex-col text-center justify-center items-center gap-4 mx-auto mb-12 border-t border-t-neutral-300 dark:border-t-neutral-dark-300 pt-12">
        <h3 class="heading-3">Frequently <span class="font-light">Asked Questions</span></h3>
        <p class="text-center text-lg font-medium text-neutral-700 dark:text-neutral-dark-700 mb-8 lg:max-w-[460px]">Feeling inquisitive? Have a read through some of our FAQs or contact our supporters for help</p>
        <div class="justify-start items-start gap-2 inline-flex flex-wrap">
          <a class="button-7 hover-up" href="category.php">General</a>
          <a class="button-7 hover-up" href="category.php">Account</a>
          <a class="button-7 hover-up" href="category.php">Payment</a>
          <a class="button-7 hover-up" href="category.php">Pricing</a>
        </div>

        <div class="flex flex-col gap-4 lg:max-w-[850px] mt-12">




          <!-- Collapse item -->
          <div class="relative border border-neutral-300 dark:border-neutral-300 px-8 py-4 rounded-2xl text-start w-full dark:bg-neutral-dark-0 md:min-w-[700px] lg:min-w-[850px]" x-data="{ open: false }">
            <div class="flex flex-row justify-between cursor-pointer" @click="open = !open">
              <h6 class="font-bold text-lg text-neutral-950 dark:text-neutral-dark-950 ">
                Can I cancel or change my order?
              </h6>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" :class="{'rotate-45': open, 'rotate-0': !open}" class="transition-transform duration-200">
                <rect width="24" height="24" rx="12" fill="#FFCF01" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13 6H11V11H6V13H11V18H13V13H18V11H13V6Z" fill="#151618" />
              </svg>
            </div>
            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="mt-4">
              <!-- Content -->
              <p class="text-start text-base text-neutral-700 dark:text-neutral-dark-700 border-t-neutral-300 dark:border-t-neutral-dark-300 pt-6 pb-6 border-t leading-relaxed">
                If you wish to modify your order, we understand that circumstances may change. Unfortunately, once an order is placed, we begin processing it promptly to ensure quick dispatch. As a result, we are unable to make changes to the items or quantities in your order.
              </p>
            </div>
          </div>

          <!-- Collapse item -->
          <div class="relative border border-neutral-300 dark:border-neutral-300 px-8 py-4 rounded-2xl text-start w-full dark:bg-neutral-dark-0 md:min-w-[700px] lg:min-w-[850px]" x-data="{ open: false }">
            <div class="flex flex-row justify-between cursor-pointer" @click="open = !open">
              <h6 class="font-bold text-lg text-neutral-950 dark:text-neutral-dark-950 ">
                I have promotional or discount code?
              </h6>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" :class="{'rotate-45': open, 'rotate-0': !open}" class="transition-transform duration-200">
                <rect width="24" height="24" rx="12" fill="#FFCF01" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13 6H11V11H6V13H11V18H13V13H18V11H13V6Z" fill="#151618" />
              </svg>
            </div>
            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="mt-4">
              <!-- Content -->
              <p class="text-start text-base text-neutral-700 dark:text-neutral-dark-700 border-t-neutral-300 dark:border-t-neutral-dark-300 pt-6 pb-6 border-t leading-relaxed">
                If you wish to modify your order, we understand that circumstances may change. Unfortunately, once an order is placed, we begin processing it promptly to ensure quick dispatch. As a result, we are unable to make changes to the items or quantities in your order.
              </p>
            </div>
          </div>

          <!-- Collapse item -->
          <div class="relative border border-neutral-300 dark:border-neutral-300 px-8 py-4 rounded-2xl text-start w-full dark:bg-neutral-dark-0 md:min-w-[700px] lg:min-w-[850px]" x-data="{ open: false }">
            <div class="flex flex-row justify-between cursor-pointer" @click="open = !open">
              <h6 class="font-bold text-lg text-neutral-950 dark:text-neutral-dark-950 ">
                What are the delivery types you use?
              </h6>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" :class="{'rotate-45': open, 'rotate-0': !open}" class="transition-transform duration-200">
                <rect width="24" height="24" rx="12" fill="#FFCF01" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13 6H11V11H6V13H11V18H13V13H18V11H13V6Z" fill="#151618" />
              </svg>
            </div>
            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="mt-4">
              <!-- Content -->
              <p class="text-start text-base text-neutral-700 dark:text-neutral-dark-700 border-t-neutral-300 dark:border-t-neutral-dark-300 pt-6 pb-6 border-t leading-relaxed">
                If you wish to modify your order, we understand that circumstances may change. Unfortunately, once an order is placed, we begin processing it promptly to ensure quick dispatch. As a result, we are unable to make changes to the items or quantities in your order.
              </p>
            </div>
          </div>

          <!-- Collapse item -->
          <div class="relative border border-neutral-300 dark:border-neutral-300 px-8 py-4 rounded-2xl text-start w-full dark:bg-neutral-dark-0 md:min-w-[700px] lg:min-w-[850px]" x-data="{ open: false }">
            <div class="flex flex-row justify-between cursor-pointer" @click="open = !open">
              <h6 class="font-bold text-lg text-neutral-950 dark:text-neutral-dark-950 ">
                How can I return an item purchased online?
              </h6>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" :class="{'rotate-45': open, 'rotate-0': !open}" class="transition-transform duration-200">
                <rect width="24" height="24" rx="12" fill="#FFCF01" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13 6H11V11H6V13H11V18H13V13H18V11H13V6Z" fill="#151618" />
              </svg>
            </div>
            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="mt-4">
              <!-- Content -->
              <p class="text-start text-base text-neutral-700 dark:text-neutral-dark-700 border-t-neutral-300 dark:border-t-neutral-dark-300 pt-6 pb-6 border-t leading-relaxed">
                If you wish to modify your order, we understand that circumstances may change. Unfortunately, once an order is placed, we begin processing it promptly to ensure quick dispatch. As a result, we are unable to make changes to the items or quantities in your order.
              </p>
            </div>
          </div>

          <!-- Collapse item -->
          <div class="relative border border-neutral-300 dark:border-neutral-300 px-8 py-4 rounded-2xl text-start w-full dark:bg-neutral-dark-0 md:min-w-[700px] lg:min-w-[850px]" x-data="{ open: false }">
            <div class="flex flex-row justify-between cursor-pointer" @click="open = !open">
              <h6 class="font-bold text-lg text-neutral-950 dark:text-neutral-dark-950 ">
                How can I pay for my purchases?
              </h6>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" :class="{'rotate-45': open, 'rotate-0': !open}" class="transition-transform duration-200">
                <rect width="24" height="24" rx="12" fill="#FFCF01" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13 6H11V11H6V13H11V18H13V13H18V11H13V6Z" fill="#151618" />
              </svg>
            </div>
            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="mt-4">
              <!-- Content -->
              <p class="text-start text-base text-neutral-700 dark:text-neutral-dark-700 border-t-neutral-300 dark:border-t-neutral-dark-300 pt-6 pb-6 border-t leading-relaxed">
                If you wish to modify your order, we understand that circumstances may change. Unfortunately, once an order is placed, we begin processing it promptly to ensure quick dispatch. As a result, we are unable to make changes to the items or quantities in your order.
              </p>
            </div>
          </div>
        </div>

        <div class="text-center mt-12 pb-32">
          <h6 class="font-bold text-lg text-neutral-950 dark:text-neutral-dark-950 mb-4">Still no luck? We can help!</h6>
          <p class="font-medium text-sm text-neutral-700 dark:text-neutral-dark-700 mb-8">Contact us and we’ll get back to you<br> as soon as possible.</p>
          <a href="page-login.php" class="group btn bg-primary-light-950 dark:bg-primary-dark-950 rounded-full px-8 py-4 text-xl text-neutral-950 dark:text-neutral-dark-950 flex gap-2 items-center">
            <span>Contact Us</span>
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