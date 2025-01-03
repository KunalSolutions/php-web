<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'contact_info';  // Your database name

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission to store email
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Insert email into the database (clients table)
    $sql = "INSERT INTO clients (email) VALUES (?)";  // Use the 'clients' table name
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);

    if ($stmt->execute()) {
        echo "<script>alert('Email stored successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
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
    <title>Personal Portfolio</title>
    <style>
        /* General Styles */
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 1000px; margin: 50px auto; padding: 20px; background-color: white; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); border-radius: 10px; }
        h1, h2 { text-align: center; }
        .navbar { background-color: #333; overflow: hidden; }
        .navbar a { float: left; display: block; color: white; text-align: center; padding: 14px 20px; text-decoration: none; }
        .navbar a:hover { background-color: #ddd; color: black; }
        .navbar a.active { background-color: #4CAF50; color: white; }
        label { display: block; margin-bottom: 8px; font-weight: bold; }
        input { width: 100%; padding: 10px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px; }
        button { width: 100%; padding: 12px; background-color: #4CAF50; color: white; border: none; font-size: 16px; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #45a049; }
        .about { padding: 50px 0; background-color: #f8f8f8; }
        footer { background-color: #333; color: white; padding: 20px 0; text-align: center; }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <a href="#home" class="active">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
</div>

<!-- Main Content of Personal Portfolio -->
<h1>Welcome to My Personal Portfolio</h1>

<!-- About Section -->
<div id="about" class="about">
    <h2>About Me</h2>
    <p>Hello! I'm a passionate web developer, always learning new technologies and striving to improve my skills. I enjoy building interactive websites and web applications. This portfolio showcases some of my work and personal projects. I'm excited to continue growing and making a positive impact in the tech community!</p>
</div>

<!-- Login Section with Email -->
<div class="container">
    <h2>Login to Your Account</h2>
    <form method="POST" action="personal.php">
        <label for="email">Email ID:</label>
        <input type="email" name="email" id="email" placeholder="Enter your email address" required>

        <button type="submit">Login</button>
    </form>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2025 My Personal Portfolio. All rights reserved.</p>
</footer>

</body>
</html>
