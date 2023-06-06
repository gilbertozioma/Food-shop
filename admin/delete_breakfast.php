<?php
    if(isset($_GET['delete_category'])){
        $delete_id = $_GET['delete_category'];

        // DELETE QUERY

        $delete_qry = "DELETE FROM tbl_categories WHERE category_id = $delete_id";
        $res_delete = mysqli_query($conn, $delete_qry);
    
        if ($res_delete) {
            // Redirect to the admin page
            echo "<script>window.open('./index.php')</script>";
        
        $_SESSION['add'] = "<div class='success-msg'>Category deleted successfully.</div>";
        }
        
    }
    
    else{
    }
    ?>