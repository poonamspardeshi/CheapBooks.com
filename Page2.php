<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
	
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<script>


        function show() { document.getElementById('area').style.display = 'block'; 
		document.getElementById('area1').style.display = 'none';}
		function show1() { document.getElementById('area1').style.display = 'block'; 
						document.getElementById('area').style.display = 'none';
						}
       
    

</script>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
 
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Assignment 4</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href='Page2.php'>Home</a></li>

      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php if(isset($_SESSION['login_user'])){echo $_SESSION['login_user']; }?></a></li>
         </ul>
		  <div class="col-sm-3 col-md-3 pull-right">
        
        </div>
		
  </div>
</nav>
  
<div class="jumbotron text-center">
  <h1>Search Books</h1>
 
</div>

	



<form name="form" action="" method="post" autocomplete="off" scope="request">
        <INPUT TYPE=RADIO NAME="X" VALUE="H" onclick="show();"/>Search By Title </br>
		<input name="area" id="area" style="display: none;" ></input>  </br> 
        <INPUT TYPE=RADIO NAME="X" VALUE="L" onclick="show1();"/>Search By Author</br>
		<input name="area1" id="area1" style="display: none;" NAME="data" ></input>  </br> 
		<input type="submit" name="submit" value="Search" />
      </form>

 <?php

$servername = "localhost";
$username = "root";
$password = "";
$db="cheapbook";
// Create connection
$conn = new mysqli($servername,$username,$password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$stmt=null;
$stmt1=null;
$stmt2=null;
if(isset($_POST["area"])){
$id=$_POST["area"];





if($id!=null){
	//echo "Area has value $id";
	$sql = "SELECT book.title, book.ISBN, stocks.number
FROM book
INNER JOIN stocks
ON book.ISBN=stocks.ISBN where title like '%$id%'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
		echo"<br/><br/><br/>";
		$stmt= $row["title"];
		$stmt1= $row["ISBN"];
		$stmt2= $row["number"];
		


	
		
		}
} else {
    echo "No results for $id";
}
}
}
if(isset($_POST["area1"])){


$id1=$_POST["area1"];



if($id1!=null){
	//echo "Area has value $id";
	$sql = "SELECT b.title,w.ISBN,s.number
FROM author a
INNER JOIN writtenby w
    on a.ssn = w.ssn
INNER JOIN stocks s
    on w.ISBN=s.ISBN
INNER JOIN book b
    on w.ISBN=b.ISBN
where name LIKE '%$id1%' and number<>0";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
		echo"<br/><br/><br/>";
		$stmt= $row["title"];
		$stmt1= $row["ISBN"];
		$stmt2= $row["number"];
		


	
		
		}
} else {
    echo "No results for $id1";
}
}
}
$conn->close();
?>
<center>
<table cellpadding="5" cellspacing="5">
    <tr>
    <th>BookName</th>&nbsp;
    <th>ISBN</th>
    <th>Number of Books Available</th>
	<th>Quantity</th>
	
  </tr
   <tr>
    <td><?php echo $stmt;?></td>
    <td><?php echo $stmt1;?></td>
    <td><?php echo $stmt2;?></td>

	<td><?php echo '<a href="Page3.php?id='.$stmt1.'&submit=submit">Add To Shopping Cart</a>'; ?></td>
  </tr>
  
  </table>
</br>
  </br>
  
  <?php
  if(!isset($_SESSION['noofitems'])){
	  $_SESSION['noofitems']=0;
  }
  ?>
<a href="Page3.php" class="btn btn-default">View Shopping Cart   <?php echo '['.$_SESSION['noofitems'].']'?></a>

  
  </br></br>
  </br></br>
  </center>
  
<form name="form" action="" method="post" autocomplete="off" scope="request">
		<input type="submit" name="Logout" value="Logout" class="btn btn-default"/>
		<?php
		if(isset($_POST["Logout"])){
			echo 'logout';
			session_destroy();
			header('Location:customer.php');
		}
		
		?>
		
</form>	

</body>
</html>

