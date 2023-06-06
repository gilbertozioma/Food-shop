<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <!-- Custome CSS -->
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data" class="border mt-3 p-4 bg-light">
                    <!-- Email field -->
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="email">
                    </div>

                    <!-- Reset password button field -->
                    <div class="form-outline mb-3">
                        <input type="submit" value="Reset Password" name="contact" class="bg py-2 px-3 border-0 rounded-0 text-light">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap js Link -->
    <script src="../bootstrap-5/js/bootstrap.min.js"></script>
</body>

</html>