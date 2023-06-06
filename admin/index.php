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
            width: 80px;
            height: 80px;
            object-fit: contain;
            border-radius: 100%;
        }

        .pro {
            height: 30%;

        }

        .p-li a:hover {
            border-bottom: 1px solid #F79F1F;
        }
    </style>
</head>

<body class="bg-secondary">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light nav-bg">
        <div class="container-fluid">
            <a href="#"><img class="logoo" src="../admin/product_images/Logo2.png" alt="logo"></a>
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
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

                </ul>
            </nav>
        </div>
    </nav>

    <!-- Second child -->

    <div class="bg-secondary">
        <h3 class="text-center p-3 text-light">Manage Details</h3>

    </div><br>

    <?php include('../includes/session.php'); ?>

    <br>
    <!-- Admin Dashbord -->
    <div class="row bg-secondary">
        <div class="col-md-2 bg-secondary sticky-top pro mb-4">
            <div class="row border text-center border-secondary">

                <div class="nav-item text-center p-2 nav-bg">
                    <a class="nav-link text-light" href="#">
                        <h4>Admin Profile</h4>
                    </a>
                </div>

                <?php
                $admin_name = $_SESSION['admin_name'];
                $admin_image = "SELECT * FROM tbl_admin WHERE admin_name = '$admin_name'";
                $admin_image = mysqli_query($conn, $admin_image);
                $fetch_image = mysqli_fetch_array($admin_image);
                $admin_image = $fetch_image['admin_image'];
                echo "<div class='nav-item mb-1'><br>
                    <img src='admin_images/$admin_image' alt='$admin_image' class='imgg2'>
                </div>";

                ?>
                <div class='related2 p-li fs-5'>
                    <?php echo $admin_name = $_SESSION['admin_name'] ?>
                </div>
                <hr>

                <div class="nav-item p-li mb-3">
                    <a class="text-decoration-none text-light" href="index.php?edit_admin_profile">Edit Account</a>
                </div>
                <div class="nav-item p-li mb-3">
                    <a class="text-decoration-none text-light" href="index.php?delete_admin_profile">Delete Account</a>
                </div>
                <div class="nav-item p-li mb-3">
                    <a class="text-decoration-none text-light" href="admin_logout.php">Logout</a>
                </div>

            </div>
        </div>

        <!-- Dashbord -->
        <div class="col-md-10 bg-secondary w-75 p-0">

            <div class="row ms-2">

                <div class="text-center bg-secondary "><br>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-primary"><a href="index.php?insert_category" class="nav-link text-light my-2">Add Category</a></button>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-primary"><a href="insert_breakfast.php" class="nav-link text-light my-2">Add Breakfast</a></button>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-primary"><a href="insert_lunch.php" class="nav-link text-light my-2">Add Lunch</a></button>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-primary"><a href="insert_dinner.php" class="nav-link text-light my-2">Add Dinner</a></button>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-primary"><a href="insert_carousel.php" class="nav-link text-light my-2">Add Carousel</a></button>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-primary"><a href="insert_chef.php" class="nav-link text-light my-2">Add Chef</a></button><br>

                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-info"><a href="index.php?view_products" class="nav-link text-dark my-2">View Products</a></button>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-info"><a href="index.php?view_categories" class="nav-link text-dark my-2">View Category</a></button>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-info"><a href="index.php?view_breakfast" class="nav-link text-dark m-1 my-2">View Breakfast</a></button>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-info"><a href="index.php?view_lunch" class="nav-link text-dark my-2">View Lunch</a></button>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-info"><a href="index.php?view_dinner" class="nav-link text-dark my-2">View Dinner</a></button>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-info"><a href="index.php?view_book" class="nav-link text-dark my-2">View Book</a></button>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-info"><a href="index.php?list_all_orders" class="nav-link text-dark my-2">All Orders</a></button>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-info"><a href="index.php?all_payments" class="nav-link text-dark my-2">All Payments</a></button>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-info"><a href="index.php?list_users" class="nav-link text-dark my-2">List Users</a></button>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-info"><a href="index.php?view_carousel" class="nav-link text-dark my-2">View Carousel</a></button>
                    <button class="border-0 rounded-1 m-1 p-2 py-1 btn btn-info"><a href="index.php?view_chef" class="nav-link text-dark my-2">View Chef</a></button>
                </div>
            </div>

            <!-- Fouth child -->

            <div class="container my-3">
                <?php
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
    <script src="../bootstrap-5/js/bootstrap.min.js"></script>
</body>

</html>