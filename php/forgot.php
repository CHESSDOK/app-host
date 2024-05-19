<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mailer/vendor/autoload.php';

if (isset($_POST["forgot"])) {
    $email = $_POST["email"];

    // connect with database
    include_once "db_connection.php";

    // sanitize email to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);

    // check if credentials are okay, and email is verified
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {
        echo "<script>alert('Email not found.'); window.location.href = '../pages/forgot_password.php';</script>";
        exit();
    }

    $user = mysqli_fetch_assoc($result);
    if ($user['email_verified_at'] == null) {
        echo "<script>alert('Email is not verified.'); window.location.href = '../pages/email.php';</script>";
        exit();
    }

    // Generate a random verification code
    $verification_code = rand(100000, 999999);

    // Store the verification code in the database (you should have a column for this in your users table)
    $sql = "UPDATE users SET verification_code = ? WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $verification_code, $email);
    mysqli_stmt_execute($stmt);

    // Send the verification code via email using PHPMailer
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Disable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                             // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'marklawrencemercado8@gmail.com';               // SMTP username
        $mail->Password   = 'svvj rfpf egbx qbvo';                  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('marklawrencemercado8@gmail.com', 'LERA.com');
        $mail->addAddress($email);                                  // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Your Password Reset Code';
        $mail->Body    = "Your password reset code is: <b>$verification_code</b>";
        $mail->AltBody = "Your password reset code is: $verification_code";

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // Redirect to the forgot password page
    header("Location: ../pages/Code_verification.php?email=" . $email);
    exit();
}
?>
