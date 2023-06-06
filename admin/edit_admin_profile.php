<!-- /////////////////////////////////////////////////////////////////////// -->

<!-- CHATGTP MODIFICATION -->

<?php
if (isset($_GET['edit_admin_profile'])) {
    $admin_name = $_SESSION['admin_name'];
    $sql = "SELECT * FROM tbl_admin WHERE admin_name = '$admin_name'";
    $res = mysqli_query($conn, $sql);
    $fetch_admin = mysqli_fetch_assoc($res);
    $admin_id = $fetch_admin['admin_id'];
    $admin_name = $fetch_admin['admin_name'];
    $admin_email = $fetch_admin['admin_email'];
    $admin_password = $fetch_admin['admin_password'];

    if (isset($_POST['admin_update'])) {
        // Get form data and sanitize input
        $update_id = $admin_id;
        $admin_name = mysqli_real_escape_string($conn, $_POST['admin_name']);
        $admin_email = mysqli_real_escape_string($conn,  $_POST['admin_email']);
        $old_password = $_POST['old_password']; // Don't hash the old password
        $new_password = $_POST['new_password']; // Don't hash the new password
        $admin_image = $_FILES['admin_image']['name'];
        $admin_tmp_image = $_FILES['admin_image']['tmp_name'];

        // Checking empty condition
        if (empty($admin_name) || empty($admin_email) || empty($admin_image) || empty($old_password) || empty($new_password)) {
            echo "<script>alert('Please fill all the available fields.')</script>";
            echo "<script>window.open('index.php?edit_account','_self')</script>";
            die();
        }

        // Checking if old password is correct
        if (!password_verify($old_password, $admin_password)) {
            echo "<script> alert('Old password do not match.')</script>";
        } else {
            // Hash the new password
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);

            // INSERT QUERY
            move_uploaded_file($admin_tmp_image, "./admin_images/$admin_image");
            $sql2 = "UPDATE tbl_admin SET admin_name = ?, admin_email = ?, admin_password = ?, admin_image = ? WHERE admin_id = ?";
            $stmt2 = mysqli_prepare($conn, $sql2);
            mysqli_stmt_bind_param($stmt2, "ssssi", $admin_name, $admin_email, $new_password, $admin_image, $update_id);
            $res2 = mysqli_stmt_execute($stmt2);

            if ($res2) {
                echo "<script>alert('Data updated successfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
    <style>
        .m img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data" class="bg-light w-50 m-auto mb-4 py-3 px-3 rounded-3">
        <h3 class="text-success text-center mb-4">Edit Admin Profile</h3>
        <div class="">
            <label for="">Name</label>
            <div class="form-outline mb-4 text-center">
                <input type="text" class="form-control w-70 m-auto" placeholder="Change Name" name="admin_name" value="<?php echo $admin_name; ?>">
            </div>
            <label for="">Email</label>
            <div class="form-outline mb-4 text-center">
                <input type="email" class="form-control w-70 m-auto" name="admin_email" value="<?php echo $admin_email; ?>">
            </div>
            <label for="">Image</label>
            <div class="form-outline mb-4 text-center">
                <input type="file" class="form-control w-70 m-auto" name="admin_image">
            </div>
            <label for="">Old Password</label>
            <div class="form-outline mb-4 text-center">
                <input type="password" class="form-control w-70 m-auto" placeholder="Your Old Password" name="old_password">
            </div>
            <label for="">New Password</label>
            <div class="form-outline mb-4 text-center">
                <input type="password" class="form-control w-70 m-auto" placeholder="Your New Password" name="new_password">
            </div>
            <div class="form-outline mb-4 text-center">
                <input type="submit" value="Update" class="w-70 b border-0 btn btn-primary" name="admin_update">
            </div>
        </div>
    </form>
</body>

</html>