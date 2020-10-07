<?php
/*
 * Author: Corey Anderson and Ian Hays
 * Date: 11/30/17
 * File: addtocart.php
 * Description: This script allows you to add items to a shopping cart
 */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = array();
}

//if game id cannot be found, terminate script.
if (!filter_has_var(INPUT_GET, 'id')) {
    $error = "Game id not found. Operation cannot proceed. <br><br>";
    header("Location: error.php?m=$error");
    die();
}

//retrieve game id and make sure it is numeric value.
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!is_numeric($id)) {
    $error = "Invalid game id. Operation cannot proceed.<br><br>";
    header("Location: error.php?m=$error");
    die();
}

if (array_key_exists($id, $cart)) {
    $cart[$id] = $cart[$id] + 1;
} else {
    $cart[$id] = 1;
}
$_SESSION['cart'] = $cart;

//print_r($cart);
header('Location: showcart.php');
