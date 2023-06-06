<h3 class=" text-success text-center">Chef Details</h3>

<table class="table table-bordered border-secondary mt-5 text-center">
    <thead class="nav-bg">
        <tr>
            <th>Chef ID</th>
            <th>Chef Name</th>
            <th>Chef Position</th>
            <th>Chef Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">

        <?php
        $get_chefs = "SELECT * FROM tbl_chef";
        $res = mysqli_query($conn, $get_chefs);
        $number = 0;
        while ($row = mysqli_fetch_assoc($res)) {
            $chef_id = $row['chef_id'];
            $chef_name = $row['chef_name'];
            $chef_position = $row['chef_position'];
            $chef_image = $row['chef_image'];
            $number++;
        ?>
            <tr>
                <td><?php echo $number ?></td>
                <td><?php echo $chef_name ?></td>
                <td><?php echo $chef_position ?></td>
                <td><img class="imgg" src="./product_images/<?php echo $chef_image ?>" alt="image"></td>
                <td><a href='index.php?edit_chef=<?php echo $chef_id ?>' class='text-light'><i class='fas fa-edit'></i></a></td>
                <td><a href='index.php?delete_chef=<?php echo $chef_id ?>' class='text-light' data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='fas fa-trash'></i></a></td>
            </tr>
        <?php

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
                <h4>Delete this chef?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

                <a href='index.php?delete_chef=<?php echo $chef_id ?>' class='text-light' type="button" class="text-light text-decoration-none"><button class="btn btn-primary">Yes</button></a>
            </div>
        </div>
    </div>
</div>