<!DOCTYPE html>
<?php
session_start();
?>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
	
}

td,th{
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<html lang="en">

<head>
  <title>CheapBook</title>
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
  <h1>Shopping Cart</h1>
 
</div>
<center>
<table cellpadding="5" cellspacing="5">
<tr>
<th>ISBN</th>
<th>TITLE</th>
<th>COST</th>
</tr>

<?php
if(isset($_GET['submit'])){

if(empty($_SESSION['basket'])){
	$_SESSION['basket']=array();
	
	array_push($_SESSION['basket'],$_GET['id']);
	
	
}
else{
	//echo "in else";
	
	array_push($_SESSION['basket'],$_GET['id']);
}
}
if(isset($_GET['id'])){
$ID=$_GET['id'];
}
//print_r($_SESSION['basket']);
$wherein=implode(',',$_SESSION['basket']);
//echo $wherein;

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
$sql = "SELECT ISBN,title,price from book where ISBN in ($wherein)";
$result = $conn->query($sql);

$total=0;
$noofitems=0;
   
if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
		
        $stmt= $row["ISBN"];
		$stmt1=$row["title"];
		$stmt2=$row["price"];
		
		$total=$total+(int)$stmt2;
		$noofitems=$noofitems+1;
		?>


  
   <tr>
    <td><?php echo $stmt;?></td>
    <td><?php echo $stmt1;?></td>
    <td><?php echo $stmt2;?></td>
  </tr>
  
 
		<?php
		}
} else {
    echo "0 results";
}

?>
 </table>


  </br>
  </br>
  
  
  <strong>FINAL COST OF ALL PRODUCTS: <?php echo "$". $total;?></strong>
  </br></br>
  </br></br>
  <form name="form" action="" method="post" autocomplete="off" scope="request">
       
		<input type="submit" name="submit" value="BUY" class="btn btn-default"/>
      </form>
</center>	  
<?php

$_SESSION['noofitems']=$noofitems;

	if(isset($_POST["submit"])){
		
		
$uname=$_SESSION['login_user'];
$sql1 = "select max(basketid) from shoppingbasket";
$result = $conn->query($sql1);
if ($result->num_rows == 1) {
    // output data of each row
	
    while($row1 = $result->fetch_assoc()) {
		
		$stmtmax= $row1["max(basketid)"];
		
		$stmtmax1=(int)$stmtmax+1;
		


	
		
		}
} else {
    echo "No results for $id1";
}

	
$sql2 = "insert into shoppingbasket values ('$stmtmax1','$uname')";
$result = $conn->query($sql2);

foreach($_SESSION['basket'] as $allISBN){
	

				$sql3 = "insert into contains values ('$stmtmax1','$allISBN','1')";
				$result = $conn->query($sql3);


			$sql4 = "select warehousecode from stocks where ISBN='$allISBN'";
			$result = $conn->query($sql4);
			if ($result->num_rows == 1) {
				// output data of each row
				
				while($row = $result->fetch_assoc()) {
					
					$stmt4= $row["warehousecode"];
					
					

					}
			} else {
				echo "No results for $id";
			}

			$sql5 = "insert into shippingorder values ('$allISBN','$stmt4','$uname','1')";
			$result = $conn->query($sql5);
			}
			
			echo '<br/><br/><center>Your order is purchased</center>';
			
			
}




?>
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

