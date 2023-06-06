<?php

// session_start();
// Check if form is submitted
if (isset($_GET['edit_chef'])) {

    $edit_id = $_GET['edit_chef'];
    $get_data = "SELECT * FROM tbl_chef WHERE chef_id = $edit_id";
    $res = mysqli_query($conn, $get_data);
    $row = mysqli_fetch_assoc($res);

    // Get form data and sanitize input
    $chef_name = $row['chef_name'];
    $chef_position = $row['chef_position'];

    // Accessing images
    $chef_image = $row['chef_image'];
}
?>

<div class="container">
    <h1 class=" text-success text-center">Edit Chef</h1>
    <!-- Form -->

    <div class="shadow-sm wrapper border bg-body-secondary rounded-4 mt-4 w-50 m-auto mb-4">
        <form class="formm my-4 w-100 m-auto" action="" method="POST" enctype="multipart/form-data">
            <br>
            <?php include('../includes/session.php'); ?>
            <!-- Chef name -->

            <div class="form-outline mb-4 mt-4 w-50 m-auto">
                <label for="chef_name" class="form-label">Chef name</label>
                <input type="text" name="chef_name" id="chef_name" class="form-control" autocomplete="off" require value="<?php echo $chef_name ?>">
            </div>
            <!-- Chef Position -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="chef_position" class="form-label">Chef Position</label>
                <input type="text" name="chef_position" id="chef_position" class="form-control" value="<?php echo $chef_position ?>" autocomplete="off" require>
            </div>
            <!-- Chef_Image -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="chef_image" class="form-label">Chef_image</label>
                <input type="file" name="chef_image" id="chef_image" class="form-control w-90" value="Insert Chef_Image" require>
                <img src="product_images/<?php echo $chef_image ?>" alt="image" class="imgg2">
            </div>
            <div class="form-outline mb-4 w-50 m-auto bg-infor">
                <input type="submit" name="edit_chef" class="btn bg text-light mb-3 px-3" value="Update Chef">
            </div>
        </form>

        <?php

        // /////////////////////////////////////////////////////////////////////
        // Check if form is submitted
        if (isset($_POST['edit_chef'])) {

            // Get form data and sanitize input
            $chef_name = mysqli_real_escape_string($conn, $_POST['chef_name']);
            $chef_position = mysqli_real_escape_string($conn, $_POST['chef_position']);

            // Accessing images
            $chef_image = $_FILES['chef_image']['name'];

            // Accessing image tmp name
            $tmp_image = $_FILES['chef_image']['tmp_name'];

            // Checking empty condition
            if (empty($chef_name) || empty($chef_position) || empty($chef_image)) {

                echo "<script>alert('Please fill all the available fields.')</script>";
                // header("location: edit_chef.php");
                die();
            } else {
                move_uploaded_file($tmp_image, "./chef_images/$chef_image");

                // Prepare and bind statement to insert data
                $update_chef = "UPDATE tbl_chef SET chef_name = '$chef_name', chef_position = '$chef_position', chef_image = '$chef_image' WHERE chef_id = $edit_id";

                // Execute statement and save data in database
                $res = mysqli_query($conn, $update_chef);
                if ($res) {
                    // Redirect to the admin page
                    echo "<script>window.open('./index.php','_self')</script>";

                    $_SESSION['add'] = "<div class='success-msg'>Chef inserted successfully.</div>";
                }

            }
        }
        ?>

    </div>

</div>