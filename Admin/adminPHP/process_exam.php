<?php
if(isset($_POST['gen'])){
    $name = ucwords(strtolower($_POST['name']));
    $total = $_POST['total'];
    $corr = $_POST['corr'];
    $wrong = $_POST['wrong'];
    $tag = $_POST['tag'];
    $id = uniqid();

    include_once "db_connection.php";
    $sql = "INSERT INTO exam(eid, title, corr, wrong, total, tag, date) VALUES ('$id', '$name', '$corr', '$wrong', '$total', '$tag', NOW())";
    if (mysqli_query($conn, $sql)) {

    // Redirect to question entry page with exam ID and total questions
    header("Location: ../enter_questions.php?eid=$id&total=$total");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
