<?php
// connecting to database
// include('./includes/config.php');

// Get product
function getProducts()
{
    global $conn;

    // Check if the category and brand GET parameters are not set
    if (!isset($_GET['breakfast'])) {
        if (!isset($_GET['lunch'])) {
            if (!isset($_GET['dinner'])) {

                // Construct SQL query to get all products and shuffle the results
                $sql = "SELECT * FROM tbl_products order by rand()"; // limit 0,6

                // Execute the query and store the result in $res variable
                $res = mysqli_query($conn, $sql);

                // Loop through each row in the result set and display product information using HTML code
                while ($row_data = mysqli_fetch_assoc($res)) {
                    // Extract product information from the current row
                    $product_id = $row_data['product_id'];
                    $product_title = $row_data['product_title'];
                    $product_description = $row_data['product_description'];
                    // $breakfast_id = $row_data['breakfast_id'];
                    // $lunch_id = $row_data['lunch_id'];
                    $product_image = $row_data['product_image'];
                    $product_price = $row_data['product_price'];

                    // Output the product information using echo and HTML code
                    echo "<div class='col-lg-3 mb-3 col-sm-6'>
                        <div  class='card menu-item bg-white shadow-on-hovert'>
                            <img src='./admin/product_images/$product_image' class='card-img-top' alt='product1'>
                            <div class='card-body'>
                            <div class='menu-item-contents'>
                                </div>
                                <h5 class='card-title fs-4'>$product_title</h5>
                                <p class='card-text'> $product_description <br> <span class='fs-5 fw-bold'>Price: $product_price&#x20A6</span></p>
                                <a href='index.php?add_to_cart=$product_id' class='btn text-light bg'><i class='fas fa-shopping-cart'></i></a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'><i class='fa-solid fa-eye'></i></a>
                            </div>
                        </div>
                    </div>";
                }
            }
        }
    }
}



// /////////////////////////////////////////////////////////////////////////////
// Get product
function getBreakfast()
{
    global $conn;

    // Construct SQL query to get all products and shuffle the results
    $sql = "SELECT * FROM tbl_breakfast order by rand()"; // limit 0,6

    // Execute the query and store the result in $res variable
    $res = mysqli_query($conn, $sql);

    // Loop through each row in the result set and display product information using HTML code
    while ($row_data = mysqli_fetch_assoc($res)) {
        // Extract product information from the current row
        $breakfast_id = $row_data['breakfast_id'];
        $breakfast_title = $row_data['breakfast_title'];
        $breakfast_description = $row_data['breakfast_description'];
        $breakfast_image = $row_data['breakfast_image'];
        $breakfast_price = $row_data['breakfast_price'];

        // Output the product information using echo and HTML code
        echo "<div class='col-lg-3 mb-3 col-sm-6'>
                <div  class='card menu-item bg-white shadow-on-hovert'>
                    <img src='./admin/product_images/$breakfast_image' class='card-img-top' alt='product1'>
                    <div class='card-body'>
                    <div class='menu-item-contents'>
                        </div>
                        <h5 class='card-title fs-4'>$breakfast_title</h5>
                        <p class='card-text'> $breakfast_description <br> <span class='fs-5 fw-bold'>Price: $breakfast_price&#x20A6</span></p>
                        <a href='index.php?add_to_cart=$breakfast_id' class='btn text-light bg'><i class='fas fa-shopping-cart'></i></a>
                        <a href='product_details.php?breakfast_id=$breakfast_id' class='btn btn-secondary'><i class='fa-solid fa-eye'></i></a>
                    </div>
                </div>
            </div>";
    }
}


