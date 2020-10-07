<?php

/** Author: Corey Anderson and Ian Hays 
 *  Date: 11/16/17
 *  Description: This PHP script connects to the MySQL database and select
 *  the group_project_db database. It also displays a user-friendly message if
 *  a connection error is encountered. You may need to modify the parameters
 *  for your server.
 */
//define parameters
$host = "localhost";
$login = "phpuser";
$password = "phpuser";
$database = "group_project_db";

//Connect to the mysql server
$conn = @new mysqli($host, $login, $password, $database);

//handle connection errors
if ($conn->connect_errno != 0) {
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die("Connection failed with: ($errno) $errmsg.");
}