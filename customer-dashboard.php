<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | User</title>
  <link href="assets/images/favicon/favicon.png" rel="icon" />
  <link rel="shortcut icon" href="images/logo.png" />
  <link rel="stylesheet" href="./styles.css" />
  <!--==Font-Awesome-for-icons=====-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

  <!-- help taken form internet regarding defer  -->

  <script defer src="./script.js"></script>
</head>

<body>

  <?php
  session_start();

  // Check if the user is not logged in
  if (!isset($_SESSION['id'])) {
    header("Location: customer-login.php");
    exit();
  }

  // Database connection information (same as login.php)
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

  // Retrieve user data based on email from the session
  $id = $_SESSION['id'];
  $sql = "SELECT * FROM customer WHERE id = '$id'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $email = $row['email'];
    // Handle logout
    if (isset($_POST['logout'])) {
      // Unset all session variables
      session_unset();

      // Destroy the session
      session_destroy();

      // Redirect to login page
      header("Location: customer-login.php");
      exit();
    }
  } else {
    echo "User data not found.";
  }

  // Close the database connection
  $conn->close();
  ?>


  <section class="dashboard">
    <div class="sidebar">
      <div class="logo">
        <img src="./images/logo-removebg-preview.png" alt="" />
      </div>
      <ul>
        <li><a href="" class="active">Dashboard</a></li>
        <li>
          <a href="#death-certificate">Death Registration</a>
        </li>
        <li><a href="#birth-certificate">Birth Registration</a></li>
        <li><a href="#check-status">Check Status</a></li>
        <li><a href="#book-appointment">Book Appointment</a></li>
        <li><a href="#appointment-status">Appointment Status</a></li>
      </ul>
    </div>
    <div class="content">
      <div class="profile">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <button type="submit" name="logout">Logout</button>
        </form>
      </div>

      <div id="dashboard-home" class="dashboard-content active center">
        <h1>Welcome
          <?php echo $name; ?> !
        </h1>
        <div class="mission">
          <h5>Recognize the Significance of live events</h5>
          <p> Welcome to our E-Certificates, where we simplify record-keeping for you.
            Easily manage and secure your vital records with our user-friendly
            digital solution.</p>

          <p>Our mission is to bring government services closer to you. With our new website, you can:</p>
          <ul>
            <li>1. Easily register births and deaths online.</li>
            <li>2. Receive timely updates and notifications.</li>
            <li>3. Access and update your vital information with ease.</li>
            <li>4. Explore the cost and charges for issuing and obtaining certificates.</li>
          </ul>

          <p>Join us on this journey towards a more connected and accessible registry service. Your vital records
            matter, and we're here to make managing them a breeze.</p>
        </div>




      </div>

      <!-- ********************** Death Certificate ***************************** -->
      <div id="death-certificate-form" class="dashboard-content">
        <!-- Death Certificate Form -->
        <h2>Death Certificate Application</h2>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="certificate-form">
          <div class="form-group">
            <input type="text" id="fname" name="fname" required placeholder="First Name" />
          </div>
          <div class="form-group">
            <input type="text" id="lname" name="lname" required placeholder="Last Name" />
          </div>
          <div class="form-group">
            <input type="text" id="deathplace" name="deathplace" required placeholder="Place of Death" />
          </div>
          <div class="form-group">
            <input type="date" id="dod" dod name="dod" required placeholder="Date of Death" />
          </div>
          <div class="form-group">
            <input type="text" id="fathername" name="fathername" required placeholder="Father Name" />
          </div>
          <div class="form-group">
            <input type="text" id="mothername" name="mothername" required placeholder="Mother Name" />
          </div>
          <div class="form-group">
            <input type="number" id="phonenumber" name="phone" required placeholder="Phone Number" />
          </div>
          <div class="form-group">
            <!-- <label for="gender">Gender:</label> -->
            <select id="gender" name="gender" required>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="address-area">
            <textarea id="address" name="address" rows="8" cols="50">Enter Address </textarea>
          </div>
          <button class="apply-btn" name="death-form" type="submit">Apply</button>
        </form>
      </div>

      <?php

      if (isset($_POST['death-form'])) {
        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Database connection information
          $servername = "localhost"; // Replace with your database server name
          $username = "root"; // Replace with your database username
          $password = ""; // Replace with your database password
          $dbname = "maindb";

          // Create a database connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }


          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $deathplace = $_POST['deathplace'];
          $dod = $_POST['dod'];
          $fathername = $_POST['fathername'];
          $mothername = $_POST['mothername'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $gender = $_POST['gender'];

          $type = 'Death Certificate';
          $cStatus = 'Pending';

          $sql1 = "INSERT INTO deathcertificates (fname, lname, deathplace, dod, fathername, mothername, phone, address, gender, type, u_id, cStatus) VALUES ('$fname', '$lname', '$deathplace', '$dod', '$fathername', '$mothername', '$phone', '$address', '$gender','$type' ,  '$id', '$cStatus')";


          if ($conn->query($sql1) === TRUE) {
            echo '<script> alert("Certificate Created Sucessfully!")</script>';
          } else {
            $error_message = "Error: " . $sql1 . "<br>" . $conn->error;
            echo "<script>alert('$error_message');</script>";
          }
        }
      }
      ?>

      <!-- ********************** Birth Certificate ***************************** -->


      <div id="birth-certificate-form" class="dashboard-content">
        <!-- Birth Certificate Form -->
        <h2>Birth Certificate Application</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="certificate-form">
          <div class="form-group">
            <input type="text" id="fname" name="fname" required placeholder="First Name" />
          </div>
          <div class="form-group">
            <input type="text" id="lname" name="lname" required placeholder="Last Name" />
          </div>
          <div class="form-group">
            <input type="text" id="birthplace" name="birthplace" required placeholder="Place of Birth" />
          </div>
          <div class="form-group">
            <input type="date" id="dob" name="dob" required placeholder="Date of Birth" />
          </div>
          <div class="form-group">
            <input type="text" id="fathername" name="fathername" required placeholder="Father Name" />
          </div>
          <div class="form-group">
            <input type="text" id="mothername" name="mothername" required placeholder="Mother Name" />
          </div>
          <div class="form-group">
            <input type="number" id="phonenumber" name="phone" required placeholder="Phone Number" />
          </div>
          <div class="form-group">
            <!-- <label for="gender">Gender:</label> -->
            <select id="gender" name="gender" required>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="address-area">
            <textarea id="address" name="address" rows="8" cols="50">
                Enter Address
              </textarea>
          </div>
          <button class="apply-btn" name="birth-form" type="submit">Apply</button>
        </form>
      </div>

      <?php

      if (isset($_POST['birth-form'])) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Database connection information
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "maindb";


          $conn = new mysqli($servername, $username, $password, $dbname);


          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }


          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $birthplace = $_POST['birthplace'];
          $dob = $_POST['dob'];
          $fathername = $_POST['fathername'];
          $mothername = $_POST['mothername'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $gender = $_POST['gender'];

          $type = 'Birth Certificate';
          $cStatus = 'Pending';

          $sql2 = "INSERT INTO birthcertificates (fname, lname, birthplace, dob, fathername, mothername, phone, address, gender, type, u_id, cStatus) VALUES ('$fname', '$lname', '$birthplace', '$dob', '$fathername', '$mothername', '$phone', '$address', '$gender','$type' ,  '$id', '$cStatus')";


          if ($conn->query($sql2) === TRUE) {
            echo '<script> alert("Certificate Created Sucessfully!")</script>';
          } else {
            $error_message = "Error: " . $sql2 . "<br>" . $conn->error;
            echo "<script>alert('$error_message');</script>";
          }
        }
      }
      ?>


      <!-- ********************** Check Certificates ***************************** -->
      <div id="check-status" class="dashboard-content">
        <!-- Check Status -->
        <h2>Check Status</h2>
        <table>
          <thead>
            <tr>
              <th>Certificate ID</th>
              <th>Certificate Type</th>
              <th>Person Name</th>
              <th>Application Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

            if (isset($_SESSION['id'])) {


              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "maindb";


              $conn = new mysqli($servername, $username, $password, $dbname);


              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              $id = $_SESSION['id'];
              $sql3 = "SELECT * FROM deathcertificates WHERE u_id = '$id'";
              $result3 = $conn->query($sql3);

              $sql4 = "SELECT * FROM birthcertificates WHERE u_id = '$id'";
              $result4 = $conn->query($sql4);

              $act = $_SERVER['PHP_SELF'];

              while ($row = $result3->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['d_id'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
                echo "<td>" . $row['cStatus'] . "</td>";
                echo "<td class='action-buttons'>";
                if ($row['cStatus'] == 'Approved') {
                  echo 'No Action Available';
                } else {
                  echo " <form method='POST' action='/web/modify-deathC.php?d_id=" . $row['d_id'] . "' >
                              <input type='hidden' name='d_id' value='" . $row['d_id'] . "'>
                              <button id='green-btn' class='modify'  name='modify'>Modify</button>
                          </form>
                          <form method='POST' action='/web/customer-dashboard.php'>
                              <input type='hidden' name='d_id' value='" . $row['d_id'] . "'>
                              <button type='submit' name='cancel' id='red-btn'>Cancel</button>
                          </form>";
                }
                echo "</td>";

                echo "</tr>";
              }


              while ($row = $result4->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['b_id'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
                echo "<td>" . $row['cStatus'] . "</td>";
                echo "<td class='action-buttons'>";

                if ($row['cStatus'] == 'Approved') {
                  echo 'No Action Available';
                } else {
                  echo "<form method='POST' action='/web/modify-birth.php?d_id=" . $row['b_id'] . "' >
                          <input type='hidden' name='b_id' value='" . $row['b_id'] . "'>
                          <button id='green-btn' class='modify'  name='modify'>Modify</button>
                          </form>";

                  echo "<form method='POST' action='/web/customer-dashboard.php'>
                          <input type='hidden' name='b_id' value='" . $row['b_id'] . "'>
                          <button type='submit' name='cancel2' id='red-btn'>Cancel</button>
                          </form>";
                }

                echo "</td>";
                echo "</tr>";
              }

              if (isset($_POST['cancel'])) {

                $n_id = $_POST['d_id'];

                $delSql1 = "DELETE FROM deathcertificates WHERE d_id = $n_id";
                if ($conn->query($delSql1)) {
                  echo '<script>alert("Sucessfully removed!.");</script>';
                }
              }



              if (isset($_POST['cancel2'])) {

                $n_id2 = $_POST['b_id'];

                $delSql = "DELETE FROM birthcertificates WHERE b_id = $n_id2";


                if ($conn->query($delSql)) {
                  echo '<script>alert("Sucessfully removed!.");</script>';
                }
              }



              $conn->close();
            }
            ?>


          </tbody>
        </table>
      </div>
      <!-- ********************** Book Appointmnet ***************************** -->
      <div id="book-appointment" class="dashboard-content">
        <h2>Book Appointment</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="certificate-form">

          <div class="form-group">
            <input type="text" id="name" name="name" required placeholder="Enter your Name" />
          </div>

          <div class="form-group">
            <input type="text" id="email" name="email" required placeholder="Enter your Email" />
          </div>

          <div class="form-group">
            <input type="text" id="phone" name="phone" required placeholder="Enter your Phone No." />
          </div>

          <div class="form-group">
            <select class="appoint" name="type">
              <option value="0">
                Choose Registration Type
              </option>
              <option value="Birth Registration">
                Birth Registration
              </option>
              <option value="Death Registration">
                Death Registration
              </option>
            </select>
          </div>

          <div class="form-group">
            <select class="appoint" onchange="ChangeColor()" name="options">
              <option value="0">
                Choose Option
              </option>
              <option value="Re-apply">Re-Apply</option>
              <option value="New">New</option>
            </select>
          </div>

          <div class="form-group">
            <input type="date" id="appointment-date" name="date" required />
          </div>

          <button class="book-appointment-btn" name="book" type="submit">
            Book Appointment
          </button>
        </form>

        <?php

        if (isset($_POST['book'])) {

          if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "maindb";


            $conn = new mysqli($servername, $username, $password, $dbname);


            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }


            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $type = $_POST['type'];
            $options = $_POST['options'];
            $date = $_POST['date'];

            $aStatus = 'Pending';

            // $sql5 = "INSERT INTO appointments (date, aStatus, u_id) VALUES ('$date', '$aStatus', '$id')";
            $sql5 = "INSERT INTO appointments (name, email, phone, type, options, date, aStatus, u_id) VALUES ('$name', '$email', '$phone', '$type', '$options', '$date', '$aStatus', '$id')";



            if ($conn->query($sql5) === TRUE) {
              echo '<script> alert("Appointment Booked Sucessfully!")</script>';
            } else {
              $error_message = "Error: " . $sql5 . "<br>" . $conn->error;
              echo "<script>alert('$error_message');</script>";
            }
          }
        }
        ?>
      </div>

      <div id="appointment-status" class="dashboard-content">
        <h2>Appointment Status</h2>
        <table>
          <thead>
            <tr>
              <th>Appointment ID</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Check In</th>
              <th>Application Status</th>
            </tr>
          </thead>
          <tbody>
            <?php

            if (isset($_SESSION['id'])) {


              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "maindb";


              $conn = new mysqli($servername, $username, $password, $dbname);

              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }


              $id = $_SESSION['id'];
              $sql6 = "SELECT * FROM appointments WHERE u_id = '$id'";
              $result6 = $conn->query($sql6);

              while ($row = $result6->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['aStatus'] . "</td>";
                echo "</tr>";
              }

              $conn->close();
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </section>


</body>

</html>