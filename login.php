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
    // Sanitize and validate inputs
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    // Validate email and password
    if (empty($email) || empty($password)) {
        $error_message = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Please enter a valid email address.";
    } else {
        // Check if user exists
        $sql = "SELECT id, password FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Error in preparing statement: " . $conn->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $hashed_password);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['email'] = $email;
                header("Location: index.php"); // Redirect to dashboard
                exit;
            } else {
                $error_message = "Incorrect password.";
            }
        } else {
            $error_message = "No user found with that email.";
        }
        $stmt->close();
    }
}

$conn->close();
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
       /* Apply box-sizing globally */
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
    .log{
        margin:30px;
    }
  
    .button-group {
        display: flex; /* Arrange buttons horizontally */
        justify-content: space-between; /* Evenly distribute space between buttons */
        gap: 10px; /* Add spacing between buttons */
    }

    .btnform {
        width:20px;
        flex: 1; /* Make each button take up equal width */
        text-align: center; /* Center the button text */
        padding: 10px; /* Adjust padding for touch-friendly buttons */
        margin: 0; /* Remove unnecessary margins */
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
    .log{
        margin:30px;
    }
   
    .button-group {
        display: flex; /* Arrange buttons horizontally */
        justify-content: space-evenly; /* Distribute buttons evenly on very small screens */
        gap: 5px; /* Reduce gap for smaller screens */
    }
    .btnform1{
       
    }
    .btnform {
        flex: 1; /* Ensure buttons remain of equal width */
        font-size: 14px; /* Adjust font size for small screens */
        padding: 8px; /* Adjust padding for compact layout */
    }
    .loginform{
        margin:10px;
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
    <h1 style="text-align:center;">Login Your Account</h1>
  </div>

  <!-- Breadcrumb Navigation -->
  <nav class="breadcrumb-nav mb-10 pb-1">
    <div class="containerbread">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li><span style="font-size:18px;color: black rgb(64, 63, 63);">> &nbsp</span>
        <li>Login </li>
      </ul>
    </div>
  </nav>
  <!-- End of Breadcrumb -->

    <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>


    <section class="contact-section loginform">
                        <div class="row gutter-lg pb-3">
                            <div class="col-lg-3 ">
                            </div>
                            <div class="col-lg-6 mb-8">
                              <h3 class="log">Login</h3>
                                <form class="form contact-us-form" action="login.php" method="post">
                                    <div class="form-group">
                                        <label for="username">Your Phone Number or Email Address</label>
                                        <input type="text" id="usernumber" name="email" class="form-control" placeholder="Enter Your Phone Number" required>
                                                                            </div>
                                    <div class="form-group">
                                        <label for="email_1">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password" required>
                                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" style=" float: right; margin-left: -25px; margin-top: -33px; position: relative; z-index: 2; font-size:30px; width:50px"></span>
                                                                            </div>
                                    <div class="button-group" > <!-- Enclosing div for horizontal alignment -->
                                        <button type="submit" style="background-color: #f93; border: #f93;"  data-inline="true"  class="btn btn-secondary btn-ellipse1 btn-icon-right btnform btnform1">Login Now</button>
                                        <a href="resetPassword.php"style="  background-color: #f93; border: #f93;"  data-inline="true"  class="btn btn-secondary btn-ellipse1 btn-icon-right btnform">Forgot Password</a>
                                    </div>
                                    <br>
                                    <center><a href="register.php"style="  width:95%;  background-color: #f93; border: #f93;" class="btn btn-secondary btn-ellipse btn-icon-right">Not yet registered? Register here !!<i class="w-icon-long-arrow-right"></i> </a></center>
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
