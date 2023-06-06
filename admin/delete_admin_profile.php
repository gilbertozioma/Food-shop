<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        .bg-primary:hover {
            background-color: #0b5edb !important;
            transition: .3s;
        }

        .bg-danger:hover {
            background-color: #c22232 !important;
            transition: .3s;
        }
    </style>
</head>

<body>
    <div class="bg-light w-50 m-auto mb-4 py-3 px-3 rounded-3">
        <h2 class="text-center text-danger mb-4">Delete</h2>
        <form action="" method="post" class="mt-5">
            <div class="form-outline mb-4">
                <input type="submit" class="bg-danger w-50 m-auto form-control text-light " name="delete" value="Delete Account">
            </div>
            <div class="form-outline mb-4">
                <input type="submit" class="bg-primary w-50 m-auto form-control text-light " name="dont_delete" value="Don't Delete Account">
            </div>
        </form>
    </div>

    <?php
        $admin_name = $_SESSION['admin_name'];
    if(isset($_POST['delete'])){
        $delete_query = "DELETE FROM tbl_admin WHERE admin_name = '$admin_name'";
        $res = mysqli_query($conn, $delete_query);
        if($res){
            echo "<script>alert('Admin deleted successful')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";
        }
    }
    if(isset($_POST['dont_delete'])){
        echo "<script>window.open('index.php','_self')</script>";
    }
    ?>
</body>

</html>