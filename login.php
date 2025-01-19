<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitness_center";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    if (!empty($email) && !empty($password)) {
        
        $stmt = $conn->prepare("SELECT id, username, password FROM Users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            
            if (password_verify($password, $user['password'])) {
                
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: home.html"); 
                exit();
            } else {
                
                echo '<script>alert("User and Password invalid !")</script>';
            }
        } else {
            
            echo '<script>alert("User not found !")</script>';
        }

        
        $stmt->close();
    } else {
        echo "Please enter email and password.";
    }
}


$conn->close();
?>
