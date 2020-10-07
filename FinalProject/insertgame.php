<?php

/*
 * Author: Corey Anderson and Ian Hays 
 * Date: 11/29/17
 * File: insertgame.php
 * Description: this file allows you to add games to your sql from php 
 *
 */

$page_title = "PHP Online Gamestore Add Game";
require_once 'includes/header.php';
require_once('includes/database.php');

//if the script did not received post data, display an error message and then terminite the script immediately
if (!filter_has_var(INPUT_POST, 'title') ||
        !filter_has_var(INPUT_POST, 'publish_date') ||
        !filter_has_var(INPUT_POST, 'publisher') ||
        !filter_has_var(INPUT_POST, 'price') ||
        !filter_has_var(INPUT_POST, 'category') ||
        !filter_has_var(INPUT_POST, 'image') ||
        !filter_has_var(INPUT_POST, 'description')) {
    echo "There were problems retrieving game details. New game cannot be added.";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//retrieves details from the form. Filters, trims and sanitizes the input
$title = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
$publish_date = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'publish_date', FILTER_SANITIZE_STRING)));
$publisher = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'publisher', FILTER_SANITIZE_STRING)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING)));
$category = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'category', FILTER_DEFAULT)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

//SQL INSERT statement to add game to database
$sql = "INSERT INTO games VALUES ('NULL', '$title', '$publish_date', '$publisher','$price', '$category', '$image', '$description')";

//runs the query
$query = @$conn->query($sql);

//handles errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Connection Failed with: $errno, $errmsg<br/>\n";
    include ('includes/footer.php');
    exit;
} else {
    echo "Your game has been successfully added.";
}

//determine the id of the newly added game
$id = $conn->insert_id;

// close the connection.
$conn->close();

//display a confirmation message and a link to display details of the new game
echo "You have successfully inserted the new game into the database.";
echo "<p><a href='gamedetails.php?id=$id'>Game Details</a></p>";
require_once 'includes/footer.php';

