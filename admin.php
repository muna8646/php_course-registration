<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Add Course</h1>
    <form action="add_course_process.php" method="POST">
        <label for="title">Course Title:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="description">Course Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Add Course">
        <a href="add_chapter.php">chapter</a></p>
    </form>
</body>
</html>
