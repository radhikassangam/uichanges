<?php
session_start();
include('includes/db.php'); // Ensure the database connection is included

if (isset($_GET['token']) && isset($_GET['email'])) {
    $token = $_GET['token'];
    $email = $_GET['email'];

    // Validate the token
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email); // "s" means the parameter is a string

    // Execute the statement
    $stmt->execute();

    // Get the result of the query
    $result = $stmt->get_result();

    // Fetch the user data
    $resetRequest = $result->fetch_assoc();

    if ($resetRequest) {
        // Handle the form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['password'];
            $passwordConfirm = $_POST['password_confirm'];

            if ($password === $passwordConfirm) {
                // Update the password in the users table
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
                $stmt->bind_param("ss", $hashedPassword, $email); // Bind the password and email
                $stmt->execute();

               

                // Redirect to login page or show success message
                $_SESSION['message'] = "Your password has been reset!";
                header("Location: login.php");
                exit;
            } else {
                $_SESSION['error_message'] = "Passwords do not match!";
            }
        }
    } else {
        $_SESSION['error_message'] = "Invalid or expired token.";
    }
} else {
    $_SESSION['error_message'] = "No token or email provided.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/middle.css">
    <link rel="stylesheet" href="assets/css/top.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/bottom.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
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

  <!-- Error Message -->
  <?php
  if (isset($_SESSION['error_message'])) {
      echo "<p style='color: red;'>".$_SESSION['error_message']."</p>";
      unset($_SESSION['error_message']); // Clear the error after showing it
  }
  ?>

  <!-- Success Message -->
  <?php
  if (isset($_SESSION['message'])) {
      echo "<p style='color: green;'>".$_SESSION['message']."</p>";
      unset($_SESSION['message']); // Clear the message after showing it
  }
  ?>

  <div class="headerhead">
    <h1 style="text-align:center;">Reset Your Password</h1>
  </div>

  <section class="contact-section rpform">
      <div class="row gutter-lg pb-3">
          <div class="col-lg-3 "></div>
          <div class="col-lg-6 mb-8">
              <h3 class="rptitle">Enter New Password</h3>
              <form class="form reset-password-form" action="reset_password.php?token=<?php echo $token; ?>&email=<?php echo urlencode($resetRequest['email']); ?>" method="post">
                  <div class="form-group">
                      <label for="password"><em>New Password</em></label>
                      <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your New Password" required>
                  </div>
                  <div class="form-group">
                      <label for="password_confirm"><em>Confirm New Password</em></label>
                      <input type="password" id="password_confirm" name="password_confirm" class="form-control" placeholder="Confirm Your New Password" required>
                  </div>
                  <div class="button-group" style="margin-top: 10px;">
                      <button type="submit" style="width: 100%; background-color: #f93; border: #f93;" class="btn btn-secondary">Reset Password</button>
                  </div>
              </form>
          </div>
          <div class="col-lg-3 "></div>
      </div>
  </section>

  <?php @include('footer.php'); ?>

</body>
</html>
