<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitness_center";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $classname = $_POST['classname'];
    $class_date = $_POST['class_date'];

    $sql = "INSERT INTO bookings (name, email, phone, classname, class_date)
            VALUES ('$name', '$email', '$phone', '$classname', '$class_date')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "Class booked successfully!";
    } else {
        $successMessage = "Error: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Booking</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function showNotificationAndRedirect(message) {
            alert(message); 
            window.location.href = '../html/home.html'; 
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h1>Book Your Class</h1>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone">
            
            <label for="classname">Choose Class:</label>
            <select id="classname" name="classname" required>
                <option value="BODY PUMP">BODY PUMP</option>
                <option value="KICKBOXING">KICKBOXING</option>
                <option value="CARDIO">CARDIO</option>
                <option value="MUSCULAR">MUSCULAR</option>
                <option value="MUSCLE">MUSCLE</option>
            </select>
            
            <label for="class_date">Class Date:</label>
            <input type="date" id="class_date" name="class_date" required>
            
            <label for="class_time">Class Time:</label>
            <input type="time" id="class_time" name="class_time" required>
            
            <button type="submit">Book Now</button>
        </form>
    </div>

    <?php if (!empty($successMessage)) : ?>
        <script>
            
            showNotificationAndRedirect("<?php echo $successMessage; ?>");
        </script>
    <?php endif; ?>
</body>
</html>
