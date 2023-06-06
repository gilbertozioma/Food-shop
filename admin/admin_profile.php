<?php
include('../includes/config.php');
session_start();
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcom <?php echo $_SESSION['username'] ?> </title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <!-- Font Awesome  Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custome CSS -->
    <link rel="stylesheet" href="../styles.css">
    <style>
        body {
            overflow-x: hidden;
        }

        .p-img {
            width: 80px;
            height: 80px;
            border-radius: 100%;
            object-fit: cover;
        }

        .p-li a:hover {
            border-bottom: 1px solid #F79F1F;
        }

        .input-group .input-group-prepend {
            margin-right: -1px;
        }

        .input-group .input-group-append {
            margin-left: -1px;
        }

        .input-group-text {
            background-color: transparent;
            height: 40px;
            /* border: none; */
        }

        .input-group-text:hover {
            background-color: #F79F1F;
            transition: .2s;
            cursor: pointer;
        }
    </style>
</head>

<body class="">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg nav-bg shadow sticky-top py-2">
        <div class="container-fluid">
            <a href="index.php"><img class="logoo" src="admin/product_images/Logo2.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse text-light" id="navbarSupportedContent" class="text-light">
                <ul class="navbar-nav ul-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="display_all.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">About</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link text-light" href="#">Conract</a>
                    </li>
                    <!-- Search form -->
                </ul>
                <form action="search_product.php" method="get" role="search" class="form-inline " style="width: 149px;">
                    <div class="input-group">
                        <input type="search" name="search_data" class="form-control bg-light rounded-0 h-25" placeholder="Search">
                        <div class="input-group-prepend">
                            <button type="submit" class="border-1 rounded-0  h-100 text-white input-group-text" name="search_data_product"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <!-- User profile -->
                <div class="row m-2">
                    <div class="me-2 text-light">
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "<div>
                                    <a class='nav-link text-light' href='./user_area/profile.php'><i class='fa-solid fa-user'></i></a>
                                </div>";
                        } else {
                            echo "<div'>
                                    <a class='nav-link text-light' href='./user_area/user_registration.php'><i class='fa-solid fa-user'></i></a>
                                </div>";
                        }
                        ?>
                    </div>
                    <!-- Cart -->
                </div>
                <div class="nav-item me-3">
                    <a class="nav-link text-light" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup class="bg-danger" style="border-radius: 50%; padding: 0 5px;"><?php echo cart_items(); ?></sup></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- CALLING CART FUNCTION -->
    <?php
    cart();
    ?>

    <!-- Third Child -->
    <div class="bg-light mb-4 third-div">
        <h2 class="text-center h3-food pt-2">Food Shop</h2>
        <p class="text-center fs-5">A hungry man is an angry man. Don't be hungry, be full and happy!</p>
    </div>

    <!-- Fouth child -->
    <div class="row">
        <div class="col-md-2 p-0">
            <ul class="navbar-nav bg-secondary text-center">

                <li class="nav-item nav-bg">
                    <a class="nav-link text-light" href="#">
                        <h4>Your Profile</h4>
                    </a>
                </li><br>

                <?php
                $username = $_SESSION['username'];
                $user_image = "SELECT * FROM tbl_user WHERE username = '$username'";
                $user_image = mysqli_query($conn, $user_image);
                $fetch_image = mysqli_fetch_array($user_image);
                $user_image = $fetch_image['user_image'];
                echo "<li class='nav-item mb-1'>
                        <img src='./user_images/$user_image' class='p-img' alt=''>
                    </li>";
                ?>
                <div class='related2 fs-5'>
                    <?php echo $username = $_SESSION['username'] ?>
                </div>
                <div class="p-li">
                    <hr>

                    <li class="nav-item mb-3">
                        <a class="text-decoration-none text-light" href="profile.php">Pending Orders</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="text-decoration-none text-light" href="profile.php?edit_account">Edit Account</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="text-decoration-none text-light" href="profile.php?my_orders">My Orders</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="text-decoration-none text-light" href="profile.php?delete_account">Delete Account</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="text-decoration-none text-light" href="user_logout.php">Logout</a>
                    </li>
                </div>
            </ul>
            <br>
        </div>

        <div class="col-md-10 ">
            <!-- CALLING ORDERS DETAILS FUNCTION -->
            <?php
            get_user_order_details();
            if (isset($_GET['edit_account'])) {
                include('edit_account.php');
            }
            if (isset($_GET['my_orders'])) {
                include('user_orders.php');
            }
            if (isset($_GET['delete_account'])) {
                include('delete_account.php');
            }
            ?>
        </div>

    </div>


    <!-- Bootstrap js Link -->
    <script src="../bootstrap-5/js/bootstrap.min.js"></script>

    <?php
    include('../includes/footer.php');
    ?>