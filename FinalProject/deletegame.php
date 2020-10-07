<?php
/*
 * Author: Corey Anderson and Ian Hays 
 * Date: 12/01/17
 * File: deletegame.php
 * Description: this file allows you to delete games out of your database. 
 *
 */
$page_title = "PHP Online Gamestore Delete Game";
require_once 'includes/header.php';
require_once('includes/database.php');

//if there were problems retrieving game id, the script must end.
if(!filter_has_var(INPUT_GET, 'id')) {
    echo "Deletion cannot continue since there were problems retrieving game id";
    include ('includes/footer.php');
    exit;
}

//retrieves the id from the query string and stores it in a variable
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//SQL delete statement 
$sql = "DELETE FROM games WHERE id=$id";

//runs the query
$query = @$conn->query($sql);
 
//Handles errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} 


//close database connection
$conn->close();

//display a confirmation message
echo "You have successfully deleted the game from the database.<br><br>";

require_once 'includes/footer.php';

