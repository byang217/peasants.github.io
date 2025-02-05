<?php

// this page establishes a connection to the database

$db_server = "etp-database-etp-database.h.aivencloud.com";
$db_user = "avnadmin";
$db_pass = "AVNS_b67rNVhKeKkTjvKDtk4";
$db_name = "defaultdb";
$conn = "";

// if the web page is unable to connect to the db, display error message

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    echo "Success!"
} catch (mysqli_sql_exception) {
    echo "Could not connect to Database!";
}