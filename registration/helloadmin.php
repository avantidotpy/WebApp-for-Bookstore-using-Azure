<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first as admin";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<?php

$conn = mysqli_connect('127.0.0.1:49976','azure','6#vWHD_$','contact');


 $sql="SELECT * FROM contact_selling";

 $records=mysqli_query($conn,$sql);

?>

<?php

$conn = mysqli_connect('127.0.0.1:49976','azure','6#vWHD_$','books');


 $sql1="SELECT * FROM books_info";

 $records1=mysqli_query($conn,$sql1);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
  <link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

  <div class="w3-container w3-lobster heading">
  <p class="w3-xlarge w3-lobster" style="position: absolute; top:10px ;left:0px;"> <img align="middle" src="books1.png" width="122" height="50">B O O K L A N D</p></div>



<body id="header">

<div class="koho">
<div class="tab">
  <button class="tablinks" onclick="openAdmin(event, 'insert_books')"id="defaultOpen">Insertion of the Books</button>
  <button class="tablinks" onclick="openAdmin(event, 'contact_info')">Contact about Reselling</button>
  <button class="tablinks" onclick="openAdmin(event, 'view_books')">View the books</button>
  <button class="tablinks" onclick="openAdmin(event, 'update_books')">Update the books</button>
  <button class="tablinks" onclick="openAdmin(event, 'delete_books')">Delete the books</button>
  <button class="tablinks" onclick="openAdmin(event, 'order_books')">View all orders</button>
  <button class="tablinks" onclick="openAdmin(event, 'update_order')">Update order status</button>
</div>


<div id="update_order" class="tabcontent">
      <?php

      $order_id="";
      $status="";

      $db = mysqli_connect('127.0.0.1:49976','azure','6#vWHD_$','books');

      if (isset($_POST['updateorder'])) {
        // receive all input values from the form
        $order_id = mysqli_real_escape_string($db, $_POST['order_id']);
        $status = mysqli_real_escape_string($db, $_POST['status']);
      }


      if(!empty($_POST['order_id'])){
        $sql3 = "UPDATE order_info SET status='$status' WHERE order_id='$order_id'";

       if(mysqli_query($db, $sql3))
         echo '<script>alert("Order updated Successfully")</script>';
        else
         echo '<script>alert("Order not updated")</script>';}

      ?>



      <form method=post>
     <div class="input-group">
      <label>Order Id</label>
      <input type="int" name="order_id" >
    </div>
    
    <div class="input-group">
      <label>Status</label>
      <input type="text" name="status" >
    </div>

    <div class="input-group">
      <button type="submit" class="btn" name="updateorder">Update Order</button>
    </div> 
  </form></div>


<div id="contact_info" class="tabcontent">
  <table width="600" border="1" cellpadding="1" cellspacing="1">
    <tr>
      <th>Name</th>
      <th>Mobile no</th>
      <th>Email id</th>
      <th>Book Details</th>
    </tr>
         <?php
         while($user=mysqli_fetch_assoc($records)){
          echo "<tr>";
          
         echo "<td>".$user['name']."</td>";
         echo "<td>".$user['mobile']."</td>";
         echo "<td>".$user['email']."</td>";
         echo "<td>".$user['details']."</td>";
          echo "</tr>";
        } ?> 
</table>
</div>

<div id="insert_books" class="tabcontent">

<?php

$book_title = "";
$auth_name = "";
$edi_no    = "";
$price ="";
$isbn ="";
$pub_year ="";
$owner_name ="";
$displaycount="";
$insert="Inserted";


$db = mysqli_connect('127.0.0.1:49976','azure','6#vWHD_$','books');


