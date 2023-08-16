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
    <title>Cart details</title>
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

        .fma:focus {
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
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
                        <a class="nav-link text-light active" aria-current="page" href="index.php">Back To Home</a>
                    </li>
                </ul>
                <!-- Search form -->
                <form action="search_product.php" method="get" role="search" class="form-inline " style="width: 149px;">
                    <div class="input-group">
                        <input type="search" name="search_data" class="form-control fma bg-light rounded-0 h-25" placeholder="Search">
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

    <!-- Secound child -->
    <div class="bg-light third-div">
        <h3 class="text-center h3-food">Food Shop</h3>
        <p class="text-center">A hungry man is an angry man. Don't be hungry, be full and happy!</p>
    </div>
    <br><br>

    <!-- Third child -->
    <div class="container mt-4 mb-5">
        <div class="row">
            <form action="" method="post" name="cart">
                <table class="table table-bordered border-secondary text-center">

                    <!-- PHP code to display dynamic cart function -->
                    <?php
                    $get_ip_address = getIPAddress();
                    $total_price = 0;
                    $sql = "SELECT * FROM tbl_cart_details WHERE ip_address = '$get_ip_address'";
                    $res = mysqli_query($conn, $sql);
                    $res_count = mysqli_num_rows($res);
                    if ($res_count > 0) {
                        echo "<thead>
                        <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan='2'>Operations</th>
                        </tr>
                        </thead>";

                        while ($row_data = mysqli_fetch_assoc($res)) {
                            $product_id = $row_data['product_id'];
                            $select_products = "SELECT * FROM tbl_cart_details WHERE product_id = '$product_id'";
                            $res_product = mysqli_query($conn, $select_products);
                            while ($row_product_price = mysqli_fetch_array($res_product)) {
                                $product_price = array($row_product_price['product_price']);
                                $price_table = ($row_product_price['product_price']);
                                $product_title = ($row_product_price['product_title']);
                                $product_image = ($row_product_price['product_image']);
                                $product_values = array_sum($product_price);
                                $total_price += $product_values;


                    ?>
                                <tbody>
                                    <tr>
                                        <?php
                                        $quantity = 1; // variable to display product quantity at a default in the product input
                                        // Query to increase product quantity
                                        if (isset($_POST['update_cart'])) {
                                            $quantity = $_POST['qty'];
                                            $get_ip_address = getIPAddress();
                                            $update_cart = "UPDATE tbl_cart_details SET quantity = $quantity WHERE ip_address = '$get_ip_address'";
                                            $res_pqty = mysqli_query($conn, $update_cart);
                                            $total_price = $total_price * $quantity;
                                        }
                                        ?>
                                        <td><?php echo $product_title ?></td>
                                        <td><img src="./admin/product_images/<?php echo $product_image ?>" alt="" class="tb-img"></td>
                                        <td><input type="number" name="qty" value="<?php echo $quantity ?>" class="form-control w-50 m-auto"></td>
                                        <td><?php echo $price_table ?></td>
                                        <td><input type="checkbox" name="removeItem[]" value="<?php echo $product_id ?>"></td>
                                        <td class="text-center py-3">
                                            <input type="submit" value="Update Cart" class=" btn btn-primary" name="update_cart">
                                            <input type="submit" value="Remove Cart" class=" btn btn-danger" name="remove_cart">
                                        </td>

                                    </tr>
                                </tbody>
                    <?php
                            }
                        }
                    } else {
                        echo "<h2 class='text-center text-danger'>Cart is empty!</h2>";
                    }
                    ?>

                </table>

                <!-- Subtotal -->
                <div class="d-flex md-5">

                    <?php
                    $get_ip_address = getIPAddress();
                    $sql = "SELECT * FROM tbl_cart_details WHERE ip_address = '$get_ip_address'";
                    $res = mysqli_query($conn, $sql);
                    $res_count = mysqli_num_rows($res);
                    if ($res_count > 0) {
                        echo "<h4 class='px-4'>Subtotal: <strong class='related2'>$total_price&#x20A6</strong></h4>
                                <input type='submit' value='Continue Shopping' class=' btn btn-primary' name='continue_shopping'>
                                
                                <input type='submit' value='Check Out' class='check border-0 p-2 ms-3 text-light rounded-0' name='check_out'>";
                    } else {
                        echo "<input type='submit' value='Continue Shopping' class=' btn btn-primary rounded rounded-0' name='continue_shopping'>";
                    }
                    if (isset($_POST['continue_shopping'])) {
                        echo "<script>window.open('index.php', '_self')</script>";
                    } elseif (isset($_POST['check_out'])) {
                        echo "<script>window.open('./user_area/checkout.php', '_self')</script>";
                    }
                    ?>

                </div>
            </form>
        </div>
    </div>


    <!-- FUNCTION TO REMOVE ITEM FROM CART -->
    <?php
    function remove_item()
    {
        global $conn;

        if (isset($_POST['remove_cart'])) {
            foreach ($_POST['removeItem'] as $remove_id) {
                echo $remove_id;
                $delete_cart = "DELETE FROM tbl_cart_details WHERE product_id = $remove_id";
                $res = mysqli_query($conn, $delete_cart);
                if ($res) {
                    echo "<script>window.open('cart.php', '_self')</script>";
                }
            }
        }
    }
    echo remove_item();
    ?>
    <br><br>

    <!-- Bootstrap js Link -->
    <script src="./bootstrap-5/js/bootstrap.min.js"></script>

    <?php
    include('./includes/footer.php');
    ?>