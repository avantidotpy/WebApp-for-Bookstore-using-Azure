<!DOCTYPE html>
<html>
<head>
	<title>Order Page</title>
	<link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>


<header>
    <div class="w3-container w3-lobster heading">
  <p class="w3-xlarge" style="position: absolute; top:10px ;left:0px;"> <img align="middle" src="books1.png" width="122" height="50">B O O K L A N D</p>
<a href="index.php" style="position: absolute; top: 0px;right: 10px;"><i class="fa fa-arrow-left fa-2x icon color" aria-hidden="true"></i>
</a></div></header>

<body>


<div class="koho">
  <div class="tab_view">
  <button><b><font size="5px">Place Order</font></b></button>
  </div></div>

       
      <?php

         $person_uid="";
         $recordsorder="";
        

         $conn = mysqli_connect('127.0.0.1:49976','azure','6#vWHD_$','books');

         if (isset($_POST['view_orderid'])) {
 
        // receive all input values from the form
        $person_uid = mysqli_real_escape_string($conn, $_POST['person_uid']);
        }

        if(!empty($person_uid)){
         $sql="SELECT * FROM order_info NATURAL JOIN books_info where person_uid='$person_uid'";

         $recordsorder=mysqli_query($conn,$sql);
       

         } ?>



<div id="place_order" class="tabcontent">

<?php

$book_id = "";
$book_title = "";
$person_name  = "";
$person_address ="";
$person_number ="";
$person_email ="";
$quantity ="";
$status="Pending";

$db = mysqli_connect('127.0.0.1:49976','azure','6#vWHD_$','books');
if (isset($_POST['confirm_order'])) {
 
  // receive all input values from the form
  $book_id = mysqli_real_escape_string($db, $_POST['book_id']);
  $book_title = mysqli_real_escape_string($db, $_POST['book_title']);
  $person_name = mysqli_real_escape_string($db, $_POST['person_name']);
  $person_uid = mysqli_real_escape_string($db, $_POST['person_uid']);
  $person_address = mysqli_real_escape_string($db, $_POST['person_address']);
  $person_number = mysqli_real_escape_string($db, $_POST['person_number']);
  $person_email = mysqli_real_escape_string($db, $_POST['person_email']);
  $quantity = mysqli_real_escape_string($db, $_POST['quantity']);}

  if(!empty($_POST['book_id'])&&!empty($_POST['book_title'])&&!empty($_POST['person_name'])&&!empty($_POST['person_uid'])&&!empty($_POST['person_address'])&&!empty($_POST['person_number'])&&!empty($_POST['person_email'])&&!empty($_POST['quantity'])){
  $query2 = "INSERT INTO order_info (book_id, book_title, person_name, person_uid, person_address, person_number, person_email, quantity, status) 
          VALUES('$book_id', '$book_title', '$person_name','$person_uid','$person_address','$person_number' ,'$person_email','$quantity','$status')";

   if(mysqli_query($db, $query2))
    echo '<script>alert("Order Placed Successfully. Please get your Order Id from View Orders section.")</script>';
  else
    echo '<script>alert("Order was not Placed")</script>';}  

?>