// /////////////////////////////////////////////////////////////////////////////
// Get product
function getLunch()
{
    global $conn;

    // Construct SQL query to get all products and shuffle the results
    $sql = "SELECT * FROM tbl_lunch order by rand()"; // limit 0,6

    // Execute the query and store the result in $res variable
    $res = mysqli_query($conn, $sql);

    // Loop through each row in the result set and display product information using HTML code
    while ($row_data = mysqli_fetch_assoc($res)) {
        // Extract product information from the current row
        $lunch_id = $row_data['lunch_id'];
        $lunch_title = $row_data['lunch_title'];
        $lunch_description = $row_data['lunch_description'];
        $lunch_image = $row_data['lunch_image'];
        $lunch_price = $row_data['lunch_price'];

        // Output the product information using echo and HTML code
        echo "<div class='col-lg-3 col-sm-6'>
            <div  class='card menu-item bg-white shadow-on-hovert'>
                <img src='./admin/product_images/$lunch_image' class='card-img-top' alt='lunch1'>
                <div class='card-body'>
                <div class='menu-item-contents'>
                    </div>
                    <h5 class='card-title fs-4'>$lunch_title</h5>
                    <p class='card-text'> $lunch_description <br> <span class='fs-5 fw-bold'>Price: $lunch_price&#x20A6</span></p>
                    <a href='index.php?add_to_cart=$lunch_id' class='btn text-light bg'><i class='fas fa-shopping-cart'></i></a>
                    <a href='product_details.php?lunch_id=$lunch_id' class='btn btn-secondary'><i class='fa-solid fa-eye'></i></a>
                </div>
            </div>
        </div>";
    }
}

// /////////////////////////////////////////////////////////////////////////////
// Get product
function getDinner()
{
    global $conn;

    // Construct SQL query to get all products and shuffle the results
    $sql = "SELECT * FROM tbl_dinner order by rand()"; // limit 0,6

    // Execute the query and store the result in $res variable
    $res = mysqli_query($conn, $sql);

    // Loop through each row in the result set and display product information using HTML code
    while ($row_data = mysqli_fetch_assoc($res)) {
        // Extract product information from the current row
        $dinner_id = $row_data['dinner_id'];
        $dinner_title = $row_data['dinner_title'];
        $dinner_description = $row_data['dinner_description'];
        $dinner_image = $row_data['dinner_image'];
        $dinner_price = $row_data['dinner_price'];

        // Output the product information using echo and HTML code
        echo "<div class='col-lg-3 col-sm-6'>
            <div  class='card menu-item bg-white shadow-on-hovert'>
                <img src='./admin/product_images/$dinner_image' class='card-img-top' alt='dinner1'>
                <div class='card-body'>
                <div class='menu-item-contents'>
                    </div>
                    <h5 class='card-title fs-4'>$dinner_title</h5>
                    <p class='card-text'> $dinner_description <br> <span class='fs-5 fw-bold'>Price: $dinner_price&#x20A6</span></p>
                    <a href='index.php?add_to_cart=$dinner_id' class='btn text-light bg'><i class='fas fa-shopping-cart'></i></a>
                    <a href='product_details.php?dinner_id=$dinner_id' class='btn btn-secondary'><i class='fa-solid fa-eye'></i></a>
                </div>
            </div>
        </div>";
    }
}



// /////////////////////////////////////////////////////////////////////////////

function carousel()
{
    global $conn;

    // Construct SQL query to get all products and shuffle the results
    $sql = "SELECT * FROM tbl_carousel";

    // Execute the query and store the result in $res variable
    $res = mysqli_query($conn, $sql);

    // Loop through each row in the result set and display product information using HTML code
    while ($row_data = mysqli_fetch_assoc($res)) {

        // Extract product information from the current row
        $product_id = $row_data['product_id'];
        $product_title = $row_data['product_title'];
        $product_image = "./admin/product_images/" . $row_data['product_image'];
        $product_description = $row_data['product_description'];

        // Output the product information using echo and HTML code
        echo "<div class='carousel-item text-center bg-dark vh-100 active bg-cover' style='background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(\"$product_image\");'>
            <div class='container h-100 d-flex align-items-center justify-content-center'>
                <div class='row justify-content-center'>
                    <div class='col-lg-8'>
                        <h1 class='text-white'>$product_title</h1>
                        <p class='text-white display-4'>$product_description</p>
                        <a href='#menu' class='btn bg text-light'>Explore Items</a>
                    </div>
                </div>
            </div>
        </div>";
    }
}



