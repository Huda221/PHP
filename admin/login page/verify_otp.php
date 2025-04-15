<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; }
        .box { max-width: 350px; margin: 100px auto; background: white; padding: 30px; border-radius: 10px; }
        .error { color: red; }
        input[type="number"], input[type="password"] { width: 93%; padding: 10px; margin: 10px 0; }
        input[type="submit"] {width: 100%; padding: 10px; margin: 10px 0;}
    </style>
</head>
<body>
<div class="box">
    <h2>Verify OTP</h2>
    <form action="verify_otp_process.php" method="post">
        <input type="number" name="otp" placeholder="Enter OTP" required>
        <input type="submit" value="Verify">
    </form>
</div>
</body>
</html>
