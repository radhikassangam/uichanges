<?php
session_start();

// Include the database connection file
if (file_exists('includes/db.php')) {
    include('includes/db.php');
} else {
    die("Database connection file not found.");
}

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Registration functionality
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate inputs
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $username = trim($_POST['username']); // Fixed variable name
    $phone = trim($_POST['phone']);
    $gender = $_POST['gender'];

    // Validate inputs
    if (empty($email) || empty($password) || empty($confirm_password) || empty($username) || empty($gender)) {
        $error_message = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Please enter a valid email address.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        // Check if email already exists
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Error in preparing statement: " . $conn->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error_message = "This email is already registered.";
        } else {
            // Hash the password before storing
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user into the database
            $sql = "INSERT INTO users (email, password, name, gender, phone) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("Error in preparing statement: " . $conn->error);
            }
            // Correct bind_param usage with type definition
            $stmt->bind_param("sssss", $email, $hashed_password, $username, $gender, $phone);
            if ($stmt->execute()) {
                $success_message = "Registration successful! You can now <a href='login.php'>login</a>.";
            } else {
                $error_message = "There was an error registering your account. Please try again.";
            }
            $stmt->close();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/middle.css">
    <link rel="stylesheet" href="assets/css/top.css">
    <link rel="stylesheet" href="assets/css/bottom.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        *,
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
   .regtitle{
    margin:30px
   }
   .formreg{
    margin:30px
   }
   .toggle-password{
  margin-top:45px !important;
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
    .regtitle{
    margin:30px
   }
  .formreg{
    margin:30px
   }
 .toggle-password{
  margin-top:-25px !important;
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
    <h1 style="text-align:center;">Register With Us</h1>
  </div>

  <!-- Breadcrumb Navigation -->
  <nav class="breadcrumb-nav mb-10 pb-1">
    <div class="containerbread">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li><span style="font-size:18px;color: black rgb(64, 63, 63);">> &nbsp</span>
        <li>Register </li>
      </ul>
    </div>
  </nav>
  <!-- End of Breadcrumb -->

  <?php
  if (isset($error_message)) {
      echo "<p style='color: red;'>$error_message</p>";
  }

  if (isset($success_message)) {
      echo "<p style='color: green;'>$success_message</p>";
  }
  ?>

  <section class="contact-section formreg">
    <div class="row gutter-lg pb-3">
      <div class="col-lg-3"></div>
      <div class="col-lg-6 mb-8">
        <h4 class="regtitle title mb-3" >Register With Us</h4>
        <form class="form contact-us-form" action="register.php" method="POST">
          <div class="form-group">
            <label for="username">Your Name</label>
            <input type="text" id="username" name="username" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Gender</label><br>
            <input type="radio" id="male" name="gender" value="Male" required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
            <input type="radio" id="others" name="gender" value="Others">
            <label for="others">Others</label>
          </div>
          <div class="form-group">
            <label for="email_1">Your Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="number">Your Phone Number</label>
            <input type="number" id="phone" name="phone" class="form-control"    minlength="10" 
           maxlength="10" 
           pattern="[0-9]{10}" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" style=" float: right;
                                                                        margin-left: -30px;
                                                                        margin-top: -25px;
                                                                        position: relative;
                                                                        z-index: 2;"></span>
          </div>
          <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
          </div>
          <div class="form-group">
            <!-- <div class="g-recaptcha" data-sitekey="6LdxPDcaAAAAABDWZfLHsL4UWwQDydURfJQ67Eoy"></div> -->
          </div>
          <center><button type="submit" style="  width:100%;  background-color: #f93;" class="button-custom">Register Now</button></center>
        </form>
        <center><a href="login.php"><button class="button-custom" style=" width:100%; margin-top: 5px;    background-color: #f93;">Already Registered? Login Here!</button></a></center>
      </div>
      <div class="col-lg-3"></div>
    </div>
  </section>
  
    <script>
  document.querySelector('.contact-us-form').addEventListener('submit', function (event) {
        // Username Validation
        const usernameField = document.querySelector('#username');
        const usernameValue = usernameField.value.trim();
        const usernameRegex = /^[a-zA-Z\s]+$/; // Allows only letters and spaces
        
        if (usernameValue === '' || !usernameRegex.test(usernameValue)) {
            alert('Username must not be empty and should not contain numbers or special characters.');
            usernameField.focus();
            event.preventDefault();
            return;
        }

        // Gender Validation
        const genderSelected = document.querySelector('input[name="gender"]:checked');
        if (!genderSelected) {
            alert('Please select your gender.');
            event.preventDefault();
            return;
        }

        // Phone Number Validation
        const phoneField = document.querySelector('#phone');
        const phoneValue = phoneField.value.trim();
        const phoneRegex = /^[0-9]{10}$/; // Exactly 10 digits

        if (!phoneRegex.test(phoneValue)) {
            alert('Phone number must be exactly 10 digits and contain only numbers.');
            phoneField.focus();
            event.preventDefault();
            return;
        }

        // Email Validation
        const emailField = document.querySelector('#email');
        const emailValue = emailField.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email regex

        if (!emailRegex.test(emailValue)) {
            alert('Please enter a valid email address.');
            emailField.focus();
            event.preventDefault();
            return;
        }

        // Password and Confirm Password Validation
        const passwordField = document.querySelector('#password');
        const confirmPasswordField = document.querySelector('#confirm_password');
        const passwordValue = passwordField.value.trim();
        const confirmPasswordValue = confirmPasswordField.value.trim();

        if (passwordValue === '' || confirmPasswordValue === '') {
            alert('Password fields cannot be empty.');
            passwordField.focus();
            event.preventDefault();
            return;
        }

        if (passwordValue !== confirmPasswordValue) {
            alert('Passwords do not match.');
            confirmPasswordField.focus();
            event.preventDefault();
            return;
        }
    });
</script>

</body>
</html>
