<?php
include('server.php'); 
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	unset($_SESSION['ad_username']);
	header("location: blog.php");
}
$db = mysqli_connect('localhost', 'root', '', 'tkf');
$query = "SELECT * FROM dynamic ORDER BY id";
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

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/blog.css" rel="stylesheet">

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
					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contact</a>
					</li>
					<li class="nav-item active dropdown">
						<a class="nav-link " href="blog.php" >
							Blog
						</a>
					</li>
				</ul>
				<?php if((!isset($_SESSION['username'])) and (!isset($_SESSION['ad_username']))):
				?>
				<a href="login.php" class="btn " style="color: #FFF">Login</a>
				<?php endIf; ?>
				<?php if(isset($_SESSION['username'])):?>
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
				<h1 class="mt-4 mb-3">Blog
					<small>TechnoKnowledgeFreaks</small>
				</h1>
				<!-- Blog Post -->
				<?php while($row = $resultObj->fetch_assoc()): ?>
					<div class="card mb-4">
						<div class="card-body">

							<div class="row">
								<div class="col-lg-3">
									<a href="#">
										<?php echo "<img src=".$row['file']." class='img-fluid rounded'  alt='image not found' />"?>
									</a>
								</div>
								<div class="col-lg-9">
									<h2 class="card-title"><?=$row['heading']?></h2>
									<p class="card-text"><?=$row['text1']?></p>
									<a href="#" class="btn blog">Read More &rarr;</a>
								</div>
								<?php if(isset($_SESSION['ad_username'])): ?>
									<form action="blog.php" method="post">
										<input type="hidden" name="id" value="<?=$row['id']?>">
										<button class="btn" name="del_btn" type="submit">Delete</button>
									</form>
									<?php endIf;?>
									<?php if(isset($_SESSION['username'])): ?>
										<form action="blog.php" method="post"  enctype="multipart/form-data">
											<button class="btn btn-warning text-white"  type="button" data-toggle="modal" data-target="#update">update</button>
										<!-- modal of update  -->
											<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Update Blog details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<?php include('errors.php'); ?>
															<div class="form-group">
																<label>Heading:</label>
																<input type="text" name="heading" class="form-control"  value="<?=$row['heading']?>">
															</div>
															<div class="form-group">
																<label>Text:</label>
																<textarea name="text1" cols="50" rows="4"  class="form-control" ><?=$row['text1']?></textarea>
															</div>
															<div class="form-group">
																<label>Select Image:</label>
																<input type="file" name="file" class="form-control-file""><br/>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<input type="hidden" name="id" value="<?=$row['id']?>">
															<button type="submit" class="btn btn-primary" name="up_data">Update</button>
														</div>
													</div>
												</div>
											</div>
										</form>
										<?php endIf;?>
									</div>

								</div>
								<div class="card-footer text-muted">
									Posted on <?=$row['date1']?> by
									<?=$row['user']?>
								</div>
							</div>
							<?php endWhile; ?>
							<div class="row">
								<button type="button" class="btn btn-primary text-center btn-block" data-toggle="modal" data-target="#exampleModal">
									Create A New Blog Post
								</button>

							</div>
							<!--Update blog-->

							<!--add info-->
							<form method="post" action="blog.php" enctype="multipart/form-data">
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Enter Blog details</h5>
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
												<button type="submit" class="btn btn-primary" name="input_image">Add</button>
											</div>
										</div>
									</div>
								</div>
							</form>

						</div>

					</div>
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
