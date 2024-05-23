<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.html");
    exit();
}

include_once "../php/db_connection.php";

$user_id = $_SESSION['user_id'];

$progress_query = "
    SELECT exam.title, ranked_scores.score, ranked_scores.correct_answers, ranked_scores.wrong_answers, ranked_scores.rank_position, ranked_scores.retake_count
    FROM (
        SELECT user_id, eid, score, correct_answers, wrong_answers, retake_count,
               RANK() OVER (PARTITION BY eid ORDER BY score DESC) as rank_position
        FROM user_scores
    ) ranked_scores
    INNER JOIN exam ON ranked_scores.eid = exam.eid
    WHERE ranked_scores.user_id = '$user_id'
    ORDER BY ranked_scores.eid";
$progress_result = mysqli_query($conn, $progress_query);

if (!$progress_result) {
    die('Query Error: ' . mysqli_error($conn));
}
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
    <link rel="stylesheet" href="../css/progress.css">
    <title>User Progress</title>
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
   

    <div class="content-container">
        <h2>My Progress</h2>
        <table>
        <thead>
            <tr>
                <th scope="col">Exam Title</th>
                <th scope="col">Score</th>
                <th scope="col">Correct Answers</th>
                <th scope="col">Wrong Answers</th>
                <th scope="col">Rank</th>
                <!--<th>Retake Count</th>-->
            </tr>
            </thead>
          <tbody> 
            <?php
            while ($progress = mysqli_fetch_assoc($progress_result)) {
                echo "<tr>
                    <td data-label='Title'>" . htmlspecialchars($progress['title']) . "</td>
                    <td data-label='Score'>" . htmlspecialchars($progress['score']) . "</td>
                    <td data-label='Correct answers'>" . htmlspecialchars($progress['correct_answers']) . "</td>
                    <td data-label='Wrong answers'>" . htmlspecialchars($progress['wrong_answers']) . "</td>
                    <td data-label='Rank'>" . htmlspecialchars($progress['rank_position']) . "</td>
                    
                </tr>";//<td>" . htmlspecialchars($progress['retake_count']) . "</td>
            }
            ?>
            </tbody>
        </table>
    </div>
    <div id="side-menu" class="side-menu">
    <button id="close-botns"> &times; </button>
    <ul>
      <li><a href="#">Profile</a></li>
      <li><a href="home.php">Home</a></li>
      <li><a href="../index.html" id="logout">Logout</a></li>
    </ul>
  </div>
    <script src="../js/side.js"></script>
</body>
</html>
