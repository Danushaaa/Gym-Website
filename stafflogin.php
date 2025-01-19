<?php

session_start();


$host = "localhost";
$username = "root";
$password = "";
$database = "fitness_center";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fristname = $_POST['fristname'];
    $password = $_POST['password'];

    
    $stmt = $conn->prepare("SELECT * FROM staff WHERE fristname = ?");
    $stmt->bind_param("s", $fristname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $staff = $result->fetch_assoc();

        
        if (password_verify($password, $staff['password'])) {
            
            $_SESSION['staff_id'] = $staff['id'];
            $_SESSION['staff_name'] = $staff['fristname'];
            header("Location: staff.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No staff member found with this firstname.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Staff Login</h2>
        <form method="post" action="">
            <label for="fristname">First Name:</label>
            <input type="fristname" name="fristname" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
    </div>
</body>
</html>
