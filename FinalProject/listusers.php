<?php
/** Author: Corey Anderson
 *  Date: 12/04/2017
 *  Description: This PHP script retrieves all users from the users table
 *  in the database. It then displays all user details in a table.
 */
$page_title = "List users";

require_once ('includes/header.php');
require_once('includes/database.php');

//define the select statement
$sql = "SELECT * FROM users";

//execute the query
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    require_once ('includes/footer.php');
    exit;
}
//display results in a table
?>
<h2>Users</h2>
<table class="userlist">
    <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>

    <?php
    //insert a row into the table for each row of data
    while (($row = $query->fetch_assoc()) !== NULL) {
        echo "<tr>";
        echo "<td>", $row['id'], "</td>";
        echo "<td><a href=userdetails.php?id=", $row['id'], ">", $row['username'], "</td>";
        echo "<td>", $row['firstname'], "</td>";
        echo "<td>", $row['lastname'], "</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php
// clean up results when done with them
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');

