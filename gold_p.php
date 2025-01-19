<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "fitness_center";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$city = $_POST['city'];
$email = $_POST['email'];


$membership_package = "Gold";


$sql = "INSERT INTO membership (username, email, gender, city, membership_package, created_at)
VALUES ('$name', '$email', '$gender', '$city', '$membership_package', NOW())";

if ($conn->query($sql) === TRUE) {
    
    echo "<script>alert('You have successfully enrolled in the Silver Membership!'); window.location.href = 'home.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
