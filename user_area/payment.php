<?php
include('../includes/config.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <!-- Custome CSS2 -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Font Awesome  Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custome CSS -->
    <link rel="stylesheet" href="../styles.css">
    <style>
        body {
            overflow-x: hidden;
        }

        .pay {
            width: 400px;
            margin: auto;
            display: block;
        }
    </style>
</head>

<body>
    <!-- php code to access user id -->
    <?php
    $user_ip = getIPAddress();
    $get_user = "SELECT * FROM tbl_user WHERE user_ip = '$user_ip'";
    $res = mysqli_query($conn, $get_user);
    $fetch_user = mysqli_fetch_array($res);
    $user_id = $fetch_user['user_id'];
    ?>
    <div class="container">
        <h2 class="text-center text-info">Paymet Options</h2>
        <div class="row d-flex justify-content-center align-items-center mt-5">

            <div class="col-md-6">
                <a href="http://www.paypal.com" target="blank"><img class="pay" src="../admin/product_images/paypal-credit.png" alt="payment"></a>
            </div>

            <div class="col-md-6 mt-5">
                <a href="./order.php?user_id=<?php echo $user_id ?>">
                    <h2 class="text-center">Pay offline</h2>
                </a>
            </div>

        </div>
    </div>



    <!-- Bootstrap js Link -->
    <script src="../bootstrap-5/js/bootstrap.min.js"></script>

</body>

</html>