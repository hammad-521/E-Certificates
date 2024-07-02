<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="E-Registry - Birth & Death Registration" />
  <link href="assets/images/favicon/favicon.png" rel="icon" />
  <title>Book Appointment</title>
  <link rel="shortcut icon" href="images/logo.png" />

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" />
  <link rel="stylesheet" href="libraries.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="shortcut icon" href="images/logo.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <!--==Font-Awesome-for-icons=====-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
</head>

<body>
  <nav class="navigation">
    <!--**menu-btn*****-->
    <input type="checkbox" class="menu-btn" id="menu-btn" />
    <label for="menu-btn" class="menu-icon">
      <span class="nav-icon"></span>
    </label>
    <!--**logo*********-->
    <!-- <a href="index.php" class="logo"><span>We</span>Care</a> -->
    <a href="index.php">
      <img alt="" src="images/logo-removebg-preview.png" class="logo" />
    </a>
    <!--**menu*********-->
    <ul class="menu">
      <li><a href="#our-team">Book Appointment</a></li>
      <li><a href="#our-services">Our Services</a></li>
      <li><a href="blogs.php">Our Blogs</a></li>
    </ul>
    <!--**contact*******-->
    <a href="appointments.php" class="nav-appointment-btn">Appointment</a>
    <a href="customer-login.php" class="nav-appointment-btn">Login</a>
    <a href="customer-signup.php" class="nav-appointment-btn">Signup</a>
  </nav>
  <section class="App-Div">
    <h1 class="App-Heading1">Book Your Appointment</h1>
    <p1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores alias
      delectus neque voluptatem? Quos nihil voluptatum in asperiores
      praesentium optio, dolorum soluta vel doloremque a consectetur inventore
      quae possimus tenetur?</p1>
    <a href="#" class="App-Button">Book Appointment</a>
  </section>
  <section class="contact-layout2 pt-0">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="contact-panel d-flex flex-wrap">
            <form class="contact-panel__form" method="post" action="assets/php/contact.php" id="contactForm">
              <div class="row">
                <div class="col-sm-12">
                  <h4 class="contact-panel__title">Book An Appointment</h4>
                  <p class="contact-panel__desc mb-30">
                    Please feel welcome to contact our friendly reception
                    staff with any general or medical enquiry. Our doctors
                    will receive or return any urgent calls.
                  </p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <i class="fa-solid fa-arrow-right"></i>
                    <select class="form-control">
                      <option value="0" class="form-zero">
                        Choose Registration
                      </option>
                      <option class="optval" value="1">
                        Birth Registration
                      </option>
                      <option class="optval" value="2">
                        Death Registration
                      </option>
                    </select>
                  </div>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <i class="fa-solid fa-arrow-right"></i>
                    <select class="form-control" onchange="ChangeColor()">
                      <option class="form-zero" value="0">
                        Choose Option
                      </option>
                      <option class="optval" value="1">Re-Apply</option>
                      <option class="optval" value="2">New</option>
                    </select>
                  </div>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <i class="fa-solid fa-signature"></i>
                    <input type="text" class="form-control" placeholder="Name" id="contact-name" name="contact-name"
                      required />
                  </div>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" class="form-control" placeholder="Email" id="contact-email" name="contact-email"
                      required />
                  </div>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-sm-4 col-md-4 col-lg-4">
                  <div class="form-group">
                    <i class="fa-solid fa-phone"></i>
                    <input type="text" class="form-control" placeholder="Phone" id="contact-Phone" name="contact-phone"
                      required />
                  </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-sm-4 col-md-4 col-lg-4" style="margin-left: 95px">
                  <div class="form-group form-group-date">
                    <input type="date" class="form-control" id="contact-date" name="contact-date" required />
                  </div>
                </div>
                <!-- /.col-lg-4
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group form-group-date">
                      <input
                        type="time"
                        class="form-control"
                        id="contact-time"
                        name="contact-time"
                        required
                      />
                    </div>
                  </div> -->
                <!-- /.col-lg-4 -->
                <div class="column-12">
                  <button type="submit" class="Appointment-button">
                    <span>Book Appointment</span>
                    <i class="fa-solid fa-arrow-right"></i>
                  </button>
                </div>
                <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
            </form>
            <div
              class="contact-panel__info d-flex flex-column justify-content-between bg-overlay bg-overlay-primary-gradient">
              <div>
                <h4 class="contact-panel__title color-white">
                  Quick Contacts
                </h4>
                <p class="contact-panel__desc font-weight-bold color-white mb-30">
                  Please feel free to contact our friendly staff with any
                  medical enquiry.
                </p>
              </div>
              <div>
                <ul class="contact__list list-unstyled mb-30">
                  <li>
                    <i class="fa-solid fa-phone"></i>
                    <a href="#">Emergency Line: +92308187779</a>
                  </li>
                  <li>
                    <i class="fa-solid fa-location-dot"></i><a href="#">Location: Bahria University, Islamabad</a>
                  </li>
                  <li>
                    <i class="fa-solid fa-clock"></i><a href="#">Mon - Fri: 8:00 am - 7:00 pm</a>
                  </li>
                </ul>
                <a href="#" class="Contact-us-Button">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-lg-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>
  <!--==Subscribe===========================-->
  <section id="subscribe">
    <h3>Subscribe For New Updates From eRegistry</h3>
    <!--subcribe-box-->
    <form class="subscribe-box">
      <input type="email" placeholder="Example@gmail.com" />
      <button>Subscribe</button>
    </form>
  </section>
  <!--end-->

  <footer>
    <div class="footer-container">
      <!--**comoany-box**-->
      <div class="footer-company-box">
        <!--logo-->
        <a href="#" class="logo"><span>E-Certificates</span></a>
        <!--details-->
        <p>
          Welcome to our E-Certificates, where we simplify record-keeping for you.
          Easily manage and secure your vital records with our user-friendly
          digital solution.
        </p>
        <!--social-box-->
        <div class="footer-social">
          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-twitter"></i></a>
          <a href="#"><i class="fa-brands fa-youtube"></i></a>
        </div>
      </div>
      <!--**link-box***-->
      <div class="footer-link-box">
        <strong>Main Link's</strong>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Portfolio</a></li>
        </ul>
      </div>
      <!--**link-box***-->
      <div class="footer-link-box">
        <strong>External Link's</strong>
        <ul>
          <li><a href="#">Our Product's</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Disclaimer</a></li>
          <li><a href="#">Term's and Condition's</a></li>
        </ul>
      </div>
      <!--**link-box***-->
      <div class="footer-link-box">
        <strong>External Link's</strong>
        <ul>
          <li><a href="#">Our Product's</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Disclaimer</a></li>
          <li><a href="#">Term's and Condition's</a></li>
        </ul>
      </div>
    </div>

    <!--**bottom**********************-->
    <div class="footer-bottom">
      <span class="footer-owner">Made By Muhammad Wasif</span>
      <span class="copyright">&#169; Copyright 2022 - M.Wasif</span>
    </div>
  </footer>
</body>

</html>