<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Include database connection file
include_once 'db_connection.php';

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Count the number of enrolled courses for the user
$sql_enrolled_count = "SELECT COUNT(*) AS enrolled_count FROM example.enrollments WHERE user_id='$user_id'";
$result_enrolled_count = mysqli_query($conn, $sql_enrolled_count);
$row_enrolled_count = mysqli_fetch_assoc($result_enrolled_count);
$enrolled_count = $row_enrolled_count['enrolled_count'];

// Fetch enrolled courses for the user
$sql_enrolled_courses = "SELECT c.title FROM example.enrollments e JOIN example.courses c ON e.course_id = c.id WHERE e.user_id='$user_id'";
$result_enrolled_courses = mysqli_query($conn, $sql_enrolled_courses);

// Fetch available courses for the user to enroll
$sql_available_courses = "SELECT id, title FROM example.courses WHERE id NOT IN (SELECT course_id FROM example.enrollments WHERE user_id='$user_id')";
$result_available_courses = mysqli_query($conn, $sql_available_courses);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        .side-menu {
            float: left;
            width: 20%;
            background-color: #f1f1f1;
            padding: 20px;
        }
        .content {
            float: left;
            width: 80%;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="side-menu">
    <h2>Menu</h2>
    <ul>
        <li><a href="#">Home</a></li>
        <li>
            Enrolled Courses (<?php echo $enrolled_count; ?>)
            <ul>
                <?php
                if (mysqli_num_rows($result_enrolled_courses) > 0) {
                    while ($row_enrolled_course = mysqli_fetch_assoc($result_enrolled_courses)) {
                        echo "<li>{$row_enrolled_course['title']}</li>";
                    }
                } else {
                    echo "<li>No courses enrolled.</li>";
                }
                ?>
            </ul>
        </li>
        <li>
            Available Courses
            <ul>
                <?php
                if (mysqli_num_rows($result_available_courses) > 0) {
                    while ($row_available_course = mysqli_fetch_assoc($result_available_courses)) {
                        echo "<li><a href='enroll.php?course_id={$row_available_course['id']}'>{$row_available_course['title']}</a></li>";
                    }
                } else {
                    echo "<li>No courses available.</li>";
                }
                ?>
            </ul>
        </li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<div class="content">
    <h1>Welcome to Your Dashboard</h1>
    <p>Number of Enrolled Courses: <?php echo $enrolled_count; ?></p>
    <h2>Your Enrolled Courses:</h2>
    <ul>
        <?php
        if (mysqli_num_rows($result_enrolled_courses) > 0) {
            while ($row_enrolled_course = mysqli_fetch_assoc($result_enrolled_courses)) {
                echo "<li>{$row_enrolled_course['title']}</li>";
            }
        } else {
            echo "<li>No courses enrolled.</li>";
        }
        ?>
    </ul>
</div>

</body>
</html>
