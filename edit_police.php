<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM police WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $police = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $rank = mysqli_real_escape_string($conn, $_POST['rank']);
    $badge_number = mysqli_real_escape_string($conn, $_POST['badge_number']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    
    $query = "UPDATE police SET name='$name', rank='$rank', badge_number='$badge_number', address='$address', phone='$phone' WHERE id='$id'";
    
    if (mysqli_query($conn, $query)) {
        echo "Police officer updated successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php include('header.php'); ?>

<form method="POST" action="edit_police.php?id=<?php echo $police['id']; ?>">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="<?php echo $police['name']; ?>" required>

    <label for="rank">Rank</label>
    <input type="text" id="rank" name="rank" value="<?php echo $police['rank']; ?>" required>

    <label for="badge_number">Badge Number</label>
    <input type="text" id="badge_number" name="badge_number" value="<?php echo $police['badge_number']; ?>" required>

    <label for="address">Address</label>
    <input type="text" id="address" name="address" value="<?php echo $police['address']; ?>" required>

    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone" value="<?php echo $police['phone']; ?>" required>

    <button type="submit">Update Police Officer</button>
</form>

<?php include('footer.php'); ?>
