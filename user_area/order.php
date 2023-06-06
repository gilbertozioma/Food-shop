<?php
    include('../includes/config.php');
    include('../functions/common_function.php');

    // If user id is present in the URL query string
    if(isset($_GET['user_id'])){
        // assign the user id to a variable
        $user_id = $_GET['user_id'];
    }


    // GETTING THE TOTAL PRICE AND ITEMS

    // Get the IP address of the user using a custom function getIPAddress()
    $get_ip_address = getIPAddress();

    // Initialize total price variable to 0
    $total_price = 0;

    // Query the database to get all cart details with the matching IP address
    $sql_price = "SELECT * FROM tbl_cart_details WHERE ip_address = '$get_ip_address'";
    $res_price = mysqli_query($conn, $sql_price);

    $invoice_number = mt_rand();
    $status = 'pending';

    // Get the number of rows returned from the query
    $count_products = mysqli_num_rows($res_price);

    // Loop through each row returned from the query
    while ($row_price = mysqli_fetch_array($res_price)) {

        // Get the product ID from the row
        $product_id = $row_price['product_id'];

        // Query the database to get the product details with the matching product ID
        $sql_product = "SELECT * FROM tbl_products WHERE product_id = $product_id";
        $run_price = mysqli_query($conn, $sql_product);

        // Loop through each row returned from the query
        while ($row_product_price = mysqli_fetch_array($run_price)) {

            // Get the product price from the row and store it in an array
            $product_price = array($row_product_price['product_price']);

            // Get the sum of all the product prices in the array
            $product_values = array_sum($product_price);

            // Add the product price to the total price of all items in the cart
            $total_price += $product_values;
        }
    }



    // GETTING QUANTITY FROM CART
    // Query to select all items in cart
    $get_cart = "SELECT * FROM tbl_cart_details";

    // Execute the query using database connection variable $conn
    $run_cart = mysqli_query($conn, $get_cart);

    // Retrieve a single row of the result set as an associative array
    $get_item_quantity = mysqli_fetch_array($run_cart); 

    // Retrieve the quantity field from the array
    $quantity = $get_item_quantity['quantity'];

    // If the quantity is 0, set quantity to 1 and subtotal to total price
    if ($quantity == 0) { 
        $quantity = 1;
        $subtotal = $total_price;

        // Otherwise, set subtotal to total price times the quantity
    } else { 
        $quantity = $quantity;
        $subtotal = $total_price * $quantity;
    }

    // Query to insert order details into tbl_user_order table
    $insert_orders = "INSERT INTO tbl_user_order (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ($user_id, $subtotal, $invoice_number, $count_products, NOW(), '$status')";

    // Execute the query using database connection variable $conn and store the result in $res2
    $res2 = mysqli_query($conn, $insert_orders);

    // If the query is successful, display an alert message and redirect to profile page
    if ($res2) { 
        echo "<script>alert('Orders are submitted successfully')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
    }

    // ORDERS PENDING
    // Query to insert order details into tbl_orders_pending table
    $insert_pending_orders = "INSERT INTO tbl_orders_pending (user_id, invoice_number, product_id, quantity, order_status) VALUES ($user_id, $invoice_number, $product_id, $quantity, '$status')"; 

    // Execute the query using database connection variable $conn and store the result in $res_pending_orders
    $res_pending_orders = mysqli_query($conn, $insert_pending_orders); 


    // DELETE ITEMS FROM CART
    // Query to delete all items in the cart for the current user's IP address
    $empty_cart = "DELETE FROM tbl_cart_details WHERE ip_address = '$get_ip_address'"; 

    // Execute the query using database connection variable $conn and store the result in $res_empty_cart
    $res_empty_cart = mysqli_query($conn, $empty_cart); 

?>
