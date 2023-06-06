<?php
include('includes/config.php');
session_start();
include('functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Com</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="./bootstrap-5/css/bootstrap.min.css">
    <!-- Font Awesome  Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custome CSS -->
    <link rel="stylesheet" href="styles.css">
    <!-- Custome CSS2 -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Internal CSS -->
    <style>
        body {
            overflow-x: hidden;
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

<body class="bg-light">
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
                        <a class="nav-link text-light" href="index.php">Back to Home</a>
                    </li>
                </ul>
                <!-- Search form -->
                <form action="search_product.php" method="get" role="search" class="form-inline " style="width: 149px;">
                    <div class="input-group">
                        <input type="search" name="search_data" class="form-control bg-light rounded-0 h-25" placeholder="Search">
                        <div class="input-group-prepend">
                            <button type="submit" class="border-1 rounded-0  h-100 text-white input-group-text" name="search_data_product"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <!-- User profile -->
                <div class="row">
                    <div class="ms-5 me-3 text-light">
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
                </div>
                <!-- Cart -->
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
    <div class="mt-3 third-div">
        <h3 class="text-center h3-food">Product Details</h3>
    </div>
    <br><br>

    <!-- Fourth Child -->
    <div class="row">
        <div class="col-md-12">
            <!-- Products -->
            <div class="row">

                <!-- Fetching data -->
                <?php
                // Calling function
                view_details();

                // Calling breakfast function
                view_breakfast_details();

                // Calling lunch function
                view_lunch_details();

                // Calling dinner function
                view_dinner_details();
                ?>
            </div>
        </div>
    </div>

        <?php
        include('./includes/footer.php');
        ?>