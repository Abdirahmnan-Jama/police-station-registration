<?php
$host = 'localhost';
$username = 'root';
$password = '';  // Update with your password if needed
$dbname = 'police_station';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
