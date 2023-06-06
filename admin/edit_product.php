<?php

// session_start();
// Check if form is submitted
if (isset($_GET['edit_product'])) {

    $edit_id = $_GET['edit_product'];
    $get_data = "SELECT * FROM tbl_products WHERE product_id = $edit_id";
    $res = mysqli_query($conn, $get_data);
    $row = mysqli_fetch_assoc($res);

    // Get form data and sanitize input
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_title = $row['category_title'];
    $product_price = $row['product_price'];
    // $product_status = 1; // set to boolean value

    // Accessing images
    $product_image = $row['product_image'];

    // fetching category name
    $select_cat = "SELECT * FROM tbl_categories WHERE category_title = '$category_title'";
    $res_cat = mysqli_query($conn, $select_cat);
    $row_cat = mysqli_fetch_assoc($res_cat);
    $category_title = $row_cat['category_title'];
}
?>

<div class="container">
    <h1 class=" text-success text-center">Edit Products</h1>
    <!-- Form -->

    <div class="shadow-sm wrapper border bg-body-secondary rounded-4 mt-4 w-50 m-auto mb-4">
        <form class="formm my-4 w-100 m-auto" action="" method="POST" enctype="multipart/form-data">
            <br>
            <?php include('../includes/session.php'); ?>
            <!-- title -->

            <div class="form-outline mb-4 mt-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" autocomplete="off" require value="<?php echo $product_title ?>">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product discription</label>
                <input type="text" name="product_description" id="description" class="form-control" value="<?php echo $product_description ?>" autocomplete="off" require>
            </div>
            <!-- product keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product keyword</label>
                <input type="text" name="product_keywords" id="product_keyword" class="form-control" value="<?php echo $product_keywords ?>" autocomplete="off" require>
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>

                    <?php
                    $select_cat = "SELECT * FROM tbl_categories";
                    $result_cat = mysqli_query($conn, $select_cat);

                    // Loop through the "tbl_categories" table in the database and fetch the datas 
                    while ($row = mysqli_fetch_assoc($result_cat)) {
                        $category_title = $row['category_title'];
                        $category_title = $row['category_title'];
                        echo "<option value='$category_title'>$category_title</option>";
                    }
                    ?>


                </select>
            </div>
            <!-- product_image -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_image" class="form-label">Product_image</label>
                <input type="file" name="product_image" id="product_image" class="form-control w-90" require>
                <img src="product_images/<?php echo $product_image ?>" alt="image" class="imgg2">
            </div>
            <!-- product price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="number" name="product_price" id="product_price" class="form-control" value="<?php echo $product_price ?>" autocomplete="off" require>
            </div>
            <div class="form-outline mb-4 w-50 m-auto bg-infor">
                <input type="submit" name="edit_product" class="btn bg mb-3 px-3" value="Update Product">
            </div>
        </form>

        <?php
        ob_start();


        // /////////////////////////////////////////////////////////////////////
        // Check if form is submitted
        if (isset($_POST['edit_product'])) {

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
            if (empty($product_title) || empty($product_description) || empty($product_keywords) || empty($product_category) || empty($product_price) || empty($product_image)) {
                echo "<script>alert('Please fill all the available fields.')</script>";
                // header("location: edit_product.php");
                die();
            } else {
                move_uploaded_file($tmp_image, "./product_images/$product_image");

                // Prepare and bind statement to insert data
                $update_product = "UPDATE tbl_products SET product_title = '$product_title', product_description = '$product_description', product_keywords = '$product_keywords', category_title = '$product_category', product_image = '$product_image', product_price = '$product_price', date = NOW() WHERE product_id = $edit_id";

                // Execute statement and save data in database
                $res = mysqli_query($conn, $update_product);
                if ($res) {
                    // Redirect to the admin page
                    echo "<script>window.open('./index.php')</script>";

                    $_SESSION['add'] = "<div class='success-msg'>Product inserted successfully.</div>";
                }
                ob_end_flush();
            }
        }
        ?>

    </div>

</div>