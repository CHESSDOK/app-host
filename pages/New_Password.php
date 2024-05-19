<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password</title>
    <link rel="stylesheet" href="../css/forgot.css">
</head>
<body>
    <div class="container">
        
        <h2>New Password</h2>
        <div class="notification">Please create a password that you don't use on any other site.</div>
        <form action="../php/reset.php" method="post">
            <input type="text" name="email" value="<?php echo $_GET['email']; ?>" required>
            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <input type="submit" name="reset" value="Reset Password">
        </form>
    </div>
    <script>
     var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords do not match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }
    confirm_password.onkeyup = validatePassword;
    </script>
</body>
</html>
