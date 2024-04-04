<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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
        strong {
            color: #007bff;
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

    <?php
    // Include database connection file
    include_once 'db_connection.php';

    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check user credentials
    $sql = "SELECT * FROM example.users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            echo "<h1>Login successful. Welcome, " . $row['username'] . "</h1><br><br>";

            // Display available courses for enrollment
            $sql_courses = "SELECT id, title, description FROM example.courses";
            $result_courses = mysqli_query($conn, $sql_courses);

            if (mysqli_num_rows($result_courses) > 0) {
                echo "<h2>Available Courses:</h2>";
                while ($row_course = mysqli_fetch_assoc($result_courses)) {
                    echo "<p>";
                    echo "<strong>{$row_course['title']}</strong><br>";
                    echo "{$row_course['description']}<br>";
                    echo "<a href='enroll.php?course_id={$row_course['id']}'>Enroll</a>";
                    echo "</p>";
                }
            } else {
                echo "No courses available.";
            }

            // Start session and set user ID
            session_start();
            $_SESSION['user_id'] = $row['id'];
        } else {
            echo "<h1>Invalid password.</h1>";
        }
    } else {
        echo "<h1>User not found.</h1>";
    }

    // Close database connection
    mysqli_close($conn);
    ?>

</body>
</html>
