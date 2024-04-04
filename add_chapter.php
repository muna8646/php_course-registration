<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Chapter</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f0f0f0; text-align: center;">

    <h1 style="color: #333;">Add Chapter</h1>

    <form action="add_chapter_process.php" method="POST" style="margin: 0 auto; width: 50%; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

        <label for="course_id" style="display: block; margin-bottom: 10px; font-weight: bold;">Select Course:</label>
        <select id="course_id" name="course_id" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            <?php
            // Include database connection file
            include_once 'db_connection.php';

            // Fetch courses from database
            $sql = "SELECT id, title FROM example.courses";
            $result = mysqli_query($conn, $sql);

            // Display courses in dropdown
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['id']}'>{$row['title']}</option>";
            }
            ?>
        </select><br><br>

        <label for="title" style="display: block; margin-bottom: 10px; font-weight: bold;">Chapter Title:</label>
        <input type="text" id="title" name="title" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"><br><br>

        <label for="content" style="display: block; margin-bottom: 10px; font-weight: bold;">Chapter Content:</label><br>
        <textarea id="content" name="content" rows="4" cols="50" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"></textarea><br><br>

        <input type="submit" value="Add Chapter" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
        
    </form>

</body>
</html>
