<?php
include_once "../php/db_connection.php";

$eid = $_GET['eid']; // Exam ID passed as a URL parameter

// Fetch exam details
$exam_query = "SELECT * FROM exam WHERE eid='$eid'";
$exam_result = mysqli_query($conn, $exam_query);
$exam = mysqli_fetch_assoc($exam_result);

// Fetch questions
$questions_query = "SELECT * FROM question WHERE eid='$eid'";
$questions_result = mysqli_query($conn, $questions_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Exam - <?php echo htmlspecialchars($exam['title']); ?></title>
    <link rel="stylesheet" href="../css/exam.css">
</head>
<body>
<div class="form-box">
    <form class="form" action="../php/submit_answers.php" method="post">
        <span class="title"><?php echo htmlspecialchars($exam['title']); ?></span>
        <input type="hidden" name="eid" value="<?php echo htmlspecialchars($eid); ?>">
        <?php
        $qnum = 1;
        while ($question = mysqli_fetch_assoc($questions_result)) {
            echo '<div class="form-container">
                <tr>
                    <th><p>Question ' . $qnum . ' :: ' . htmlspecialchars($question['question']) . '</p> </th>
                </tr><tr>
                    <td><input type="radio" name="answers[' . $question['id'] . ']" value="a" required> </td><td> ' . htmlspecialchars($question['option_a']) . '<br> </td>
                </tr><tr>
                    <td><input type="radio" name="answers[' . $question['id'] . ']" value="b" required> </td><td>' . htmlspecialchars($question['option_b']) . '<br> </td>
                </tr><tr>
                    <td><input type="radio" name="answers[' . $question['id'] . ']" value="c" required> </td><td>' . htmlspecialchars($question['option_c']) . '<br> </td>
                </tr><tr>
                    <td><input type="radio" name="answers[' . $question['id'] . ']" value="d" required> </td><td>' . htmlspecialchars($question['option_d']) . '<br> </td>
                </tr>
                </div>';
            $qnum++;
        }
        ?>
        <button type="submit" name="submit" class="btn submit-btn">Submit</button>
    </form>
</div>
</body>
</html>
