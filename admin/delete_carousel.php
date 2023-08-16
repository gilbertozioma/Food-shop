<?php
    if(isset($_GET['delete_carousel'])){
        $delete_id = $_GET['delete_carousel'];

        // DELETE QUERY

        $delete_qry = "DELETE FROM tbl_carousel WHERE product_id = $delete_id";
        $res_delete = mysqli_query($conn, $delete_qry);
    
        if ($res_delete) {
            // Redirect to the admin page
            echo "<script>window.open('./index.php')</script>";
        
        $_SESSION['delete'] = "<div class='alert alert-success'>Carousel Deleted Successfully.</div>";
        }
        
    }
    
    else{
    }
