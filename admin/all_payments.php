<h3 class=" text-success text-center">All Payments</h3>

<table class="table table-bordered border-secondary mt-5 text-center">

    <thead class='nav-bg'>
        <?php
        $get_user_payment = "SELECT * FROM tbl_user_payments";
        $res = mysqli_query($conn, $get_user_payment);
        $row_count = mysqli_num_rows($res);
        $number = 0;
        echo "<tr>
                <th>Payment ID</th>
                <th>Order ID</th>
                <th>Invoice Number</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Date</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";

        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mb-5 mt-5'>No Payment Yet</h2>";
        }
        else {
            while ($row = mysqli_fetch_assoc($res)) {
                $payment_id = $row['payment_id'];
                $order_id = $row['order_id'];
                $invoice_number = $row['invoice_number'];
                $amount = $row['amount'];
                $payment_mode = $row['payment_mode'];
                $date = $row['date'];
                // $number++;
                echo "<tr>
                <td>$payment_id</td>
                <td>$order_id</td>
                <td>$invoice_number</td>
                <td>$amount</td>
                <td>$payment_mode</td>
                <td>$date</td>
                <td><a href='index.php?delete_payment=$payment_id' class='text-light' type='button' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fas fa-trash'></i></a></td>
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
                <h4>Delete this payment?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

                <a href='index.php?delete_payment=<?php echo $payment_id ?>' class='text-light' type="button" class="text-light text-decoration-none"><button class="btn btn-primary">Yes</button></a>
            </div>
        </div>
    </div>
</div>