<?php
$servername = "localhost"; // Replace with your server name or IP address
$username = "hotelmanager"; // Replace with your MySQL username
$password = "hG8hogjPb@VKP9U8"; // Replace with your MySQL password
$dbname = "hotel"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    print"Connected successfully";
    // Perform operations with the database here
}

if (!function_exists('close_connection')){
function close_connection($conn)
{
    // Close connection
    $conn->close();
}
}
?>