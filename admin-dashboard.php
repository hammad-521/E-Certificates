<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['id'])) {
  header("Location: admin-login.php");
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

$id = $_SESSION['id'];
$sql = "SELECT * FROM admin WHERE id = '$id'";
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
    header("Location: admin-login.php");
    exit();
  }
} else {
  echo "User data not found.";
}

function executeQuery($conn, $sql)
{
  return $conn->query($sql);
}


function updateAppointmentStatus($conn, $appointmentId, $status)
{
  $sql = "UPDATE appointments SET aStatus = '$status' WHERE id = $appointmentId";
  return executeQuery($conn, $sql);
}

function updateDeathStatus($conn, $Id, $status)
{
  $sql = "UPDATE deathcertificates SET cStatus = '$status' WHERE d_id = $Id";
  return executeQuery($conn, $sql);
}

function updateBirthStatus($conn, $Id, $status)
{
  $sql = "UPDATE birthcertificates SET cStatus = '$status' WHERE b_id = $Id";
  return executeQuery($conn, $sql);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | Admin</title>
  <link rel="stylesheet" href="./styles.css" />

  <!-- help taken form internet regarding defer  -->

  <script defer src="./script.js"></script>
</head>

<body>
  <section class="dashboard">
    <div class="sidebar">
      <div class="logo">
        <img src="./images/logo-removebg-preview.png" alt="" />
      </div>
      <ul>
        <li><a href="" class="active">Dashboard</a></li>
        <li><a href="#birth-registrations">Birth Registrations</a></li>
        <li><a href="#death-registrations">Death Registrations</a></li>
        <li><a href="#appointments">Appointments</a></li>
        <li><a href="#issued-certificates">Issued Certificates</a></li>
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
          <h5>Empowering the Future of Vital Records</h5>
          <p>We are proud to introduce the new electronic birth and death registration website for the Department of
            Birth and Death Registry. Say goodbye to the old-school Excel workbooks and embrace a streamlined,
            efficient, and user-friendly way to manage vital records.</p>

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
      <div id="birth-registrations" class="dashboard-content">
        <h2>Birth Registrations</h2>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Registration ID</th>
                <th>Register By</th>
                <th>Register For</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Birth Place</th>
                <th>Date Of Birth</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql2 = "SELECT * FROM birthcertificates WHERE cStatus = 'Pending'";
              $result2 = executeQuery($conn, $sql2);
              if ($result2->num_rows === 0) {
                echo "<tr>";
                echo "<td colspan='11' class='center'><h1>No Record Available</h1></td>";
                echo "</tr>";
              } else {
                while ($row = $result2->fetch_assoc()) {
                  $uid = $row['u_id'];
                  $sql3 = "SELECT * FROM customer WHERE id = $uid";
                  $result3 = executeQuery($conn, $sql3);
                  $row3 = $result3->fetch_assoc();

                  echo "<tr>";
                  echo "<td>" . $row['b_id'] . "</td>";
                  echo "<td>" . $row3['name'] . "</td>";
                  echo "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
                  echo "<td>" . $row['fathername'] . "</td>";
                  echo "<td>" . $row['mothername'] . "</td>";
                  echo "<td>" . $row['birthplace'] . "</td>";
                  echo "<td>" . $row['dob'] . "</td>";
                  echo "<td>" . $row['gender'] . "</td>";
                  echo "<td>" . $row3['email'] . "</td>";
                  echo "<td>" . $row['phone'] . "</td>";

                  echo "<td class='action-buttons set'>
                          <form method='POST' action='#'>
                              <input type='hidden' name='Id' value='" . $row['b_id'] . "'>
                              <button id='green-btn' type='submit' name='approveCust'>Approve</button>
                          </form>
                          <form method='POST' action='#'>
                              <input type='hidden' name='Id' value='" . $row['b_id'] . "'>
                              <button type='submit' name='rejectCust' id='red-btn'>Reject</button>
                          </form>
                      </td>";

                  echo "</tr>";
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div id="death-registrations" class="dashboard-content">
        <h2>Death Registrations</h2>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Registration ID</th>
                <th>Register By</th>
                <th>Register For</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Death Place</th>
                <th>Date Of Death</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql4 = "SELECT * FROM deathcertificates WHERE cStatus = 'Pending'";
              $result4 = executeQuery($conn, $sql4);
              if ($result4->num_rows === 0) {
                echo "<tr>";
                echo "<td colspan='11' class='center'><h1>No Record Available</h1></td>";
                echo "</tr>";
              } else {
                while ($row4 = $result4->fetch_assoc()) {
                  $uid4 = $row4['u_id'];
                  $sql5 = "SELECT * FROM customer WHERE id = $uid4";
                  $result5 = executeQuery($conn, $sql5);
                  $row5 = $result5->fetch_assoc();

                  echo "<tr>";
                  echo "<td>" . $row4['d_id'] . "</td>";
                  echo "<td>" . $row5['name'] . "</td>";
                  echo "<td>" . $row4['fname'] . " " . $row4['lname'] . "</td>";
                  echo "<td>" . $row4['fathername'] . "</td>";
                  echo "<td>" . $row4['mothername'] . "</td>";
                  echo "<td>" . $row4['deathplace'] . "</td>";
                  echo "<td>" . $row4['dod'] . "</td>";
                  echo "<td>" . $row4['gender'] . "</td>";
                  echo "<td>" . $row5['email'] . "</td>";
                  echo "<td>" . $row4['phone'] . "</td>";

                  echo "<td class='action-buttons set'>
                <form method='POST' action='#'>
                    <input type='hidden' name='Id' value='" . $row4['d_id'] . "'>
                    <button id='green-btn' type='submit' name='approveDeat'>Approve</button>
                </form>
                <form method='POST' action='#'>
                    <input type='hidden' name='Id' value='" . $row4['d_id'] . "'>
                    <button type='submit' name='rejectDeat' id='red-btn'>Reject</button>
                </form>
            </td>";

                  echo "</tr>";
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>


      <div id="appointments" class="dashboard-content">
        <h2>Appointments</h2>
        <table>
          <thead>
            <tr>
              <th>Appointment ID</th>
              <th>Booked By</th>
              <th>Type</th>
              <th>Check In</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql6 = "SELECT * FROM appointments WHERE aStatus ='Pending'";
            $result6 = executeQuery($conn, $sql6);
            while ($row6 = $result6->fetch_assoc()) {
              $uid6 = $row6['u_id'];
              $sql7 = "SELECT * FROM customer WHERE id = $uid6";
              $result7 = executeQuery($conn, $sql7);
              $row7 = $result7->fetch_assoc();

              echo "<tr>";
              echo "<td>" . $row6['id'] . "</td>";
              echo "<td>" . $row7['name'] . "</td>";
              echo "<td>" . $row6['type'] . "</td>";
              echo "<td>" . $row6['date'] . "</td>";
              echo "<td class='action-buttons set'>
                                <form method='POST' action='#'>
                                    <input type='hidden' name='Id' value='" . $row6['id'] . "'>
                                    <button id='green-btn' type='submit' name='approveApp'>Approve</button>
                                </form>
                                <form method='POST' action='#'>
                                    <input type='hidden' name='Id' value='" . $row6['id'] . "'>
                                    <button type='submit' name='rejectApp' id='red-btn'>Reject</button>
                                </form>
                            </td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>

      <div id="issued-certificates" class="dashboard-content">
        <h2>Issued Certificate</h2>
        <table>
          <thead>
            <tr>
              <th>Certificate ID</th>
              <th>Certificate Type</th>
              <th>Person Name</th>
              <th>Application Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Check if the user is not logged in
            

            // Retrieve user data based on email from the session
            $id = $_SESSION['id'];
            $sql3 = "SELECT * FROM deathcertificates WHERE cStatus = 'Approved'";
            $result3 = $conn->query($sql3);

            $sql4 = "SELECT * FROM birthcertificates WHERE cStatus = 'Approved'";
            $result4 = $conn->query($sql4);

            $act = $_SERVER['PHP_SELF'];
            if ($result4->num_rows === 0 && $result3->num_rows === 0) {
              echo "<tr>";
              echo "<td colspan='4' class='center'><h1>No Record Available</h1></td>";
              echo "</tr>";
            } else {
              while ($row = $result3->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['d_id'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
                echo "<td>" . $row['cStatus'] . "</td>";

                echo "</tr>";
              }

              while ($row = $result4->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['b_id'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
                echo "<td>" . $row['cStatus'] . "</td>";
                echo "</tr>";
              }
            }
            ?>


          </tbody>
        </table>
      </div>
    </div>





  </section>

  <?php

  if (isset($_POST['approveCust'])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $aID = $_POST['Id'];
      if (updateBirthStatus($conn, $aID, 'Approved')) {
        echo '<script> alert("Status Updated Successfully!")</script>';
      } else {
        $error_message = "Error updating status: " . $conn->error;
        echo "<script>alert('$error_message');</script>";
      }
      header("Location: " . $_SERVER['PHP_SELF']);
      exit();
    }
  }

  if (isset($_POST['rejectCust'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $aID = $_POST['Id'];
      if (updateBirthStatus($conn, $aID, 'Rejected')) {
        echo '<script> alert("Status Updated Successfully!")</script>';
      } else {
        $error_message = "Error updating status: " . $conn->error;
        echo "<script>alert('$error_message');</script>";
      }
      header("Location: " . $_SERVER['PHP_SELF']);
      exit();
    }
  }

  // For Death Certificates
  if (isset($_POST['approveDeat'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $aID = $_POST['Id'];
      if (updateDeathStatus($conn, $aID, 'Approved')) {
        echo '<script> alert("Status Updated Successfully!")</script>';
      } else {
        $error_message = "Error updating status: " . $conn->error;
        echo "<script>alert('$error_message');</script>";
      }
      header("Location: " . $_SERVER['PHP_SELF']);
      exit();
    }
  }

  if (isset($_POST['rejectDeat'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $aID = $_POST['Id'];
      if (updateDeathStatus($conn, $aID, 'Rejected')) {
        echo '<script> alert("Status Updated Successfully!")</script>';
      } else {
        $error_message = "Error updating status: " . $conn->error;
        echo "<script>alert('$error_message');</script>";
      }
      header("Location: " . $_SERVER['PHP_SELF']);
      exit();
    }
  }


  // For Appointments 
  

  if (isset($_POST['approveApp'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $aID = $_POST['Id'];
      if (updateAppointmentStatus($conn, $aID, 'Approved')) {
        echo '<script> alert("Status Updated Successfully!")</script>';
      } else {
        $error_message = "Error updating status: " . $conn->error;
        echo "<script>alert('$error_message');</script>";
      }
      header("Location: " . $_SERVER['PHP_SELF']);
      exit();
    }
  }

  if (isset($_POST['rejectApp'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $aID = $_POST['Id'];
      if (updateAppointmentStatus($conn, $aID, 'Rejected')) {
        echo '<script> alert("Status Updated Successfully!")</script>';
      } else {
        $error_message = "Error updating status: " . $conn->error;
        echo "<script>alert('$error_message');</script>";
      }
      header("Location: " . $_SERVER['PHP_SELF']);
      exit();
    }
  }

  $conn->close();
  ?>

</body>

</html>