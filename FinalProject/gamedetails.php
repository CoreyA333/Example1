<?php
/** Author: Corey Anderson and Ian Hays 
 *  Date: 11/17/2017
 *  Description: This PHP script retrieves all games from the games table
 *  in the database. It then displays all game details in a HTML table.
 */
$page_title = "Game Details";
require_once ('includes/header.php');
require_once('includes/database.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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


//if game id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, "id")) {
    $conn->close();
    require_once ('includes/footer.php');
    die("Your request cannot be processed since there was a problem retrieving game id.");
}

//retrieve game id from a query string variable.
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//MySQL SELECT statement
$sql = "SELECT * "
        . "FROM games, categories "
        . "WHERE games.category_id = categories.category_id "
        . "AND id=$id";

//execute the query
$query = @$conn->query($sql);

//Handle errors
if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $conn->close();
    require 'includes/footer.php';
    die("Selection failed: ($errno) $error.");
}

if (!$row = $query->fetch_assoc()) {
    $conn->close();
    require 'includes/footer.php';
    die("Game not found.");
}

?>

<h2>Game Details</h2>
<table id="gamedetails" class="gamedetails">
    <tr>
        <td class="col1">
            <img src="<?php echo $row['image'] ?>" alt="" width="150" />
        </td>
        <td class="col2">
            <h4>Title:</h4>
            <h4>Category:</h4>
            <h4>Date:</h4>
            <h4>Publisher:</h4>
            <h4>Price:</h4>
            <h4>Description:</h4>
        </td>
        <td class="col3">
            <p><?php echo $row['title'] ?></p>
            <p><?php echo $row['category'] ?></p>
            <p><?php echo $row['publish_date'] ?></p>
            <p><?php echo $row['publisher'] ?></p>
            <p>$<?php echo $row['price'] ?></p>
            <p><?php echo $row['description'] ?></p>
        </td>
        <td class="col4">
            <a href="addtocart.php?id=<?php echo $row['id'] ?>">
                <img src="www/img/addtocart_button.png"/>
            </a>
        </td>
    </tr>
</table>


<form action="deletegame.php" method="get">
    <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete the game?')">
    <input type="button" value="Cancel" onclick="window.location.href = 'listgames.php'">
    <input type="hidden" name='id' value="<?= $id ?>">
    

</form>


<?php
require_once ('includes/footer.php');