// /////////////////////////////////////////////////////////////////////////////
function getChef(){
    global $conn;

    // Construct SQL query to get all products and shuffle the results
    $sql = "SELECT * FROM tbl_chef";

    // Execute the query and store the result in $res variable
    $res = mysqli_query($conn, $sql);

    // Loop through each row in the result set and display chef information using HTML code
    while ($row_data = mysqli_fetch_assoc($res)) {

        // Extract product information from the current row
        $chef_id = $row_data['chef_id'];
        $chef_name = $row_data['chef_name'];
        $chef_position = $row_data['chef_position'];
        $chef_image = $row_data['chef_image'];

        // Output the product information using echo and HTML code
        echo "<div class='col-lg-3 col-sm-6'>
                    <div class='team-member px-3 py-5 border shadow-on-hover text-center'>
                        <img src='./admin/product_images/$chef_image' alt='$chef_image'>
                        <div class='team-member-content rounded-pil'>
                            <h4 class='mb-0 fs-5 mt-4'>$chef_name</h4>
                            <p class='mb-0'>$chef_position</p>
                        </div>
                    </div>
                </div>";
    }
}



// /////////////////////////////////////////////////////////////////////////////
// GETTING ALL PRODUCS
function get_all_products()
{
    global $conn;

    // Check if the category and brand GET parameters are not set
    if (!isset($_GET['breakfast'])) {
        if (!isset($_GET['lunch'])) {
            if (!isset($_GET['dinner'])) {

                // Construct SQL query to get all products and shuffle the results
                $sql = "SELECT * FROM tbl_products order by rand()";

                // Execute the query and store the result in $res variable
                $res = mysqli_query($conn, $sql);

                // Loop through each row in the result set and display product information using HTML code
                while ($row_data = mysqli_fetch_assoc($res)) {
                    // Extract product information from the current row
                    $product_id = $row_data['product_id'];
                    $product_title = $row_data['product_title'];
                    $product_description = $row_data['product_description'];
                    $breakfast_id = $row_data['breakfast_id'];
                    $lunch_id = $row_data['lunch_id'];
                    $dinner_id = $row_data['dinner_id'];
                    $product_image = $row_data['product_image'];
                    $product_price = $row_data['product_price'];

                    // Output the product information using echo and HTML code
                    echo "<div class='col-md-4 mb-2'>
                        <div class='card text-light''>
                            <img src='./admin/product_images/$product_image' class='card-img-top' alt='product1'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'> $product_description  <span class='fs-4'>$product_price&#x20A6</span></p>
                                <a href='index.php?add_to_cart=$product_id' class='btn text-light bg'><i class='fas fa-shopping-cart'></i> Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'><i class='fa-solid fa-eye'></i> View more</a>
                            </div>
                        </div>
                    </div>";
                }
            }
        }
    }
}



// /////////////////////////////////////////////////////////////////////////////

// A function to get unique categories of products from the database
// function getUniqueCategories()
// {
//     // Access global database connection variable
//     global $conn;

//     // Check if the 'category' parameter is set in the URL
//     if (isset($_GET['category'])) {
//         $category_id = $_GET['category'];
//         $sql = "SELECT * FROM tbl_products WHERE category_id = $category_id";
//         $res = mysqli_query($conn, $sql);

//         // Check if any rows are returned from the database query
//         $num_of_rows = mysqli_num_rows($res);
//         if ($num_of_rows == 0) {
//             // Output a message if there are no products found in the category
//             echo "<h2 class='text-center text-danger'>No stock found in this category.</2>";
//         }

//         // Loop through the rows returned by the database query
//         while ($row_data = mysqli_fetch_assoc($res)) {
//             // Get the product details from the current row
//             $product_id = $row_data['product_id'];
//             $product_title = $row_data['product_title'];
//             $product_description = $row_data['product_description'];
//             $category_id = $row_data['category_id'];
//             $product_image1 = $row_data['product_image1'];
//             $product_price = $row_data['product_price'];

