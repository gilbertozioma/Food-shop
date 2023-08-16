<?php
if (isset($_GET['delete_payment'])) {
    $delete_id = $_GET['delete_payment'];

    // DELETE QUERY

    $delete_payment_qry = "DELETE FROM tbl_user_payments WHERE payment_id = $delete_id";
    $res_delete = mysqli_query($conn, $delete_payment_qry);

    if ($res_delete) {
        // Redirect to the admin page
        echo "<script>window.open('./index.php','_self')</script>";

        $_SESSION['delete'] = "<div class='alert alert-success'>Payment Deleted Successfully.</div>";
    }
}