<?php
// session_start();
// Check if form is submitted
if (isset($_GET['edit_breakfast'])) {

    $edit_id = $_GET['edit_breakfast'];
    $get_data = "SELECT * FROM tbl_breakfast WHERE breakfast_id = $edit_id";
    $res = mysqli_query($conn, $get_data);
    $row = mysqli_fetch_assoc($res);

    // Get form data and sanitize input
    $breakfast_title = $row['breakfast_title'];
    $breakfast_description = $row['breakfast_description'];
    $breakfast_keywords = $row['breakfast_keywords'];
    $category_title = $row['category_title'];
    $breakfast_price = $row['breakfast_price'];
    // $breakfast_status = 1; // set to boolean value

    // Accessing images
    $breakfast_image = $row['breakfast_image'];

    // fetching category name
    $select_cat = "SELECT * FROM tbl_categories WHERE category_title = '$category_title'";
    $res_cat = mysqli_query($conn, $select_cat);
    $row_cat = mysqli_fetch_assoc($res_cat);
    $category_title = $row_cat['category_title'];
}
?>

<div class="container">
    <h1 class=" text-success text-center">Edit Breakfast</h1>
    <!-- Form -->

    <div class="shadow-sm wrapper border bg-body-secondary rounded-4 mt-4 w-50 m-auto mb-4">
        <form class="formm my-4 w-100 m-auto" action="" method="POST" enctype="multipart/form-data">
            <br>
            <?php include('../includes/session.php'); ?>
            <!-- title -->

            <div class="form-outline mb-4 mt-4 w-50 m-auto">
                <label for="breakfast_title" class="form-label">Breakfast title</label>
                <input type="text" name="breakfast_title" id="breakfast_title" class="form-control" autocomplete="off" require value="<?php echo $breakfast_title ?>">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="breakfast_description" class="form-label">Breakfast discription</label>
                <input type="text" name="breakfast_description" id="description" class="form-control" value="<?php echo $breakfast_description ?>" autocomplete="off" require>
            </div>
            <!-- breakfast keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="breakfast_keyword" class="form-label">Breakfast keyword</label>
                <input type="text" name="breakfast_keywords" id="breakfast_keyword" class="form-control" value="<?php echo $breakfast_keywords ?>" autocomplete="off" require>
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="breakfast_category">Breakfast Category</label>
                <select name="breakfast_category" id="" class="form-select">
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

            <!-- breakfast_image -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="breakfast_image" class="form-label">Breakfast_image 1</label>
                <input type="file" name="breakfast_image" id="breakfast_image" class="form-control w-90" placeholder="Insert Breakfast_image" require>
                <img src="product_images/<?php echo $breakfast_image ?>" alt="image" class="imgg2">
            </div>

            <!-- breakfast price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="breakfast_price" class="form-label">Breakfast price</label>
                <input type="number" name="breakfast_price" id="breakfast_price" class="form-control" value="<?php echo $breakfast_price ?>" autocomplete="off" require>
            </div>
            <div class="form-outline mb-4 w-50 m-auto bg-infor">
                <input type="submit" name="edit_breakfast" class="btn text-light bg mb-3 px-3" value="Update Breakfast">
            </div>
        </form>

        <?php
        ob_start();


        // /////////////////////////////////////////////////////////////////////
        // Check if form is submitted
        if (isset($_POST['edit_breakfast'])) {

            // Get form data and sanitize input
            $breakfast_title = mysqli_real_escape_string($conn, $_POST['breakfast_title']);
            $breakfast_description = mysqli_real_escape_string($conn, $_POST['breakfast_description']);
            $breakfast_keywords = mysqli_real_escape_string($conn, $_POST['breakfast_keywords']);
            $breakfast_category = mysqli_real_escape_string($conn, $_POST['breakfast_category']);
            $breakfast_price = floatval($_POST['breakfast_price']);
            $breakfast_status = 1; // set to boolean value

            // Accessing images
            $breakfast_image = $_FILES['breakfast_image']['name'];

            // Accessing image tmp name
            $tmp_image = $_FILES['breakfast_image']['tmp_name'];


            // Checking empty condition
            if (empty($breakfast_title) || empty($breakfast_description) || empty($breakfast_keywords) || empty($breakfast_category) || empty($breakfast_price) || empty($breakfast_image)) {

                echo "<script>alert('Please fill all the available fields.')</script>";
                // header("location: edit_breakfast.php");
                die();
            } else {
                move_uploaded_file($tmp_image, "./product_images/$breakfast_image");

                // Prepare and bind statement to insert data into "tbl_breakfast" Table
                $update_breakfast = "UPDATE tbl_breakfast SET breakfast_title = '$breakfast_title', breakfast_description = '$breakfast_description', breakfast_keywords = '$breakfast_keywords', category_title = '$breakfast_category', breakfast_image = '$breakfast_image', breakfast_price = '$breakfast_price', date = NOW() WHERE breakfast_id = $edit_id";
                // Execute statement and save data in database
                $res = mysqli_query($conn, $update_breakfast);

                // Execute statement and save data in database
                $res = mysqli_query($conn, $update_breakfast);
                if ($res) {
                    // Redirect to the admin page
                    echo "<script>window.open('./index.php','_self')</script>";

                    $_SESSION['add'] = "<div class='success-msg'>Breakfast inserted successfully.</div>";
                }
                ob_end_flush();

            }
        }
        ?>

    </div>

</div>