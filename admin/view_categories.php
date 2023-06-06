<head>
    <!-- Custome CSS -->
    <!-- <link rel="stylesheet" href="../styles.css"> -->
</head>

<h3 class=" text-success text-center">All Categories</h3>

<table class="table table-bordered border-secondary mt-5 text-center">
    <thead class="nav-bg">
        <tr>
            <th>Category ID</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">

        <?php
        $get_categories = "SELECT * FROM tbl_categories";
        $res = mysqli_query($conn, $get_categories);
        $number = 0;
        while ($row = mysqli_fetch_assoc($res)) {
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $number++;
        ?>
            <tr>
                <td><?php echo $number ?></td>
                <td><?php echo $category_title ?></td>
                <td><a href='index.php?edit_category=<?php echo $category_id ?>' class='text-light'><i class='fas fa-edit'></i></a></td>
                <td><a href='index.php?delete_category=<?php echo $category_id ?>' class='text-light' data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='fas fa-trash'></i></a></td>
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
                <h4>Delete this category?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

                <a href='index.php?delete_brand=<?php echo $category_id ?>' class='text-light' type="button" class="text-light text-decoration-none"><button class="btn btn-primary">Yes</button></a>
            </div>
        </div>
    </div>
</div>