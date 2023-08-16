<?php
    if(isset($_GET['delete_user'])){
        $delete_id = $_GET['delete_user'];

        // DELETE QUERY

        $delete_qry = "DELETE FROM tbl_user WHERE user_id = $delete_id";
        $res_delete = mysqli_query($conn, $delete_qry);
    
        if ($res_delete) {
            // Redirect to the admin page
            echo "<script>window.open('./index.php')</script>";
        
        $_SESSION['delete'] = "<div class='alert alert-success'>User Deleted Successfully.</div>";
        }
        
    }
    
    else{
    }