<?php 
  if (isset($_POST['submit_user_fe1'])){
    $id="58";
    if(!empty($id)){
         $sql1="SELECT book_title FROM books_info where id='$id'";

         $recordsorder1=mysqli_query($conn,$sql1);
       

         $name1=mysqli_fetch_assoc($recordsorder1);
         $name= $name1['book_title'];}
  }

  if (isset($_POST['submit_user_fe2'])){
    $id="59";
    if(!empty($id)){
         $sql2="SELECT book_title FROM books_info where id='$id'";

         $recordsorder2=mysqli_query($conn,$sql2);
       

         $name2=mysqli_fetch_assoc($recordsorder2);
         $name= $name2['book_title'];
         }
  }

  if (isset($_POST['submit_user_fe3'])){
    $id="60";
    if(!empty($id)){
         $sql3="SELECT book_title FROM books_info where id='$id'";

         $recordsorder3=mysqli_query($conn,$sql3);
       

         $name3=mysqli_fetch_assoc($recordsorder3);
         $name= $name3['book_title'];}
  }

  if (isset($_POST['submit_user_fe4'])){
    $id="61";
    if(!empty($id)){
         $sql4="SELECT book_title FROM books_info where id='$id'";

         $recordsorder4=mysqli_query($conn,$sql4);
       

         $name4=mysqli_fetch_assoc($recordsorder4);
         $name= $name4['book_title'];}
  }

  if (isset($_POST['submit_user_fe5'])){
    $id="62";
    if(!empty($id)){
         $sql5="SELECT book_title FROM books_info where id='$id'";

         $recordsorder5=mysqli_query($conn,$sql5);
       

         $name5=mysqli_fetch_assoc($recordsorder5);
         $name= $name5['book_title'];}
  }

  if (isset($_POST['submit_user_se1'])){
    $id="63";
    if(!empty($id)){
         $sql6="SELECT book_title FROM books_info where id='$id'";

         $recordsorder6=mysqli_query($conn,$sql6);
       

         $name6=mysqli_fetch_assoc($recordsorder6);
         $name= $name6['book_title'];}
  }

  if (isset($_POST['submit_user_se2'])){
    $id="64";
    if(!empty($id)){
         $sql7="SELECT book_title FROM books_info where id='$id'";

         $recordsorder7=mysqli_query($conn,$sql7);
       

         $name7=mysqli_fetch_assoc($recordsorder7);
         $name= $name7['book_title'];}
  }

  if (isset($_POST['submit_user_se3'])){
    $id="65";
    if(!empty($id)){
         $sql8="SELECT book_title FROM books_info where id='$id'";

         $recordsorder8=mysqli_query($conn,$sql8);
       

         $name8=mysqli_fetch_assoc($recordsorder8);
         $name= $name8['book_title'];}
  }

  if (isset($_POST['submit_user_se4'])){
    $id="66";
    if(!empty($id)){
         $sql9="SELECT book_title FROM books_info where id='$id'";

         $recordsorder9=mysqli_query($conn,$sql9);
       

         $name9=mysqli_fetch_assoc($recordsorder9);
         $name= $name9['book_title'];}
  }

  if (isset($_POST['submit_user_se5'])){
    $id="67";
    if(!empty($id)){
         $sql10="SELECT book_title FROM books_info where id='$id'";

         $recordsorder10=mysqli_query($conn,$sql10);
       

         $name10=mysqli_fetch_assoc($recordsorder10);
         $name= $name10['book_title'];}
  }

  if (isset($_POST['submit_user_te1'])){
    $id="68";
    if(!empty($id)){
         $sql11="SELECT book_title FROM books_info where id='$id'";

         $recordsorder11=mysqli_query($conn,$sql11);
       

         $name11=mysqli_fetch_assoc($recordsorder11);
         $name= $name11['book_title'];}
  }

  if (isset($_POST['submit_user_te2'])){
    $id="69";
    if(!empty($id)){
         $sql12="SELECT book_title FROM books_info where id='$id'";

         $recordsorder12=mysqli_query($conn,$sql12);
       

         $name12=mysqli_fetch_assoc($recordsorder12);
         $name= $name12['book_title'];}
  }

  if (isset($_POST['submit_user_te3'])){
    $id="70";
    if(!empty($id)){
         $sql13="SELECT book_title FROM books_info where id='$id'";

         $recordsorder13=mysqli_query($conn,$sql13);
       

         $name13=mysqli_fetch_assoc($recordsorder13);
         $name= $name13['book_title'];}
  }

  if (isset($_POST['submit_user_te4'])){
    $id="71";
    if(!empty($id)){
         $sql14="SELECT book_title FROM books_info where id='$id'";

         $recordsorder14=mysqli_query($conn,$sql14);
       

         $name14=mysqli_fetch_assoc($recordsorder14);
         $name= $name14['book_title'];}
  }

  if (isset($_POST['submit_user_te5'])){
    $id="72";
    if(!empty($id)){
         $sql15="SELECT book_title FROM books_info where id='$id'";

         $recordsorder15=mysqli_query($conn,$sql15);
       

         $name15=mysqli_fetch_assoc($recordsorder15);
         $name= $name15['book_title'];}
  }

  if (isset($_POST['submit_user_be1'])){
    $id="73";
    if(!empty($id)){
         $sql16="SELECT book_title FROM books_info where id='$id'";

         $recordsorder16=mysqli_query($conn,$sql16);
       

         $name16=mysqli_fetch_assoc($recordsorder16);
         $name= $name16['book_title'];}
  }

  if (isset($_POST['submit_user_be2'])){
    $id="74";
    if(!empty($id)){
         $sql17="SELECT book_title FROM books_info where id='$id'";

         $recordsorder17=mysqli_query($conn,$sql17);
       

         $name17=mysqli_fetch_assoc($recordsorder17);
         $name= $name17['book_title'];}
  }

  if (isset($_POST['submit_user_be3'])){
    $id="75";
    if(!empty($id)){
         $sql18="SELECT book_title FROM books_info where id='$id'";

         $recordsorder18=mysqli_query($conn,$sql18);
       

         $name18=mysqli_fetch_assoc($recordsorder18);
         $name= $name18['book_title'];}
  }

  if (isset($_POST['submit_user_be4'])){
    $id="76";
    if(!empty($id)){
         $sql19="SELECT book_title FROM books_info where id='$id'";

         $recordsorder19=mysqli_query($conn,$sql19);
       

         $name19=mysqli_fetch_assoc($recordsorder19);
         $name= $name19['book_title'];}
  }

  if (isset($_POST['submit_user_be5'])){
    $id="77";
    if(!empty($id)){
         $sql20="SELECT book_title FROM books_info where id='$id'";

         $recordsorder20=mysqli_query($conn,$sql20);
       

         $name20=mysqli_fetch_assoc($recordsorder20);
         $name= $name20['book_title'];}
  }

  if (isset($_POST['submit_user_be6'])){
    $id="78";
    if(!empty($id)){
         $sql21="SELECT book_title FROM books_info where id='$id'";

         $recordsorder21=mysqli_query($conn,$sql21);
       

         $name21=mysqli_fetch_assoc($recordsorder21);
         $name= $name21['book_title'];}
  }


?>


<div class="koho">
	<form class="form" method="post">
    <div class="input-group">
      <label>Book Id</label>
      <input type="int" name="book_id" value="<?php echo $id ?>">
    </div>

    <div class="input-group">
      <label>Book Title</label>
      <input type="text" name="book_title" value="<?php echo $name ?>">
    </div>

    <div class="input-group">
      <label>Name</label>
      <input type="text" name="person_name" >
    </div>

    <div class="input-group">
      <label>UID.</label>
      <input type="int" name="person_uid" >
    </div>

    <div class="input-group">
      <label>Address</label>
      <input type="text" name="person_address" >
    </div>

    <div class="input-group">
      <label>Mobile no.</label>
      <input type="int" name="person_number" >
    </div>

    <div class="input-group">
      <label>Email Id.</label>
      <input type="email" name="person_email" >
    </div>

    <div class="input-group">
      <label>Quantity</label>
      <input type="int" name="quantity" >
    </div>

    <div class="input-group">
  	<button type="submit" class="btn" name="confirm_order">Confirm Order</button>
  	</div>
</form>
</div>
</div>




</body>
</html>