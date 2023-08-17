<?php

// Calculate Totals
$totalOrders = 0;
$todayOrders = 0;
$thisMonthOrders = 0;
$thisYearOrders = 0;
$totalProducts = 0;
$totalCategories = 0;
$totalBrands = 0;
$totalUsers = 0;

// Fetch and calculate the totals from your database
// Total Orders
$totalOrdersQuery = "SELECT COUNT(*) AS total FROM tbl_user_order";
$totalOrdersResult = mysqli_query($conn, $totalOrdersQuery);
if ($totalOrdersResult) {
    $totalOrdersRow = mysqli_fetch_assoc($totalOrdersResult);
    $totalOrders = $totalOrdersRow['total'];
}

// Today Orders
$todayOrdersQuery = "SELECT COUNT(*) AS total FROM tbl_user_order WHERE DATE(order_date) = CURDATE()";
$todayOrdersResult = mysqli_query($conn, $todayOrdersQuery);
if ($todayOrdersResult) {
    $todayOrdersRow = mysqli_fetch_assoc($todayOrdersResult);
    $todayOrders = $todayOrdersRow['total'];
}

// This Month Orders
$thisMonthOrdersQuery = "SELECT COUNT(*) AS total FROM tbl_user_order WHERE MONTH(order_date) = MONTH(CURDATE())";
$thisMonthOrdersResult = mysqli_query($conn, $thisMonthOrdersQuery);
if ($thisMonthOrdersResult) {
    $thisMonthOrdersRow = mysqli_fetch_assoc($thisMonthOrdersResult);
    $thisMonthOrders = $thisMonthOrdersRow['total'];
}

// Total Pending Orders
$totalPenddingOrdersQuery = "SELECT COUNT(*) AS total FROM tbl_orders_pending";
$totalPenddingOrdersResult = mysqli_query($conn, $totalPenddingOrdersQuery);
if ($totalPenddingOrdersResult) {
    $totalPenddingOrdersRow = mysqli_fetch_assoc($totalPenddingOrdersResult);
    $totalPenddingOrders = $totalPenddingOrdersRow['total'];
}

// Total Payments
$totalPaymentsQuery = "SELECT COUNT(*) AS total FROM tbl_user_payments";
$totalPaymentsResult = mysqli_query($conn, $totalPaymentsQuery);
if ($totalPaymentsResult) {
    $totalPaymentsRow = mysqli_fetch_assoc($totalPaymentsResult);
    $totalPayments = $totalPaymentsRow['total'];
}

// Total Reservations
$totalReservationsQuery = "SELECT COUNT(*) AS total FROM tbl_reservation";
$totalReservationsResult = mysqli_query($conn, $totalReservationsQuery);
if ($totalReservationsResult) {
    $totalReservationsRow = mysqli_fetch_assoc($totalReservationsResult);
    $totalReservations = $totalReservationsRow['total'];
}

// Total Products
$totalProductsQuery = "SELECT COUNT(*) AS total FROM tbl_products";
$totalProductsResult = mysqli_query($conn, $totalProductsQuery);
if ($totalProductsResult) {
    $totalProductsRow = mysqli_fetch_assoc($totalProductsResult);
    $totalProducts = $totalProductsRow['total'];
}

// Total Users
$totalUsersQuery = "SELECT COUNT(*) AS total FROM tbl_user";
$totalUsersResult = mysqli_query($conn, $totalUsersQuery);
if ($totalUsersResult) {
    $totalUsersRow = mysqli_fetch_assoc($totalUsersResult);
    $totalUsers = $totalUsersRow['total'];
}

// Total Breakfast
$totalBreakfastQuery = "SELECT COUNT(*) AS total FROM tbl_breakfast";
$totalBreakfastResult = mysqli_query($conn, $totalBreakfastQuery);
if ($totalBreakfastResult) {
    $totalBreakfastRow = mysqli_fetch_assoc($totalBreakfastResult);
    $totalBreakfast = $totalBreakfastRow['total'];
}

// Total Users
$totalLunchQuery = "SELECT COUNT(*) AS total FROM tbl_lunch";
$totalLunchResult = mysqli_query($conn, $totalLunchQuery);
if ($totalLunchResult) {
    $totalLunchRow = mysqli_fetch_assoc($totalLunchResult);
    $totalLunch = $totalLunchRow['total'];
}

