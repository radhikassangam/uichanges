<?php
session_start();

// Include the database connection file
include('includes/db.php');

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Login functionality

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Connect to database
    

    // Get form data
    $new_password = $conn->real_escape_string($_POST['new_password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_password']);
    $reset_token = isset($_POST['reset_token']) ? $conn->real_escape_string($_POST['reset_token']) : '';

    // Check if passwords match
    if ($new_password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    // Validate reset token and update password
    $result = $conn->query("SELECT * FROM users WHERE reset_token='$reset_token' AND reset_token_expiry > NOW()");
    if ($result->num_rows > 0) {
        // Update password and clear token
        $conn->query("UPDATE users SET password='$hashed_password', reset_token=NULL, reset_token_expiry=NULL WHERE reset_token='$reset_token'");
        echo "Password updated successfully.";
    } else {
        echo "Invalid or expired token.";
    }

    $conn->close();
}
?>


