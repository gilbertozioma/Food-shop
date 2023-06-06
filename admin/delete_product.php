<?php
    if(isset($_GET['delete_product'])){
        $delete_id = $_GET['delete_product'];

        // DELETE QUERY

        $delete_qry = "DELETE FROM tbl_products WHERE product_id = $delete_id";
        $res_delete = mysqli_query($conn, $delete_qry);
    
        if ($res_delete) {
            // Redirect to the admin page
            echo "<script>window.open('./index.php')</script>";
        
        $_SESSION['delete'] = "<div class='success-msg'>Product deleted successfully.</div>";
        }
        
    }
    
    else{
    }
    ?>