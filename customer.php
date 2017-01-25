<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
  <title>CheapBooks</title>
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
      <li class="active"><a href='customer.php'>Home</a></li>
	        

      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php if(isset($_SESSION['login_user'])){echo $_SESSION['login_user']; }?></a></li>
         </ul>
		  <div class="col-sm-3 col-md-3 pull-right">
       
        </div>
		
  </div>
</nav>
  
<div class="jumbotron text-center">
  <h1>LOGIN</h1>
  
</div>
<center> 
<form name="form" action="" method="post" autocomplete="off" scope="request">
UserName: 
<input name=username id=username/>
Password:
<input name=password id=password type="password"/>
<br/>
<br/>
<input type="submit" name="submit" value="Login" class="btn btn-default"/>

</form>
<br/><br/><br/>
<div>
New User?
Register Here:
<a href="Page4.php" class="btn btn-default" role="button">
	    Register
	  </a>
</div>
<center> 
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


if(($_POST["username"])!=null && ($_POST["password"])!=null){
if(isset($_POST["username"])&& isset($_POST["password"])){
$uname=$_POST["username"];
$pwd=$_POST["password"];



$sql = "select * from customers where password='$pwd' AND username='$uname'";

$result = $conn->query($sql);
if ($result->num_rows == 1) {
    // output data of each row
	
    echo "Login success";
	$_SESSION['login_user']=$uname; // Initializing Session
	session_write_close();
	header("location: Page2.php"); // Redirecting To Other Page
	
		
		}
 else {
	 
    echo "UserName or Password is incorrect.";
}
}
}
$conn->close();

?>
</body>
</html>

