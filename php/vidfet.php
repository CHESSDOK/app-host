<?php
include '../php/db_connection.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT category, youtube_url, embed_url FROM videos";
$result = $conn->query($sql);

$videos = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $videos[] = $row;
    }
}

echo json_encode($videos);

$conn->close();
?>
