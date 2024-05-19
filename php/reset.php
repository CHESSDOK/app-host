<?php
if (isset($_POST["reset"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("<script>alert('Pass does not match.'); window.location.href = '../pages/New_Password.php';</script>");
    }

    // Hash the new password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connect with database
    include_once "db_connection.php";

    // Update the user's password using prepared statements
    $sql = "UPDATE users SET password = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ss", $hashed_password, $email);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            // Optionally, you can redirect to a login page or another page
            header("Location: ../index.html");
            exit();
        } else {
            die("Failed to reset password or email not found.");
            echo "email". $email;
        }

        $stmt->close();
    } else {
        die("Failed to prepare the SQL statement.");
    }

    $conn->close();
    exit();
} else {
    die("Invalid request.");
}
?>
