<?php
// session_start();
// Check if form is submitted

if (isset($_GET['edit_dinner'])) {

    
    $edit_id = $_GET['edit_dinner'];

    $get_data = "SELECT * FROM tbl_dinner WHERE dinner_title = '$edit_id'";
    $res = mysqli_query($conn, $get_data);
    $row = mysqli_fetch_assoc($res);
    
    // Get form data and sanitize input
    $dinner_title = $row['dinner_title'];
    $dinner_description = $row['dinner_description'];
    $dinner_keywords = $row['dinner_keywords'];
    $category_title = $row['category_title'];
    $dinner_price = $row['dinner_price'];
    // $dinner_status = 1; // set to boolean value
    
    // Accessing images
    $dinner_image = $row['dinner_image'];
    
    // fetching category name
    $select_cat = "SELECT * FROM tbl_categories WHERE category_title = '$category_title'";
    $res_cat = mysqli_query($conn, $select_cat);
    $row_cat = mysqli_fetch_assoc($res_cat);
    $category_title = $row_cat['category_title'];

    echo '<pre>';
    var_dump(isset($row));
    echo '</pre>';
}
?>

<div class="container">
    <h1 class=" text-success text-center">Edit Dinner</h1>
    <!-- Form -->

    <div class="shadow-sm wrapper border bg-body-secondary rounded-4 mt-4 w-50 m-auto mb-4">
        <form class="formm my-4 w-100 m-auto" action="" method="POST" enctype="multipart/form-data">
            <br>
            <?php include('../includes/session.php'); ?>
            <!-- title -->

            <div class="form-outline mb-4 mt-4 w-50 m-auto">
                <label for="dinner_title" class="form-label">Dinner title</label>
                <input type="text" name="dinner_title" id="dinner_title" class="form-control" autocomplete="off" require value="<?php echo $dinner_title ?>">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="dinner_description" class="form-label">Dinner discription</label>
                <input type="text" name="dinner_description" id="description" class="form-control" value="<?php echo $dinner_description ?>" autocomplete="off" require>
            </div>
            <!-- dinner keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="dinner_keyword" class="form-label">Dinner keyword</label>
                <input type="text" name="dinner_keywords" id="dinner_keyword" class="form-control" value="<?php echo $dinner_keywords ?>" autocomplete="off" require>
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="dinner_category">Dinner Category</label>
                <select name="dinner_category" id="" class="form-select">
                    <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>

                    <?php
                    $select_cat = "SELECT * FROM tbl_categories";
                    $result_cat = mysqli_query($conn, $select_cat);

                    // Loop through the "tbl_categories" table in the database and fetch the datas 
                    while ($row = mysqli_fetch_assoc($result_cat)) {
                        $category_title = $row['category_title'];
                        echo "<option value='$category_title'>$category_title</option>";
                    }
                    ?>


                </select>
            </div>

            <!-- dinner_image -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="dinner_image" class="form-label">Dinner_image 1</label>
                <input type="file" name="dinner_image" id="dinner_image" class="form-control w-90" placeholder="Insert Dinner_image" require>
                <img src="product_images/<?php echo $dinner_image ?>" alt="image" class="imgg2">
            </div>

            <!-- dinner price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="dinner_price" class="form-label">Dinner price</label>
                <input type="number" name="dinner_price" id="dinner_price" class="form-control" value="<?php echo $dinner_price ?>" autocomplete="off" require>
            </div>
            <div class="form-outline mb-4 w-50 m-auto bg-infor">
                <input type="submit" name="edit_dinner" class="btn bg mb-3 px-3" value="Update Dinner">
            </div>
        </form>


        <?php
        ob_start();
        // /////////////////////////////////////////////////////////////////////
        // Check if form is submitted
        if (isset($_POST['update_dinner'])) {
            // Get form data and sanitize input
            $dinner_title = mysqli_real_escape_string($conn, $_POST['dinner_title']);
            $dinner_description = mysqli_real_escape_string($conn, $_POST['dinner_description']);
            $dinner_keywords = mysqli_real_escape_string($conn, $_POST['dinner_keywords']);
            $dinner_category = mysqli_real_escape_string($conn, $_POST['dinner_category']);
            $dinner_price = mysqli_real_escape_string($conn, $_POST['dinner_price']);

            // Check if the category has changed
            if ($dinner_category !== $category_title) {
                // // Delete the item from the current category's table
                // $delete_query = "DELETE FROM tbl_dinner WHERE dinner_id = $edit_id";
                // mysqli_query($conn, $delete_query);

                // Insert the item into the new category's table
                $insert_query = "";
                switch ($dinner_category) {
                    case 'lunch':
                        $insert_query = "INSERT INTO tbl_lunch (dinner_title, dinner_description, dinner_keywords, dinner_image, dinner_price) VALUES ('$dinner_title', '$dinner_description', '$dinner_keywords', '$dinner_image', '$dinner_price')";
                        break;
                    case 'breakfast':
                        $insert_query = "INSERT INTO tbl_breakfast (dinner_title, dinner_description, dinner_keywords, dinner_image, dinner_price) VALUES ('$dinner_title', '$dinner_description', '$dinner_keywords', '$dinner_image', '$dinner_price')";
                        break;
                        // Add more cases if you have additional categories
                    default:
                        // Invalid category
                        echo "<script>alert('Invalid category.')</script>";
                        die();
                }
                mysqli_query($conn, $insert_query);

                // Display success message
                // Redirect to the admin page
                echo "<script>window.open('./index.php','_self')</script>";

                $_SESSION['category_change'] = "<div class='success-msg'>Dinner item has been moved to $dinner_category table.</div>";
            } else {
                // If the category has not changed, execute your default code here
                $update_query = "UPDATE tbl_dinner SET dinner_title = '$dinner_title', dinner_description = '$dinner_description', dinner_keywords = '$dinner_keywords', dinner_price = '$dinner_price' WHERE dinner_id = $edit_id";
                mysqli_query($conn, $update_query);

                // Display success message
                // Redirect to the admin page
                echo "<script>window.open('./index.php','_self')</script>";

                $_SESSION['add'] = "<div class='success-msg'>Dinner item has been updated.</div>";
            }
        }
        ob_end_flush();
        ?>

    </div>

</div>