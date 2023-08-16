<head>
    <!-- Custome CSS -->
    <!-- <link rel="stylesheet" href="../styles.css"> -->
</head>

<h3 class=" text-success text-center">Carousel Details</h3>

<table class="table table-bordered border-secondary mt-5 mb-5 text-center">
    <thead class="nav-bg">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">

        <?php
        $get_products = "SELECT * FROM tbl_carousel";
        $res = mysqli_query($conn, $get_products);
        $number = 0;
        while ($row = mysqli_fetch_assoc($res)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image = $row['product_image'];
            $number++;
        ?>
            <tr>
                <td class="text-light"><?php echo $number ?></td>
                <td class="text-light"><?php echo $product_title ?></td>
                <td><img class="imgg" src="./product_images/<?php echo $product_image ?>" alt="image"></td>
                <td><a href='index.php?edit_carousel=<?php echo $product_id ?>' class='text-light'><i class='fas fa-edit'></i></a></td>
                <td><a href='index.php?delete_carousel=<?php echo $product_id ?>' class='text-light' data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='fas fa-trash'></i></a></td>
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
                <h4>Delete this image?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

                <a href='index.php?delete_carousel=<?php echo $product_id ?>' class='text-light' type="button" class="text-light text-decoration-none"><button class="btn btn-primary">Yes</button></a>
            </div>
        </div>
    </div>
</div>