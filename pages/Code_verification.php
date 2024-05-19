<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Verification</title>
    <link rel="stylesheet" href="../css/forgot.css">
</head>
<body>
    <div class="container">
        <h1>Code Verification</h1>
        <div class="notification">We've sent a password reset otp to your email.</div>
        <form action="../php/passver.php" method="post">
            <input type="text" name="email" value="<?php echo $_GET['email']; ?>" required />
            <label for="code">Enter the verification code:</label>
            <input type="text" id="code" name="code" placeholder="Enter code" required>
            <input type="submit" value="Submit" name="ver">
        </form>
      
    </div>
</body>
</html>
