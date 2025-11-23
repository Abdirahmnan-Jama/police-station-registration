<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Hash the password before saving it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Check if the username already exists
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists. Please choose another.";
    } else {
        // Insert the new user into the database
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
        
        if (mysqli_query($conn, $query)) {
            // Redirect to the login page after successful registration
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<?php include('header.php'); ?>

<h2>Register</h2>

<form method="POST" action="register.php">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Register</button>
</form>

<?php include('footer.php'); ?>
