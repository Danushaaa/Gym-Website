<?php
$servername = "localhost";
$username = "root";      
$password = "";           
$dbname = "fitness_center";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    
    if (!empty($username) && !empty($email) && !empty($password) && !empty($gender)) {
       
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        
        $stmt = $conn->prepare("INSERT INTO Users (username, email, city, gender, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $email, $city, $gender, $hashed_password);

        
        if ($stmt->execute()) {
            echo "Registration successful!";
            header("Location: login.html");
        } else {
            echo "Error: " . $stmt->error;
        }

        
        $stmt->close();
    } else {
        echo "All fields are required!";
    }
}


$conn->close();


?>
