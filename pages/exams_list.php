<?php
include_once "../php/db_connection.php"; // Adjust the path as needed

// Fetch all exams
$exams_query = "SELECT * FROM exam";
$exams_result = mysqli_query($conn, $exams_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Exams</title>
    <link rel="stylesheet" href="../css/exam.css"> <!-- Adjust the path as needed -->
</head>
<body>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Topic</th>
                <th scope="col">Total Questions</th>
                <th scope="col">Marks</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sn = 1;
            while ($exam = mysqli_fetch_assoc($exams_result)) {
                $total_marks = $exam['total'] * $exam['corr']; // Calculate total marks
                echo "<tr>
                    <td data-label='S.N'>{$sn}</td>
                    <td data-label='Topic'>" . htmlspecialchars($exam['title']) . "</td>
                    <td data-label='Total Questions'>{$exam['total']}</td>
                    <td data-label='Marks'>{$total_marks}</td>
                    <td data-label='Action'><a href='take_exam.php?eid=" . htmlspecialchars($exam['eid']) . "' class='btn start-btn'>Start</a></td>
                </tr>";
                $sn++;
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>

