<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.html");
    exit();
}

include_once "../php/db_connection.php";
$eid = $_GET['eid'];
$user_id = $_SESSION['user_id'];

$questions_query = "SELECT * FROM question WHERE eid='$eid'";
$questions_result = mysqli_query($conn, $questions_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/exam.css">
    <title>Take Exam</title>
</head>
<body>
    <form class="form-box" action="../php/submit_ans.php" method="POST">
        <input type="hidden" name="eid" value="<?php echo htmlspecialchars($eid); ?>">
        <?php
        $q_number = 1;
        while ($question = mysqli_fetch_assoc($questions_result)) {
            echo "<div class='question'>
                <p>Question {$q_number} :: " . htmlspecialchars($question['question']) . "</p>
                <input type='hidden' name='questions[]' value='{$question['id']}'>
                <label><input type='radio' name='answers[{$question['id']}]' value='a'> " . htmlspecialchars($question['option_a']) . "</label><br>
                <label><input type='radio' name='answers[{$question['id']}]' value='b'> " . htmlspecialchars($question['option_b']) . "</label><br>
                <label><input type='radio' name='answers[{$question['id']}]' value='c'> " . htmlspecialchars($question['option_c']) . "</label><br>
                <label><input type='radio' name='answers[{$question['id']}]' value='d'> " . htmlspecialchars($question['option_d']) . "</label><br>
            </div>";
            $q_number++;
        }
        ?>
        <button  class="action" type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
