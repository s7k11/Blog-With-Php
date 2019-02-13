<?php 
session_start(); 
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  unset($_SESSION['ad_username']);
  header("location: contact.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TechnoKnowledgeFreaks</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/contact.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar  navbar-expand-lg navbar-dark ">
    <div class="container">
      <a class="navbar-brand" href="index.php">TechnoKnowledgeFreaks</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="creations.php">Our Creations</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " href="blog.php">
              Blog
            </a>
          </li>
        </ul>
        <?php if((!isset($_SESSION['username'])) and (!isset($_SESSION['ad_username']))):
        ?>
        <a href="login.php" class="btn " style="color: #FFF">Login</a>
        <?php endIf; ?>
        <?php if(isset($_SESSION['username'])):
          ?>
          <!-- <?=$_SESSION['username'];?> -->
          <a href="index.php?logout='1' " class="btn " style="color: #FFF">Logout</a>
          <?php endIf; ?>
          <?php if(isset($_SESSION['ad_username'])):
            ?>
            <!-- <?=$_SESSION['username'];?> -->
            <a href="index.php?logout='1' " class="btn " style="color: #FFF">Logout(admin)</a>
            <?php endIf; ?>
          </div>
        </div>
      </nav>

      <!-- Page Content -->
      <div class="container">

        <!-- Page Heading-->
        <h1 class="mt-4 mb-3">Contact
          <small>us</small>
        </h1>
        <!-- Content Row -->
        <div class="row">
          <!-- Map Column -->
          <div class="col-lg-8 mb-4">
            <!-- Embedded Google Map -->
            <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3508.0117401555676!2d76.76504731467537!3d28.449062482490596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d6bb18c31279b%3A0x11d335a5bc228dd6!2sSt.+Andrews+Institute+of+Technology+and+Management!5e0!3m2!1sen!2sin!4v1510734079272"></iframe>
          </div>
          <!-- Contact Details Column -->
          <div class="col-lg-4 mb-4">
            <h3>Contact Details</h3>
            <p>
              St.Andrews Institute Of Technology And Management
              <br>Farukhnagar, Gurugram 122506
              <br>
            </p>
            <p>
              <abbr title="Phone">P</abbr>: +91-9998887776
            </p>
            <p>
              <abbr title="Email">E</abbr>:
              <a href="mailto:name@example.com">info@gmail.com
              </a>
            </p>
            <p>
              <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM
            </p>
          </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
          <div class="col-lg-8 mb-4">
            <h3>Send us a Message</h3>
            <form name="sentMessage" id="contactForm" novalidate>
              <div class="control-group form-group">
                <div class="controls">
                  <label>Full Name:</label>
                  <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                  <p class="help-block"></p>
                </div>
              </div>
              <div class="control-group form-group">
                <div class="controls">
                  <label>Phone Number:</label>
                  <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                </div>
              </div>
              <div class="control-group form-group">
                <div class="controls">
                  <label>Email Address:</label>
                  <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                </div>
              </div>
              <div class="control-group form-group">
                <div class="controls">
                  <label>Message:</label>
                  <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                </div>
              </div>
              <div id="success"></div>
              <!-- For success/fail messages -->
              <button type="submit" class="btn" >Send</button>
            </form>
          </div>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.container -->

      <!-- Footer -->
      <footer class="py-4 foot">
        <div class="container">

          <p class="m-0 text-center text-white">Copyright &copy; TechnoKnowledgeFreaks</p>
        </div>
        <!-- /.container -->
      </footer>
      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Contact form JavaScript -->
      <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <script src="js/jqBootstrapValidation.js"></script>
      <script src="js/contact_me.js"></script>

    </body>

    </html>
