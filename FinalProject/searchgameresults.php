<?php
/** Author: Corey Anderson and Ian Hays 
 *  Date: 11/15/17
 *  Description: This page will enable you to search and display games in your list of games. 
 */
$page_title = "Games in Our Store";
require 'includes/header.php';
require_once('includes/database.php');

//retrieve the search terms from a query string
$term_string = filter_input(INPUT_GET, "terms", FILTER_SANITIZE_STRING);
$terms = explode(" ", $term_string);

//construct a MySQL query statement
$sql = "SELECT * FROM games WHERE 1 ";
foreach ($terms as $term) {
    $sql .= " AND title LIKE '%$term%' ";
}

//execute the query
$query = $conn->query($sql);



//Handle errors
if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $conn->close();
    require 'includes/footer.php';
    die("Selection failed: ($errno) $error.");
}
?>

<h2>Games:<?= "$term" ?></h2>
<table id="gamestyle" class="gamestyle">
    <tr>
        <th>Title</th>
        <th class="col2">Publisher</th>
        <th class="col3">Category</th>
        <th class="col4">Price</th>
    </tr>
    <!-- add PHP code here to list all games from the "games" table -->
    <?php
    while ($row = $query->fetch_assoc()) {
        echo "<tr>";
        echo "<td><a href='gamedetails.php?id=", $row['id'], "'>", $row['title'], "</a></td>";
        echo "<td>", $row['publisher'], "</td>";
        echo "<td>", $row['category_id'], "</td>";
        echo "<td>", $row['price'], "</td>";
        echo "</tr>";
    }
    ?>
</table>



<?php
require 'includes/footer.php';

