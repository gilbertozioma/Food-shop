<h3 class=" text-success text-center">All Orders</h3>

<table class="table table-bordered border-secondary mt-5 text-center">

    <thead class='nav-bg'>
        <?php
        $get_user_orders = "SELECT * FROM tbl_user_order";
        $res = mysqli_query($conn, $get_user_orders);
        $row_count = mysqli_num_rows($res);
        $number = 0;
        echo "
        <tr>
            <th>Order ID</th>
            <th>Due Amount</th>
            <th>Invoice Number</th>
            <th>Total Product</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";

        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mb-5 mt-5'>No Order Yet</h2>";
        }
        else {
            while ($row = mysqli_fetch_assoc($res)) {
                $order_id = $row['order_id'];
                $user_id = $row['user_id'];
                $amount_due = $row['amount_due'];
                $invoice_number = $row['invoice_number'];
                $total_products = $row['total_products'];
                $order_date = $row['order_date'];
                $status = $row['order_status'];
                $number++;

                echo "<tr>
                <td class='text-light'>$number</td>
                <td class='text-light'>$amount_due</td>
                <td class='text-light'>$invoice_number</td>
                <td class='text-light'>$total_products</td>
                <td class='text-light'>$order_date</td>
                <td class='text-light'>$status</td>
                <td class='text-light'><a href='index.php?delete_order=$order_id' class='text-light' type='button' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fas fa-trash'></i></a></td>
            </tr>";
            }
        }
        ?>

        </tbody>
</table>


<!-- CONFIRM DELETE MODAL -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <h4>Delete this order?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

                <a href='index.php?delete_order=<?php echo $order_id ?>' class='text-light' type="button" class="text-light text-decoration-none"><button class="btn btn-primary">Yes</button></a>
            </div>
        </div>
    </div>
</div>