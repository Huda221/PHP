<?php
session_start();

$enteredOtp = $_POST['otp'];
$originalOtp = $_SESSION['otp'];

if ($enteredOtp == $originalOtp) {
    header("Location: reset_password.php");
    exit();
} else {
    echo "Invalid OTP!";
}
?>
