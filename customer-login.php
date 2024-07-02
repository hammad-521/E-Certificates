<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Customer | Login</title>
  <link rel="stylesheet" href="./styles.css" />
</head>

<body>
  <header>
    <div class="container">
      <a href="./index.php" class="logo">
        <img src="./images/logo.png" alt="Company LOGO" />
      </a>
    </div>
  </header>

  <section class="container auth-container">
    <div class="wrapper">
      <h2>Customer Login</h2>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="auth" method="POST" onsubmit="return validateForm()">
        <div class="input-box">
          <input type="email" name="email" placeholder="Email" required />
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required />
        </div>

        <div class="input-box button">
          <input type="Submit" value="Login" />
        </div>
        <div class="text">
          <h3>
            Don't have an account?
            <a href="./customer-signup.php">SignUp now</a>
          </h3>
        </div>
      </form>
    </div>
  </section>



  <script>
    function validateForm() {
      // Get the email and password input fields.
      const emailInput = document.getElementById('email');
      const passwordInput = document.getElementById('password');

      // Check that both fields are not empty.
      if (emailInput.value === '' || passwordInput.value === '') {
        alert('Please fill in all fields.');
        return false;
      }

      // Check that the email address is in a valid format.
      const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      if (!emailRegex.test(emailInput.value)) {
        alert('Please enter a valid email address.');
        return false;
      }

      // The form is valid, return true.
      return true;
    }
  </script>



  <?php
  session_start();

  // Check if the user is already logged in
  if (isset($_SESSION['id'])) {
    header("Location: customer-dashboard.php");
    exit();
  }

  // Database connection information
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "maindb";

  // Create a database connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Check if the login form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to retrieve user data based on email
    $sql = "SELECT * FROM customer WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      $fetched_password = $row['password'];
      $id = $row['id'];

      // Verify the entered password against the stored database password
      if ($password == $fetched_password) {
        // Password is correct, store id in session and redirect to main page
        $_SESSION['id'] = $id;

        header("Location: customer-dashboard.php");
        exit();
      } else {
        echo '<script>alert("Passwords do not match. Please try again.");</script>';
      }
    } else {
      echo '<script>alert("User with this email does not exist.");</script>';
    }
  }
  ?>

</body>

</html>