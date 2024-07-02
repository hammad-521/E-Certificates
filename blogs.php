<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="E-Registry" />
  <link href="assets/images/favicon/favicon.png" rel="icon" />
  <title>Blogs</title>
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
      <li><a href="appointments.php">Book Appointment</a></li>
      <li><a href="#our-services">Our Services</a></li>
      <li><a href="blogs.php">Our Blogs</a></li>
    </ul>
    <!--**contact*******-->
    <a href="appointments.php" class="nav-appointment-btn">Appointment</a>
    <a href="customer-login.php" class="nav-appointment-btn">Login</a>
    <a href="customer-signup.php" class="nav-appointment-btn">Signup</a>
  </nav>
  <section class="blog-grid">
    <div class="container">
      <div class="row">
        <!-- Post Item #1 -->
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="post-item">
            <div class="post__img">
              <a href="blog-single-post.php">
                <img src="images/a3.jpg" alt="post image" loading="lazy" />
              </a>
            </div>
            <!-- /.post__img -->
            <div class="post__body">
              <div class="post__meta-cat">
                <a href="#">Politics</a>
              </div>
              <!-- /.blog-meta-cat -->
              <div class="post__meta d-flex">
                <span class="post__meta-date">Nov 30, 2023</span>
                <a class="post__meta-author" href="#">Salman Hassan</a>
              </div>
              <h4 class="post__title">
                <a href="#"></a>
                Pakistan passport issuance system shut for 2 hours due to
                technical glitch</a>
              </h4>

              <p class="post__desc">
                In a recent development, the Pakistan passport issuance system faced a
                temporary shutdown lasting two hours due to a technical glitch...
              </p>
              <a href="blog-single-post.php" class="btn btn__secondary btn__link btn__rounded">
                <span>Read More</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
            <!-- /.post__body -->
          </div>
          <!-- /.post-item -->
        </div>
        <!-- /.col-lg-4 -->
        <!-- Post Item #2 -->
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="post-item">
            <div class="post__img">
              <a href="blog-single-post.php">
                <img src="/images/a2.jpg" alt="post image" loading="lazy" />
            </div>

            <!-- /.post__img -->
            <div class="post__body">
              <div class="post__meta-cat">
                <a href="#">Immigration</a>
              </div>
              <!-- /.blog-meta-cat -->
              <div class="post__meta d-flex">
                <span class="post__meta-date">December 11, 2023</span>
                <a class="post__meta-author" href="#">Muhammad Hammad</a>
              </div>
              <h4 class="post__title">
                <a href="#">Over 1.67 lakh Afghan immigrants in Pak return home</a>
              </h4>
              <p class="post__desc">
                In a notable development, a substantial number of Afghan immigrants,
                totaling over 1.67 lakh, have chosen to return to their home country
                from Pakistan...
              </p>
              <a href="blog-single-post.php" class="btn btn__secondary btn__link btn__rounded">
                <span>Read More</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
            <!-- /.post__body -->
          </div>
          <!-- /.post-item -->
        </div>
        <!-- /.col-lg-4 -->
        <!-- Post Item #3 -->
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="post-item">
            <div class="post__img">
              <a href="blog-single-post.php">
                <img src="images/a1.jpg" alt="post image" loading="lazy" />
              </a>
            </div>
            <!-- /.post__img -->
            <div class="post__body">
              <div class="post__meta-cat">
                <a href="#">Data Leak</a>
              </div>
              <!-- /.blog-meta-cat -->
              <div class="post__meta d-flex">
                <span class="post__meta-date">Jan 28, 2022</span>
                <a class="post__meta-author" href="#">Muhammad Shajjar</a>
              </div>
              <h4 class="post__title">
                <a href="#">Pakistan: Parliament Accounts Committee orders probe in NADRA data
                  leak
                </a>
              </h4>

              <p class="post__desc">
                Parliament Accounts Committee in Pakistan has taken a decisive
                step by ordering a probe into a significant data leak from NADRA...
              </p>
              <a href="blog-single-post.php" class="btn btn__secondary btn__link btn__rounded">
                <span>Read More</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
            <!-- /.post__body -->
          </div>
          <!-- /.post-item -->
        </div>
        <!-- /.col-lg-4 -->
        <!-- Post Item #4 -->
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="post-item">
            <div class="post__img">
              <a href="blog-single-post.php">
                <img src="images/a4.jpg" alt="post image" loading="lazy" />
              </a>
            </div>
            <!-- /.post__img -->
            <div class="post__body">
              <div class="post__meta-cat">
                <a href="#">Cyber Security</a>
              </div>
              <!-- /.blog-meta-cat -->
              <div class="post__meta d-flex">
                <span class="post__meta-date">Jan 30, 2022</span>
                <a class="post__meta-author" href="#">Mark Ezak</a>
              </div>
              <h4 class="post__title">
                <a href="#">Illegally Issued CNICs & Cyber Security</a>
              </h4>
              <p class="post__desc">
                NADRA is responsible for creating, managing and securing National Identity Database of Pakistan.
                Recently there have been reports and speculations...
              </p>
              <a href="blog-single-post.php" class="btn btn__secondary btn__link btn__rounded">
                <span>Read More</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
            <!-- /.post__body -->
          </div>
          <!-- /.post-item -->
        </div>
        <!-- /.col-lg-4 -->
        <!-- Post Item #5 -->
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="post-item">
            <div class="post__img">
              <a href="blog-single-post.php">
                <img src="images/Transgender.jpg" alt="post image" loading="lazy" />
              </a>
            </div>
            <!-- /.post__img -->
            <div class="post__body">
              <div class="post__meta-cat">
                <a href="#">Transgender</a>
              </div>
              <!-- /.blog-meta-cat -->
              <div class="post__meta d-flex">
                <span class="post__meta-date">Mar 22, 2023</span>
                <a class="post__meta-author" href="#">Talha Arshad</a>
              </div>
              <h4 class="post__title">
                <a href="#">NADRA Launches Registration Campaign for Transgender-persons
                </a>
              </h4>
              <p class="post__desc">
                On the occasion of International Human Rights Day, NADRA takes special measures to reach out the
                transgender persons...
              </p>
              <a href="blog-single-post.php" class="btn btn__secondary btn__link btn__rounded">
                <span>Read More</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
            <!-- /.post__body -->
          </div>
          <!-- /.post-item -->
        </div>
        <!-- /.col-lg-4 -->
        <!-- Post Item #6 -->
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="post-item">
            <div class="post__img">
              <a href="blog-single-post.php">
                <img src="images/somalia.jpg" alt="post image" loading="lazy" />
              </a>
            </div>
            <!-- /.post__img -->
            <div class="post__body">
              <div class="post__meta-cat">
                <a href="#">Immigration</a><a href="#">Disease</a>
              </div>
              <!-- /.blog-meta-cat -->
              <div class="post__meta d-flex">
                <span class="post__meta-date">Feb 07, 2022</span>
                <a class="post__meta-author" href="#">Mustafa Mehmood</a>
              </div>
              <h4 class="post__title">
                <a href="#">Somali National Identification System launched in Pakistan
                </a>
              </h4>
              <p class="post__desc">
                The Prime Minister of Somalia, H.E. Hamza Abdi Barre inaugurated the Somalia National ID on 16th
                September 2023,
              </p>
              <a href="single-blog.php" class="btn btn__secondary btn__link btn__rounded">
                <span>Read More</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
            <!-- /.post__body -->
          </div>
          <!-- /.post-item -->
        </div>
        <!-- /.col-lg-4 -->
      </div>
      <!-- /.row -->
      <!-- /.row -->
      <div class="button-container">
        <a href="#" class="wowbuttons">1</a>
        <a href="#" class="wowbuttons">2</a>
        <a href="#" class="wowbuttons"><i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
    <!-- /.container -->
  </section>
  <!-- /.blog Grid -->

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