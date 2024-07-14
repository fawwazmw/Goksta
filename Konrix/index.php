<?php include 'partials/main.php'; ?>

<head>
  <?php $title = "Login";
  include 'partials/title-meta.php'; ?>

  <?php include 'partials/head-css.php'; ?>
</head>

<body>

  <div class="bg-gradient-to-r from-rose-100 to-teal-100 dark:from-gray-700 dark:via-gray-900 dark:to-black">

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="h-screen w-screen flex justify-center items-center">

      <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">
        <div class="card overflow-hidden sm:rounded-md rounded-none">
          <form action="auth-login.php" class="p-6" method="POST">
            <a href="dashboard.php" class="block mb-8">
              <img class="h-6 block dark:hidden" src="assets/images/logo-dark.png" alt="">
              <img class="h-6 hidden dark:block" src="assets/images/logo-light.png" alt="">
            </a>

            <div class="mb-4">
              <span class="text-success">
                <?php if (isset($_GET['success']) && $_GET['success'] == "registerSuccess") { ?>
                  <span>Your Account Has Been Created!</span>
                <?php } ?>
              </span>
              <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2">Email</label>
              <input name="email" class="form-input" type="email" placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
              <span class="text-danger">
                <?php if (isset($_GET['gagal']) && $_GET['gagal'] == "emailKosong") { ?>
                  <span>Sorry, enter your email.</span>
                <?php } ?>
              </span>
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2">Password</label>
              <input name="password" class="form-input" type="password" placeholder="Enter your password">
              <span class="text-danger">
                <?php if (isset($_GET['gagal']) && $_GET['gagal'] == "passKosong") { ?>
                  <span>Sorry, enter your password.</span>
                <?php } ?>
              </span>
              <span class="text-danger">
                <?php if (isset($_GET['gagal']) && $_GET['gagal'] == "emailpassSalah") { ?>
                  <span>Sorry, your email and password are wrong.</span>
                <?php } ?>
                <?php if (isset($_GET['gagal']) && $_GET['gagal'] == "notAdmin") { ?>
                  <span>Sorry, you do not have admin access.</span>
                <?php } ?>
              </span>
            </div>

            <div class="flex items-center justify-between mb-4">
              <div class="flex items-center">
                <input type="checkbox" class="form-checkbox rounded" id="checkbox-signin" name="remember_me">
                <label class="ms-2" for="checkbox-signin">Remember me</label>
              </div>
              <a href="auth-recoverpw.php" class="text-sm text-primary border-b border-dashed border-primary">Forget Password ?</a>
            </div>

            <div class="flex justify-center mb-6">
              <button class="btn w-full text-white bg-primary" type="submit" name="login"> Log In </button>
            </div>

            <div class="flex items-center my-6">
              <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700"></div>
              <div class="mx-4 text-secondary">Or</div>
              <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700"></div>
            </div>

            <div class="flex gap-4 justify-center mb-6">
              <a href="javascript:void(0)" class="btn border-light text-gray-400 dark:border-slate-700">
                <span class="flex justify-center items-center gap-2">
                  <i class="mgc_github_line text-info text-xl"></i>
                  <span class="lg:block hidden">Github</span>
                </span>
              </a>
              <a href="javascript:void(0)" class="btn border-light text-gray-400 dark:border-slate-700">
                <span class="flex justify-center items-center gap-2">
                  <i class="mgc_google_line text-danger text-xl"></i>
                  <span class="lg:block hidden">Google</span>
                </span>
              </a>
              <a href="javascript:void(0)" class="btn border-light text-gray-400 dark:border-slate-700">
                <span class="flex justify-center items-center gap-2">
                  <i class="mgc_facebook_line text-primary text-xl"></i>
                  <span class="lg:block hidden">Facebook</span>
                </span>
              </a>
            </div>

            <p class="text-gray-500 dark:text-gray-400 text-center">Don't have an account ?<a href="register.php" class="text-primary ms-1"><b>Register</b></a></p>
          </form>
        </div>
      </div>
    </div>

  </div>

  <!-- ============================================================== -->
  <!-- End Page content -->
  <!-- ============================================================== -->

</body>

</html>