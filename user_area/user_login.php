<?php
// connecting to database
include('../includes/config.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Font Awesome  Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <!-- Custome CSS -->
    <link rel="stylesheet" href="../styles.css">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data" class="border mt-3 p-4 bg-light">
                    <!-- Username field -->
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Enter Your username" autocomplete="off" required="required" name="username">
                    </div>
                    <!-- Password field -->
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
                    </div>

                    <!-- Forgotten Password field -->
                    <div>
                        <p><a href="./forgotten_password.php">Forgotten Password?</a></p>
                    </div>

                    <!-- Login button field -->
                    <div class="form-outline mb-3">
                        <input type="submit" value="Login" name="login" class="bg py-2 px-3 border-0 rounded-0 text-light">
                    </div>
                    <!-- Register button field -->
                    <p class="small fw-bold">Don't have an account? <a href="user_registration.php" class="text-danger">Register</a></p>
                </form>
            </div>
        </div>
    </div>


    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $user_password = $_POST['user_password'];
        $sql = "SELECT * FROM tbl_user WHERE username = '$username'";
        $res = mysqli_query($conn, $sql);
        $row_count = mysqli_num_rows($res);
        $row_data = mysqli_fetch_assoc($res);
        $user_ip = getIPAddress();

        // CART ITEMS
        $sql_cart = "SELECT * FROM tbl_cart_details WHERE ip_address = '$user_ip'";
        $res_cart = mysqli_query($conn, $sql_cart);
        $row_count_cart = mysqli_num_rows($res_cart);

        if ($row_count > 0) {
            $_SESSION['username'] = $username;
            if (password_verify($user_password, $row_data['user_password'])) {

                if ($row_count == 1 and $row_count_cart == 0) {
                    $_SESSION['username'] = $username;
                    echo "<script>alert('Login successful.')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";
                } else {
                    $_SESSION['username'] = $username;
                    echo "<script>alert('Login successful.')</script>";
                    echo "<script>window.open('payment.php','_self')</script>";
                }
            } else {
                echo "<script>alert('Invalid Crendentials')</script>";
            }
        } else {
            echo "<script>alert('Invalid Crendentials')</script>";
        }
    }
    ?>



    <!-- Bootstrap js Link -->
    <script src="../bootstrap-5/js/bootstrap.min.js"></script>

</body>

</html>