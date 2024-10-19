<?php
session_start(); // Start the session at the top of your login script

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
$name = trim($_POST['name']); // Trim to avoid whitespace issues
$passwordInput = trim($_POST['password']); // Trim to avoid whitespace issues

// Prepare and execute a statement to check for the user
$stmt = $conn->prepare("SELECT password FROM users WHERE name = ?");
$stmt->bind_param("s", $name);
$stmt->execute();
$stmt->store_result();

// Check if user exists
if ($stmt->num_rows > 0) {
    $stmt->bind_result($storedPassword);
    $stmt->fetch();

    // Verify the password without hashing
    if ($passwordInput === $storedPassword) {
        // Successful login
        $_SESSION['loggedin'] = true; // Set session variable
        $_SESSION['username'] = $name; // Store username or any other information
        echo "Redirecting to index.php..."; // Debugging line
        header("Location: index.php"); // Redirect to index.php
        exit(); // Make sure to exit after redirecting
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found with that username.";
}

// Close the connection
$stmt->close();
$conn->close();
?>
