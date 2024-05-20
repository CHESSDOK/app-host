<?php
include '../php/db_connection.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $conn->real_escape_string($_POST['category']);
    $youtube_url = $conn->real_escape_string($_POST['youtube_url']);
    $embed_url = str_replace("watch?v=", "embed/", $youtube_url);

    $sql = "INSERT INTO videos (category, youtube_url, embed_url) VALUES ('$category', '$youtube_url', '$embed_url')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
