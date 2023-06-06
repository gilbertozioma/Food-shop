<?php
    if(isset($_GET['delete_brand'])){
        $delete_id = $_GET['delete_brand'];

        // DELETE QUERY

        $delete_qry = "DELETE FROM tbl_brands WHERE brand_id = $delete_id";
        $res_delete = mysqli_query($conn, $delete_qry);
    
        if ($res_delete) {
            // Redirect to the admin page
            echo "<script>window.open('./index.php')</script>";
        
        $_SESSION['add'] = "<div class='success-msg'>Brand deleted successfully.</div>";
           
        }
        
    }
    
    else{
    }
