<?php
// submit_content.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "content_db";
$port=3307;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,$port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'content' parameter is set
if (isset($_POST['content'])) {
    $content = $conn->real_escape_string($_POST['content']);

    // Insert content into the database
    $sql = "INSERT INTO editor_content (content) VALUES ('$content')";

    if ($conn->query($sql) === TRUE) {
        echo "Content submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
