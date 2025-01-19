<?php


// Database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitness_center";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
require 'database.php'; // Include the database connection

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    echo "You must be logged in to enroll in a membership.";
    exit();
}

// Assuming your user database is set up like this
// Adjust the table name and columns based on your actual user database
$userTable = 'users'; // Your user database table name
$username = $_SESSION['username'];

// Fetch user's data from the user database
$sql = "SELECT email, gender, city FROM users WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();

// Check if user exists
if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Prepare SQL to insert into membership database
    $membershipPackage = $_POST['membership_package']; // Get the selected package from the AJAX request

    $sql = "INSERT INTO membership (username, email, gender, city, membership_package) VALUES (:username, :email, :gender, :city, :membership_package)";
    $insertStmt = $pdo->prepare($sql);

    // Bind parameters
    $insertStmt->bindParam(':username', $username);
    $insertStmt->bindParam(':email', $user['email']);
    $insertStmt->bindParam(':gender', $user['gender']);
    $insertStmt->bindParam(':city', $user['city']);
    $insertStmt->bindParam(':membership_package', $membershipPackage);

    // Execute the query
    if ($insertStmt->execute()) {
        echo "Enrollment successful!";
    } else {
        echo "Error enrolling in membership.";
    }
} else {
    echo "User data not found.";
}

?>