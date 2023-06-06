<?php

include('../includes/config.php');
@session_start();
ob_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert_Breakfasts_Admin</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous"> -->
    <!-- Font Awesome  Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custome CSS -->
    <link rel="stylesheet" href="../styles.css">
</head>

<body class="bg-light">

    <div class="container">
        <h1 class="text-center mt-3">Insert Breakfast</h1>
        <!-- Form -->

        <div class="shadow-sm wrapper border bg-body-secondary rounded-4 mt-4 w-50 m-auto mb-4">
            <form class="formm my-4 w-100 m-auto" action="" method="POST" enctype="multipart/form-data">
                <br>
                <?php include('../includes/session.php'); ?>
                <!-- title -->

                <div class="form-outline mb-4 mt-4 w-50 m-auto">
                    <label for="breakfast_title" class="form-label">Breakfast title</label>
                    <input type="text" name="breakfast_title" id="breakfast_title" class="form-control" placeholder="Enter breakfast title" autocomplete="off" require>
                </div>
                <!-- description -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="breakfast_description" class="form-label">Breakfast discription</label>
                    <input type="text" name="breakfast_description" id="description" class="form-control" placeholder="Enter description" autocomplete="off" require>
                </div>
                <!-- breakfast keyword -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="breakfast_keyword" class="form-label">Breakfast keyword</label>
                    <input type="text" name="breakfast_keywords" id="breakfast_keyword" class="form-control" placeholder="Enter breakfast keywords" autocomplete="off" require>
                </div>

                <!-- categories -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_category" id="" class="form-select">
                        <option value="">Select a category</option>

                        <?php
                        $select_cat = "SELECT * FROM tbl_categories";
                        $result_qry = mysqli_query($conn, $select_cat);

                        // Loop through the "tbl_category" table in the database and fetch the datas 
                        while ($row = mysqli_fetch_assoc($result_qry)) {
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- breakfast_image -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="breakfast_image1" class="form-label">Breakfast_image</label>
                    <input type="file" name="breakfast_image" id="breakfast_image" class="form-control" placeholder="Insert Breakfast_image" require>
                </div>

                <!-- breakfast price -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="breakfast_price" class="form-label">Breakfast price</label>
                    <input type="number" name="breakfast_price" id="breakfast_price" class="form-control" placeholder="Enter breakfast price" autocomplete="off" require>
                </div>
                <div class="form-outline mb-4 w-50 m-auto bg-infor">
                    <input type="submit" name="insert_breakfast" class="btn btn-info mb-3 px-3" value="Insert Producs">
                </div>

            </form>
            <?php
            ?>

            <?php
            // Check if form is submitted
            if (isset($_POST['insert_breakfast'])) {
                // Get form data and sanitize input
                $title = mysqli_real_escape_string($conn, $_POST['breakfast_title']);
                $description = mysqli_real_escape_string($conn, $_POST['breakfast_description']);
                $keywords = mysqli_real_escape_string($conn, $_POST['breakfast_keywords']);
                $product_category = mysqli_real_escape_string($conn, $_POST['product_category']);
                $price = floatval($_POST['breakfast_price']);
                $status = 1; // set to boolean value

                // Accessing images
                $image = $_FILES['breakfast_image']['name'];

                // Accessing image tmp name
                $tmp_image = $_FILES['breakfast_image']['tmp_name'];

                // Checking empty condition
                if (empty($title) || empty($description) || empty($keywords) || empty($product_category) || empty($price) || empty($image)) {
                    $_SESSION['empty-msg'] = "<div class='warning-msg'>Please fill all the available fields.</div>";
                    header("location: insert_breakfast.php");
                    die();
                }

                // Move uploaded image file to permanent location
                $target_dir = "./product_images/";
                $target_file = $target_dir . basename($image);
                move_uploaded_file($tmp_image, $target_file);

                // Prepare and bind statement to insert data into tbl_breakfast
                $stmt1 = $conn->prepare("INSERT INTO tbl_breakfast (breakfast_title, breakfast_description, breakfast_keywords, product_category, breakfast_image, breakfast_price, date, status) VALUES (?, ?, ?, ?, ?, NOW(), ?)");
                $stmt1->bind_param("ssssssd", $title, $description, $keywords, $product_category, $image, $price, $status);

                // Prepare and bind statement to insert data into tbl_products
                $stmt2 = $conn->prepare("INSERT INTO tbl_products (product_title, product_description, product_keywords, product_category, product_image, product_price, date, status) VALUES (?, ?, ?, ?, ?, NOW(), ?)");
                $stmt2->bind_param("ssssssd", $title, $description, $keywords, $product_category, $image, $price, $status);

                // Execute statement and save data in both tables
                if ($stmt1->execute() && $stmt2->execute()) {
                    $product_id = $stmt2->insert_id; // get the id of the inserted product
                    $_SESSION['add'] = "<div class='success-msg'>Product inserted successfully.</div>";
                    // Redirect to the admin page
                    header("location: index.php");
                }

                // Close statement and connection
                $stmt1->close();
                $stmt2->close();
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