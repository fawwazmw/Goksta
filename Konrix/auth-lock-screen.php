<?php
include 'partials/main.php';
include('services/database.php');
include_once('services/session.php');
require_login();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password']; // Assuming input field name is 'password'

    // Retrieve user information from session
    $user_id = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;

    if (!$user_id) {
        header('Location: index.php'); // Redirect to login if user is not logged in
        exit();
    }

    // Retrieve user's hashed password from database
    $sql = "SELECT password FROM users WHERE id_user = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $hashed_password);
        mysqli_stmt_fetch($stmt);

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Password matches, unlock screen and redirect to previous page
            $_SESSION['lock_screen'] = false;
            header('Location: dashboard.php');
            exit();
        } else {
            // Password does not match
            $error = "Invalid password. Please try again.";
        }

        mysqli_stmt_close($stmt);
    } else {
        // Query preparation error
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

// Retrieve profile image for the logged-in user
$user_id = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;
$profile_image = "assets/images/users/adam.png"; // Default profile image

if ($user_id) {
    $sql = "SELECT profile FROM users WHERE id_user = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $profile);
        mysqli_stmt_fetch($stmt);

        if (!empty($profile)) {
            $profile_image = substr($profile, 7); // Remove the first 7 characters
        }

        mysqli_stmt_close($stmt);
    } else {
        // Query preparation error
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Lock Screen";
    include 'partials/title-meta.php';
    include 'partials/head-css.php';
    ?>
</head>

<body>
    <div class="bg-gradient-to-r from-rose-100 to-teal-100 dark:from-gray-700 dark:via-gray-900 dark:to-black">
        <div class="h-screen w-screen flex justify-center items-center">
            <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">
                <div class="card overflow-hidden sm:rounded-md rounded-none">
                    <div class="p-6">
                        <div class="flex justify-between">
                            <div class="flex flex-col gap-4 mb-6">
                                <a href="index.php" class="block">
                                    <img class="h-6 block dark:hidden" src="assets/images/logo-dark.png" alt="Logo">
                                    <img class="h-6 hidden dark:block" src="assets/images/logo-light.png" alt="Logo">
                                </a>
                                <h4 class="text-slate-900 dark:text-slate-200/50 font-semibold">Hi! <?php echo isset($_SESSION['full_name']) ? $_SESSION['full_name'] : 'User'; ?></h4>
                            </div>
                            <img src="<?php echo $profile_image; ?>" alt="user-image" class="h-16 w-16 rounded-full shadow">
                        </div>

                        <form method="POST">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="loggingPassword">Password</label>
                                <input id="loggingPassword" name="password" class="form-input" type="password" placeholder="Enter your password" required>
                            </div>

                            <?php if (isset($error)) : ?>
                                <div class="text-red-500"><?php echo $error; ?></div>
                            <?php endif; ?>

                            <div class="flex justify-center mb-6">
                                <button type="submit" class="btn w-full text-white bg-primary">Log In</button>
                            </div>
                        </form>

                        <div class="flex items-center my-6">
                            <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700"></div>
                            <div class="mx-4 text-secondary">Or</div>
                            <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700"></div>
                        </div>

                        <p class="text-gray-500 dark:text-gray-400 text-center">Not you? Return <a href="auth-login.php" class="text-primary ms-1"><b>Log In</b></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>