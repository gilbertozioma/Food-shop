<?php
// connecting to database
include('../includes/config.php');
session_start();
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <!-- Custome CSS -->
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data" class="border mt-3 p-4 bg-light">
                    <!-- Username field -->
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Enter Your username" autocomplete="off" required="required" name="username">
                    </div>
                    <!-- Email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="user_email">
                    </div>
                    <!-- User image field -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                    </div>
                    <!-- Password field -->
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
                    </div>
                    <!-- Confirm password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="user_confirm_password" class="form-control" placeholder="Confirm Your Password" autocomplete="off" required="required" name="user_confirm_password">
                    </div>
                    <!-- Address field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Your Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter Your Address" autocomplete="off" required="required" name="user_address">
                    </div>
                    <!-- Contact field -->
                    <div class="form-outline mb-4">
                        <label for="contact" class="form-label">Your Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter Your Phone Number" autocomplete="off" required="required" name="user_contact">
                    </div>
                    <!-- Register button field -->
                    <div class="form-outline mb-3">
                        <input type="submit" value="Register" name="user_register" class="bg py-2 px-3 border-0 rounded-2 text-light">
                    </div>
                    <p class="small fw-bold">Already have an account? <a href="../user_area/user_login.php" class="text-danger">Login</a></p>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap js Link -->
    <script src="../bootstrap-5/js/bootstrap.min.js"></script>
</body>

</html>

<!-- phph code -->


<!-- if (isset($_POST['user_register'])) {
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = md5($_POST['user_password']);
    $user_confirm_password = md5($_POST['user_confirm_password']);
    $user_image = $_FILES['user_image']['name'];
    $user_tmp_image = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];



    // SELECT QUERY
    $sql_username = "SELECT * FROM tbl_user WHERE username = '$username'";
    $res_username = mysqli_query($conn, $sql_username);
    $row_count1 = mysqli_num_rows($res_username);

    $sql_email = "SELECT * FROM tbl_user WHERE user_email = '$user_email'";
    $res_email = mysqli_query($conn, $sql_email);
    $row_count2 = mysqli_num_rows($res_email);




    if ($row_count1 > 0) {

        echo "<script> alert('This username already exists, please choose another username.')</script>";
    } elseif ($row_count2 > 0) {
        echo "<script> alert('This email already exists, please choose another email.')</script>";
    } elseif ($user_password != $user_confirm_password) {
        echo "<script> alert('Passwords do not match.')</script>";
    } else {
        // INSERT QUERY
        move_uploaded_file($user_tmp_image, "./user_images/$user_image");

        $sql2 = "INSERT INTO tbl_user (username, user_email, user_password, user_image, user_ip, user_address, user_contact) VALUES ('$username', '$user_email', '$user_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";

        $res2 = mysqli_query($conn, $sql2);
    }


    if (isset($res2)) {
        echo "<script>alert('Data inserted successfully')</script>";
    }

    // SELECTING CART ITEMS
    $select_cart_items = "SELECT * FROM tbl_user WHERE user_ip = '$user_ip'";
    $res3 = mysqli_query($conn, $select_cart_items);
    $row_count3 = mysqli_num_rows($res3);

    if ($row_count3 > 0) {
        $_SESSION['username'] = $username;
        echo "<script> alert('You have items in your cart.')</script>";
        echo "<script> window.open('checkout.php','_self')</script>";
    } else {
        echo "<script> window.open('../index.php','_self')</script>";
    }
} -->


<?php
if (isset($_POST['user_register'])) {
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
    $user_confirm_password = password_hash($_POST['user_confirm_password'], PASSWORD_DEFAULT);
    $user_image = $_FILES['user_image']['name'];
    $user_tmp_image = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];

    // SELECT QUERY
    $sql_username = "SELECT * FROM tbl_user WHERE username = '$username'";
    $res_username = mysqli_query($conn, $sql_username);
    $row_count1 = mysqli_num_rows($res_username);

    $sql_email = "SELECT * FROM tbl_user WHERE user_email = '$user_email'";
    $res_email = mysqli_query($conn, $sql_email);
    $row_count2 = mysqli_num_rows($res_email);

    if ($row_count1 > 0) {
        echo "<script> alert('This username already exists, please choose another username.')</script>";
    } elseif ($row_count2 > 0) {
        echo "<script> alert('This email already exists, please choose another email.')</script>";
    } elseif (!password_verify($_POST['user_confirm_password'], $user_password)) {
        echo "<script> alert('Passwords do not match.')</script>";
    } else {
        // INSERT QUERY
        move_uploaded_file($user_tmp_image, "./user_images/$user_image");
        $sql2 = "INSERT INTO tbl_user (username, user_email, user_password, user_image, user_ip, user_address, user_contact) VALUES ('$username', '$user_email', '$user_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
        $res2 = mysqli_query($conn, $sql2);
    }

    if (isset($res2)) {
        echo "<script>alert('Data inserted successfully')</script>";
    }

    // SELECTING CART ITEMS
    $select_cart_items = "SELECT * FROM tbl_cart_details WHERE ip_address = '$user_ip'";
    $res3 = mysqli_query($conn, $select_cart_items);
    $row_count3 = mysqli_num_rows($res3);

    if ($row_count3 > 0) {
        $_SESSION['username'] = $username;
        echo "<script> alert('You have items in your cart.')</script>";
        echo "<script> window.open('checkout.php','_self')</script>";
    } else {
        echo "<script> window.open('../index.php','_self')</script>";
    }
}
?>