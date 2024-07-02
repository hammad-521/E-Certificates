<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin | Signup</title>

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
      <h2>Admin SignUp</h2>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="auth" onsubmit="return validateForm()">
        <div class="input-box">
          <input type="text" name="name" placeholder="Enter your name" required />
        </div>
        <div class="input-box">
          <input type="text" name="email" placeholder="Enter your email" required />
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Create password" required />
        </div>
        <div class="input-box">
          <input type="password" name="confirm_password" placeholder="Confirm password" required />
        </div>
        <div class="policy">
          <input type="checkbox" />
          <h3>I accept all terms & condition</h3>
        </div>
        <div class="input-box button">
          <input type="Submit" value="Register" />
        </div>
        <div class="text">
          <h3>
            Already have an account?
            <a href="./admin-login.php">Login now</a>
          </h3>
        </div>
      </form>
    </div>
  </section>

  <script>
    function validateForm() {
      // Get the input fields.
      const nameInput = document.getElementById('name');
      const emailInput = document.getElementById('email');
      const passwordInput = document.getElementById('password');
      const confirmPasswordInput = document.getElementById('confirm_password');

      // Check if any field is empty.
      if (nameInput.value === '' || emailInput.value === '' || passwordInput.value === '' || confirmPasswordInput.value === '') {
        alert('Please fill in all fields.');
        return false;
      }

      // Return true if all fields are valid.
      return true;
    }
  </script>



  <?php
  // Check if the form has been submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Retrieve user input from the registration form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    $select = "SELECT * FROM admin WHERE email= '$email' ";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
      echo '<script>alert("Email Already Registered. Try New One.");</script>';
    } else {
      if ($password != $confirm_password) {

        echo '<script>alert("Passwords do not match. Please try again.");</script>';
      } else {

        // SQL query to insert data into the "customer" table
        $sql = "INSERT INTO admin (name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
          echo '<script>alert("Registered Sucessfully!")</script>';
        } else {
          $error_message = "Error: " . $sql . "<br>" . $conn->error;
          echo "<script>alert('$error_message');</script>";
        }
      }
    }
    // Close the database connection
    $conn->close();
  }
  ?>

</body>

</html>