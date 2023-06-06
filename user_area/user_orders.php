<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
</head>

<body>

    <?php
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM tbl_user WHERE username = '$username'";
    $res = mysqli_query($conn, $sql);
    $fetch_user = mysqli_fetch_assoc($res);
    $user_id = $fetch_user['user_id'];
    ?>
    <h3 class="text-success mt-3 text-center">All My Orders</h3>
    <table class="table table-bordered border-secondary mt-5">
        <thead class="nav-bg">
            <tr>
                <th>SI/No</th>
                <th>Amoubt Due</th>
                <th>Total Products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $get_order_details = "SELECT * FROM tbl_user_order WHERE user_id = $user_id";
            $res = mysqli_query($conn, $get_order_details);
            $row_count = mysqli_num_rows($res);
            $number = 1;
            if ($row_count == 0) {
                echo "<h2 class='text-danger text-center mb-5 mt-5'>No Order Yet</h2>";
            }
            else {
                while ($row_orders = mysqli_fetch_assoc($res)) {
                    $order_id = $row_orders['order_id'];
                    $amount_due = $row_orders['amount_due'];
                    $invoice_number = $row_orders['invoice_number'];
                    $total_products = $row_orders['total_products'];
                    $order_date = $row_orders['order_date'];
                    $order_status = $row_orders['order_status'];
                    if ($order_status == 'pending') {
                        $order_status = 'Incomplete';
                    } else {
                        $order_status = 'Complete';
                    }
                    echo "<tr class='bg-secondary text-light'>
                            <td>$number</td>
                            <td>$amount_due</td>
                                <td>$total_products</td>
                                <td>$invoice_number</td>
                                <td>$order_date</td>
                                <td>$order_status</td>";
            ?>
            <?php
                    if ($order_status == 'Complete') {
                        echo "<td>Paid</td>";
                    } else {
                        echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
                            </tr>";
                    }
                    $number++;
                }
            }

            ?>
        </tbody>
    </table>
</body>

</html>