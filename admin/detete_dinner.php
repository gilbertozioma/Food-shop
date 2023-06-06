<?php
    if(isset($_GET['delete_category'])){
        $delete_id = $_GET['delete_category'];

        // DELETE QUERY

        $delete_qry = "DELETE FROM tbl_categories WHERE category_title = $delete_id";
        $res_delete = mysqli_query($conn, $delete_qry);

        $delete_qry2 = "DELETE FROM tbl_products WHERE category_title = $delete_id";
        $res_delete2 = mysqli_query($conn, $delete_qry2);
    
        if ($res_delete && $res_delete2) {
            // Redirect to the admin page
            echo "<script>window.open('./index.php')</script>";
        
        $_SESSION['add'] = "<div class='success-msg'>Category deleted successfully.</div>";
        }
        
    }
    
    else{
    }
