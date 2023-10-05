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
  <button><b><font size="5px">View your Orders</font></b></button></div></div>


<div id="view_order" class="tabcontent" align="center">
  <table width="600" border="1" cellpadding="1" cellspacing="1">
    <tr>

      <th>Book Title</th>
      <th>Order Id</th>
      <th>Name</th>
      <th>UID</th>
      <th>Address</th>
      <th>Author Name</th>   
    </tr>
       
      <?php

         $person_uid="";
         $recordsorder="";
        

         $conn = mysqli_connect('127.0.0.1:54349','azure','6#vWHD_$','books');

         if (isset($_POST['view_orderid'])) {
 
        // receive all input values from the form
        $person_uid = mysqli_real_escape_string($conn, $_POST['person_uid']);
        }

        if(!empty($person_uid)){
         $sql="SELECT * FROM order_info NATURAL JOIN books_info where person_uid='$person_uid'";

         $recordsorder=mysqli_query($conn,$sql);
       

         while($order=mysqli_fetch_assoc($recordsorder)){    
          echo "<tr>";
         echo "<td>".$order['book_title']."</td>"; 
         echo "<td>".$order['order_id']."</td>";
         echo "<td>".$order['person_name']."</td>";
         echo "<td>".$order['person_uid']."</td>";
         echo "<td>".$order['person_address']."</td>";
         echo "<td>".$order['auth_name']."</td>";

          echo "</tr>";
        }} ?>

</table>

<form class="form1_view" method="post">
    <div class="input-group">
      <label>Enter your UID for getting your Order Details</label>
      <p><font size="2px">(Please note down your Order Id.)</font></p>
      <input type="int" name="person_uid">
    </div>
    <div class="input-group">
    <button type="submit" class="btn" name="view_orderid">View</button>
    </div>
</form>
</div>


</body>
</html>