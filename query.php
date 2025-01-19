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
    
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $subject = $conn->real_escape_string($_POST["subject"]);
    $message = $conn->real_escape_string($_POST["message"]);

  
    $sql = "INSERT INTO queries (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Your query has been submitted successfully.</p>";
        return; 
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}


$conn->close();
?>
