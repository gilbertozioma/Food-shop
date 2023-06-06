<?php
// include('../includes/config.php');
// include ('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Com</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <!-- Font Awesome  Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custome CSS -->
    <link rel="stylesheet" href="../styles.css">
    <!-- Custome CSS2 -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body class="">

    <!-- Login Nav-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">


            <?php
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'> <a class='nav-link' href='profile.php'>Welcom Guest</a>
            </li>";
            } else {
                echo "<li class='nav-item'>
                <a class='nav-link' href='profile.php'>Welcom " . $_SESSION['username'] . "</a>
            </li>";
            }
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
                <a class='nav-link' href='./user_login.php'>Login</a>
            </li>";
            } else {
                echo "<li class='nav-item'>
                <a class='nav-link' href='user_logout.php'>Logout</a>
            </li>";
            }
            ?>


        </ul>
    </nav>


    <!-- Navbar -->
    <div class="container-fluid p-0"></div>
    <!-- First Nav -->
    <nav class="navbar navbar-expand-lg nav-bg " bg-body-tertiary>
        <div class="container-fluid">
            <a href="#"><img class="logoo" src="../admin/product_images/Logo2.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-light" id="navbarSupportedContent" class="text-light">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../display_all.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="user_registration.php">Register</a>
                    </li>
                </ul>
                <!-- Search form -->
                <form action="search_product.php" method="get" role="search" class="form-inline " style="width: 149px;">
                    <div class="input-group">
                        <input type="search" name="search_data" class="form-control bg-light rounded-0 h-25" placeholder="Search">
                        <div class="input-group-prepend">
                            <button type="submit" class="border-1 bg rounded-0  h-100 text-white input-group-text" name="search_data_product"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>


    <!-- Fourth Child -->
    <div class="row px-1">
        <div class="col-md-12">

        </div>
        <div class="row">
            <?php
            if (!isset($_SESSION['username'])) {
                include('user_login.php');
            } else {
                include('payment.php');
                // echo "<script>window.open('payment.php','_self')</script>";
            }
            ?>
        </div>
    </div>

    <div>
        <?php
        include('../includes/footer_user.php');
        ?>
    </div>