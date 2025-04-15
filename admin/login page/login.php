<?php
include "db.php"; 

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username = $conn->real_escape_string($username);

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Compare plain text password
        if ($password === $user["password"]) {
            $_SESSION["username"] = $user["username"];
            header("Location: index.php"); // Go to dashboard
            exit;
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; }
        .box { max-width: 350px; margin: 100px auto; background: white; padding: 30px; border-radius: 10px; }
        input[type="text"], input[type="password"] { width: 93%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { width: 100%; padding: 10px; margin: 10px 0; }
        .error { color: red; }
        label { font-size: 15px; color: grey; }
    </style>
</head>
<body>
<div class="box">
    <h2>Login</h2>
    <?php if ($error) echo "<p class='error'>$error</p>"; ?>
    <form method="post" action="">
        <label for="Enter UserName">Enter UserName:</label>
        <input type="text" name="username" placeholder="User" required>
        <label for="password">Enter Password:</label>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
        <p style="text-align:right;"><a href="forgot_password.php">Forgot Password?</a></p>
    </form>
</div>
</body>
</html>
