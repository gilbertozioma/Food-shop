<?php
    if(isset($_GET['delete_dinner'])){
        $delete_id = $_GET['delete_dinner'];

        // DELETE QUERY

        $delete_qry = "DELETE FROM tbl_products WHERE dinner_title = $delete_id";
        $res_delete = mysqli_query($conn, $delete_qry);
    
        if ($res_delete && $res_delete) {
            // Redirect to the admin page
            echo "<script>window.open('./index.php')</script>";
        
        $_SESSION['delete'] = "<div class='alert alert-success'>Dinner Deleted Successfully.</div>";
        }
        
    }
    
    else{
    }
