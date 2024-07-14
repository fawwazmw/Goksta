<?php include 'partials/main.php';
date_default_timezone_set('Asia/Jakarta');
?>

<head>
  <?php $title = "Register";
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
          <div class="p-6">
            <a href="dashboard.php" class="block mb-8">
              <img class="h-6 block dark:hidden" src="assets/images/logo-dark.png" alt="">
              <img class="h-6 hidden dark:block" src="assets/images/logo-light.png" alt="">
            </a>

            <!-- Form untuk pendaftaran -->
            <form action="auth-register.php" method="POST">
              <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2">Full Name</label>
                <input name="full_name" class="form-input" type="text" placeholder="Enter your full name" required value="<?php echo isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : ''; ?>">
                <span class="text-danger">
                  <?php if (isset($_GET['gagal']) && $_GET['gagal'] == "nameKosong") { ?>
                    <span>Sorry, enter your full name.</span>
                  <?php } ?>
                </span>
              </div>


              <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2">Email Address</label>
                <input name="email" class="form-input" type="email" placeholder="Enter your email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                <span class="text-danger">
                  <?php if (isset($_GET['gagal']) && $_GET['gagal'] == "emailKosong") { ?>
                    <span>Sorry, enter your email.</span>
                  <?php } ?>
                </span>
              </div>

              <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2">Password</label>
                <input name="password" class="form-input" type="password" placeholder="Enter your password" required>
                <span class="text-danger">
                  <?php if (isset($_GET['gagal']) && $_GET['gagal'] == "passKosong") { ?>
                    <span>Sorry, enter your password.</span>
                  <?php } ?>
                </span>
              </div>

              <div class="mb-4">
                <div class="flex items-center">
                  <input type="checkbox" class="form-checkbox rounded" id="checkbox-signup" required>
                  <label class="ms-2 text-slate-900 dark:text-slate-200" for="checkbox-signup">I accept <a href="#" class="text-gray-400 underline">Terms and Conditions</a></label>
                </div>
              </div>

              <div class="flex justify-center mb-6">
                <button type="submit" class="btn w-full text-white bg-primary" name="register"> Register </button>
              </div>
            </form>
            <!-- Akhir form untuk pendaftaran -->

            <!-- Tombol Login dengan media sosial -->
            <div class="flex items-center my-6">
              <!-- Tombol login dengan media sosial -->
            </div>
            <!-- Akhir Tombol Login dengan media sosial -->

            <!-- Link untuk masuk -->
            <p class="text-gray-500 dark:text-gray-400 text-center">Already have account ?<a href="index.php" class="text-primary ms-1"><b>Log In</b></a></p>
            <!-- Akhir link untuk masuk -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ============================================================== -->
  <!-- End Page content -->
  <!-- ============================================================== -->

</body>

</html>