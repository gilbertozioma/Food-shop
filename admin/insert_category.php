<?php
include '../includes/config.php';
session_start();

//definding and initiallizing $res
$stm = null;

// Initialize input variable
$ct = "";

// Initialize error variable
$ctErr = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["cat_title"])) {
        $ctErr = "Input is required";
    } else {
        $ct = $_POST['cat_title'];
    }

    //1. To prevent same data to be stored to the database
    $sql_select = "SELECT * FROM tbl_categories WHERE category_title='$ct'";
    //2. Execute Query and save Data in database
    $res_select = mysqli_query($conn, $sql_select) or die(mysqli_error());

    $count = mysqli_num_rows($res_select);
    if ($count > 0) {
        echo "<script>alert('This Category is already existing in the Database.')</script>";
    } else {

        if (empty($ctErr)) {
            //3. SQL Query to save the data into database
            $sql = "INSERT INTO tbl_categories (category_title) VALUE (?)";

            // Prepare statement
            $stm = $conn->prepare($sql);

            if ($stm) {

                // Bind parameter to the placeholder
                $stm->bind_param('s', $ct);

                // Execute the prepared statement
                if ($stm->execute()) {
                    $_SESSION['add'] = "<div class='alert alert-success text-center m-auto w-50'>Category Added Successfully.</div>";
                    header("Location: index.php");
                    // echo "<script>alert('Category added successfull.')</script>";
                } else {
                    // exit();
                    echo "<script>alert('Category did not upload.')</script>";
                }

                // Close the statement
                $stm->close();
            } else {
                echo "Error preparing statement: " . $conn->error; // Display error message
            }
        }
    }

    // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert_Catigory_Admin</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous"> -->
    <!-- Font Awesome  Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custome CSS -->
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="mb-4 rounded-3 my-4 bg-light w-50 m-auto">
        <h4 class="text-center p-3 mb-4">Add Category</h4>
        <div class="input-group mb-2 m-auto w-50">
            <span class="input-group-text nav-bg" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control w-50" name="cat_title" placeholder="Add Category" aria-label="categories" aria-describedby="basic-addon1">
        </div>
        <div class="text-danger text-center"><?php echo $ctErr; ?></div>
        <div class="input-group w-10 m-auto">
            <button type="submit" class="btn btn-sm border-0 mb-3 nav-bg m-auto btn-primary mt-3">Add Category</button>
        </div>
    </form>
</body>

</html>