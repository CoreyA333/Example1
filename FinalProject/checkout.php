<?php
/*
 * Author: Corey Anderson and Ian Hays 
 * Date: 11/30/17
 * File: checkout.php
 * Description: this file allows you to checkout. 
 *
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//takes you to login page if not already logged in 
if (!isset($_SESSION['login'])) {
    header("Location: loginform.php");
    exit();
}
//empty shopping cart
$_SESSION['cart'] = array();

//set page title 
$page_title = "PHP Online Gamestore Game Checkout";

//display the header 
require_once ('includes/header.php');
?>

<h2>Checkout</h2>

<p> Thank you for shopping with us. Your business is greatly appreciated. </p>

<?php
include('includes/footer.php');
?>


