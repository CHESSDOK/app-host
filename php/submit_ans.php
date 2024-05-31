<?php
session_start();

if (isset($_POST['submit'])) {
    include_once "../php/db_connection.php";

    $eid = $_POST['eid'];
    $answers = $_POST['answers'];
    $user_id = $_SESSION['user_id'];

    // Ensure no previous answers are stored for this exam to avoid duplicate entries
    $delete_previous_answers = "DELETE FROM user_answers WHERE user_id='$user_id' AND eid='$eid'";
    mysqli_query($conn, $delete_previous_answers);

    $questions_query = "SELECT * FROM question WHERE eid='$eid'";
    $questions_result = mysqli_query($conn, $questions_query);

    $score = 0;
    $correct_answers = 0;
    $wrong_answers = 0;

    while ($question = mysqli_fetch_assoc($questions_result)) {
        $qid = $question['id'];
        $correct_answer = $question['correct_answer'];
        $marks = $question['marks'];
        $user_answer = isset($answers[$qid]) ? $answers[$qid] : null;

        // Insert the user's answer
        $insert_answer_query = "INSERT INTO user_answers (user_id, eid, qid, answer) VALUES ('$user_id', '$eid', '$qid', '$user_answer')";
        mysqli_query($conn, $insert_answer_query);

        if ($user_answer === $correct_answer) {
            $score += $marks;
            $correct_answers++;
        } else {
            $wrong_answers++;
        }
    }

    // Ensure no previous scores are stored for this exam to avoid duplicate entries
    $delete_previous_score = "DELETE FROM user_scores WHERE user_id='$user_id' AND eid='$eid'";
    mysqli_query($conn, $delete_previous_score);

    // Insert or update the user's score and increment retake count if retaking
    $insert_score_query = "INSERT INTO user_scores (user_id, eid, score, correct_answers, wrong_answers, retake_count) 
                           VALUES ('$user_id', '$eid', '$score', '$correct_answers', '$wrong_answers', 0)
                           ON DUPLICATE KEY UPDATE score='$score', correct_answers='$correct_answers', wrong_answers='$wrong_answers', retake_count=retake_count + 1";
    mysqli_query($conn, $insert_score_query);

    header("Location: ../pages/show_res.php?user_id=$user_id&eid=$eid");
    exit();
}
?>
