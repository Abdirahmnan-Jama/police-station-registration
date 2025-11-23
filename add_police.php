<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $rank = mysqli_real_escape_string($conn, $_POST['rank']);
    $badge_number = mysqli_real_escape_string($conn, $_POST['badge_number']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    
    $query = "INSERT INTO police (name, rank, badge_number, address, phone) VALUES ('$name', '$rank', '$badge_number', '$address', '$phone')";
    
    if (mysqli_query($conn, $query)) {
        echo "Police officer added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php include('header.php'); ?>

<form method="POST" action="add_police.php">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" required>

    <label for="rank">Rank</label>
    <input type="text" id="rank" name="rank" required>

    <label for="badge_number">Badge Number</label>
    <input type="text" id="badge_number" name="badge_number" required>

    <label for="address">Address</label>
    <input type="text" id="address" name="address" required>

    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone" required>

    <button type="submit">Add Police Officer</button>
</form>

<?php include('footer.php'); ?>
