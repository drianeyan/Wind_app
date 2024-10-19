<?php
$host = '127.0.0.1';
$db = 'wind_db';
$user = 'root';
$pass = 'root123'; // Replace with your actual password

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $password);

// Execute the statement
if ($stmt->execute()) {
    // Redirect to login page
    header("Location: login.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
