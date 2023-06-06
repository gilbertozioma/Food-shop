<?php

    // session_start();

    // Database credentials
    // define('SITEURL', 'index.php');
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-store-db');

    // Attempt to connect to MySql database
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    // $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

    // Check Connection
    if ($conn->connect_error) {
        
        die("Connection failed: " . $conn->connect_error);
    }


    // Updated database connection from ChatGTP

    // // Connect to database
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "ecommerce";

    // // Create connection
    // $conn = new mysqli($servername, $username, $password, $dbname);

    // // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

?>