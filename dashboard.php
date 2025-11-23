<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('db.php');
include('header.php');

echo "<h1>Welcome to Police Station Dashboard, " . $_SESSION['username'] . "</h1>";
echo "<a href='add_police.php'>Add Police Officer</a><br>";

$query = "SELECT * FROM police";
$result = mysqli_query($conn, $query);

echo "<h2>Police Officers</h2>";
echo "<table border='1'>
        <tr>
            <th>Name</th>
            <th>Rank</th>
            <th>Badge Number</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>" . $row['name'] . "</td>
            <td>" . $row['rank'] . "</td>
            <td>" . $row['badge_number'] . "</td>
            <td>" . $row['address'] . "</td>
            <td>" . $row['phone'] . "</td>
            <td><a href='edit_police.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_police.php?id=" . $row['id'] . "'>Delete</a></td>
          </tr>";
}

echo "</table>";
include('footer.php');
?>
