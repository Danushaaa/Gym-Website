<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "fitness_center";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
if (!isset($_SESSION['staff_id'])) {
    header("Location: stafflogin.php");
    exit();
}

$users_result = $conn->query("SELECT * FROM users");
$queries_result = $conn->query("SELECT * FROM queries");
$staff_result = $conn->query("SELECT * FROM staff"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/animation.js"></script>  
</head>
<body>

   
    <div class="sidebar">
        <h2>Staff</h2>
        <ul>
            <li><a onclick="showSection('registered-users')"><span class="icon">🏠</span> Registered Users</a></li>
            <li><a onclick="showSection('user-queries')"><span class="icon">👥</span> Queries</a></li>
        </ul>
    </div>
    <a href="logout.php" class="btn-logout">Log Out</a>

    
    <div class="main-container">
        
        <div class="content-section active" id="registered-users">
            <div class="header">
                <h2 class="section-title">Users</h2>
            </div>

            <div class="container">
               
                <section>
                    <h2>Registered Users</h2>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Gender</th>
                        </tr>
                        <?php while ($user = $users_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['city']; ?></td>
                                <td><?php echo $user['gender']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </section>
            </div>
        </div>

        
        <div class="content-section" id="user-queries">
            <div class="header">
                <h2 class="section-title">User Queries</h2>
            </div>

            <div class="container">
               
                <section>
                    <h2>User Queries</h2>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date Submitted</th>
                        </tr>
                        <?php while ($query = $queries_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $query['id']; ?></td>
                                <td><?php echo $query['name']; ?></td>
                                <td><?php echo $query['email']; ?></td>
                                <td><?php echo $query['subject']; ?></td>
                                <td><?php echo $query['message']; ?></td>
                                <td><?php echo $query['submitted_at']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </section>
            </div>
        </div>
    </div>

    <?php $conn->close(); ?>
</body>
</html>
