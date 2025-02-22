<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Define these variables before the try block
$email = 'recipient@example.com';  // Replace with recipient email
$subject = 'Password Reset Request';
$message = 'Click on the following link to reset your password: <a href="http://localhost/reset_password.php?token=example_token">Reset Password</a>';

$mail = new PHPMailer(true);
try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'radhubel@gmail.com';  // Your Gmail address
    $mail->Password = 'kkse nlbp nomm ybem';  // App password here
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Enable verbose debugging
    $mail->SMTPDebug = 2;  // Enables verbose output for debugging

    // Recipient
    $mail->setFrom('radhubel@gmail.com', 'Your Name');
    $mail->addAddress($email);  // Add recipient email

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $message;

    // Send the email
    $mail->send();
    echo "A reset link has been sent to your email.";
} catch (Exception $e) {
    echo "Failed to send reset email. Error: {$mail->ErrorInfo}";
}
?>