//             // Output HTML code for the current product using echo
//             echo "<div class='col-md-4 mb-2'>
//                         <div class='card text-light''>
//                             <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
//                             <div class='card-body'>
//                                 <h5 class='card-title'>$product_title</h5>
//                                 <p class='card-text'> $product_description <span class='fs-4'>$product_price&#x20A6</span></p>
//                                <a href='index.php?add_to_cart=$product_id' class='btn text-light bg'><i class='fas fa-shopping-cart'></i> Add to cart</a>
//                                 <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'><i class='fa-solid fa-eye'></i> View more</a>
//                             </div>
//                         </div>
//                     </div>";
//         }
//     }
// }



// /////////////////////////////////////////////////////////////////////////////

// searching products function
function search_product()
{
    global $conn;

    // Check if search data is set in the URL
    if (isset($_GET['search_data_product'])) {

        // Get the search query value from the URL
        $search_data_value = $_GET['search_data'];

        // Build the SQL query to search for products with keywords that match the search query value
        $search_query = "SELECT * FROM tbl_products WHERE product_keywords LIKE '%$search_data_value%'";

        // Execute the search query and get the result
        $res = mysqli_query($conn, $search_query);

        // Get the number of rows returned by the search query
        $num_of_rows = mysqli_num_rows($res);

        // If no result is returned by the search query, output a message to the user
        if ($num_of_rows == 0) {
            echo "<h5 class='text-center text-danger'>No result match. No product found.</h5>";
        }

        // If the search query returns one or more products, loop through each product and output its details in HTML
        while ($row_data = mysqli_fetch_assoc($res)) {

            // Get the product details from the current row of the search result
            $product_id = $row_data['product_id'];
            $product_title = $row_data['product_title'];
            $product_description = $row_data['product_description'];
            $product_image = $row_data['product_image'];
            $product_price = $row_data['product_price'];

            // Output the HTML code for the current product
            echo "<div class='col-lg-3 col-sm-6'>
                <div  class='card menu-item bg-white shadow-on-hovert'>
                            <img src='./admin/product_images/$product_image' class='card-img-top' alt='product1'>
                            <div class='card-body'>
                            <div class='menu-item-contents'>
                            <span class='related2'>
                            <i class='fa-solid fa-star'></i>
                            <i class='fa-solid fa-star'></i>
                            <i class='fa-solid fa-star'></i>
                            <i class='fa-solid fa-star'></i>
                            <i class='fa-solid fa-star-half-stroke'></i>
                            </span>
                            <span>Rated(5.4)</span>
                                </div>
                                <h5 class='card-title fs-3'>$product_title</h5>
                                <p class='card-text'> $product_description <br> <span class='fs-5 fw-bold'>Price: $product_price&#x20A6</span></p>
                                <a href='index.php?add_to_cart=$product_id' class='btn text-light bg'><i class='fas fa-shopping-cart'></i></a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'><i class='fa-solid fa-eye'></i></a>
                            </div>
                        </div>
                </div>";
        }
    }
}


// /////////////////////////////////////////////////////////////////////////////

// VIEW DETAIL FUNCTION

function view_details()
{
    global $conn;

    // Check if the category and brand GET parameters are not set
    if (isset($_GET['product_id'])) {

        $product_id = $_GET['product_id'];

        // Construct SQL query to get all products and shuffle the results
        $sql = "SELECT * FROM tbl_products WHERE product_id = $product_id";

        // Execute the query and store the result in $res variable
        $res = mysqli_query($conn, $sql);

        // Loop through each row in the result set and display product information using HTML code
        while ($row_data = mysqli_fetch_assoc($res)) {
            // Extract product information from the current row
            $product_id = $row_data['product_id'];
            $product_title = $row_data['product_title'];
            $product_description = $row_data['product_description'];
            $product_image = $row_data['product_image'];
            $product_price = $row_data['product_price'];

            // Output the product information using echo and HTML code
            echo "<div class='col-md-12 w-75 mb-5 m-auto product-detail'>
                    <div class='bg-light border border-2 text-dark'>
                        <img src='./admin/product_images/$product_image' class='card-img-top' alt='product1'>
                        <div class='card-body m-2'>
                            <div class='menu-item-contents'>
                            </div>
                            <h5 class='card-title mt-4'>$product_title</h5>
                            <p class='card-text text'> $product_description <br><span class='fs-4'>$product_price&#x20A6</span></p>
                            <a href='index.php?add_to_cart=$product_id' class='btn text-light bg'><i class='fas fa-shopping-cart'></i> Add to cart</a>
                        </div>
                    </div>
                </div>";
        }
    }
}


