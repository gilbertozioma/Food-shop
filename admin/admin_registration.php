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
            width: 500px;
            /* height: 500px; */
            object-fit: contain;
        }
    </style>
</head>

<body>
    <div class="row d-flex align-items-center justify-content-center">
        <h3 class="text-center mt-5">Admin Registration</h3>

        <div class="col-md-2 col-lg-6 col-xl-6 d-flex align-items-center justify-content-center">
            <img src="../admin/product_images/register-now.png" alt="image" class="reg_img ">
        </div>

        <div class="col-md-6 mb-4 d-flex align-items-center justify-content-center">
            <form action="" method="post" enctype="multipart/form-data" class="border mt-3 w-75 p-4 bg-light">
                <div class="form-outline mb-4">
                    <label for="">Name</label>
                    <input type="text" name="admin_name" id="admin_name" required placeholder="Name"  class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="">Email</label>
                    <input type="email" name="admin_email" id="email" required placeholder="Email" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="">Image</label>
                    <input type="file" name="admin_image" id="image" required class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="">Password</label>
                    <input type="password" name="admin_password" id="password" required placeholder="Password" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="">Confirm Password</label>
                    <input type="password" name="admin_confirm_password" id="password" required placeholder="Confirm Password" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <input type="submit" value="Register" name="admin_register" class="bg py-2 px-3 border-0 rounded-2 text-light">
                </div>
                <p class="small fw-bold">Already have an account? <a href="admin_login.php" class="text-danger">Login</a></p>
            </form>
        </div>
    </div>

    <?php
        if (isset($_POST['admin_register'])) {

            $admin_name = $_POST['admin_name'];
            $admin_email = $_POST['admin_email'];
            $admin_image = $_FILES['admin_image']['name'];
            $admin_tmp_image = $_FILES['admin_image']['tmp_name'];
            $admin_password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT);
            $admin_confirm_password = password_hash($_POST['admin_confirm_password'], PASSWORD_DEFAULT);


            // SELECT QUERY
            $sql_admin_name = "SELECT * FROM tbl_admin WHERE admin_name = '$admin_name'";
            $res_admin_name = mysqli_query($conn, $sql_admin_name);
            $row_count1 = mysqli_num_rows($res_admin_name);

            $sql_email = "SELECT * FROM tbl_admin WHERE admin_email = '$admin_email'";
            $res_email = mysqli_query($conn, $sql_email);
            $row_count2 = mysqli_num_rows($res_email);

            if ($row_count1 > 0) {
                echo "<script> alert('This name already exists, please choose another name.')</script>";
            } elseif ($row_count2 > 0) {
                echo "<script> alert('This email already exists, please choose another email.')</script>";
            } elseif (!password_verify($_POST['admin_confirm_password'], $admin_password)) {
                echo "<script> alert('Passwords do not match.')</script>";
            } else {
                // INSERT QUERY
                move_uploaded_file($admin_tmp_image, "./admin_images/$admin_image");
                $sql2 = "INSERT INTO tbl_admin (admin_name, admin_email, admin_image, admin_password) VALUES ('$admin_name', '$admin_email', '$admin_image', '$admin_password')";
                $res2 = mysqli_query($conn, $sql2);
            }

            if (isset($res2)) {
                echo "<script>alert('Data inserted successfully')</script>";
                echo "<script>window.open('admin_login.php','_self')</script>";
            }
        }
    ?>


    <!-- Bootstrap js Link -->
    <script src="../bootstrap-5/js/bootstrap.min.js"></script>
</body>

</html>