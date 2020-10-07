<?php
/*
 * Author: Corey Anderson and Ian Hays
 * Date: 11/29/17
 * File: addgame.php
 * Description: This script displays a form to accept a new game's details.
 * 
 */
$page_title = "PHP Online Gamestore Add Game";
require_once 'includes/header.php';

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

if ($role != 1){
    echo 'This is a Admin feature only';
    require_once 'includes/header.php';
    require_once 'includes/footer.php';
    die();
}

?>

<h2>Add New Game</h2>
<form action="insertgame.php" method="post">
    <table cellspacing="0" cellpadding="3" style="border: 1px solid silver; padding:5px; margin-bottom: 10px">
        <tr>
            <td style="text-align: right; width: 100px">Title: </td>
            <td><input name="title" type="text" size="100" required /></td>
        </tr>

        <tr>
            <td style="text-align: right">Category:</td>
            <td>
                <select name="category">
                    <option value="1">Action</option>
                    <option value="2">Role-playing game</option>
                    <option value="3">Strategy</option>
                    <option value="4">Open world</option>
                    <option value="5">Racing</option>
                    <option value="6">Sports</option>
                </select>
            </td>
        </tr>

        <tr>
            <td style="text-align: right">Publish date: </td>
            <td>
                <input name="publish_date" type="text" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required />
                <span style="font-size: small">YYYY-MM-DD</span>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">Publisher:</td>
            <td><input name="publisher" type="text" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Price: </td>
            <td><input name="price" type="number" step="0.01" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Image: </td>
            <td><input name="image" type="text" size="100" required /></td>
        </tr>
        <tr>
            <td style="text-align: right; vertical-align: top">Description:</td>
            <td><textarea name="description" rows="6" cols="65"></textarea></td>
        </tr>
    </table>
    <div class="gamestore-button">
        <input type="submit" value="Add Game" />
        <input type="button" value="Cancel" onclick="window.location.href = 'listgames.php'" />
    </div>
</form>

<?php
require_once 'includes/header.php';