// /////////////////////////////////////////////////////////////////////////////

function view_breakfast_details()
{
    global $conn;

    // Check if the category and brand GET parameters are not set
    if (isset($_GET['breakfast_id'])) {

        $breakfast_id = $_GET['breakfast_id'];

        // Construct SQL query to get all breakfasts and shuffle the results
        $sql = "SELECT * FROM tbl_breakfast WHERE breakfast_id = $breakfast_id";

        // Execute the query and store the result in $res variable
        $res = mysqli_query($conn, $sql);

        // Loop through each row in the result set and display breakfast information using HTML code
        while ($row_data = mysqli_fetch_assoc($res)) {
            // Extract breakfast information from the current row
            $breakfast_id = $row_data['breakfast_id'];
            $breakfast_title = $row_data['breakfast_title'];
            $breakfast_description = $row_data['breakfast_description'];
            $breakfast_image = $row_data['breakfast_image'];
            $breakfast_price = $row_data['breakfast_price'];

            // Output the breakfast information using echo and HTML code
            echo "<div class='col-md-12 w-75 mb-5 m-auto product-detail'>
                    <div class='bg-light border border-2 text-dark'>
                        <img src='./admin/product_images/$breakfast_image' class='card-img-top' alt='breakfast1'>
                        <div class='card-body m-2'>
                            <div class='menu-item-contents'>
                            </div>
                            <h5 class='card-title mt-4'>$breakfast_title</h5>
                            <p class='card-text text'> $breakfast_description <br><span class='fs-4'>$breakfast_price&#x20A6</span></p>
                            <a href='index.php?add_to_cart=$breakfast_id' class='btn text-light bg'><i class='fas fa-shopping-cart'></i> Add to cart</a>
                            
                        </div>
                    </div>
                </div>";
        }
    }
}


// /////////////////////////////////////////////////////////////////////////////

function view_lunch_details()
{
    global $conn;

    // Check if the category and brand GET parameters are not set
    if (isset($_GET['lunch_id'])) {

        $lunch_id = $_GET['lunch_id'];

        // Construct SQL query to get all lunchs and shuffle the results
        $sql = "SELECT * FROM tbl_lunch WHERE lunch_id = $lunch_id";

        // Execute the query and store the result in $res variable
        $res = mysqli_query($conn, $sql);

        // Loop through each row in the result set and display lunch information using HTML code
        while ($row_data = mysqli_fetch_assoc($res)) {
            // Extract lunch information from the current row
            $lunch_id = $row_data['lunch_id'];
            $lunch_title = $row_data['lunch_title'];
            $lunch_description = $row_data['lunch_description'];
            $lunch_image = $row_data['lunch_image'];
            $lunch_price = $row_data['lunch_price'];

            // Output the lunch information using echo and HTML code
            echo "<div class='col-md-12 w-75 mb-5 m-auto product-detail'>
                    <div class='bg-light border border-2 text-dark'>
                        <img src='./admin/product_images/$lunch_image' class='card-img-top' alt='lunch1'>
                        <div class='card-body m-2'>
                            <div class='menu-item-contents'>
                            </div>
                            <h5 class='card-title mt-4'>$lunch_title</h5>
                            <p class='card-text text'> $lunch_description <br><span class='fs-4'>$lunch_price&#x20A6</span></p>
                            <a href='index.php?add_to_cart=$lunch_id' class='btn text-light bg'><i class='fas fa-shopping-cart'></i> Add to cart</a>
                        </div>
                    </div>
                </div>";
        }
    }
}


