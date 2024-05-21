<?php
include_once "../php/db_connection.php";

$user_id = $_GET['user_id'];
$eid = $_GET['eid'];

// Fetch user's score
$score_query = "SELECT * FROM user_scores WHERE user_id='$user_id' AND eid='$eid'";
$score_result = mysqli_query($conn, $score_query);
$score = mysqli_fetch_assoc($score_result)['score'];

// Fetch exam details
$exam_query = "SELECT * FROM exam WHERE eid='$eid'";
$exam_result = mysqli_query($conn, $exam_query);
$exam = mysqli_fetch_assoc($exam_result);

// Fetch questions and user's answers
$questions_query = "SELECT * FROM question WHERE eid='$eid'";
$questions_result = mysqli_query($conn, $questions_query);
$user_answers_query = "SELECT * FROM user_answers WHERE user_id='$user_id' AND eid='$eid'";
$user_answers_result = mysqli_query($conn, $user_answers_query);

$user_answers = [];
while ($answer = mysqli_fetch_assoc($user_answers_result)) {
    $user_answers[$answer['qid']] = $answer['answer'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Results - <?php echo htmlspecialchars($exam['title']); ?></title>
    <link rel="stylesheet" href="../css/exam.css">
</head>
<body>
<div class="form-box">
    <span class="title">Results for <?php echo htmlspecialchars($exam['title']); ?></span>
    <p>Your Score: <?php echo htmlspecialchars($score); ?></p>
    <?php
    while ($question = mysqli_fetch_assoc($questions_result)) {
        $qid = $question['id'];
        $correct_answer = $question['correct_answer'];
        $user_answer = $user_answers[$qid];

        echo '<div class="form-container">
                <p>Question: ' . htmlspecialchars($question['question']) . '</p>
                <p>Your answer: ' . htmlspecialchars($user_answer) . '</p>
                <p>Correct answer: ' . htmlspecialchars($correct_answer) . '</p>
            </div>';
    }
    ?>
</div>
</body>
</html>
