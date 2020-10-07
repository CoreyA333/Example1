<?php
/*
 * Author: Corey Anderson and Ian Hays 
 * Date: 11/27/17
 * File: showcart.php
 * Description: this script displays your shopping cart, can be empty or have items 
 */

$page_title = "Shopping Cart";
require_once ('includes/header.php');
require_once('includes/database.php');
?>
<h2>My Shopping Cart</h2>
<?php
if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "Your shopping cart is empty.<br><br>";
    include ('includes/footer.php');
    exit();
}

//proceed since the cart is not empty
$cart = $_SESSION['cart'];
?>
<table class="gamelist">
    <tr>
        <th style="width: 500px">Title</th>
        <th style="width: 60px">Price</th>
        <th style="width: 60px">Quantity</th>
        <th style="width: 60px">Total</th>
    </tr>
    <?php
    //insert code to display the shopping cart content
    //select statment
    $sql = "SELECT id, title, price FROM games WHERE 0";

    foreach (array_keys($cart) as $id) {
        $sql .= " OR id=$id";
    }

    //execute the query
    $query = $conn->query($sql);

    //fetch games and display them in a table
    while ($row = $query->fetch_assoc()) {
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $qty = $cart[$id];
        $total = $qty * $price;
        echo "<tr>",
        "<td><a href='gamedetails.php?id=$id'> $title</a></td>",
        "<td> $$price</td>",
        "<td>$qty</td>",
        "<td>$$total</td>",
        "</tr>";
    }
    ?>
</table>
<br>
<div class="gamestyle-button">
    <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
    <input type="button" value="Cancel" onclick="window.location.href = 'listgames.php'" />
</div>
<br><br>

<?php
include ('includes/footer.php');
