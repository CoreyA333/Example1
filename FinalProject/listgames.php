<?php
/** Author: Corey Anderson and Ian Hays 
 *  Date: 11/18/19
 *  Description: This page will display the list of games in our store along with the name, price, category, and publisher. 
 */
$page_title = "Games in Our Store";
require 'includes/header.php';
require_once('includes/database.php');

//SELECT statement
$sql = "SELECT id, title, publisher, price, category "
        . "FROM games, categories "
        . "WHERE games.category_id = categories.category_id";

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
?>

<h2>Games in Our Store</h2>
<table id="gamestyle" class="gamestyle">
    <tr>
        <th>Title</th>
        <th class="col2">Publisher</th>
        <th class="col3">Category</th>
        <th>   </th>
        <th>   </th>
        <th class="col4">Price</th>
    </tr>
    <!-- add PHP code here to list all games from the "games" table -->
    <?php
    while ($row = $query->fetch_assoc()) {
        echo "<tr>";
        echo "<td><a href='gamedetails.php?id=", $row['id'], "'>", $row['title'], "</a></td>";
        echo "<td>", $row['publisher'], "</td>";
        echo "<td>", $row['category'], "</td>";
        echo "<td>", "</td>";
        echo "<td>", "</td>";
        echo "<td>", $row['price'], "</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php
require 'includes/footer.php';
