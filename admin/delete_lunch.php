<?php
    if(isset($_GET['delete_lunch'])){
        $delete_id = $_GET['delete_lunch'];

        // DELETE QUERY

        $delete_qry = "DELETE FROM tbl_lunch WHERE lunch_id = $delete_id";
        $res_delete = mysqli_query($conn, $delete_qry);
    
        if ($res_delete) {
            // Redirect to the admin page
            echo "<script>window.open('./index.php')</script>";
        
        $_SESSION['add'] = "<div class='alert alert-success'>Lunch Deleted Successfully.</div>";
           
        }
        
    }
    
    else{
    }
