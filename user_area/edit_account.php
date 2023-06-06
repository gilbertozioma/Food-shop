<?php
if (isset($_GET['edit_account'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM tbl_user WHERE username = '$username'";
    $res = mysqli_query($conn, $sql);
    $fetch_user = mysqli_fetch_assoc($res);
    $user_id = $fetch_user['user_id'];
    $user_username = $fetch_user['username'];
    $user_password = $fetch_user['user_password'];
    $user_email = $fetch_user['user_email'];
    $user_address = $fetch_user['user_address'];
    $user_contact = $fetch_user['user_contact'];

    if (isset($_POST['user_update'])) {
        // Get form data and sanitize input
        $update_id = $user_id;
        $user_username = mysqli_real_escape_string($conn, $_POST['user_username']);
        $old_password = password_hash($_POST['old_password'], PASSWORD_DEFAULT);
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $user_email = mysqli_real_escape_string($conn,  $_POST['user_email']);
        $user_address = mysqli_real_escape_string($conn,  $_POST['user_address']);
        $user_contact = mysqli_real_escape_string($conn,  $_POST['user_contact']);
        $user_image = $_FILES['user_image']['name'];
        $user_tmp_image = $_FILES['user_image']['tmp_name'];

        // Checking empty condition
        if (empty($user_username) || empty($old_password) || empty($new_password) || empty($user_email) || empty($user_address) || empty($user_contact) || empty($user_image)) {
            echo "<script>alert('Please fill all the available fields.')</script>";
            echo "<script>window.open('profile.php?edit_account','_self')</script>";
            die();
        }
        if (!password_verify($_POST['old_password'], $user_password)) {
            echo "<script> alert('Old password do not match.')</script>";
        }
        else{
            // INSERT QUERY
            move_uploaded_file($user_tmp_image, "./user_images/$user_image");
            $sql2 = "UPDATE tbl_user SET username = '$user_username', user_email = '$user_email', user_password = '$new_password', user_image = '$user_image', user_address = '$user_address', user_contact = '$user_contact' WHERE user_id = $update_id";
            $res2 = mysqli_query($conn, $sql2);

            if ($res2) {
            echo "<script>alert('Data updated successfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
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
        <h3 class="text-success text-center mb-4">Edit Account</h3>
        <?php include('../includes/session.php'); ?>
        <div class="m">
            <div class="form-outline mb-4 text-center">
                <input type="text" class="form-control w-70 m-auto" placeholder="Change Username" name="user_username" value="<?php echo $username; ?>">
            </div>
            <div class="form-outline mb-4 text-center">
                <input type="email" class="form-control w-70 m-auto" placeholder="Change Email" name="user_email" value="<?php echo $user_email; ?>">
            </div>
            <div class="form-outline mb-4 text-center">
                <input type="text" class="form-control w-70 m-auto" placeholder="Change Address" name="user_address" value="<?php echo $user_address; ?>">
            </div>
            <div class="form-outline mb-4 text-center">
                <input type="text" class="form-control w-70 m-auto" placeholder="Change Phone Number" name="user_contact" value="<?php echo $user_contact; ?>">
            </div>
            <div class="form-outline mb-4 text-center">
                <input type="password" class="form-control w-70 m-auto" placeholder="Your Old Password" name="old_password">
            </div>
            <div class="form-outline mb-4 text-center">
                <input type="password" class="form-control w-70 m-auto" placeholder="Your New Password" name="new_password">
            </div>
            <div class=" form-outline mb-4 text-center">
                <input type="file" class="form-control w-70 m-auto" name="user_image">
            </div>
            <div class="form-outline mb-4 text-center">
                <input type="submit" value="Update" class="w-70 b border-0 btn btn-primary" name="user_update">
            </div>
        </div>
        
    </form>
</body>

</html>