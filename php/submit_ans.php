<?php
if (isset($_POST['submit'])) {
    include_once "db_connection.php";

    $eid = $_POST['eid'];
    $answers = $_POST['answers'];
    $user_id = uniqid(); // Assuming you generate a unique ID for each user session

    // Fetch correct answers
    $questions_query = "SELECT * FROM questions WHERE eid='$eid'";
    $questions_result = mysqli_query($conn, $questions_query);

    $score = 0;
    while ($question = mysqli_fetch_assoc($questions_result)) {
        $qid = $question['id'];
        $correct_answer = $question['correct_answer'];
        $user_answer = $answers[$qid];

        // Check if the user's answer is correct
        if ($user_answer == $correct_answer) {
            $score += 1; // Assuming 1 point per correct answer
        }
        
        // Store the user's answer
        $insert_answer_query = "INSERT INTO user_answers (user_id, eid, qid, answer) VALUES ('$user_id', '$eid', '$qid', '$user_answer')";
        mysqli_query($conn, $insert_answer_query);
    }

    // Store the user's score
    $insert_score_query = "INSERT INTO user_scores (user_id, eid, score) VALUES ('$user_id', '$eid', '$score')";
    mysqli_query($conn, $insert_score_query);

    // Redirect to the results page
    header("Location: show_results.php?user_id=$user_id&eid=$eid");
    exit();
}
?>
