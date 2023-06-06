<?php
if (isset($_GET['delete_chef'])) {
    $delete_id = $_GET['delete_chef'];

    // DELETE QUERY

    $delete_qry = "DELETE FROM tbl_chef WHERE chef_id = $delete_id";
    $res_delete = mysqli_query($conn, $delete_qry);

    if ($res_delete) {
        // Redirect to the admin page
        echo "<script>window.open('./index.php')</script>";

        $_SESSION['add'] = "<div class='success-msg'>Chef deleted successfully.</div>";
    }
} else {
}
