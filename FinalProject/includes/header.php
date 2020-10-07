<?php 
/*
 * Author: Corey Anderson and Ian Hays
 * Date: 11/26/17
 * File: header.php
 * Description: This script is the header for every page. 
 * 
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$count=0;

if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
    
    if($cart){
        $count = array_sum($cart);
    }
}

$shoppingcart_img = (!$count) ? "shoppingcart_empty.gif": "shoppingcart_full.gif";

//variables for a user's login, name, and role
$login = '';
$name = '';
$role = '0';

//if the user has logged in, retrieve login, name, and role.
if (isset($_SESSION['login']) AND isset($_SESSION['name']) AND isset($_SESSION['role'])){
    $login = $_SESSION['login'];
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="www/css/gamestyle.css" />
        <title><?php echo $page_title; ?></title>
    </head>
    <body>
        <div id="wrapper">
            <div id="curdate">
                <?php
                date_default_timezone_set('America/New_York');
                echo date("l, F d, Y", time());
                ?>
            </div>
            <div id="navbar">
                <a href="index.php">Home</a>  ||
                <a href="listgames.php">List Games</a> ||
                <a href="searchgames.php">Search Games</a> ||
             
                
                
             <?php 
             if ($role == 1){
                    echo "<a href= 'addgame.php'>Add Game</a> ||";
                    echo "<a href= 'listusers.php'>List User</a> ||";
                }
                if (empty($login))
                    echo "<a href='loginform.php'>Login</a> ||";
                 else {
                     echo "<a href='logout.php'>Logout</a> ||";
                     echo "<span style='color:black; margin-left:30px'>Welcome $name!</style>";
                 }
                 ?>
            </div>
            
            <table id="banner">
                <tr>

                    <td>
                        <div id="maintitle">Online Gaming Store</div>
                        <div id="subtitle">Browse through our large selection of games</div>
                    </td>
                    <td>
                        <div id="shoppingcart">
                            <a href="showcart.php">
                                <img src="www/img/<?= $shoppingcart_img ?>"  style="border:none; width:50px" />
                                <br />
                                <span><?php echo $count ?> item(s)</span>
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
            <!-- main content body starts -->
            <div id="mainbody">