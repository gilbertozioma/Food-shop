<?php
// include('../includes/config.php')
?>

<form action="" method="POST" class="mb-4 rounded-3 my-4 bg-light w-50 m-auto">
    <h2 class="text-center mb-5">Add Category</h2>
    <div class="input-group mb-2 m-auto w-50">
        <span class="input-group-text nav-bg" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control w-50" name="cat_title" placeholder="Add Category" aria-label="categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-2 w-10 m-auto">
        <input type="submit" class="nav-bg border-0 m-auto p-2 rounded-3 my-3" name="insert_cat" value="Add Category">
    </div>
</form>

<?php
// Store data gotten from the Form value into Database
// Check if "Add Category" button is clicked or not
$res = null; //definding and initiallizing $res
if (isset($_POST['insert_cat'])) {

    // Get the Data from Form
    $ct = $_POST['cat_title'];


    //1. To prevent same data to be stored to the database
    $sql_select = "SELECT * FROM tbl_categories WHERE category_title='$ct'";
    //2. Execute Query and save Data in database
    $res_select = mysqli_query($conn, $sql_select) or die(mysqli_error());

    $count = mysqli_num_rows($res_select);
    if ($count > 0) {
        echo "<script>alert('This Category is already existing in the Database.')</script>";
    } else {

        //3. SQL Query to save the data into database
        $sql = "INSERT INTO tbl_categories SET category_title='$ct'";
        //4. Execute Query and save Data in database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
    }

    //5. Chech whether the (Query is Executed) data is inserted or not and display appropriate message
    if ($res) {
        echo "<script>alert('Category added successfull.')</script>";
    } else {
        // exit();
        echo "<script>alert('Category did not upload.')</script>";
    }
}
?>