// /////////////////////////////////////////////////////////////////////////////

function view_dinner_details()
{
    global $conn;

    // Check if the category and brand GET parameters are not set
    if (isset($_GET['dinner_id'])) {

        $dinner_id = $_GET['dinner_id'];

        // Construct SQL query to get all dinners and shuffle the results
        $sql = "SELECT * FROM tbl_dinner WHERE dinner_id = $dinner_id";

        // Execute the query and store the result in $res variable
        $res = mysqli_query($conn, $sql);

        // Loop through each row in the result set and display dinner information using HTML code
        while ($row_data = mysqli_fetch_assoc($res)) {
            // Extract dinner information from the current row
            $dinner_id = $row_data['dinner_id'];
            $dinner_title = $row_data['dinner_title'];
            $dinner_description = $row_data['dinner_description'];
            $dinner_image = $row_data['dinner_image'];
            $dinner_price = $row_data['dinner_price'];

            // Output the dinner information using echo and HTML code
            echo "<div class='col-md-12 w-75 mb-5 m-auto product-detail'>
                    <div class='bg-light border border-2 text-dark'>
                        <img src='./admin/product_images/$dinner_image' class='card-img-top' alt='dinner1'>
                        <div class='card-body m-2'>
                            <div class='menu-item-contents'>
                            </div>
                            <h5 class='card-title mt-4'>$dinner_title</h5>
                            <p class='card-text text'> $dinner_description <br><span class='fs-4'>$dinner_price&#x20A6</span></p>
                            <a href='index.php?add_to_cart=$dinner_id' class='btn text-light bg'><i class='fas fa-shopping-cart'></i> Add to cart</a>
                        </div>
                    </div>
                </div>";
        }
    }
}


// /////////////////////////////////////////////////////////////////////////////

// GET IP ADDRESS
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();
// echo 'User Real IP Address - ' . $ip;

// /////////////////////////////////////////////////////////////////////////////

// ADD TO CART FUNCTION
function cart()
{
    // if the user has clicked the 'Add to Cart' button
    if (isset($_GET['add_to_cart'])) {

        // access global connection variable
        global $conn;

        // get the user's IP address
        $get_ip_address = getIPAddress();

        // get the product ID that was clicked on
        $get_product_id = $_GET['add_to_cart'];

        // check if this product is already in the user's cart
        $sql = "SELECT * FROM tbl_cart_details WHERE ip_address = '$get_ip_address' AND product_id = $get_product_id";

        // Execut the query
        $res = mysqli_query($conn, $sql);

        // Count the number of rows returned by the query result to check if the item is already in the cart
        $num_of_rows = mysqli_num_rows($res);

        // If there are no rows returned by the query, display a message to the user
        if ($num_of_rows > 0) {

            // show an alert to the user
            echo "<script>alert('This item is already in cart.')</script>";

            // redirect the user to the home page
            echo "<script>window.open('index.php','_self')</script>";
        }

        // If the product is not already in the user's cart, add it to the cart
        else {
            // The query will insert the selected product ID, the user's IP address, and a default quantity of 0 into the appropriate columns
            $insert_query = "INSERT INTO tbl_cart_details (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_address', 1)";

            // insert the data into the database
            $res = mysqli_query($conn, $insert_query);

            // show an alert to the user
            echo "<script>alert('Item is added to cart.')</script>";

            // redirect the user to the index page
            echo "<script>window.open('index.php?display_all','_self')</script>";
        }
    }
}



// /////////////////////////////////////////////////////////////////////////////

