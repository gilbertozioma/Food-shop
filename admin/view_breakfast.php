<head>
    <!-- Custome CSS -->
    <!-- <link rel="stylesheet" href="../styles.css"> -->
</head>

<h3 class=" text-success text-center">All Breakfast</h3>

<table class="table table-bordered border-secondary mt-5 mb-5 text-center">
    <thead class="nav-bg">
        <tr>
            <th>ID</th>
            <th>Breakfast Title</th>
            <th>Breakfast Image</th>
            <th>Category Title</th>
            <th>Breakfast Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">

        <?php
        $get_breakfast = "SELECT * FROM tbl_breakfast";
        $res = mysqli_query($conn, $get_breakfast);
        $number = 0;
        
        while ($row = mysqli_fetch_assoc($res)) {
            $breakfast_id = $row['breakfast_id'];
            $breakfast_title = $row['breakfast_title'];
            $breakfast_image = $row['breakfast_image'];
            $category_title = $row['category_title'];
            $breakfast_price = $row['breakfast_price'];
            $status = $row['status'];
            $number++;
        ?>
            <tr>
                <td class="text-light"><?php echo $number ?></td>
                <td class="text-light"><?php echo $breakfast_title ?></td>
                <td><img class="imgg" src="product_images/<?php echo $breakfast_image ?>" alt="image"></td>
                <td class="text-light"><?php echo $category_title ?></td>
                <td class="text-light"><?php echo $breakfast_price ?></td>
                <td class="text-light">
                    <?php
                    $get_count = "SELECT * FROM tbl_orders_pending WHERE product_id = $breakfast_id";
                    $res_count = mysqli_query($conn, $get_count);
                    $row_count = mysqli_num_rows($res_count);
                    echo $row_count;
                    ?>
                </td>
                <td class="text-light"><?php echo $status ?></td>
                <td><a href='index.php?edit_breakfast=<?php echo $breakfast_id ?>' class='text-light'><i class='fas fa-edit'></i></a></td>
                <td><a href='index.php?delete_breakfast=<?php echo $breakfast_id ?>' class='text-light' data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='fas fa-trash'></i></a></td>
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
                <h4>Delete this breakfast?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

                <a href='index.php?delete_breakfast=<?php echo $breakfast_id ?>' class='text-light' type="button" class="text-light text-decoration-none"><button class="btn btn-primary">Yes</button></a>
            </div>
        </div>
    </div>
</div>