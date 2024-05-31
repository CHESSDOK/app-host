<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.html");
    exit();
}

include_once "../php/db_connection.php";
$user_id = $_SESSION['user_id'];

$exams_query = "SELECT * FROM exam";
$exams_result = mysqli_query($conn, $exams_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../css/exam_list.css">
    <title>Exams List</title>
</head>
<body>
    <header>
      <div class="logo">
        <!-- Place your logo here -->
        <img src="../icons/lslogo.png" alt="Logo" />
      </div>
      <div class="burger-menu">
        <button id="burger-btn">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </header>

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
            // Check if the user has already taken this exam
            $eid = $exam['eid'];
            $user_score_query = "SELECT retake_count FROM user_scores WHERE user_id='$user_id' AND eid='$eid'";
            $user_score_result = mysqli_query($conn, $user_score_query);
            $has_taken_exam = mysqli_num_rows($user_score_result) > 0;

            $action_links = $has_taken_exam ? 
                "<a href='retake_exam.php?eid={$eid}'>Retake</a>" :
                "<a href='take_exam.php?eid={$eid}'>Start</a>";

            echo "<tr>
                <td data-label='SN'>{$sn}</td>
                <td data-label='Title'>{$exam['title']}</td>
                <td data-label='total'>{$exam['total']}</td>
                <td data-label='Marks'>{$exam['corr']} * {$exam['total']}</td>
                <td data-label='Action'>{$action_links}</td>
            </tr>";
            $sn++;
        }
        ?>
        </tbody>
    </table>
    <div id="side-menu" class="side-menu">
        <button id="close-btn">&times;</button>
        <ul>
          <li><a href="#">Profile</a></li>
          <li><a href="home.php">home</a></li>
          <li><a href="../index.html" id="logout">Logout</a></li>
        </ul>
      </div>
</body>
<script src="../js/side.js"></script>
</html>
