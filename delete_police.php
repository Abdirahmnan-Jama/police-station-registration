<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "DELETE FROM police WHERE id='$id'";
    
    if (mysqli_query($conn, $query)) {
        echo "Police officer deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
