<?php
/*
 * Author: Corey Anderson and Ian Hays 
 * Date: 11/15/17
 * Name: searchgames.php
 * Description: This script displays a search form.
 */
$page_title = "Search game";

include ('includes/header.php');
?>
<h2>Search Games by Title</h2>
<p>Enter one or more words in Game title.</p>
<form action="searchgameresults.php" method="get">
    <input type="text" name="terms" size="40" required />&nbsp;&nbsp;
    <input type="submit" name="Submit" id="Submit" value="Search Game" />
</form>


<?php
include ('includes/footer.php');
