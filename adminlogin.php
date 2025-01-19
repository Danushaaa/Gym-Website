<?php

session_start();


$admin_username = "admin";
$admin_password = "admin123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION["admin_logged_in"] = true;
        header("Location: admin.php"); 
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/login.css"> 
</head>
<body>
<div class="login-container">
    <form method="post" action="">
        <h2>Admin Login</h2>
        <form>
            <label for="username">User Name:</label>
            <input type="username" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>

            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>
