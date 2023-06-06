<?php
include('includes/config.php');
session_start();
include('functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Com</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="./bootstrap-5/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous"> -->
    <!-- Font Awesome  Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custome CSS -->
    <link rel="stylesheet" href="styles.css">
    <!-- Custome CSS2 -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Internal CSS -->
    <style>
        body {
            overflow-x: hidden;
        }

        .input-group .input-group-prepend {
            margin-right: -1px;
        }

        .input-group .input-group-append {
            margin-left: -1px;
        }

        .input-group-text {
            background-color: transparent;
            height: 40px;
            /* border: none; */
        }

        .input-group-text:hover {
            background-color: #F79F1F;
            transition: .2s;
            cursor: pointer;
        }
    </style>
</head>

<body class="">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg nav-bg shadow sticky-top py-2">
        <div class="container-fluid">
            <a href="index.php"><img class="logoo" src="admin/product_images/Logo2.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse text-light" id="navbarSupportedContent" class="text-light">
                <ul class="navbar-nav ul-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#reservation">Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#blog">Blog</a>
                    </li>
                </ul>
                <!-- Search form -->
                <form action="search_product.php" method="get" role="search" class="form-inline " style="width: 149px;">
                    <div class="input-group">
                        <input type="search" name="search_data" class="form-control bg-light rounded-0 h-25" placeholder="Search">
                        <div class="input-group-prepend">
                            <button type="submit" class="border-1 rounded-0  h-100 text-white input-group-text" name="search_data_product"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <!-- User profile -->
                <div class="row m-2">
                    <div class="me-2 text-light">
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "<div>
                                    <a class='nav-link text-light' href='./user_area/profile.php'><i class='fa-solid fa-user'></i></a>
                                </div>";
                        } else {
                            echo "<div'>
                                    <a class='nav-link text-light' href='./user_area/user_registration.php'><i class='fa-solid fa-user'></i></a>
                                </div>";
                        }
                        ?>
                    </div>
                    <!-- Cart -->
                </div>
                <div class="nav-item me-3">
                    <a class="nav-link text-light" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup class="bg-danger" style="border-radius: 50%; padding: 0 5px;"><?php echo cart_items(); ?></sup></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- CALLING CART FUNCTION -->
    <?php
    cart();
    ?>


    <!-- Third Child -->
    <div class="bg-light mt-5 third-div">
        <h3 class="text-center h3-food">Your Search</h3>
        <p class="text-center">A hungry man is an angry man. Don't be hungry, be full and happy!</p>
    </div>
    <br><br>

    <!-- Fourth Child -->
    <div class="row">
        <div class="col-12">
            <!-- Products -->
            <div class="row justify-content-center">

                <!-- Fetching data -->
                <?php
                // Calling function
                search_product();

                ?>
            </div>
        </div>

        <!-- Menu -->
        <section id="menu" class="bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12 intro-text">
                        <h1>Explore Our Menu</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo eos culpa eveniet tempora sint! Nulla, recusandae.</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <ul class="nav nav-pills mb-5 justify-content-center" id="pills-tab" role="tablist">

                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All Items</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-breakfast-tab" data-bs-toggle="pill" data-bs-target="#pills-breakfast" type="button" role="tab" aria-controls="pills-breakfast" aria-selected="true">Breakfast</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-lunch-tab" data-bs-toggle="pill" data-bs-target="#pills-lunch" type="button" role="tab" aria-controls="pills-lunch" aria-selected="true">Lunch</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-dinner-tab" data-bs-toggle="pill" data-bs-target="#pills-dinner" type="button" role="tab" aria-controls="pills-dinner" aria-selected="true">Dinner</button>
                    </li>

                </ul>

                <div class="tab-content " id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
                        <div class="row">
                            <?php
                            getProducts();
                            ?>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="pills-breakfast" role="tabpanel" aria-labelledby="pills-breakfast-tab" tabindex="0">
                        <div class="row">
                            <?php
                            getBreakfast();
                            ?>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="pills-lunch" role="tabpanel" aria-labelledby="pills-lunch-tab" tabindex="0">
                        <div class="row">
                            <?php
                            getLunch();
                            ?>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="pills-dinner" role="tabpanel" aria-labelledby="pills-dinner-tab" tabindex="0">
                        <div class="row">
                            <?php
                            getDinner();
                            ?>
                        </div>
                    </div>

                </div>
            </div>

        </section>

        <!-- Features -->
        <section id="features" class="bg-cover">
            <div class="container">
                <div class="row">
                    <div class="col-12 intro-text">
                        <h1 class="text-white">Why choose us?</h1>
                        <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae sint
                            temporibus natus optio
                            eveniet nobis accusantium?</p>
                    </div>
                </div>
                <div class="row gy-4">
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature p-4 text-center">
                            <div class="feature-icon">
                                <i class="fa-solid fa-wifi"></i>
                            </div>
                            <h4 class="text-white mt-4 mb-2">Free Wifi</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, similique
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature p-4 text-center">
                            <div class="feature-icon">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <h4 class="text-white mt-4 mb-2">Fast Delivery</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, similique
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature p-4 text-center">
                            <div class="feature-icon">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <h4 class="text-white mt-4 mb-2">Friendly Staff</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, similique
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="feature p-4 text-center">
                            <div class="feature-icon">
                                <i class="fa-solid fa-chart-simple"></i>
                            </div>
                            <h4 class="text-white mt-4 mb-2">Highly Rated</h4>
                            <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, similique
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team -->
        <section id="team">
            <div class="container">
                <div class="row">
                    <div class="col-12 intro-text">
                        <h1>Our Chefs</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae sint temporibus natus optio
                            eveniet nobis accusantium?</p>
                    </div>
                </div>
                <div class="row gy-4">
                    <?php
                    getChef();
                    ?>
                </div>
            </div>
        </section>

        <!-- Review -->
        <section id="reviews" class="bg-cover">
            <div class="container">
                <div class="row">
                    <div class="col-12 intro-text">
                        <h1 class="text-white">Our Client Saying</h1>
                        <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae sint
                            temporibus natus optio
                            eveniet nobis accusantium?</p>
                    </div>
                </div>

                <div id="reviewSlider" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">

                        <button type="button" data-bs-target="#reviewSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#reviewSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>

                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="review bg-white p-5 text-center">
                                        <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                                        <p class="mb-0">There are many variations of passages of have suffered alteration in
                                            some form, by injected humour, or randomised words which don't look even
                                            slightly believable. If you are going to use a passage of Lorem Ipsum, you need
                                            to be sure there isn't</p>
                                        <div class="person mt-4">
                                            <img src="./assets/images/avatar_01.jpg" alt="">
                                            <h4 class="mb-0 mt-2">Jon Doe</h4>
                                            <span class="stars">
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star-half-stroke'></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="review bg-white p-5 text-center">
                                        <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                                        <p class="mb-0">There are many variations of passages of have suffered alteration in
                                            some form, by injected humour, or randomised words which don't look even
                                            slightly believable. If you are going to use a passage of Lorem Ipsum, you need
                                            to be sure there isn't</p>
                                        <div class="person mt-4">
                                            <img src="./assets/images/avatar_02.jpg" alt="">
                                            <h4 class="mb-0 mt-2">Jon Doe</h4>
                                            <span class="stars">
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star-half-stroke'></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#reviewSlider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#reviewSlider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>

            </div>
        </section>

        <!-- Reservation -->
        <section id="reservation">
            <div class="container">
                <div class="row">
                    <div class="col-12 intro-text">
                        <h1>Book Your Table</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae sint temporibus natus optio
                            eveniet nobis accusantium?</p>
                    </div>
                </div>
                <form action="#" class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="row g-3">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Full name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" placeholder="Email address">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Date">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Time">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="" id="" cols="30" rows="4" class="form-control" placeholder="Meesage"></textarea>
                            </div>
                            <div class="form-group text-center col-md-12">
                                <a href="#" class="btn btn-brand">Send Message</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- Insta Posts -->
        <div class="row g-0">
            <div class="row">
                <div class="col-12 intro-text">
                    <h1>Instagram Posts</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae sint temporibus natus optio
                        eveniet nobis accusantium?</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="insta-post">
                    <img src="./assets/images/insta_post01.jpg" alt="">
                    <a href="#" class="insta-btn">
                        <i class="fa-brands fa-instagram fs-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="insta-post">
                    <img src="./assets/images/insta_post02.jpg" alt="">
                    <a href="#" class="insta-btn">
                        <i class="fa-brands fa-instagram fs-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="insta-post">
                    <img src="./assets/images/insta_post03.jpg" alt="">
                    <a href="#" class="insta-btn">
                        <i class="fa-brands fa-instagram fs-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="insta-post">
                    <img src="./assets/images/insta_post04.jpg" alt="">
                    <a href="#" class="insta-btn">
                        <i class="fa-brands fa-instagram fs-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Blog Post -->
        <section id="blog">
            <div class="container">
                <div class="row">
                    <div class="col-12 intro-text">
                        <h1>Blog Posts</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae sint temporibus natus optio
                            eveniet nobis accusantium?</p>
                    </div>
                </div>
                <div class="row gy-4">
                    <div class="col-sm-6">
                        <div class="blog-post d-flex shadow-on-hover">
                            <img src="./assets/images/item_8.jpg" alt="">
                            <div class="blog-post-content p-4">
                                <p>Posted: 20 Apr, 2023</p>
                                <h4><a href="#">How to make delicious food
                                    </a></h4>
                                <p>Consectetur adipisicing elit. Consequatur, architecto quisquam. Cumque!</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="blog-post d-flex shadow-on-hover">
                            <img src="./assets/images/item_6.jpg" alt="">
                            <div class="blog-post-content p-4">
                                <p>Posted: 20 Apr, 2023</p>
                                <h4><a href="#">How to make delicious food
                                    </a></h4>
                                <p>Consectetur adipisicing elit. Consequatur, architecto quisquam. Cumque!</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="blog-post d-flex shadow-on-hover">
                            <img src="./assets/images/item_7.jpg" alt="">
                            <div class="blog-post-content p-4">
                                <p>Posted: 20 Apr, 2023</p>
                                <h4><a href="#">How to make delicious food
                                    </a></h4>
                                <p>Consectetur adipisicing elit. Consequatur, architecto quisquam. Cumque!</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="blog-post d-flex shadow-on-hover">
                            <img src="./assets/images/item_3.jpg" alt="">
                            <div class="blog-post-content p-4">
                                <p>Posted: 20 Apr, 2023</p>
                                <h4><a href="#">How to make delicious food
                                    </a></h4>
                                <p>Consectetur adipisicing elit. Consequatur, architecto quisquam. Cumque!</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bootstrap js Link -->
        <script src="./bootstrap-5/js/bootstrap.min.js"></script>

        <?php
        include('./includes/footer.php');
        ?>