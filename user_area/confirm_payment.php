<?php
include('../includes/config.php');
session_start();

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    // echo $order_id;

    $sql = "SELECT * FROM tbl_user_order WHERE order_id = $order_id";
    $res = mysqli_query($conn, $sql);
    $row_fetch = mysqli_fetch_assoc($res);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];

    if (isset($_POST['confirm_payment'])) {
        $invoice_number = $_POST['invoice_number'];
        $amound = $_POST['amount'];
        $payment_mode = $_POST['payment_mode'];

        if ($payment_mode === 'Select Payment Mode') {
            echo "<script>alert('Please select a payment mode')</script>";
        } else {
            $sql = "INSERT INTO tbl_user_payments (order_id, invoice_number, amount, payment_mode) VALUES ($order_id, $invoice_number, $amound, '$payment_mode')";
            $res = mysqli_query($conn, $sql);

            if ($res) {
                echo "<h3 class='text-center text-light'>Successfully completed the payment.</h3>";
                echo "<script>window.open('profile.php?my_orders','_self')</script>";
            }

            $update_order = "UPDATE tbl_user_order SET order_status = 'Complete' WHERE order_id = $order_id";
            $res2 = mysqli_query($conn, $update_order);
        }
    }
}
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
    <!-- Font Awesome  Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custome CSS -->
    <link rel="stylesheet" href="../styles.css">
    <!-- Custome CSS2 -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-light">
    <div class="container my-4 mt-5">
        <form action="" method="post" class="w-50 m-auto">
            <h3 class="text-center">Confirm Payment</h3>
            <div class="form-outline my-4  w-50 m-auto">
                <label class="text-secondary" for="">Invoice:</label>
                <input type="text" readonly class="form-control m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline my-4 w-50 m-auto">
                <label class="text-secondary" for="">Amount:</label>
                <input type="text" readonly class="form-control m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline my-4 w-50 m-auto">
                <label class="text-secondary" for="">Payment Mode:</label>
                <select name="payment_mode" class="form-select m-auto">
                    <option>Select Payment Mode</option>
                    <option>Palm Pay</option>
                    <option>Opay</option>
                    <option>Paypal</option>
                    <option>Cash On Delivery</option>
                    <option>Pay Offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" value="Confirm" class="bg py-2 px-3 border-0 rounded-2" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>
