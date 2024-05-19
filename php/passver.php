<?php

if (isset($_POST["ver"])) {
    $email = $_POST["email"];
    $verification_code = $_POST["code"];

    // connect with database
    include_once "db_connection.php";

    // Check if the email and verification code match using prepared statements
    $sql = "SELECT * FROM users WHERE email = ? AND verification_code = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ss", $email, $verification_code);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Verification successful
            header("Location: ../pages/New_Password.php?email=". $email);
        } else {
            // Verification failed
            die("<script>alert('Invilid verification code.'); window.location.href = '../pages/Code_verification.php?email=" . urlencode($email) . "';</script>");
        }

        $stmt->close();
    } else {
        die("Failed to prepare the SQL select statement.");
    }

    $conn->close();
    exit();
}

?>