// Total Users
$totalDinnerQuery = "SELECT COUNT(*) AS total FROM tbl_dinner";
$totalDinnerResult = mysqli_query($conn, $totalDinnerQuery);
if ($totalDinnerResult) {
    $totalDinnerRow = mysqli_fetch_assoc($totalDinnerResult);
    $totalDinner = $totalDinnerRow['total'];
}

// This Year Orders
// $thisYearOrdersQuery = "SELECT COUNT(*) AS total FROM tbl_user_order WHERE YEAR(order_date) = YEAR(CURDATE())";
// $thisYearOrdersResult = mysqli_query($conn, $thisYearOrdersQuery);
// if ($thisYearOrdersResult) {
//     $thisYearOrdersRow = mysqli_fetch_assoc($thisYearOrdersResult);
//     $thisYearOrders = $thisYearOrdersRow['total'];
// }


?>

<div class="me-md-3 me-xl-5">
    <p class="fs-3 fw-bold">Dashboard,</p>
    <p class="mb-md-0">Your analytics dashboard template.</p>
    <hr>
</div>

<div class="row">
    <a href="index.php?list_all_orders" class="text-white text-decoration-none col-md-3">
        <div class="card card-body bg-primary text-white mb-3">
            <label>Total Orders</label>
            <h1 class="text-light"><?php echo $totalOrders; ?></h1>
        </div>
    </a>

    <a href="index.php?list_all_orders" class="text-white text-decoration-none col-md-3">
        <div class="card card-body bg-success text-white mb-3">
            <label>Today Orders</label>
            <h1 class="text-light"><?php echo $todayOrders; ?></h1>
        </div>
    </a>

    <a href="index.php?list_all_orders" class="text-white text-decoration-none col-md-3">
        <div class="card card-body bg-warning text-white mb-3">
            <label>This Month Orders</label>
            <h1 class="text-light"><?php echo $thisMonthOrders; ?></h1>
        </div>
    </a>

    <a href="index.php?list_all_orders" class="text-white text-decoration-none col-md-3">
        <div class="card card-body bg-danger text-white mb-3">
            <label>Total Pending Orders</label>
            <h1 class="text-light"><?php echo $totalPenddingOrders; ?></h1>
        </div>
    </a>
</div>

<hr>

<div class="row">
    <a href="index.php?list_all_orders" class="text-white text-decoration-none col-md-3">
        <div class="card card-body bg-success text-white mb-3">
            <label>Total Payments</label>
            <h1 class="text-light"><?php echo $totalPayments; ?></h1>
        </div>
    </a>

    <a href="index.php?view_book" class="text-white text-decoration-none col-md-3">
        <div class="card card-body bg-warning text-white mb-3">
            <label>Total Reservations</label>
            <h1 class="text-light"><?php echo $totalReservations; ?></h1>
        </div>
    </a>

    <a href="index.php?view_products" class="text-white text-decoration-none col-md-3">
        <div class="card card-body bg-primary text-white mb-3">
            <label>Total Products</label>
            <h1 class="text-light"><?php echo $totalProducts; ?></h1>
        </div>
    </a>

    <a href="index.php?list_users" class="text-white text-decoration-none col-md-3">
        <div class="card card-body bg-success text-white mb-3">
            <label>Total Users</label>
            <h1 class="text-light"><?php echo $totalUsers; ?></h1>
        </div>
    </a>
</div>

<hr>

<div class="row">
    <a href="index.php?view_breakfast" class="text-white text-decoration-none col-md-3">
        <div class="card card-body bg-primary text-white mb-3">
            <label>Total Breakfast</label>
            <h1 class="text-light"><?php echo $totalBreakfast ?></h1>
        </div>
    </a>

    <a href="index.php?view_lunch" class="text-white text-decoration-none col-md-3">
        <div class="card card-body bg-success text-white mb-3">
            <label>Total Lunch</label>
            <h1 class="text-light"><?php echo $totalBreakfast ?></h1>
        </div>
    </a>

    <a href="index.php?view_dinner" class="text-white text-decoration-none col-md-3">
        <div class="card card-body bg-warning text-white mb-3">
            <label>Total Dinner</label>
            <h1 class="text-light"><?php echo $totalBreakfast ?></h1>
        </div>
    </a>
</div>