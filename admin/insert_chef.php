<?php

include('../includes/config.php');
session_start();
ob_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert_Chef_Admin</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">

    <!-- Font Awesome  Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custome CSS -->
    <link rel="stylesheet" href="../styles.css">
</head>

<body class="bg-light">

    <div class="container">
        <h1 class="text-center mt-3">Insert Chef</h1>
        <!-- Form -->

        <div class="shadow-sm wrapper border bg-body-secondary rounded-4 mt-4 w-50 m-auto mb-4">
            <form class="formm my-4 w-100 m-auto" action="" method="POST" enctype="multipart/form-data">
                <br>
                <?php include('../includes/session.php'); ?>
                <!-- Name -->

                <div class="form-outline mb-4 mt-4 w-50 m-auto">
                    <label for="chef_name" class="form-label">Chef Name</label>
                    <input type="text" name="chef_name" id="chef_name" class="form-control" placeholder="Enter chef name" autocomplete="off" require>
                </div>
                <!-- Position -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="chef_position" class="form-label">Chef Position</label>
                    <input type="text" name="chef_position" id="chef_position" class="form-control" placeholder="Enter chef position" autocomplete="off" require>
                </div>

                <!-- Chef_Image -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="chef_image" class="form-label">Chef Image</label>
                    <input type="file" name="chef_image" id="chef_image" class="form-control" placeholder="Insert chef_image" require>
                </div>

                <div class="form-outline text-center mb-4 w-50 m-auto bg-infor">
                    <input type="submit" name="insert_chef" class="btn btn-info mb-3 px-3" value="Insert Chef">
                </div>


            </form>

            <!-- Updated code from ChatGTP -->

            <?php
            // Check if form is submitted
            if (isset($_POST['insert_chef'])) {

                // Get form data and sanitize input
                $chef_name = mysqli_real_escape_string($conn, $_POST['chef_name']);
                $chef_position = mysqli_real_escape_string($conn, $_POST['chef_position']);

                // Accessing images
                $chef_image = $_FILES['chef_image']['name'];

                // Accessing image tmp name
                $tmp_image = $_FILES['chef_image']['tmp_name'];

                // Checking empty condition
                if (empty($chef_name) || empty($chef_position) || empty($chef_image)) {
                    $_SESSION['empty-msg'] = "<div class='warning-msg'>Please fill all the available fields.</div>";
                    header("location: insert_chef.php");
                    die();
                }

                // Prepare and bind statement to insert data
                $stmt = $conn->prepare("INSERT INTO tbl_chef (chef_name, chef_position, chef_image) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $chef_name, $chef_position, $chef_image);

                // Execute statement and save data in database
                // if ($stmt->execute()) {
                //     echo "<script>alert('Chef inserted successfully.')</script>";

                // }    

                if ($stmt->execute()) {
                    $_SESSION['add'] = "<div class='success-msg'>Chef inserted successfully.</div>";
                    // Redirect to the admin page
                    header("location: index.php");
                    // exit();
                } else {
                    echo "<script>alert('Faild to insert chef, please check your connection.')</script>";
                }

                // Close statement and connection
                $stmt->close();
                $conn->close();
                ob_end_flush();
            }
            ?>







        </div>

    </div>

    <!-- Bootstrap js Link -->
    <script src="../bootstrap-5/js/bootstrap.min.js"></script>

</body>

</html>