if (isset($_POST['insertbook'])) {
 
  // receive all input values from the form
  $book_title = mysqli_real_escape_string($db, $_POST['book_title']);
  $auth_name = mysqli_real_escape_string($db, $_POST['auth_name']);
  $edi_no = mysqli_real_escape_string($db, $_POST['edi_no']);
  $price = mysqli_real_escape_string($db, $_POST['price']);
  $isbn = mysqli_real_escape_string($db, $_POST['isbn']);
  $pub_year = mysqli_real_escape_string($db, $_POST['pub_year']);
  $owner_name = mysqli_real_escape_string($db, $_POST['owner_name']);

}

  if(!empty($_POST['book_title'])&&!empty($_POST['auth_name'])&&!empty($_POST['edi_no'])&&!empty($_POST['price'])&&!empty($_POST['isbn'])&&!empty($_POST['pub_year'])&&!empty($_POST['owner_name'])){
  $query = "INSERT INTO books_info (book_title, auth_name, edi_no, price, isbn, pub_year, owner_name) 
          VALUES('$book_title', '$auth_name', '$edi_no','$price','$isbn' ,'$pub_year','$owner_name')";


  if(mysqli_query($db, $query))
    echo '<script>alert("Inserted Successfully")</script>';
  else
    echo '<script>alert("Not Inserted")</script>';
   header('Location: helloadmin.php');}

   $sqltrig=("CREATE TRIGGER actiontriginsertbooks AFTER INSERT ON books_info FOR EACH ROW 
BEGIN
    INSERT INTO action_books
    SET action = '$insert',
     book_title_= NEW.book_title,
        changedat = NOW();
END");

mysqli_query($db, $sqltrig);

  ?>


  <form method="post">
    <div class="input-group">
      <label>Book Title</label>
      <input type="text" name="book_title" >
    </div>
   <div class="input-group">
      <label>Author Name</label>
      <input type="text" name="auth_name" >
    </div>

    <div class="input-group">
      <label>Edition Number</label>
      <input type="int" name="edi_no" >
    </div>
    <div class="input-group">
      <label>Price</label>
      <input type="int" name="price" >
    </div>

    <div class="input-group">
      <label>ISBN</label>
      <input type="text" name="isbn">
    </div>
    <div class="input-group">
      <label>Publication Year</label>
      <input type="int" name="pub_year">
    </div>
    <div class="input-group">
      <label>Owner Name</label>
      <input type="text" name="owner_name" >
    </div>
    
    <div class="input-group">
      <button type="submit" class="btn" name="insertbook">Insert</button>
    </div>
  </form>
</div>

<div id="view_books" class="tabcontent">
<table width="600" border="1" cellpadding="1" cellspacing="1">
    <tr>
      <th>Book Id</th>
      <th>Book Title</th>
      <th>Author Name</th>
      <th>Edition number</th>
      <th>Price</th>
      <th>ISBN</th>
      <th>Publication Year</th>
      <th>Owner Name</th>
    </tr>
         <?php
         while($book=mysqli_fetch_assoc($records1)){    
          echo "<tr>";
         echo "<td>".$book['id']."</td>"; 
         echo "<td>".$book['book_title']."</td>";
         echo "<td>".$book['auth_name']."</td>";
         echo "<td>".$book['edi_no']."</td>";
         echo "<td>".$book['price']."</td>";
         echo "<td>".$book['isbn']."</td>";
         echo "<td>".$book['pub_year']."</td>";
         echo "<td>".$book['owner_name']."</td>";

          echo "</tr>";
        } ?> 
</table>

<?php

$db = mysqli_connect('127.0.0.1:49976','azure','6#vWHD_$','books');

$resultcount="SELECT count(*) as total from books_info";
 $countstore=mysqli_query($db,$resultcount);
  $data=mysqli_fetch_assoc($countstore);
  echo '<strong>Total no.of books in store: </strong>'.'<strong>' .$data['total'].'</strong>';

$resultquant="SELECT book_title as min1 FROM books_info WHERE price IN(SELECT min(price) from books_info)";
$book_quant=mysqli_query($db, $resultquant);
$databook=mysqli_fetch_assoc($book_quant);
echo '<br><strong>Minimum priced book in store: </strong>'.'<strong>' .$databook['min1'].'</strong>';

?>
  
</div>

<div id="update_books" class="tabcontent">
<?php

$id="";
$book_title = "";
$auth_name = "";
$edi_no    = "";
$price ="";
$isbn ="";
$pub_year ="";
$owner_name ="";
$update="Updated";

$db1 = mysqli_connect('127.0.0.1:49976','azure','6#vWHD_$','books');


$sqltrig=("CREATE TRIGGER actiontrig_books BEFORE UPDATE ON books_info FOR EACH ROW 
BEGIN
    INSERT INTO action_books
    SET action = '$update',
     book_title_= OLD.book_title,
        changedat = NOW();
END");

mysqli_query($db1, $sqltrig);


if (isset($_POST['updatebook'])) {
  // receive all input values from the form
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $book_title = mysqli_real_escape_string($db, $_POST['book_title']);
  $auth_name = mysqli_real_escape_string($db, $_POST['auth_name']);
  $edi_no = mysqli_real_escape_string($db, $_POST['edi_no']);
  $price = mysqli_real_escape_string($db, $_POST['price']);
  $isbn = mysqli_real_escape_string($db, $_POST['isbn']);
  $pub_year = mysqli_real_escape_string($db, $_POST['pub_year']);
  $owner_name = mysqli_real_escape_string($db, $_POST['owner_name']);
}


if(!empty($_POST['id'])&&!empty($_POST['book_title'])&&!empty($_POST['auth_name'])&&!empty($_POST['edi_no'])&&!empty($_POST['price'])&&!empty($_POST['isbn'])&&!empty($_POST['pub_year'])&&!empty($_POST['owner_name'])){
$sql01 = "UPDATE books_info SET book_title='$book_title', auth_name='$auth_name', edi_no='$edi_no', price='$price', isbn='$isbn', pub_year='$pub_year', owner_name='$owner_name' WHERE id='$id'";



if(mysqli_query($db1, $sql01))
    echo '<script>alert("Updated Successfully")</script>';
  else
    echo '<script>alert("Not Updated")</script>';

  header('Location: helloadmin.php');}


?>



 <form method="post">


  <div class="input-group">
      <label>Book id</label>
      <input type="int" name="id" >
    </div>
    <div class="input-group">
      <label>Book Title</label>
      <input type="text" name="book_title" >
    </div>
   <div class="input-group">
      <label>Author Name</label>
      <input type="text" name="auth_name" >
    </div>

    <div class="input-group">
      <label>Edition Number</label>
      <input type="int" name="edi_no" >
    </div>
    <div class="input-group">
      <label>Price</label>
      <input type="int" name="price" >
    </div>

    <div class="input-group">
      <label>ISBN</label>
      <input type="text" name="isbn">
    </div>
    <div class="input-group">
      <label>Publication Year</label>
      <input type="int" name="pub_year">
    </div>
    <div class="input-group">
      <label>Owner Name</label>
      <input type="text" name="owner_name" >
    </div> 
    <div class="input-group">
      <button type="submit" class="btn" name="updatebook">Update</button>
    </div>
  </form>
</div>


  <div id="delete_books" class="tabcontent">
      <?php

      $id="";
      $delete="Deleted";

      $db = mysqli_connect('127.0.0.1:49976','azure','6#vWHD_$','books');

      if (isset($_POST['deletebook'])) {
        // receive all input values from the form
        $id = mysqli_real_escape_string($db, $_POST['id']);}


      if(!empty($_POST['id'])){
        $sql2="DELETE from books_info WHERE id='$id'";

       if(mysqli_query($db, $sql2))
         echo '<script>alert("Deleted Successfully")</script>';
        else
         echo '<script>alert("Not Deleted")</script>';}


      $sqltrig=("CREATE TRIGGER actiontrigdeletebooks AFTER DELETE ON books_info FOR EACH ROW 
BEGIN
    INSERT INTO action_books
    SET action = '$delete',
     book_title_= OLD.book_title,
        changedat = NOW();
END");

mysqli_query($db, $sqltrig);
     
      ?>



      <form method=post>
     <div class="input-group">
      <label>Book Id</label>
      <input type="int" name="id" >
    </div>

    <div class="input-group">
      <button type="submit" class="btn" name="deletebook">Delete</button>
    </div> 
  </form></div>

  <div id="order_books" class="tabcontent">
<table width="600" border="1" cellpadding="1" cellspacing="1">
    <tr>

      <th>Book Title</th>
      <th>Order Id</th>
      <th>Name</th>
      <th>UID</th>
      <th>Address</th>
      <th>Mobile Number</th> 
      <th>Email Id.</th>
      <th>Quantity</th>
      <th>Author Name</th>
      <th>Price</th>
      <th>Status</th>
    </tr>
<?php
       

         $conn = mysqli_connect('127.0.0.1:49976','azure','6#vWHD_$','books');


         $sql="SELECT * FROM order_info NATURAL JOIN books_info";

         $recordsorder=mysqli_query($conn,$sql);
       

         while($order=mysqli_fetch_assoc($recordsorder)){    
          echo "<tr>";
         echo "<td>".$order['book_title']."</td>"; 
         echo "<td>".$order['order_id']."</td>";
         echo "<td>".$order['person_name']."</td>";
         echo "<td>".$order['person_uid']."</td>";
         echo "<td>".$order['person_address']."</td>";
         echo "<td>".$order['person_number']."</td>";
         echo "<td>".$order['person_email']."</td>";
         echo "<td>".$order['quantity']."</td>";
         echo "<td>".$order['auth_name']."</td>";
         echo "<td>".$order['price']."</td>";
         echo "<td>".$order['status']."</td>";

          echo "</tr>";
        } ?>
    
  </table>
  </div>



<script>
function openAdmin(evt, TabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(TabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>


<div class="content1">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success1" >
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
    	<p>WELCOME <strong><?php echo "Administrator"; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">LOGOUT</a> </p>
    <?php endif ?>
  </div>
</div>
</div>		
</body></html>