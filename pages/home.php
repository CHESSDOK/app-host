<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.html");
    exit();
}

include_once "../php/db_connection.php";

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <title>User Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="header-DB">
        <div class="image-container">
            <div class="overlay"></div>
            <img src="../icons/a.jpg" alt="bg" class="image1">
        </div>
        <div class="header-text">
            <h1>Smart Reviewer</h1>
        </div>
    </div>

    <div class="content-container">

        <!-- Existing content with links to other pages -->
        <div id="content1" class="content">
            <div class="rowcp">
                <div class="row">
                    <a href="upload.php" class="col">
                        <img src="../icons/R1.png" alt="i1"> <br>
                        <p>Upload Files</p>
                    </a>
                    <a href="flash.html" class="col">
                        <img src="../icons/R2.png" alt="i1"> <br>
                        <p>Flashcards</p>
                    </a>
                    <a href="videos.php" class="col">
                        <img src="../icons/R3.png" alt="i1"> <br>
                        <p>Videos</p><br/>
                    </a>
                </div>
                <div class="row">
                    <a href="exams_list.php" class="col">
                        <img src="../icons/Q2.png" alt="i1"> <br>
                        <p>Exam</p>
                    </a>
                    <a href="progress.php" class="col">
                        <img src="../icons/Q3.png" alt="i1"> <br>
                        <p>Accuracy</p>
                    </a>
                    <a href="#" class="col">
                        <img src="../icons/Q4.png" alt="i1"> <br>
                        <p>Activities</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
