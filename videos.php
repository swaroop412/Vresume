<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vresume";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve embed codes from the database
$sql = "SELECT embed_code FROM videos";
$result = $conn->query($sql);

// Close the database connection
$conn->close();

// Output the embed codes
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="video-container">' . $row["embed_code"] . '</div>';
    }
} else {
    echo "No videos found.";
}
