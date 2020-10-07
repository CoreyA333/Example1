<?php
/** Author: Corey Anderson and Ian Hays 
 *  Date: 12/04/2017
 *  Description: This page will retrieve user id from the querystring. 
 *  Next it will retrieve the details from that user from the database.
 *  Last it will display the user details in a table.
 */
$page_title = "Edit user details";


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

if ($role != 1){
    echo 'This is a Admin feature only';
    require_once 'includes/header.php';
    require_once 'includes/footer.php';
    die();
}
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

<h2>Edit User Details</h2>
<form name="edituser" action="updateuser.php" method="get">
    <table class="userdetails">
        <tr>
            <th>ID</th>
            <td><input name="id" value="<?php echo $row['id'] ?>" readonly="readonly" /></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><input name="username" value="<?php echo $row['username'] ?>" size="30" required /></td>
        </tr>
        <tr>
            <th>First Name</th>
            <td><input name="firstname" value="<?php echo $row['firstname'] ?>" size="30" required /></td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td><input name="lastname" value="<?php echo $row['lastname'] ?>" size="30" required /></td>
        </tr>

    </table>
    <br>
    <input type="submit" value="Update">&nbsp;&nbsp;
    <input type="button" onclick="window.location.href = 'userdetails.php?id=<?php echo $row['id'] ?>'" value="Cancel">
</form>       


<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');


