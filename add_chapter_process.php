<?php
// Include database connection file
include_once 'db_connection.php';

// Get form data
$course_id = $_POST['course_id'];
$title = $_POST['title'];
$content = $_POST['content'];

// Insert chapter into database
$sql = "INSERT INTO example.chapters (course_id, title, content) VALUES ('$course_id', '$title', '$content')";
if (mysqli_query($conn, $sql)) {
    echo "Chapter added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
