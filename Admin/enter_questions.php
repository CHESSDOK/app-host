<?php
$eid = $_GET['eid'];
$total = $_GET['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Questions</title>
    <link rel="stylesheet" href="../Admin/adminCSS/ae.css">
</head>
<body>
<div class="form-box">
    <form class="form" action="adminPHP/save_questions.php" method="post">
        <span class="title">Enter Questions</span>
        <input type="hidden" name="eid" value="<?php echo $eid; ?>">
        <?php
        for($i = 1; $i <= $total; $i++) {
            echo '<div class="form-container">
                    <input type="text" class="input" name="questions[]" placeholder="Question ' . $i . '" required>
                    <input type="text" class="input" name="option_a[]" placeholder="Option A" required>
                    <input type="text" class="input" name="option_b[]" placeholder="Option B" required>
                    <input type="text" class="input" name="option_c[]" placeholder="Option C" required>
                    <input type="text" class="input" name="option_d[]" placeholder="Option D" required>
                    <select name="correct_answer[]" class="input" required>
                        <option value="">Select correct answer</option>
                        <option value="a">Option A</option>
                        <option value="b">Option B</option>
                        <option value="c">Option C</option>
                        <option value="d">Option D</option>
                    </select>
                </div>';
        }
        ?>
        <button type="submit" name="save">SAVE QUESTIONS</button>
    </form>
</div>
</body>
</html>