//  FUNCTION TO SHOW NUMBER OF ITEMS IN THE CHAT ICON
function cart_items()
{
    // if user has just added an item to the cart
    if (isset($_GET['add_to_cart'])) {

        // access global connection variable
        global $conn;

        // get user's IP address
        $get_ip_address = getIPAddress();

        // query to get items in cart for this user
        $sql = "SELECT * FROM tbl_cart_details WHERE ip_address = '$get_ip_address'";

        // execute query
        $res = mysqli_query($conn, $sql);

        // get count of items in cart for this user
        $count_cart_items = mysqli_num_rows($res);

        // If there are no rows returned by the query, display a message to the user

    }

    // if "add_to_cart" is not set in URL
    else {
        // access global connection variable
        global $conn;

        // get user's IP address
        $get_ip_address = getIPAddress();

        // query to get items in cart for this user
        $sql = "SELECT * FROM tbl_cart_details WHERE ip_address = '$get_ip_address'";

        // execute query
        $res = mysqli_query($conn, $sql);

        // get count of items in cart for this user
        $count_cart_items = mysqli_num_rows($res);
    }

    // display the count of items in cart
    echo $count_cart_items;
}



// /////////////////////////////////////////////////////////////////////////////

// TOTTAL PRICE FUNCTION
function total_price()
{
    // Using the global $conn object to connect to the database
    global $conn;

    // Getting the IP address of the current user
    $get_ip_address = getIPAddress();

    // Initializing the total price to 0
    $total_price = 0;

    // Query to fetch all cart items associated with the IP address
    $sql = "SELECT * FROM tbl_cart_details WHERE ip_address = '$get_ip_address'";

    // Executing the query
    $res = mysqli_query($conn, $sql);

    // Looping through the result set
    while ($row_data = mysqli_fetch_array($res)) {

        // Getting the product ID
        $product_id = $row_data['product_id'];

        // Query to fetch the product details
        $select_products = "SELECT * FROM tbl_products WHERE product_id = '$product_id'";

        // Executing the query
        $res_product = mysqli_query($conn, $select_products);

        // Looping through the product result set
        while ($row_product_price = mysqli_fetch_array($res_product)) {

            // Getting the product price and storing it in an array
            $product_price = array($row_product_price['product_price']);

            // Calculating the sum of the product prices
            $product_values = array_sum($product_price);

            // Adding the sum to the total price
            $total_price += $product_values;
        }
    }

    // Printing the total price
    echo $total_price;
}



// /////////////////////////////////////////////////////////////////////////////

// GET USER ORDER DETAILS
function get_user_order_details()
{
    // Make $conn (database connection) available within this function
    global $conn;

    // Get the username from the session
    $username = $_SESSION['username'];

    // Get the user details based on the username
    $get_details = "SELECT * FROM tbl_user WHERE username = '$username'";

    // Execute the query
    $res = mysqli_query($conn, $get_details);

    // Loop through the results
    while ($row_query = mysqli_fetch_array($res)) {

        // Get the user ID from the current row
        $user_id = $row_query['user_id'];

        // If the 'edit_account' query parameter is not set
        if (!isset($_GET['edit_account'])) {

            // If the 'my_orders' query parameter is not set
            if (!isset($_GET['my_orders'])) {

                // If the 'delete_account' query parameter is not set
                if (!isset($_GET['delete_account'])) {

                    // Get the pending orders for the current user
                    $get_orders = "SELECT * FROM tbl_user_order WHERE user_id = $user_id AND order_status = 'pending'";

                    // Execute the query
                    $res_order = mysqli_query($conn, $get_orders);

                    // Get the number of rows returned
                    $row_count = mysqli_num_rows($res_order);

                    // If there are pending orders
                    if ($row_count > 0) {

                        // Output a message indicating the number of pending orders
                        echo "<div class='bg-light w-50 m-auto p-5 d-block'><h3 class='text-center text-success mt-2 mb-3'>You have <span class='text-danger'>$row_count</span> pending orders.</h3>
                            <p class='text-center bg3 p-2 rounded-0'style='width: 120px'><a class='text-decoration-none text-light' href='profile.php?my_orders'>Order Details</a></p></div>";
                    } else {
                        echo "<div class='bg-light w-50 m-auto p-5 d-block'><h3 class='text-center text-success mt-2 mb-3'>You have zero pending orders.</h3>
                            <p class='text-center bg3 p-2 rounded-0'><a class='text-decoration-none text-light' href='../index.php?my_order'>Explore Products</a></p></div>";
                    }
                }
            }
        }
    }
}
