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
    <title>Insert_Carousel_Admin</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">

    <!-- Font Awesome  Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custome CSS -->
    <link rel="stylesheet" href="../styles.css">
</head>

<body class="bg-light">

    <div class="container">
        <h1 class="text-center mt-3">Insert Carousel</h1>
        <!-- Form -->

        <div class="shadow-sm wrapper border bg-body-secondary rounded-4 mt-4 w-50 m-auto mb-4">
            <form class="formm my-4 w-100 m-auto" action="" method="POST" enctype="multipart/form-data">
                <br>
                <?php include('../includes/session.php'); ?>
                <!-- title -->

                <div class="form-outline mb-4 mt-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" require>
                </div>
                <!-- description -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_description" class="form-label">Product discription</label>
                    <input type="text" name="product_description" id="description" class="form-control" placeholder="Enter description" autocomplete="off" require>
                </div>

                <!-- product_image 1 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image" class="form-label">Product_image</label>
                    <input type="file" name="product_image" id="product_image" class="form-control" require>
                </div>

                <div class="form-outline text-center mb-4 w-50 m-auto bg-infor">
                    <input type="submit" name="insert_carousel" class="btn btn-info mb-3 px-3" value="Insert Carousel">
                </div>


            </form>

            <!-- Updated code from ChatGTP -->

            <?php
            // Check if form is submitted
            if (isset($_POST['insert_carousel'])) {

                // Get form data and sanitize input
                $product_title = mysqli_real_escape_string($conn, $_POST['product_title']);
                $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);

                // Accessing images
                $product_image = $_FILES['product_image']['name'];

                // Accessing image tmp name
                $tmp_image = $_FILES['product_image']['tmp_name'];

                // Checking empty condition
                if (empty($product_title) || empty($product_description) || empty($product_image)) {
                    $_SESSION['empty-msg'] = "<div class='warning-msg'>Please fill all the available fields.</div>";
                    header("location: insert_carousel.php");
                    die();
                }

                // Prepare and bind statement to insert data
                $stmt = $conn->prepare("INSERT INTO tbl_carousel (product_title, product_description, product_image) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $product_title, $product_description, $product_image);

                // Execute statement and save data in database
                // if ($stmt->execute()) {
                //     echo "<script>alert('Carousel inserted successfully.')</script>";

                // }    

                if ($stmt->execute()) {
                    $_SESSION['add'] = "<div class='success-msg'>Carousel inserted successfully.</div>";
                    // Redirect to the admin page
                    header("location: index.php");
                    // exit();
                } else {
                    echo "<script>alert('Faild to add product, please check your connection.')</script>";
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