<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | User</title>
    <link rel="stylesheet" href="./styles.css" />

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
    $b_id = $_POST['b_id'];
    $fname = "";
    $lname = "";
    $birthplace = "";
    $dob = "";
    $fathername = "";
    $mothername = "";
    $phone = "";
    $gender = "male"; // Default gender
    $address = "";


    if (isset($_POST['modify'])) {

        $b_id = $_POST['b_id'];

        $sqlF = "SELECT * FROM birthcertificates WHERE b_id=$b_id";

        $resultF = $conn->query($sqlF);
        $row = $resultF->fetch_assoc();

        $fname = $row['fname'];
        $lname = $row['lname'];
        $birthplace = $row['birthplace'];
        $dob = $row['dob'];
        $fathername = $row['fathername'];
        $mothername = $row['mothername'];
        $phone = $row['phone'];
        $gender = $row['gender'];
        $address = $row['address'];
    }


    // Close the database connection
    $conn->close();
    ?>


    <section class="dashboard">
        <div class="sidebar">
            <div class="logo">
                <a href="./customer-dashboard.php"> <img src="./images/logo-removebg-preview.png" alt="" /></a>

            </div>
            <ul>
                <li><a href="./customer-dashboard.php">Dashboard</a></li>
                <li>
                    <a href="#birth-certificate" class="active">birth Registration</a>
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

            <!-- ********************** birth Certificate ***************************** -->
            <div id="birth-certificate-form" class="dashboard-content active">
                <!-- birth Certificate Form -->
                <h2>birth Certificate Application</h2>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="certificate-form">
                    <input type='hidden' name='b_id' value='<?php echo $b_id; ?>'>

                    <div class="form-group">
                        <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" required placeholder="First Name" />
                    </div>
                    <div class="form-group">
                        <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>" required placeholder="Last Name" />
                    </div>
                    <div class="form-group">
                        <input type="text" id="birthplace" name="birthplace" value="<?php echo $birthplace; ?>" required placeholder="Place of birth" />
                    </div>
                    <div class="form-group">
                        <input type="date" id="dob" dob name="dob" required value="<?php echo $dob; ?>" placeholder="Date of birth" />
                    </div>
                    <div class="form-group">
                        <input type="text" id="fathername" name="fathername" value="<?php echo $fathername; ?>" required placeholder="Father Name" />
                    </div>
                    <div class="form-group">
                        <input type="text" id="mothername" name="mothername" value="<?php echo $mothername; ?>" required placeholder="Mother Name" />
                    </div>
                    <div class="form-group">
                        <input type="number" id="phonenumber" name="phone" value="<?php echo $phone; ?>" required placeholder="Phone Number" />
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" required>
                            <option value="male" <?php if ($gender === 'male') echo 'selected'; ?>>Male</option>
                            <option value="female" <?php if ($gender === 'female') echo 'selected'; ?>>Female</option>
                            <option value="other" <?php if ($gender === 'other') echo 'selected'; ?>>Other</option>
                        </select>
                    </div>
                    <div class="address-area">
                        <textarea id="address" name="address" rows="8" cols="50"><?php echo $address; ?></textarea>
                    </div>

                    <button class="apply-btn" name="update-form" type="submit">Apply</button>
                </form>
            </div>

            <?php

            if (isset($_POST['update-form'])) {
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
                    $birthplace = $_POST['birthplace'];
                    $dob = $_POST['dob'];
                    $fathername = $_POST['fathername'];
                    $mothername = $_POST['mothername'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $gender = $_POST['gender'];

                    $type = 'birth Certificate';
                    $cStatus = 'Pending';

                    $sql1 = "UPDATE birthcertificates SET fname=?, lname=?, birthplace=?, dob=?, fathername=?, mothername=?, phone=?, gender=?, address=? WHERE b_id=?";

                    if ($stmt = $conn->prepare($sql1)) {
                        // Bind the parameters with appropriate data types
                        $stmt->bind_param("sssssssssi", $fname, $lname, $birthplace, $dob, $fathername, $mothername, $phone, $gender, $address, $b_id);

                        // Execute the statement
                        if ($stmt->execute()) {
                            echo '<script> alert("Certificate Updated Successfully!")</script>';
                        } else {
                            $error_message = "Error: " . $stmt->error;
                            echo "<script>alert('$error_message');</script>";
                        }

                        // Close the prepared statement
                        $stmt->close();
                    } else {
                        echo "Error creating prepared statement: " . $conn->error;
                    }
                    header("Location: customer-dashboard.php");
                    exit();
                }
            }
            ?>

        </div>
    </section>
</body>

</html>