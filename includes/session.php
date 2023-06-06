<?php
if (isset($_SESSION['add'])) // Checking if SESSION is set or not
{
    echo $_SESSION['add']; //Displaying SESSION Messages
    unset($_SESSION['add']); //Removing SESSION Messages
}
if (isset($_SESSION['delete'])) // Checking if SESSION is set or not
{
    echo $_SESSION['delete']; //Displaying SESSION Messages
    unset($_SESSION['delete']); //Removing SESSION Messages
}
if (isset($_SESSION['category_change'])) {
    echo $_SESSION['category_change'];
    unset($_SESSION['category_change']);
}
if (isset($_SESSION['empty-msg'])) // Checking if SESSION is set or not
{
    echo $_SESSION['empty-msg']; //Displaying SESSION Messages
    unset($_SESSION['empty-msg']); //Removing SESSION Messages
}
if (isset($_SESSION['add_to_cart'])) // Checking if SESSION is set or not
{
    echo $_SESSION['add_to_cart']; //Displaying SESSION Messages
    unset($_SESSION['add_to_cart']); //Removing SESSION Messages
}
if (isset($_SESSION['product_in_cart'])) // Checking if SESSION is set or not
{
    echo $_SESSION['product_in_cart']; //Displaying SESSION Messages
    unset($_SESSION['product_in_cart']); //Removing SESSION Messages
}
if (isset($_SESSION['confirm_payment'])) // Checking if SESSION is set or not
{
    echo $_SESSION['confirm_payment']; //Displaying SESSION Messages
    unset($_SESSION['confirm_payment']); //Removing SESSION Messages
}
