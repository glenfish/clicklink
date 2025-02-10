<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table
$sql = "CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255))";
$conn->query($sql);

// Insert data
$sql = "INSERT INTO users (name) VALUES ('Alice'), ('Bob')";
$conn->query($sql);

// Query data
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "ID: {$row['id']} - Name: {$row['name']}\n";
}

$conn->close();
?>