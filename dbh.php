<?php

//this page establishes a connection to the database

$uri = "mysql://avnadmin:AVNS_b67rNVhKeKkTjvKDtk4@etp-database-etp-database.h.aivencloud.com:17731/defaultdb?ssl-mode=REQUIRED";
$fields = parse_url($uri);
$host = $fields["host"];
$port = $fields["port"];
$dbname = "etpprograms";
$username = $fields["user"];
$password = $fields["pass"];
$ssl_cert = "ca.pem";
$conn = new mysqli($host, $username, $password, $dbname, $port, MYSQLI_CLIENT_SSL);
$conn->ssl_set(null, null, $ssl_cert, null, null);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
