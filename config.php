<?php
$servername = "localhost"; 
$username = "u704810582_ssupix22";
$password = "NoSleep22$"; 
$dbname = "u704810582_user_auth"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
