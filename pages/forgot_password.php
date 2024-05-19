<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../css/forgot.css">
</head>
<body>
    <div class="container" >
        <h2>Forgot Password</h2>
        <form action="../php/forgot.php" method="post">
            <label for="email">Enter your email:</label>
            <input type="email" id="email" name="email" placeholder="Enter email address" required>
            <input type="submit" value="Continue" name="forgot">
        </form>
    </div>
</body>
</html>
