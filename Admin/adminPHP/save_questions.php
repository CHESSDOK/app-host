<?php
if (isset($_POST['save'])) {
    $eid = $_POST['eid'];
    $questions = $_POST['questions'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $correct_answers = $_POST['correct_answer'];

    include_once "db_connection.php";

    for ($i = 0; $i < count($questions); $i++) {
        $question = $questions[$i];
        $a = $option_a[$i];
        $b = $option_b[$i];
        $c = $option_c[$i];
        $d = $option_d[$i];
        $correct = $correct_answers[$i];

        $sql = "INSERT INTO question(eid, question, option_a, option_b, option_c, option_d, correct_answer) VALUES ('$eid', '$question', '$a', '$b', '$c', '$d', '$correct')";
        mysqli_query($conn, $sql);
    }

    header("Location: ../admin_exam.php");
    exit();
}
?>
