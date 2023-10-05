<!DOCTYPE html>
<html>
<head>
	<title>Order Search</title>
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

<div style="margin-left: 150px">
  <table width="600" border="1" cellpadding="1" cellspacing="1">
    <tr>
      <th>Order Id</th>
      <th>Book Id</th>
      <th>Book Title</th>
      <th>Name</th>
      <th>Quantity</th>
      <th>Status</th>
    </tr>
       
      <?php

         $order_id="";

         $conn = mysqli_connect('127.0.0.1:49976','azure','6#vWHD_$','books');

         if (isset($_POST['view_order'])) {
 
        // receive all input values from the form
        $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);}

         $sql="SELECT * FROM order_info where order_id='$order_id'";

         $record=mysqli_query($conn,$sql);

         while($order=mysqli_fetch_assoc($record)){    
          echo "<tr>";
         echo "<td>".$order['order_id']."</td>"; 
         echo "<td>".$order['book_id']."</td>";
         echo "<td>".$order['book_title']."</td>";
         echo "<td>".$order['person_name']."</td>";
         echo "<td>".$order['quantity']."</td>";
         echo "<td>".$order['status']."</td>";

          echo "</tr>";
        } ?>

</table></div>

	<form class="form1" method="post">
    <div class="input-group">
      <label><b>Order Id</b></label>
      
      <p><font size="2px">(Enter your Order Id here. If you don't know your Order <br> Id  go to View Orders in the book ordering section and <br> using your UID get hold of your Order ID.)</font></p>
      <input type="int" name="order_id" >
    </div>
    <div class="input-group">
  	<button type="submit" class="btn" name="view_order">View Order</button>
  	</div>
</form>





</body>
</html>