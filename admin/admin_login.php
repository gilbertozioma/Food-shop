<?php
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
    <title>Admin Registration</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <!-- Font Awesome  Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custome CSS -->
    <link rel="stylesheet" href="../styles.css">
    <style>
        body {
            overflow-x: hidden;
        }

        .reg_img {
            width: 400px;
            /* height: 500px; */
            object-fit: contain;
        }
    </style>
</head>

<body>
    <div class="row d-flex align-items-center justify-content-center">
        <h3 class="text-center mt-5">Admin Login</h3>

        <div class="col-lg-6 col-xl-5 d-flex align-items-center justify-content-center">
            <img src="../admin/product_images/login.jpg" alt="image" class="reg_img ">
        </div>

        <div class="col-md-6 mb-4 d-flex align-items-center justify-content-center">
            <form action="" method="post" enctype="multipart/form-data" class="border mt-3 w-75 p-4 bg-light">
                <div class="form-outline mb-4">
                    <label for="">Name</label>
                    <input type="text" name="admin_name" id="admin_name" required placeholder="Name" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <label for="">Password</label>
                    <input type="password" name="admin_password" id="admin_password" required placeholder="Password" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <input type="submit" value="Login" name="admin_login" class="bg py-2 px-3 border-0 rounded-2 text-light">
                </div>

                <p class="small fw-bold">Don't have an account? <a href="admin_registration.php" class="text-danger">Register</a></p>
            </form>
        </div>
    </div>


    <?php
    if (isset($_POST['admin_login'])) {
        $admin_name = $_POST['admin_name'];
        $admin_password = $_POST['admin_password'];
        $sql = "SELECT * FROM tbl_admin WHERE admin_name = '$admin_name'";
        $res = mysqli_query($conn, $sql);
        $row_count = mysqli_num_rows($res);
        $row_data = mysqli_fetch_assoc($res);

        if ($row_count > 0) {
            $_SESSION['admin_name'] = $admin_name;
            if (password_verify($admin_password, $row_data['admin_password'])) {

                echo "<script>alert('Login successful.')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
            else{
                echo "<script>alert('Invalid Crendentials')</script>";
            }
        }
        else {
            echo "<script>alert('Invalid Crendentials')</script>";
        }
    }
    ?>


    <!-- Bootstrap js Link -->
    <script src="../bootstrap-5/js/bootstrap.min.js"></script>
</body>

</html>