<?php
// Include database connection file
include_once 'db_connection.php';

// Get form data
$title = $_POST['title'];
$description = $_POST['description'];

// Insert course into database
$sql = "INSERT INTO example.courses (title, description) VALUES ('$title', '$description')";
if (mysqli_query($conn, $sql)) {
    echo "Course added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
