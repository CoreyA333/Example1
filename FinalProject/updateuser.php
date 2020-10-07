<?php

/** Author: Corey Anderson and Ian Hays
 *  Date: 12/04/2017
 *  Description: This PHP script retrieves data from a form and then 
 *  updates the users table in the database.
 */
$page_title = "Update user details";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve and sanitize all fields from the form
$id = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
$username = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING)));
$firstname = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING)));
$lastname = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'lastname', FILTER_SANITIZE_STRING)));


//Define MySQL update statement
$sql = "UPDATE users SET
    username='$username',
    firstname='$firstname',
    lastname='$lastname'
    WHERE id=$id";

//execut the query
$query = @$conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Connection Failed with: $errno, $errmsg<br/>\n";
    exit;
}
echo "Your account has been updated.";

// close the connection.
$conn->close();

include ('includes/footer.php');

