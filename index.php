<?php

$uri = "mysql://avnadmin:AVNS_b67rNVhKeKkTjvKDtk4@etp-database-etp-database.h.aivencloud.com:17731/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// build the DSN including SSL settings
$host = $fields["host"];
$port = $fields["port"];
$dbname = "etpprograms";
$username = $fields["user"];
$password = $fields["pass"];
$ssl_cert = "ca.pem";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname, $port, MYSQLI_CLIENT_SSL);

// Set SSL options
$conn->ssl_set(null, null, $ssl_cert, null, null);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Creates a SQL query
$sql = "SELECT * FROM test";
$result = $conn->query($sql);

// Loops through the returned arrays from the table and displays them.
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo implode(" ", $row);
        echo "\n";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
