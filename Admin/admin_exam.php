<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Making Exam</title>
    <link rel="stylesheet" href="../Admin/adminCSS/ae.css">
</head>
<body>
<div class="form-box">
    <form class="form" action="adminPHP/process_exam.php" method="post">
        <span class="title">EXAM MAKER</span>
        <span class="subtitle">Make questions to challenge the users</span>
        <div class="form-container">
            <input type="text" class="input" name="name" placeholder="Enter Exam Title" required>
            <input type="number" class="input" name="total" placeholder="Enter total number of questions" required>
            <input type="number" class="input" name="corr" placeholder="Enter points for each question" required>
            <input type="number" class="input" name="wrong" placeholder="Enter deduction for wrong answer" required>
            <input type="text" class="input" name="tag" placeholder="Enter a tag for your exam" required>
        </div>
        <button type="submit" name="gen" id="myBtn">GENERATE</button>
    </form>
</div>
</body>
</html>
