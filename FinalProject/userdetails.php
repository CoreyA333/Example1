<?php
/** Author: Corey Anderson and Ian Hays 
 *  Date: 12/04/2017
 *  Description: This PHP script retrieves a user id from a url querystring.
 *  It then retrieves details of the specified user from the users table in the databate.
 *  At the end, it displays user details in a HTML table.
 */
$page_title = "Users details";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve user id
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: user id was not found.";
    require_once ('includes/footer.php');
    exit();
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//define the select statement
$sql = "SELECT * FROM users WHERE id=" . $id;

//execute the query
$query = $conn->query($sql);

//retrieve the results
$row = $query->fetch_assoc();


//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    //include the footer
    require_once ('includes/footer.php');
    exit;
}
//display results in a table
?>

<h2>User Details</h2>

<table class="userdetails">
    <tr>
        <th>ID</th>
        <td><?php echo $row['id'] ?></td>
    </tr>
    <tr>
        <th>Username</th>
        <td><?php echo $row['username'] ?> </td>
    </tr>
    <tr>
        <th>First Name</th>
        <td><?php echo $row['firstname'] ?> </td>
    </tr>
    <tr>
        <th>Last Name</th>
        <td> <?php echo $row['lastname'] ?></td>
    </tr>    
</table>

<p>
    <input type="button" onclick="window.location.href = 'edituser.php?id=<?php echo $row['id'] ?>'" value="Edit">
    &nbsp;&nbsp;
    <input type="button" onclick="window.location.href = 'listusers.php'" value="Cancel">
</p>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');


