<h3 class=" text-success text-center">All Users</h3>

<table class="table table-bordered border-secondary mt-5 text-center">

    <thead class='nav-bg'>
        <?php
        $get_users = "SELECT * FROM tbl_user";
        $res = mysqli_query($conn, $get_users);
        $row_count = mysqli_num_rows($res);
        $number = 0;
        echo "<tr>
                <th>User ID</th>
                <th>Username</th>
                <th>User Email</th>
                <th>User Image</th>
                <th>User IP</th>
                <th>User Address</th>
                <th>User Contact</th>
                <th>Delete User</th>
            </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";

        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mb-5 mt-5'>No User Yet</h2>";
        }
        else {
            while ($row = mysqli_fetch_assoc($res)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_ip = $row['user_ip'];
                $user_address = $row['user_address'];
                $user_contact = $row['user_contact'];
                $number++;
        
                echo "<tr>
                    <td>$number</td>
                    <td>$username</td>
                    <td>$user_email</td>
                    <td><img class='imgg' src='../user_area/user_images/$user_image' alt='$username'</td>
                    <td>$user_ip</td>
                    <td>$user_address</td>
                    <td>$user_contact</td>
                    <td><a href='index.php?delete_user=$user_id' class='text-light' type='button' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fas fa-trash'></i></a></td>
                </tr>";
        

            }
        }
        ?>




        </tbody>
</table>


<!-- CONFIRM DELETE MODAL -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <h4>Delete this user?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

                <a href='index.php?delete_user=<?php echo $user_id ?>' class='text-light' type="button" class="text-light text-decoration-none"><button class="btn btn-primary">Yes</button></a>
            </div>
        </div>
    </div>
</div>