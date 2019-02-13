<?php 
session_start(); 
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  unset($_SESSION['ad_username']);
  header("location: index.php");
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
  <link href="css/style.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <div class="jumbotron">
    <br>
    <br>
    <nav class="navbar  navbar-expand-lg navbar-dark  " style=" background:none;">
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
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
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
        <div class="container-fluid"><h1>Start Something that matters</h1>
          <h4>Stop wasting your valuable time and money</h4>
        </div>
      </div> 
      <!-- Page Content -->
      <div class="container">

        <h1 class="my-4">Services</h1>

        <!--Icons -->
        <div class="row">
          <div class="col-lg-4 mb-5">
            <div class="card h-100">
              <h4 class="card-header" style="background-color: #636e72">Responsive Design</h4>
              <div class="card-body">
                <img src="images/Homepage/Rdesign.jpg" class="img-responsive">
                <p class="card-text">
                  100 percent responsive website designs with wonderful animations and effects.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="card h-100">
              <h4 class="card-header" style="background-color: #636e72">Maintainence</h4>
              <div class="card-body">
                <img src="images/Homepage/maintainence.png">
                <p class="card-text">
                  All time maintanance service available with 6 months free maintanance.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="card h-100">
              <h4 class="card-header" style="background-color: #636e72" >Support</h4>
              <div class="card-body">
                <img src="images/Homepage/support.jpg">
                <p class="card-text">
                  24x7 Support available from our techinical team
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="jumbotron">
          <h2>Are you tired of creating new events everytime...</h2>
          <h5>So its time to put an end..</h5>
        </div>
        <!-- Our Goal-->
        <div class="jumbotron">
          <h1>Our Goal</h1>
          <h3>Our goal is to enrich people with the skills they always wanted to learn.</h3>
          <h4>We aren't here to loot you but to empower you as a entrepreneur.</h4>
          <h5>"Dreams don't come true but the goals do."</h5>
        </div>
        <div class="jumbotron">
          <h2>Choose the project which suits you the most..</h2>
          <h3>Share your skills with others..</h3>
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
