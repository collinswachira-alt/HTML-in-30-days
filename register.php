<?php
session_start();
include 'db.php'; // Database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $otp = rand(100000, 999999); // Generate a 6-digit OTP

    // Save OTP and email in the session (or database)
    $_SESSION['email'] = $email;
    $_SESSION['otp'] = $otp;

    // Send OTP to the user's email
    $subject = "Your OTP Code";
    $message = "Your OTP code is: $otp";
    $headers = "From: no-reply@yourdomain.com";

    if (mail($email, $subject, $message, $headers)) {
        header("Location: verify.php");
        exit();
    } else {
        echo "Failed to send OTP.";
    }
}
?>