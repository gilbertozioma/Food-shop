<?php
// session_start();
// Check if form is submitted
if (isset($_GET['edit_lunch'])) {

    echo '<pre>';
    var_dump(isset($_GET['edit_lunch']));
    echo '</pre>';

    $edit_id = $_GET['edit_lunch'];
    $get_data = "SELECT * FROM tbl_lunch WHERE lunch_id = $edit_id";
    $res = mysqli_query($conn, $get_data);
    $row = mysqli_fetch_assoc($res);

    // Get form data and sanitize input
    $lunch_title = $row['lunch_title'];
    $lunch_description = $row['lunch_description'];
    $lunch_keywords = $row['lunch_keywords'];
    $category_title = $row['category_title'];
    $lunch_price = $row['lunch_price'];
    // $lunch_status = 1; // set to boolean value

    // Accessing images
    $lunch_image = $row['lunch_image'];

    // fetching category name
    $select_cat = "SELECT * FROM tbl_categories WHERE category_title = '$category_title'";
    $res_cat = mysqli_query($conn, $select_cat);
    $row_cat = mysqli_fetch_assoc($res_cat);
    $category_title = $row_cat['category_title'];
}
?>

<div class="container">
    <h1 class=" text-success text-center">Edit Lunch</h1>
    <!-- Form -->

    <div class="shadow-sm wrapper border bg-body-secondary rounded-4 mt-4 w-50 m-auto mb-4">
        <form class="formm my-4 w-100 m-auto" action="" method="POST" enctype="multipart/form-data">
            <br>
            <?php include('../includes/session.php'); ?>
            <!-- title -->

            <div class="form-outline mb-4 mt-4 w-50 m-auto">
                <label for="lunch_title" class="form-label">Lunch title</label>
                <input type="text" name="lunch_title" id="lunch_title" class="form-control" autocomplete="off" require value="<?php echo $lunch_title ?>">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="lunch_description" class="form-label">Lunch discription</label>
                <input type="text" name="lunch_description" id="description" class="form-control" value="<?php echo $lunch_description ?>" autocomplete="off" require>
            </div>
            <!-- lunch keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="lunch_keyword" class="form-label">Lunch keyword</label>
                <input type="text" name="lunch_keywords" id="lunch_keyword" class="form-control" value="<?php echo $lunch_keywords ?>" autocomplete="off" require>
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="lunch_category">Lunch Category</label>
                <select name="lunch_category" id="" class="form-select">
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

            <!-- lunch_image -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="lunch_image" class="form-label">Lunch_image 1</label>
                <input type="file" name="lunch_image" id="lunch_image" class="form-control w-90" placeholder="Insert Lunch_image" require>
                <img src="product_images/<?php echo $lunch_image ?>" alt="image" class="imgg2">
            </div>

            <!-- lunch price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="lunch_price" class="form-label">Lunch price</label>
                <input type="number" name="lunch_price" id="lunch_price" class="form-control" value="<?php echo $lunch_price ?>" autocomplete="off" require>
            </div>
            <div class="form-outline mb-4 w-50 m-auto bg-infor">
                <input type="submit" name="edit_lunch" class="btn bg mb-3 px-3" value="Update Lunch">
            </div>
        </form>

        <?php
        ob_start();


        // /////////////////////////////////////////////////////////////////////
        // Check if form is submitted
        if (isset($_POST['edit_lunch'])) {

            // Get form data and sanitize input
            $lunch_title = mysqli_real_escape_string($conn, $_POST['lunch_title']);
            $lunch_description = mysqli_real_escape_string($conn, $_POST['lunch_description']);
            $lunch_keywords = mysqli_real_escape_string($conn, $_POST['lunch_keywords']);
            $lunch_category = mysqli_real_escape_string($conn, $_POST['lunch_category']);
            $lunch_price = floatval($_POST['lunch_price']);
            $lunch_status = 1; // set to boolean value

            // Accessing images
            $lunch_image = $_FILES['lunch_image']['name'];

            // Accessing image tmp name
            $tmp_image = $_FILES['lunch_image']['tmp_name'];


            // Checking empty condition
            if (empty($lunch_title) || empty($lunch_description) || empty($lunch_keywords) || empty($lunch_category) || empty($lunch_price) || empty($lunch_image)) {

                echo "<script>alert('Please fill all the available fields.')</script>";
                // header("location: edit_lunch.php");
                die();
            } else {
                move_uploaded_file($tmp_image, "./product_images/$lunch_image");

                // Prepare and bind statement to insert data
                $update_lunch = "UPDATE tbl_lunch SET lunch_title = '$lunch_title', lunch_description = '$lunch_description', lunch_keywords = '$lunch_keywords', category_title = '$lunch_category', lunch_image = '$lunch_image', lunch_price = '$lunch_price', date = NOW() WHERE lunch_id = $edit_id";

                // Execute statement and save data in database
                $res = mysqli_query($conn, $update_lunch);
                if ($res) {
                    // Redirect to the admin page
                    echo "<script>window.open('./index.php','_self')</script>";

                    $_SESSION['add'] = "<div class='success-msg'>Lunch updated successfully.</div>";
                }
                ob_end_flush();
            }
        }
        ?>

    </div>

</div>