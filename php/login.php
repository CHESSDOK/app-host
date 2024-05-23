<?php
session_start();

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    include_once "db_connection.php";
    $email = mysqli_real_escape_string($conn, $email);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        die("<script>alert('Email not found.'); window.location.href = '../index.html';</script>");
    }

    $user = mysqli_fetch_object($result);
    if (!password_verify($pass, $user->password)) {
        die("<script>alert('Pass is incorrect.'); window.location.href = '../index.html';</script>");
    }

    if ($user->email_verified_at == null) {
        die("<script>alert('Email is not verified.'); window.location.href = '../pages/email.php';</script>");
    }

    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email;

    header("Location: ../pages/home.php");
    exit();
}
?>
