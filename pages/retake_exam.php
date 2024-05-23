<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.html");
    exit();
}

include_once "../php/db_connection.php";

$user_id = $_SESSION['user_id'];
$eid = $_GET['eid'];

// Increment retake count and reset scores
$update_query = "UPDATE user_scores 
                 SET score = 0, correct_answers = 0, wrong_answers = 0, retake_count = retake_count + 1 
                 WHERE user_id = '$user_id' AND eid = '$eid'";
mysqli_query($conn, $update_query);

// Redirect to the exam page
header("Location: take_exam.php?eid=$eid");
exit();
?>
