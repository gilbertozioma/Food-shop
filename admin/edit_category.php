<?php
// session_start();

// fetching category name
if (isset($_GET['edit_category'])) {

    $edit_id = $_GET['edit_category'];
    $get_data = "SELECT * FROM tbl_categories WHERE category_id = $edit_id";
    $res = mysqli_query($conn, $get_data);
    $row = mysqli_fetch_assoc($res);

    // Get form data and sanitize input
    $category_title = $row['category_title'];
}
?>

<form action="" method="POST" class="mb-4 rounded-3 my-4 bg-light w-50 m-auto">
    <h3 class=" text-success text-center">Edit Category</h3>

    <div class="input-group mb-2 m-auto w-50">
        <span class="input-group-text nav-bg" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control w-50" name="category_title" value="<?php echo $category_title ?>" aria-label="categories" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-2 w-10 m-auto">
        <input type="submit" class="nav-bg border-0 m-auto p-2 rounded-3 my-3" name="edit_category" value="Edit Category">
    </div>
</form>

<?php
ob_start();

// Check if form is submitted
if (isset($_POST['edit_category'])) {

    // Get form data and sanitize input
    $category_title = mysqli_real_escape_string($conn, $_POST['category_title']);

    // Checking empty condition
    if ($category_title == '') {

        echo "<script>alert('Please fill the available field.')</script>";
        // header("location: edit_product.php");
        die();
    } else {

        // Prepare and bind statement to insert data
        $update_category = "UPDATE tbl_categories SET category_title = '$category_title' WHERE category_id = $edit_id";

        // Execute statement and save data in database
        $res = mysqli_query($conn, $update_category);
        if ($res == true) {
            // Redirect to the admin page
            echo "<script>window.open('./index.php','_self')</script>";

            $_SESSION['add'] = "<div class='success-msg'>Product updated successfully.</div>";
        }
        ob_end_flush();
    }
}
?>