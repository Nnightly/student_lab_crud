<?php
$servername = "localhost";
$username   = "root";  // default in XAMPP/WAMP
$password   = "";      // default is empty
$dbname     = "student_db";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$conn->query($sql);

// Reconnect with the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Create Table if not exists
$table = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    course VARCHAR(50) NOT NULL
)";
$conn->query($table);
?>
