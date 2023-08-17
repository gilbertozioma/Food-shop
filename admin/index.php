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
    <title>Admin Dashbord</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <!-- Font Awesome  Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custome CSS -->
    <link rel="stylesheet" href="../styles.css">
    <!-- Custome CSS2 -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Internal CSS -->
    <style>
        body {
            overflow-x: hidden;
        }

        .imgg {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .imgg2 {
            width: 40px;
            height: 40px;
            object-fit: contain;
            border-radius: 100%;
        }

        /* .pro {
            height: 100vh !important;

        } */

        .sb-li a:hover {
            color: #F79F1F !important;
            /* border-bottom: 1px solid #F79F1F; */
        }

        .sb-li a {
            transition: .1s !important;
        }

        .fs {
            font-size: 13.5px;
            margin-left: 53px !important;
        }
        .mt{
            margin-top: -11px !important;
        }
    </style>
</head>

<body class="bg-secondary">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-light nav-bg">
        <div class="container-fluid">
            <a href="index.php"><img class="logoo" src="../admin/product_images/Logo2.png" alt="logo"></a>
            <nav class="navbar navbar-expand-lg">
                <div class="navbar-nav">
                    <?php
                    if (!isset($_SESSION['admin_name'])) {
                        echo "<li class='nav-item'> <a class='nav-link text-light' href='index.php'>Welcom Admin</a>
                    </li>";
                    } else {
                        echo "<li class='nav-item'>
                        <a class='nav-link text-light' href='index.php'>Welcom " . $_SESSION['admin_name'] . "</a>
                    </li>";
                    }

                    if (!isset($_SESSION['admin_name'])) {
                        echo "<li class='nav-item text-light'>
                        <a class='nav-link text-light' href='admin_login.php'>Login</a>
                    </li>";
                    } else {
                        echo "<li class='nav-item'>
                        <a class='nav-link text-light' href='admin_logout.php'>Logout</a>
                    </li>";
                    }
                    ?>

                </div>
            </nav>
        </div>
    </nav>
    <?php include('../includes/session.php'); ?>


    <!-- Side bar -->
    <div class="row bg-secondary mb-5">

        <div class="col-md-2 bg-secondary border position-static border-secondary overflow-x-hidden pro">
            <div class="row sticky text-center ">

                <h4 class="bg-light">
                </h4>
                <div class=' d-flex m-auto p-2 p-li'>
                    <?php
                    $admin_name = $_SESSION['admin_name'];
                    $admin_image = "SELECT * FROM tbl_admin WHERE admin_name = '$admin_name'";
                    $admin_image = mysqli_query($conn, $admin_image);
                    $fetch_image = mysqli_fetch_array($admin_image);
                    $admin_image = $fetch_image['admin_image'];
                    echo "<div class='m-auto'>
                        <a>
                        <img src='admin_images/$admin_image' alt='$admin_image' class='imgg2'>
                        </a>
                    </div>";
                    ?>
                </div>
                <p class="">
                    <?php echo $admin_name = $_SESSION['admin_name'] ?>
                </p>
                <hr>

            </div>
            <div class="row">

                <div class="accordion accordion-flush" id="accordionFlushExample">

                    <p class="ms-5 dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Add Products
                    </p>
                    <div id="collapseOne" class="accordion-collapse collapse mt-auto mt" data-bs-parent="#accordionFlushExample">
                        <div class="ms-5 fs">
                            <li class="list-unstyled mb-2 sb-li"><a class="text-light" href="insert_category.php">Add Category</a></li>
                            <li class="list-unstyled mb-2 sb-li"><a class="text-light" href="insert_breakfast.php">Add Breakfast</a></li>
                            <li class="list-unstyled mb-2 sb-li"><a class="text-light" href="insert_lunch.php">Add Lunch</a></li>
                            <li class="list-unstyled mb-2 sb-li"><a class="text-light" href="insert_dinner.php">Add Dinner</a></li>
                            <li class="list-unstyled mb-2 sb-li"><a class="text-light" href="insert_carousel.php">Add Slider</a></li>
                            <li class="list-unstyled mb-2 sb-li"><a class="text-light" href="insert_chef.php">Add Chef</a></li>
                        </div>
                        <hr>
                    </div>

                    <div class="">
                        <p class="ms-5 dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            View Products
                        </p>
                        <div id="collapseTwo" class="accordion-collapse collapse mt-auto mt" data-bs-parent="#accordionFlushExample">
                            <div class="justify-content-start ms-5 fs">
                                <li class="list-unstyled mb-2 sb-li"><a class="text-light" href="index.php?view_products">View Products</a></li>
                                <li class="list-unstyled mb-2 sb-li"><a class="text-light" href="index.php?view_categories">View Categories</a></li>
                                <li class="list-unstyled mb-2 sb-li"><a class="text-light" href="index.php?view_breakfast">View Breakfast</a></li>
                                <li class="list-unstyled mb-2 sb-li"><a class="text-light" href="index.php?view_lunch">View Lunch</a></li>
                                <li class="list-unstyled mb-2 sb-li"><a class="text-light" href="index.php?view_dinner">View Dinner</a></li>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <div class="">
                        <p class="ms-5 dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            View Items
                        </p>
                        <div id="collapseThree" class="accordion-collapse justify-content-start collapse mt-auto mt" data-bs-parent="#accordionFlushExample">
                            <div class="ms-5 fs">
                                <li class="list-unstyled mb-2 sb-li"><a class="text-light" href="index.php?view_book">View Book</a></li>
                                <li class="list-unstyled mb-2 sb-li"><a class="text-light" href="index.php?view_carousel">View Slider</a></li>
                                <li class="list-unstyled mb-2 sb-li"><a class="text-light" href="index.php?view_chef">View Chef</a></li>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="ms-5">
                        <li class="list-unstyled mb-2 sb-li"><a class="text-secondary" href="index.php?list_users">All Users</a></li>
                        <li class="list-unstyled mb-2 sb-li"><a class="text-secondary" href="index.php?list_all_orders">All Orders</a></li>
                        <li class="list-unstyled mb-2 sb-li"><a class="text-secondary" href="index.php?all_payments">All Payments</a></li>
                    </div>
                </div>
                <hr>

                <div class="ms-5 mb-3 mt-1">

                    <div class="nav-item sb-li mb-3">
                        <a class="text-decoration-none text-light" href="index.php?edit_admin_profile">Edit Account</a>
                    </div>
                    <div class="nav-item sb-li mb-3">
                        <a class="text-decoration-none text-light" href="index.php?delete_admin_profile">Delete Account</a>
                    </div>
                    <div class="nav-item sb-li mb-3">
                        <a class="text-decoration-none text-light" href="admin_logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Side bar -->

        <!-- Dashbord -->
        <div class="col-md-10 bg-secondary w-75 p-0 m-auto">

            <div class="container my-3">
                <?php

                // Display db_stat.php by default 
                $showDefault = true;

                // Check if any insert or view button is clicked
                if (isset($_GET['insert_category']) || isset($_GET['insert_breakfast']) || isset($_GET['insert_lunch']) || isset($_GET['insert_dinner']) || isset($_GET['insert_chef']) || isset($_GET['insert_product']) || isset($_GET['insert_order']) || isset($_GET['insert_carousel']) ||  isset($_GET['view_categories']) || isset($_GET['view_products']) || isset($_GET['view_breakfast']) || isset($_GET['view_lunch']) || isset($_GET['view_dinner']) || isset($_GET['view_chef']) || isset($_GET['view_slider']) || isset($_GET['view_book']) || isset($_GET['view_carousel']) || isset($_GET['list_users']) || isset($_GET['list_all_orders']) || isset($_GET['all_payments'])) {

                    $showDefault = false;
                }

                // Include db_stat.php if the default should be shown
                if ($showDefault) {
                    include('db_stat.php');
                }

                // Add Category
                if (isset($_GET['insert_category'])) {
                    include('insert_category.php');
                }

                // Insert Breakfast
                if (isset($_GET['insert_breakfast'])) {
                    include('insert_breakfast.php');
                }
                // Insert Lunch
                if (isset($_GET['insert_lunch'])) {
                    include('insert_lunch.php');
                }
                // Insert Dinner
                if (isset($_GET['insert_dinner'])) {
                    include('insert_dinner.php');
                }

                // View, Edit & Delete CATEGORIES
                if (isset($_GET['view_categories'])) {
                    include('view_categories.php');
                }
                if (isset($_GET['edit_category'])) {
                    include('edit_category.php');
                }
                if (isset($_GET['delete_category'])) {
                    include('delete_category.php');
                }

                // View, Edit & Delete PRODUCT
                if (isset($_GET['view_products'])) {
                    include('view_products.php');
                }
                if (isset($_GET['edit_product'])) {
                    include('edit_product.php');
                }
                if (isset($_GET['delete_product'])) {
                    include('delete_product.php');
                }

                // View, Edit & Delete BREAKFAFT
                if (isset($_GET['view_breakfast'])) {
                    include('view_breakfast.php');
                }
                if (isset($_GET['edit_breakfast'])) {
                    include('edit_breakfast.php');
                }
                if (isset($_GET['delete_breakfast'])) {
                    include('delete_breakfast.php');
                }

                // View, Edit & Delete LUNCH
                if (isset($_GET['view_lunch'])) {
                    include('view_lunch.php');
                }
                if (isset($_GET['edit_lunch'])) {
                    include('edit_lunch.php');
                }
                if (isset($_GET['delete_lunch'])) {
                    include('delete_lunch.php');
                }

                // View, Edit & Delete DINNER
                if (isset($_GET['view_dinner'])) {
                    include('view_dinner.php');
                }
                if (isset($_GET['edit_dinner'])) {
                    include('edit_dinner.php');
                }
                if (isset($_GET['delete_dinner'])) {
                    include('delete_dinner.php');
                }

                // View, Edit & Delete BOOK
                if (isset($_GET['view_book'])) {
                    include('view_book.php');
                }
                if (isset($_GET['edit_book'])) {
                    include('edit_book.php');
                }
                if (isset($_GET['delete_book'])) {
                    include('delete_book.php');
                }

                // View & Delete ORDERS
                if (isset($_GET['list_all_orders'])) {
                    include('list_all_orders.php');
                }
                if (isset($_GET['delete_order'])) {
                    include('delete_order.php');
                }

                // View & Delete PAYMENTS
                if (isset($_GET['all_payments'])) {
                    include('all_payments.php');
                }
                if (isset($_GET['delete_payment'])) {
                    include('delete_payment.php');
                }

                // View & Delete USERS
                if (isset($_GET['list_users'])) {
                    include('list_users.php');
                }
                if (isset($_GET['delete_user'])) {
                    include('delete_user.php');
                }

                // Insert, View, edit & Delete CAROUSEL
                if (isset($_GET['insert_carousel'])) {
                    include('insert_carousel.php');
                }
                if (isset($_GET['view_carousel'])) {
                    include('view_carousel.php');
                }
                if (isset($_GET['edit_carousel'])) {
                    include('edit_carousel.php');
                }
                if (isset($_GET['delete_carousel'])) {
                    include('delete_carousel.php');
                }

                // Insert, View, edit & Delete CHEF
                if (isset($_GET['insert_chef'])) {
                    include('insert_chef.php');
                }
                if (isset($_GET['view_chef'])) {
                    include('view_chef.php');
                }
                if (isset($_GET['edit_chef'])) {
                    include('edit_chef.php');
                }
                if (isset($_GET['delete_chef'])) {
                    include('delete_chef.php');
                }

                // Edit & Delete ADMIN
                if (isset($_GET['edit_admin_profile'])) {
                    include('edit_admin_profile.php');
                }
                if (isset($_GET['delete_admin_profile'])) {
                    include('delete_admin_profile.php');
                }
                ?>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
    include('../includes/footer-admin.php');
    ?>

    <!-- Bootstrap js Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>