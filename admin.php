<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login as Admin</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
  <div class="header">
  	<h2>Admin</h2>
  </div>
  <form method="post" action="admin.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="adusername" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="adpassword">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="ad_login_user">Login</button>
  	</div>
  	<p>
  		<a href="login.php">Normal Login</a>
  	</p>
  </form>
</body>
</html>