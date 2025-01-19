<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "fitness_center";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$schedule_result = $conn->query("SELECT * FROM class_schedule ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), time_slot");
?>



<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/classes.css">
    <script src="../js/animation.js"></script>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h1>FF<span>C</span></h1>
            </div>
            <ul class="nav-links">
                <li><a href="../html/home.html">Home</a></li>
                <li><a href="../html/about.html">About Us</a></li>
                <li><a href="../html/classes.php">Classes</a></li>
                <li><a href="../html/blog.html">Blog</a></li>
                <li><a href="../html/service.html">Services</a></li>
                <li><a href="../html/conact.html">Contact</a></li>
            </ul>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-facebook fa-lg"></i></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp fa-lg"></i></a>
                <a href="#"><i class="fa-brands fa-instagram fa-lg"></i></a>
                

                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-bars"></i> Menu</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../html/login.html">Login</a>
                        <a href="../html/register.html">Register</a>
                        <a href="../html/staff.php">Staff Login</a>
                        <a href="../html/admin.php">Admin login</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="banner">
        <div class="overlay">
             <h1>About us</h1><br>
             <p><a href="../html/home.html">Home</a> >about us</p>
        </div>
    </div>

    <section class="classes-section">
        <h2>Our Classes</h2>
        <p>What We Can Offer</p>
        <div class="classes-container">
            <div class="class-card" style="background-image: url('../img/bodypump.jpg');">
                <div class="class-content">
                    <h3>Body Pump</h3>
                    <a href="../html/boadypump.html" class="learn-more">></a>
                </div>
            </div>
            <div class="class-card" style="background-image: url('../img/kickboxing.jpg');">
                <div class="class-content">
                    <h3>Kickboxing</h3>
                    <a href="../html/kickboxing.html" class="learn-more">></a>
                </div>
            </div>
            <div class="class-card" style="background-image: url('../img/Cardio.jpg');">
                <div class="class-content">
                    <h3>Cardio</h3>
                    <a href="../html/cardio.html" class="learn-more">></a>
                </div>
            </div>
            <div class="class-card" style="background-image: url('../img/muscular.jpeg');">
                <div class="class-content">
                    <h3>Muscular</h3>
                    <a href="../html/muscular.html" class="learn-more">></a>
                </div>
            </div>
            <div class="class-card" style="background-image: url('../img/muscel.jpg');">
                <div class="class-content">
                    <h3>Muscle</h3>
                    <a href="../html/muscle.html" class="learn-more">></a>
                </div>
            </div>
        </div>
    </section>


    <h2>Class Schedule</h2>
        <table>
            <tr>
                <th>Day</th>
                <th>Time Slot</th>
                <th>Class Name</th>
                <th>Instructor</th>
            </tr>
            <?php
            // Fetch data from the class_schedule table
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

        <footer>
    <div class="footer-top">
        <div class="footer-contact">
            <div class="contact-item">
                <span class="icon location"></span>
                <p><i class="fa-solid fa-location-dot"></i>  165/1 Yakkala ,Gampaha</p>
            </div>
            <div class="contact-item">
                <span class="icon phone"></span>
                <p><i class="fa-solid fa-phone"></i> 0772003317 | 0332254860</p>
            </div>
            <div class="contact-item">
                <span class="icon email"></span>
                <p><i class="fa-solid fa-envelope"></i> danushapasan@gmail.com</p>
            </div>
        </div>
    </div>
    
    <div class="footer-middle">
        <div class="footer-brand">
            <h2>FF<span>C</span></h2>
            <p>The customer is very important, the customer will be followed by the customer. But at the same time they happened to be laboring with great pain.</p>
        </div>
        <div class="footer-links">
            <div class="footer-column">
                <h4>Useful links</h4>
                <ul>
                    <li><a href="../html/home.html">Home</a></li>
                    <li><a href="../html/about.html">About</a></li>
                    <li><a href="../html/classes.php">Classes</a></li>
                    <li><a href="../html/blog.html">Blog</a></li>
                    <li><a href="../html/service.html">Services</a></li>
                    <li><a href="../html/conact.html">Contact</a></li>
                </ul>
                <div class="social-icons">
                <a href="#"><i class="fa-brands fa-facebook fa-lg"></i></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp fa-lg"></i></a>
                <a href="#"><i class="fa-brands fa-instagram fa-lg"></i></a>
                

                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-bars"></i> Menu</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../html/login.html">Login</a>
                        <a href="../html/register.html">Register</a>
                        <a href="../html/staff.php">Staff Login</a>
                        <a href="../html/admin.php">Admin login</a>
                    </div>
                </div>
            </div>
            </div>
            <div class="footer-column">
                <h4>Support</h4>
                <ul>
                    <li><a href="..html/login.html">Login</a></li>
                    <li><a href="../html/conact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>Created by Danusha Pasan <i class="fas fa-heart"></i> by Sri Lanka</p>
    </div>
</footer>
</body>
</html>