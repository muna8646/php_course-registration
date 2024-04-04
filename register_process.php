<?php
// Include database connection file
include_once 'db_connection.php';

// Get form data
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Insert user into database
$sql = "INSERT INTO example.users (username, password) VALUES ('$username', '$password')";
if (mysqli_query($conn, $sql)) {
    echo "User registered successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
