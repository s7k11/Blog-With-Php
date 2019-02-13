<?php
session_start();
////////////////////////////////////LOGIN or REGISTER//////////////
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'tkf');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users (username, email, password) 
    VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
//////admin login/////////////////////////////////////////////////// 

if (isset($_POST['ad_login_user'])) {
  $adusername = mysqli_real_escape_string($db, $_POST['adusername']);
  $adpassword = mysqli_real_escape_string($db, $_POST['adpassword']);

  if (empty($adusername)) {
    array_push($errors, "Username is required");
  }
  if (empty($adpassword)) {
    array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
    $query = "SELECT * FROM admin WHERE ad_username='$adusername' AND ad_password='$adpassword'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['ad_username'] = $adusername;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

///////////////////////////////////DYNAMIC CONTENT/////////////////////

/////////////////////////blog page/////////////////////////
//////////////////////////////////////add data////////////////////////////////////
if (isset($_POST['input_image'])) {

  $heading = mysqli_real_escape_string($db, $_POST['heading']);
  $text1 = mysqli_real_escape_string($db, $_POST['text1']);
  $file= $_FILES["file"]["name"];
  $query1='SELECT id from dynamic ORDER BY id DESC LIMIT 1';
  $resultout=mysqli_query($db, $query1);
  $selector=$resultout->fetch_assoc();   
  $filepath = "images/" ."(".$selector['id'].")". $_FILES["file"]["name"];
  

  if (empty($heading)) { array_push($errors, "Heading cannot be empty"); }
  if (empty($text1)) { array_push($errors, "Text cannot be empty"); }
  if (empty($file)) { array_push($errors, "Image is required"); }
  
  if (count($errors) == 0) {
    $date=date(Y-m-d);
    if(isset($_SESSION['username']))
    {
      $user=$_SESSION['username'];
    }
    else
    {
      $user="Anonymous";
    }
    $createquery="INSERT INTO creation(heading,file) VALUES('$heading','$filepath')";
    $query = "INSERT INTO dynamic (date1,user,heading, text1, file) 
    VALUES(now(),'$user','$heading', '$text1', '$filepath')";
    mysqli_query($db, $query);
    

    move_uploaded_file($_FILES["file"]["tmp_name"], $filepath);
  	// mysqli_query($db, $query);
    header('location: blog.php');
  }
}
//////////////////////////////////////////update data///////////////////////////

if(isset($_POST['up_data']))
{
  $id=$_POST['id'];
  $heading=mysqli_real_escape_string($db,$_POST['heading']);
  $text1=mysqli_real_escape_string($db,$_POST['text1']);
  $file= $_FILES["file"]["name"];
  $filepath = "images/" ."(".$id.")". $_FILES["file"]["name"];
  // $query= "UPDATE `dynamic` SET `id`=[value-1],`heading`=[value-2],`text1`=[value-3],`file`=[value-4],`date1`=[value-5],`user`=[value-6] WHERE ''"
  $query = "UPDATE `dynamic` SET `heading` = '$heading',`file`='$filepath', `text1`= '$text1' WHERE `id`= $id ";
  mysqli_query($db,$query);
   move_uploaded_file($_FILES["file"]["tmp_name"], $filepath);
  // echo $id;
  // echo $heading;
  // echo $text1;
  // die();
  header('location:blog.php');
}

///////////////////////////////////delete button///////////////////////////
if (isset($_POST['del_btn'])) 
{ 
  $id = $_POST['id'];

  $img_del_query="SELECT * FROM dynamic WHERE id='$id'";
  $result = mysqli_query($db, $img_del_query);
  $imgdel = mysqli_fetch_assoc($result);
  unlink($imgdel['file']);
  $del_row_query="DELETE FROM dynamic WHERE id = '$id' ";
  echo $id;
  $result = mysqli_query($db, $del_row_query);
  header('location: blog.php');
}
///////////////////////////creation page//////////////////////
if (isset($_POST['sub_btn'])) {

  $heading = mysqli_real_escape_string($db, $_POST['heading']);
  $file= $_FILES["file"]["name"];
  $query1='SELECT id from creation ORDER BY id DESC LIMIT 1';
  $resultout=mysqli_query($db, $query1);
  $selector=$resultout->fetch_assoc();   
  $filepath = "images/" ."(".$selector['id'].")". $_FILES["file"]["name"];
  

  if (empty($heading)) { array_push($errors, "Heading cannot be empty"); }
  if (empty($file)) { array_push($errors, "Image is required"); }
  
  if (count($errors) == 0) {
    $query2="INSERT INTO creation(heading,file) VALUES('$heading','$filepath')";
    mysqli_query($db, $query2);
    

    move_uploaded_file($_FILES["file"]["tmp_name"], $filepath);
    // mysqli_query($db, $query);
    header('location: creations.php');
  }
}


if (isset($_POST['deldata'])) 
{ 
  $id = $_POST['id'];
  $img_del_query="SELECT * FROM creation WHERE id='$id'";
  $result = mysqli_query($db, $img_del_query);
  $imgdel = mysqli_fetch_assoc($result);
  unlink($imgdel['file']);
  $del_row_query="DELETE FROM creation WHERE id = '$id' ";
  echo $id;
  $result = mysqli_query($db, $del_row_query);
  header('location: index.php');
}
$db->close();
?>
