<?php

// session_start();
// Check if form is submitted
if (isset($_GET['edit_carousel'])) {

    $edit_id = $_GET['edit_carousel'];
    $get_data = "SELECT * FROM tbl_carousel WHERE product_id = $edit_id";
    $res = mysqli_query($conn, $get_data);
    $row = mysqli_fetch_assoc($res);

    // Get form data and sanitize input
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];

    // Accessing images
    $product_image = $row['product_image'];
}
?>

<div class="container">
    <h1 class=" text-success text-center">Edit Carousel</h1>
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
            <!-- product_image -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_image1" class="form-label">Product_image</label>
                <input type="file" name="product_image" id="product_image" class="form-control w-90" require>
                <img src="product_images/<?php echo $product_image ?>" alt="image" class="imgg2">
            </div>
            <div class="form-outline mb-4 w-50 m-auto bg-infor">
                <input type="submit" name="edit_carousel" class="btn text-light bg mb-3 px-3" value="Update Carousel">
            </div>
        </form>

        <?php
        ob_start();


        // /////////////////////////////////////////////////////////////////////
        // Check if form is submitted
        if (isset($_POST['edit_carousel'])) {

            // Get form data and sanitize input
            $product_title = mysqli_real_escape_string($conn, $_POST['product_title']);
            $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);

            // Accessing images
            $product_image = $_FILES['product_image']['name'];

            // Accessing image tmp name
            $tmp_image = $_FILES['product_image']['tmp_name'];

            // Checking empty condition
            if (empty($product_title) || empty($product_description) || empty($product_image)) {
                // echo "<script>window.open('./index.php','_self')</script>";

                // $_SESSION['empty-msg'] = "<div class='warning-msg'>Please fill all the available fields.</div>";
                echo "<script>alert('Please fill all the available fields.')</script>";
                // header("location: edit_product.php");
                die();
            } else {
                move_uploaded_file($tmp_image, "./product_images/$product_image");

                // Prepare and bind statement to insert data
                $update_product = "UPDATE tbl_carousel SET product_title = '$product_title', product_description = '$product_description', product_image = '$product_image' WHERE product_id = $edit_id";

                // Execute statement and save data in database
                $res = mysqli_query($conn, $update_product);
                if ($res) {
                    // Redirect to the admin page
                    echo "<script>window.open('./index.php')</script>";

                    $_SESSION['add'] = "<div class='success-msg'>Carousel inserted successfully.</div>";
                }
                ob_end_flush();


                // if ($stmt->execute()) {
                //     $_SESSION['add'] = "<div class='success-msg'>Product inserted successfully.</div>";
                //     // Redirect to the admin page
                //     header("location: index.php");
                //     // exit();
                // }

                // else {
                //     echo "<script>alert('Faild to insert product, please check your connection.')</script>";
                // }
            }
        }
        ?>

    </div>

</div>