<?php

session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "fitness_center";


if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: adminlogin.php"); 
    exit();
}


$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$users_result = $conn->query("SELECT * FROM users");
$queries_result = $conn->query("SELECT * FROM queries");
$staff_result = $conn->query("SELECT * FROM staff"); 
$bookings_result = $conn->query("SELECT * FROM bookings");
$membership_result = $conn->query("SELECT * FROM membership");

if (isset($_POST['approve_booking'])) {
    $booking_id = $_POST['booking_id'];
    $sql = "UPDATE bookings SET approved = 1 WHERE id = $booking_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Booking approved successfully');</script>";
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}


if (isset($_POST['add_staff'])) {
    $fristname = $_POST['fristname'];
    $lastname = $_POST['lastname'];
    $nic = $_POST['nic'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 

    $sql = "INSERT INTO staff (fristname, lastname, nic, age, gender, email, password) 
            VALUES ('$fristname', '$lastname', '$nic', $age, '$gender', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New staff added successfully');</script>";
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['delete_staff'])) {
    $staff_id = $_POST['staff_id'];
    $sql = "DELETE FROM staff WHERE id = $staff_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Staff deleted successfully');</script>";
        header("Location: admin.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

if (isset($_POST['add_class'])) {
    $day = $_POST['day'];
    $time_slot = $_POST['time_slot'];
    $class_name = $_POST['class_name'];
    $instructor = $_POST['instructor'];

    $sql = "INSERT INTO class_schedule (day, time_slot, class_name, instructor) 
            VALUES ('$day', '$time_slot', '$class_name', '$instructor')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New class added successfully');</script>";
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


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
        <h2>Admin</h2>
        <ul>
            <li><a onclick="showSection('registered-users')"><span class="icon">🏠</span> Registered Users</a></li>
            <li><a onclick="showSection('user-queries')"><span class="icon">👥</span> Queries</a></li>
            <li><a onclick="showSection('manage-staff')"><span class="icon">⚙️</span> Manage Staff</a></li>
            <li><a onclick="showSection('add-classes')"><span class="icon">⚙️</span> Add classes</a></li>
            <li><a onclick="showSection('manage-bookings')"><span class="icon">📅</span> Manage Bookings</a></li>
            <li><a onclick="showSection('membership-data')"><span class="icon">💳</span> Membership Data</a></li>
        </ul>
    </div>
    <a href="logout.php" class="btn-logout">Log Out</a>

    <!-- Main Content -->
    <div class="main-container">
        
        <div class="content-section active" id="registered-users">
            <div class="header">
                <h2 class="section-title">Manage Users</h2>
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

        <div class="content-section" id="manage-staff">
            <div class="header">
                <h2 class="section-title">Manage Staff</h2>
            </div>
            <div class="container">
                <h2>Add New Staff</h2>
                <form method="POST">
                    <label>First Name: <input type="text" name="fristname" required></label><br>
                    <label>Last Name: <input type="text" name="lastname" required></label><br>
                    <label>NIC: <input type="text" name="nic" required></label><br>
                    <label>Age: <input type="number" name="age" min="18" required></label><br>
                    <label>Gender:
                        <select name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </label><br>
                    <label>Email: <input type="email" name="email" required></label><br>
                    <label>Password: <input type="password" name="password" required></label><br>
                    <button class = "submit" name = "add_staff">add</button>
                </form>

                <h2>Current Staff</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>NIC</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php while ($staff = $staff_result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $staff['id']; ?></td>
                            <td><?php echo $staff['fristname']; ?></td>
                            <td><?php echo $staff['lastname']; ?></td>
                            <td><?php echo $staff['nic']; ?></td>
                            <td><?php echo $staff['age']; ?></td>
                            <td><?php echo $staff['gender']; ?></td>
                            <td><?php echo $staff['email']; ?></td>
                            <td>
                                <form class="delete-btn" method="POST" style="display:inline;">
                                    <input type="hidden" name="staff_id" value="<?php echo $staff['id']; ?>">
                                    <button class = "delete-btn" name="delete_staff">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        
        <div class="content-section" id="add-classes">
    <div class="header">
        <h2 class="section-title">Add Classes</h2>
    </div>
    <div class="container">
        <h2>Add New Class</h2>
        <form method="POST">
            <label>Day:
                <select name="day" required>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>
            </label><br>
            <label>Time Slot: <input type="text" name="time_slot" placeholder="e.g., 6:00am - 8:00am" required></label><br>
            <label>Class Name: 
                <select name="class_name" required>
                    <option value="bodypump">Body Pump</option>
                    <option value="kickboxing">Kick Boxing</option>
                    <option value="cardio">Cardio</option>
                    <option value="muscular">Muscular</option>
                    <option value="muscel">Muscel</option>
                </select>
                 </label><br>
            <label>Instructor: 
            <select name="instructor" required>
                    <option value="kavindu">Kavindu</option>
                    <option value="danusha">Danusha</option>
                    <option value="Hirun">Hirun</option>
            </select>
            </label><br>
            <button type="submit" name="add_class">Add Class</button>
        </form>

        <h2>Class Schedule</h2>
        <table>
            <tr>
                <th>Day</th>
                <th>Time Slot</th>
                <th>Class Name</th>
                <th>Instructor</th>
            </tr>
            <?php
            
            $schedule_result = $conn->query("SELECT * FROM class_schedule");
            while ($class = $schedule_result->fetch_assoc()) {
                echo "<tr>
                    <td>{$class['day']}</td>
                    <td>{$class['time_slot']}</td>
                    <td>{$class['class_name']}</td>
                    <td>{$class['instructor']}</td>
                </tr>";
            }
            ?>
        </table>
    </div>
</div>            

<div class="content-section" id="manage-bookings">
            <div class="header">
                <h2 class="section-title">Manage Bookings</h2>
            </div>

            <div class="container">
                <section>
                    <h2>Manage Bookings</h2>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Class</th>
                            <th>Booking Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php while ($booking = $bookings_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $booking['id']; ?></td>
                                <td><?php echo $booking['name']; ?></td>
                                <td><?php echo $booking['classname']; ?></td>
                                <td><?php echo $booking['class_date']; ?></td>
                                <td><?php echo $booking['approved'] ? 'Approved' : 'Pending'; ?></td>
                                <td>
                                    <?php if (!$booking['approved']) { ?>
                                        <form method="POST" style="display:inline;">
                                            <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
                                            <button type="book-btn" name="approve_booking">Approve</button>
                                        </form>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </section>
            </div>
        </div>

        <div class="content-section" id="membership-data">
            <div class="header">
                <h2 class="section-title">Membership Data</h2>
            </div>
            <div class="container">
                <h2>Membership Data</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>City</th>
                        <th>Membership Package</th>
                        <th>Date Enrolled</th>
                    </tr>
                    <?php while ($membership = $membership_result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $membership['id']; ?></td>
                            <td><?php echo $membership['username']; ?></td>
                            <td><?php echo $membership['email']; ?></td>
                            <td><?php echo $membership['gender']; ?></td>
                            <td><?php echo $membership['city']; ?></td>
                            <td><?php echo $membership['membership_package']; ?></td>
                            <td><?php echo $membership['created_at']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

    </div>

    <?php $conn->close(); ?>
</body>
</html>
