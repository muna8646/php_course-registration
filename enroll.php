<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Content</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding-top: 50px;
        }
        h1 {
            color: #333;
        }
        p {
            color: #555;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Course Content</h1>

    <?php
    // Include database connection file
    include_once 'db_connection.php';

    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    if (isset($_GET['course_id'])) {
        // Get the course ID from the URL
        $course_id = $_GET['course_id'];

        // Check if the user is already enrolled in the course
        $user_id = $_SESSION['user_id'];
        $sql_check_enrollment = "SELECT * FROM example.enrollments WHERE user_id='$user_id' AND course_id='$course_id'";
        $result_check_enrollment = mysqli_query($conn, $sql_check_enrollment);

        if (mysqli_num_rows($result_check_enrollment) > 0) {
            // User is already enrolled in the course
            // Fetch and display chapters of the enrolled course
            $sql_chapters = "SELECT id, title, content FROM example.chapters WHERE course_id='$course_id'";
            $result_chapters = mysqli_query($conn, $sql_chapters);

            $chapter_count = mysqli_num_rows($result_chapters);

            if ($chapter_count > 0) {
                // Get the current chapter ID from the URL or set it to the first chapter
                $current_chapter_id = isset($_GET['chapter_id']) ? $_GET['chapter_id'] : 1;

                // Fetch the current chapter
                $sql_current_chapter = "SELECT title, content FROM example.chapters WHERE id='$current_chapter_id'";
                $result_current_chapter = mysqli_query($conn, $sql_current_chapter);
                $row_current_chapter = mysqli_fetch_assoc($result_current_chapter);

                echo "<h2>{$row_current_chapter['title']}</h2>";
                echo "<p>{$row_current_chapter['content']}</p>";

                // Navigation links for previous and next chapters
                if ($current_chapter_id > 1) {
                    $previous_chapter_id = $current_chapter_id - 1;
                    echo "<a href='enroll.php?course_id=$course_id&chapter_id=$previous_chapter_id'>Previous Chapter</a> ";
                }
                if ($current_chapter_id < $chapter_count) {
                    $next_chapter_id = $current_chapter_id + 1;
                    echo "<a href='enroll.php?course_id=$course_id&chapter_id=$next_chapter_id'>Next Chapter</a>";
                }
            } else {
                echo "No chapters available for this course.";
            }
        } else {
            // User is not enrolled in the course
            echo "You are not enrolled in this course. Please enroll first.";
        }
    } else {
        echo "Invalid course ID.";
    }

    // Close database connection
    mysqli_close($conn);
    ?>
</body>
</html>
