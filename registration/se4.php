<?php 
  session_start(); 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>SE</title>
	<link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  
</head>

<header>
    <div class="w3-container w3-lobster">
  <p class="w3-xlarge" style="position: absolute; top:10px ;left:0px;"> <img align="middle" src="books1.png" width="122" height="50">B O O K L A N D</p></div></header>

<body id="header">
  

  
   
<div class="koho">
  <ul id="menu">
  <ul>
    <center>
<li><a href="/Bookstore.html">Home</a></li>
<li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Categories<i class="fa fa-caret-down"></i></a>
    <div class="dropdown-content">
      <a href="FE.php">Sem 1 & Sem 2</a>
      <a href="SE.php">Sem 3 & Sem 4</a>
      <a href="TE.php">Sem 5 & Sem 6</a>
      <a href="BE.php">Sem 7 & Sem 8</a>
      
    </div>
  </li>
  <!-- <a id = "cart" href="#" style="position: absolute;top: 30px;right:400px;"> <i class="fa fa-shopping-cart fa-2x icon" aria-hidden="true"></i></a> -->

</center>
</ul>
</ul>

</div>


  </div>
  <img src="img/se4.jpg" alt="HTML5 Icon" width="200" height="300" class="center">


<p>
 <a href="SE.php"> <i class=" w3-xxxlarge fa fa-hand-o-left icon color" style="position: absolute;top: 60px;right:10px;" aria-hidden="true"></i></a>
</p>

<div class="koho">
<form class=form2 action="ordermain.php" method=post>
  <div class="input-group">
      <label>Advanced Engineering Mathematics</label>
    </div>
     <div class="input-group">
      <label> Author : C.Ray</label>
    </div>
     <div class="input-group">
      <label> PRICE:  600</label>
    </div>
   
    <div class="input-group">
      <label>Book Id: 66</label>
      
    </div>

    <div class="input-group">
      <input type="submit" value="Order" class="btn" name="submit_user_se4" >
      <label>(Please note down the following details as you will be redirected to another page)</label>
    </div>

  </form></div>

  <div class="koho">


  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <div class="topright">
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>WELCOME <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">LOGOUT</a> </p>
    <?php endif ?>
  </div></div>
		
</body>
</html>