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
    <title>Insert_Products_Admin</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous"> -->
    <!-- Font Awesome  Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custome CSS -->
    <link rel="stylesheet" href="../styles.css">
</head>

<body class="bg-light">

    <div class="container">
        <h1 class="text-center mt-3">Add Products</h1>
        <!-- Form -->
        
        <div class="shadow-sm wrapper border bg-body-secondary rounded-4 mt-4 w-50 m-auto mb-4">
            <form class="formm my-4 w-100 m-auto" action="" method="POST" enctype="multipart/form-data">
                <br>
                <?php include('../includes/session.php'); ?>
                <!-- title -->
                
                <div class="form-outline mb-4 mt-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control"
                        placeholder="Enter product title" autocomplete="off" require>
                    </div>
                    <!-- description -->
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="product_description" class="form-label">Product discription</label>
                    <input type="text" name="product_description" id="description" class="form-control"
                    placeholder="Enter description" autocomplete="off" require>
                </div>
                <!-- product keyword -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keyword" class="form-label">Product keyword</label>
                    <input type="text" name="product_keywords" id="product_keyword" class="form-control"
                    placeholder="Enter product keywords" autocomplete="off" require>
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
                            $category_title = $row['category_title'];
                            echo "<option value='$category_title'>$category_title</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- product_image 1 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image1" class="form-label">Product_image</label>
                    <input type="file" name="product_image" id="product_image" class="form-control"
                         require>
                </div>

                <!-- product price -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product price</label>
                    <input type="number" name="product_price" id="product_price" class="form-control"
                        placeholder="Enter product price" autocomplete="off" require>
                </div>
                <div class="form-outline mb-4 w-50 m-auto bg-infor">
                    <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Producs">
                </div>

            </form>
                <?php
                ?>
            
            <?php
            // Check if form is submitted
            if (isset($_POST['insert_product'])) {

                // Get form data and sanitize input
                $product_title = mysqli_real_escape_string($conn, $_POST['product_title']);
                $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
                $product_keywords = mysqli_real_escape_string($conn, $_POST['product_keywords']);
                $product_category = mysqli_real_escape_string($conn, $_POST['product_category']);
                $product_price = floatval($_POST['product_price']);
                $product_status = 1; // set to boolean value
            
                // Accessing images
                $product_image = $_FILES['product_image']['name'];

                // Accessing image tmp name
                $tmp_image = $_FILES['product_image']['tmp_name'];

                // Checking empty condition
                
                
                // if (isset($_GET[$product_title and $product_description and $product_description and $product_keywords and $product_category and $product_image and $product_price])) {
                //     echo "yes";
                // } else {
                //     echo "no";
                //     die();
                // }
                if (empty($product_title) || empty($product_description) || empty($product_keywords) || empty($category_title) || empty($product_price) || empty($product_image)) {
                    $_SESSION['empty-msg'] = "<div class='warning-msg'>Please fill all the available fields.</div>";
                    header("location: insert_product.php");
                    die();
                }

                // Prepare and bind statement to insert data
                $stmt = $conn->prepare("INSERT INTO tbl_products (product_title, product_description, product_keywords, category_title, product_image, product_price, date, status) VALUES (?, ?, ?, ?, ?, ?, NOW(), ?)");
                $stmt->bind_param("sssssdi", $product_title, $product_description, $product_keywords, $product_category, $product_image, $product_price, $product_status);

                // Execute statement and save data in database
                if ($stmt->execute()) {
                    $_SESSION['add'] = "<div class='success-msg'>Product inserted successfully.</div>";
                    // Redirect to the admin page
                    header("location: index.php");
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