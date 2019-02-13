<?php 
include('server.php');

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: creations.php");
}
$db = mysqli_connect('localhost', 'root', '', 'tkf');
$query = "SELECT * FROM creation ORDER BY id";
$resultObj = $db->query($query);
$db->close();
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
  <!-- <link href="css/modern-business.css" rel="stylesheet"> -->
  <link href="css/creation.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar  navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">TechoKnowledgeFreaks</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item active">
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

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Our
          <small> Creations</small>
        </h1>
        <div class="row">
          <?php while($row = $resultObj->fetch_assoc()): ?>
            <div class="col-lg-6 col-sm-6 portfolio-item ">
              <div class="card h-100">
                <a href="#"><?php echo "<img src=".$row['file']." class='img-fluid rounded'  alt='image not found' />"?>
                <div class="card-body">

                  <h4 class="card-title text-center">
                    <a href="#"><?=$row['heading']?></a>
                  </h4>
                  <p class="card-text"></p>
                </div>
              </div>
            </div>
            <?php endWhile; ?>
            <button type="button" class="btn btn-primary text-center btn-block" data-toggle="modal" data-target="#exampleModal">
              Input More Creations
            </button>

          </div>
          <form method="post" action="creations.php" enctype="multipart/form-data">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php include('errors.php'); ?>
                    <div class="form-group">
                      <label>Heading:</label>
                      <input type="text" name="heading" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label>Text:</label>
                      <textarea name="text1" cols="50" rows="4"  class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                      <label>Select Image:</label>
                      <input type="file" name="file" class="form-control-file""><br/>
                    </div>


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="sub_btn">Add</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!-- <div class="col-lg-6 col-sm-6 portfolio-item">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="images/Creations/social.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title text-center">
                  <a href="#">Social Icons</a>
                </h4>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 portfolio-item">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="images/Creations/portfolio.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title text-center">
                  <a href="#">Portfolio</a>
                </h4>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 portfolio-item">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="images/Creations/testing.png" alt="" width="250px"></a>
              <div class="card-body">
                <h4 class="card-title text-center">
                  <a href="#">Custom Effect</a>
                </h4>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 portfolio-item">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="images/Creations/Landing.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title text-center">
                  <a href="#">Landing Page</a>
                </h4>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 portfolio-item">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="images/Creations/parallax.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title text-center">
                  <a href="#">Parallax Effect</a>
                </h4>

              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="images/Creations/add.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title text-center">
                  <a href="#">Add More</a>
                </h4>

              </div>
            </div>
          </div>  -->   
        </div>


        <!-- Pagination -->
      <!-- <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul> -->

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
