<?php
session_start();

// Include the database connection file
include('includes/db.php');

// Include PHPMailer files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Login functionality
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
   
    // Get email from form
    $email = $conn->real_escape_string($_POST['email']);

    // Check if email exists in the database
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0) {
        // Generate a unique reset token
        $token = bin2hex(random_bytes(50));
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

        // Update database with the token and expiry
        $conn->query("UPDATE users SET reset_token='$token', reset_token_expiry='$expiry' WHERE email='$email'");

        // Send reset link via email using PHPMailer
        $reset_link = "http://localhost/gemstore/reset_password.php?token=$token&email=" . urlencode($email);
        $subject = "Password Reset Request";
        $message = "Click on the following link to reset your password: $reset_link";

        // Setup PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Set the SMTP server
            $mail->SMTPAuth = true;
              // App password or Gmail password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipient
            $mail->setFrom('radhubel@gmail.com', 'Your Name');
            $mail->addAddress($email);  // Add the recipient email

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
    } else {
        echo "Email not found.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/middle.css">
    <link rel="stylesheet" href="assets/css/top.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/bottom.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

    *::before,
*::after {
    box-sizing: border-box;
}

/* Body styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    min-height: 100vh;
    overflow-x: hidden; /* Prevent horizontal overflow */
    display: flex;
    flex-direction: column;
}
.formreg{
    margin:50px
   }
/* Ensure html element doesn't have unwanted margins */
html {
    margin: 0;
    padding: 0;
}

/* Responsive media queries */
@media (max-width: 768px) {
    body {
        padding: 50px; /* Adding some padding for smaller screens */
        width:100%
    }
    .form-group{
        margin:30px;
    }
   .rptitle{
    margin:30px
   }
   .rpform{
    margin:30px
   }

}

@media (max-width: 480px) {
    body {
        padding: 0px; /* Further reduce padding for very small screens */
        width:100%
    }
    .form-group{
        margin:30px;
    }
    .rptitle{
    margin:30px
   }
  .rpform{
    margin:30px
   }

   
}
</style>    

</head>
<body>
<?php @include('pages/top.php') ?>
  <!-- End of top part -->

  <!-- Middle part -->
  <?php @include('pages/middle.php') ?>
  <!-- End of middle part -->
    <!-- Middle part -->
  <?php @include('pages/bottom.php') ?>
  <!-- End of middle part -->

  <div class="headerhead">
    <h1 style="text-align:center;">Reset Your Password</h1>
  </div>

  <!-- Breadcrumb Navigation -->
  <nav class="breadcrumb-nav mb-10 pb-1">
    <div class="containerbread">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li><span style="font-size:18px;color: black rgb(64, 63, 63);">> &nbsp</span>
        <li>Forget Password </li><span style="font-size:18px;color: black rgb(64, 63, 63);">> &nbsp</span>
        <li>Reset </li>
      </ul>
    </div>
  </nav>
  <!-- End of Breadcrumb -->

    <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>


    <section class="contact-section rpform">
                        <div class="row gutter-lg pb-3">
                            <div class="col-lg-3 ">
                            </div>
                            <div class="col-lg-6 mb-8">
                              <h3 class="rptitle">Reset Password</h3>
                              <form class="form reset-password-form" action="resetPassword.php" method="post">
    <div class="form-group">
        <label for="email"><em>Enter Your Registered Email Id</em></label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email" required>
    </div>
    <div class="button-group" style="margin-top: 10px;"> <!-- Enclosing div for horizontal alignment -->
        <button type="submit" style="width: 100%;background-color: #f93; border: #f93;" class="btn btn-secondary ">Reset Password</button>
    </div>
    <br>
    <!-- <center>
        <a href="login.php" style="width: 100%; background-color: #f93; border: #f93;" class="btn btn-secondary btn-ellipse btn-icon-right">
            Back to Login<i class="w-icon-long-arrow-right"></i>
        </a>
    </center> -->
</form>

                            </div>
                            <div class="col-lg-3 ">
                            </div>
                        </div>
                    </section>
                    <?php
                    @include('footer.php');
                    ?>
</body>
</html>
