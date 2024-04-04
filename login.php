<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f0f0f0; text-align: center;">

    <h1 style="color: #333;">User Login</h1>

    <form action="login_process.php" method="POST" style="margin: 0 auto; width: 50%; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

        <label for="username" style="display: block; margin-bottom: 10px; font-weight: bold;">Username:</label>
        <input type="text" id="username" name="username" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"><br><br>

        <label for="password" style="display: block; margin-bottom: 10px; font-weight: bold;">Password:</label>
        <input type="password" id="password" name="password" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"><br><br>

        <input type="submit" value="Login" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
        
    </form>

</body>
</html>
