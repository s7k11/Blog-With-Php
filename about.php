<?php  
session_start(); 
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  unset($_SESSION['ad_username']);
  header("location: about.php");
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
  <!-- Custom styles for this template -->
  <link href="css/about.css" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">TechnoKnowledgeFreaks</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="creations.php">Our Creations</a>
          </li>
          <li class="nav-item">
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
        <h1 class="mt-4 mb-3">About
          <small>TechnoKnowledgeFreaks</small>
        </h1>
        <!-- Intro Content -->
        <div class="row">
          <div class="col-lg-6">
            <img class="img-fluid rounded mb-4" src="images/About/webdesigning.png" alt="">
          </div>
          <div class="col-lg-6">
            <h2></h2>
            <p>We have a vision to make the latest technologies more intersting to our viewers and help them in all possible ways.This website is the result of combined efforts and thoughts of our team.</p>
            <p>We are looking forward to make this platform a place where future Developers etc. come and make their ideas as fine as possible.</p>
            <p>Check out our Blogging feature.</p>
          </div>
        </div>
        <!-- /.row -->
        <!-- Team Members -->
        <h2>Our Team</h2>
        <div class="row">
          <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
              <img class="card-img-top" src="images/About/alwin.jpg" alt="">
              <div class="card-body">
                <h4 class="card-title">Alwin Ponnan</h4>
                <h6 class="card-subtitle mb-2 text-muted">Full Stack  Developer</h6>
                <!--               <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p> -->
              </div>
              <div class="card-footer">
                <a href="#">info@gmail.com</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
              <img class="card-img-top" src="images/About/Bhaskar.jpg" alt="">
              <div class="card-body">
                <h4 class="card-title">Bhaskar Pandey</h4>
                <h6 class="card-subtitle mb-2 text-muted">Full Stack Developer</h6>
                <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p> -->
              </div>
              <div class="card-footer">
                <a href="#">info@gmail.com</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="card h-100 text-center">
              <img class="card-img-top" src="images/About/joel.jpg" alt="">
              <div class="card-body">
                <h4 class="card-title">Joel Green</h4>
                <h6 class="card-subtitle mb-2 text-muted">Full Stack Developer</h6>
                <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p> -->
              </div>
              <div class="card-footer">
                <a href="#">info@gmail.com</a>
              </div>
            </div>
          </div>
        </div>
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

    </body>

    </html>
