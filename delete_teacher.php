<?php
include("includes/config.php");

if(isset($_POST['user_id'])) {
    $user_id = $_POST['user_id']; // Use user_id

    $query = "DELETE FROM teachers WHERE user_id = '$user_id'"; // Change column to user_id
    if(mysqli_query($conn, $query)) {
        echo "Teacher deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "No user ID received.";
}
?>