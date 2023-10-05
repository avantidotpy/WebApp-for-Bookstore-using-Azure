<!DOCTYPE html>
<html>
<head>
	<title>User Page</title>
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

  <div style="margin-left:150px;">
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

         $book_title="";
        $auth_name="";

         $conn = mysqli_connect('127.0.0.1:49976','azure','6#vWHD_$','books');

         if (isset($_POST['search_user'])) {
 
        // receive all input values from the form
        $book_title = mysqli_real_escape_string($conn, $_POST['book_title']);
        $auth_name = mysqli_real_escape_string($conn, $_POST['auth_name']);}

         $sql="SELECT * FROM books_info where book_title='$book_title'and auth_name='$auth_name'";

         $recordssearch=mysqli_query($conn,$sql);

         while($book1=mysqli_fetch_assoc($recordssearch)){    
          echo "<tr>";
         echo "<td>".$book1['id']."</td>"; 
         echo "<td>".$book1['book_title']."</td>";
         echo "<td>".$book1['auth_name']."</td>";
         echo "<td>".$book1['edi_no']."</td>";
         echo "<td>".$book1['price']."</td>";
         echo "<td>".$book1['isbn']."</td>";
         echo "<td>".$book1['pub_year']."</td>";
         echo "<td>".$book1['owner_name']."</td>";

          echo "</tr>";
        } ?> 
</table></div>

	<form class="form1" method="post">
    <div class="input-group">
      <label>Book Title</label>
      <input type="text" name="book_title" >
    </div>
   <div class="input-group">
      <label>Author Name</label>
      <input type="text" name="auth_name">
    </div>
    <div class="input-group">
  		<button type="submit" class="btn" name="search_user">Search</button>
  	</div>
</form>





</body>
</html>