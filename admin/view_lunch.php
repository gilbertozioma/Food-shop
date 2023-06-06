<head>
    <!-- Custome CSS -->
    <!-- <link rel="stylesheet" href="../styles.css"> -->
</head>

<head>
    <!-- Custome CSS -->
    <!-- <link rel="stylesheet" href="../styles.css"> -->
</head>

<h3 class=" text-success text-center">All Lunch</h3>

<table class="table table-bordered border-secondary mt-5 text-center">
    <thead class="nav-bg">
        <tr>
            <th>ID</th>
            <th>Lunch Title</th>
            <th>Lunch Image</th>
            <th>Category Title</th>
            <th>Lunch Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">

        <?php
        $get_lunch = "SELECT * FROM tbl_lunch";
        $res = mysqli_query($conn, $get_lunch);
        $number = 0;

        while ($row = mysqli_fetch_assoc($res)) {
            $lunch_id = $row['lunch_id'];
            $lunch_title = $row['lunch_title'];
            $lunch_image = $row['lunch_image'];
            $category_title = $row['category_title'];
            $lunch_price = $row['lunch_price'];
            $status = $row['status'];
            $number++;
        ?>
            <tr>
                <td><?php echo $number ?></td>
                <td><?php echo $lunch_title ?></td>
                <td><img class="imgg" src="product_images/<?php echo $lunch_image ?>" alt="image"></td>
                <td><?php echo $category_title ?></td>
                <td><?php echo $lunch_price ?></td>
                <td>
                    <?php
                    $get_count = "SELECT * FROM tbl_orders_pending WHERE product_id = $lunch_id";
                    $res_count = mysqli_query($conn, $get_count);
                    $row_count = mysqli_num_rows($res_count);
                    echo $row_count;
                    ?>
                </td>
                <td><?php echo $status ?></td>
                <td><a href='index.php?edit_lunch=<?php echo $lunch_id ?>' class='text-light'><i class='fas fa-edit'></i></a></td>
                <td><a href='index.php?delete_lunch=<?php echo $lunch_id ?>' class='text-light' data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='fas fa-trash'></i></a></td>
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
                <h4>Delete this lunch?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

                <a href='index.php?delete_lunch=<?php echo $lunch_id ?>' class='text-light' type="button" class="text-light text-decoration-none"><button class="btn btn-primary">Yes</button></a>
            </div>
        </div>
    </div>
</div>