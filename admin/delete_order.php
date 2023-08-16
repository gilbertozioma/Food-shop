<?php
    if(isset($_GET['delete_order'])){
        $delete_id = $_GET['delete_order'];

        // DELETE QUERY

        $delete_order_qry = "DELETE FROM tbl_user_order WHERE order_id = $delete_id";
        $res_delete = mysqli_query($conn, $delete_order_qry);
    
        if ($res_delete) {
            // Redirect to the admin page
            echo "<script>window.open('./index.php','_self')</script>";
        
        $_SESSION['delete'] = "<div class='alert alert-success'>Order Deleted Successfully.</div>";
        }
        
    }
    
    else{
    }
