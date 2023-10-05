<!DOCTYPE html>
<html>
<head>
  <title>Contact</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<header>
    <div class="w3-container w3-lobster">
  <p class="w3-xlarge" style="position: absolute; top:10px ;left:0px;"> <img align="middle" src="books1.png" width="122" height="50">B O O K L A N D</p></div>
<a href="/Bookstore.html" style="position: absolute; top: 0px;right: 10px;"><i class="fa fa-home fa-2x icon color" aria-hidden="true"></i>
</a></header>


<body>
  <div class="header">
    <h2>Contact us for Selling of Books</h2>
  </div>
   

<?php
session_start();

$name = "";
$mobile = "";
$email    = "";
$details="";


$db = mysqli_connect('127.0.0.1:49976','azure','6#vWHD_$','contact');

if (isset($_POST['submit_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $details = mysqli_real_escape_string($db, $_POST['details']);
  
}



if(!empty($_POST['name'])&&!empty($_POST['mobile'])&&!empty($_POST['email'])&&!empty($_POST['details'])){
  $query = "INSERT INTO contact_sell (name, mobile, email, details) 
          VALUES('$name', '$mobile', '$email','$details')";

  if(mysqli_query($db, $query))
    echo "Inserted Successfully";
  else
    echo "Not Inserted";}

  ?>

  
<div class="koho">
  <form method="post">
    <div class="input-group">
      <label>Name</label>
      <input type="text" name="name" >
    </div>
    <div class="input-group">
      <label>Mobile No.</label>
      <input type="int" name="mobile">
    </div>
    <div class="input-group">
      <label>Email Id.</label>
      <input type="email" name="email">
    </div>
    <div class="input-group">
      <label>Details about the Book</label>
      <input type="text" name="details">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="submit_user">Submit</button>
    </div>
  </form></div>



</body>
</html>