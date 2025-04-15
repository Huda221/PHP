<?php
include "db.php";
$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    if ($new_password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // No hashing, storing plain text password
        $email = $conn->real_escape_string($email);
        
        $check = $conn->query("SELECT * FROM users WHERE email='$email'");
        if ($check->num_rows === 1) {
            $update = $conn->query("UPDATE users SET password='$new_password' WHERE email='$email'");
            if ($update) {
                $success = "Password has been reset successfully! Redirecting to login...";
                // Redirect to login after 3 seconds
                header("refresh:5;url=login.php");
            } else {
                $error = "Error updating password.";
            }
        } else {
            $error = "Email not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; }
        .box { max-width: 400px; margin: 100px auto; background: white; padding: 30px; border-radius: 10px; }
        .error { color: red; }
        .success { color: green; }
        input[type="email"], input[type="password"] { width: 93%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { width: 100%; padding: 10px; margin: 10px 0; }
    </style>
</head>
<body>
<div class="box">
    <h2>Reset Password</h2>
    <?php if ($error) echo "<p class='error'>$error</p>"; ?>
    <?php if ($success) echo "<p class='success'>$success</p>"; ?>
    <form method="post">
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="password" name="new_password" placeholder="New password" required>
        <input type="password" name="confirm_password" placeholder="Confirm password" required>
        <input type="submit" value="Reset Password">
    </form>
</div>
</body>
</html>
