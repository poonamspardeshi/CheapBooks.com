<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

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
  <h1>Register Here</h1>
 
</div>
<center>


<form name="form" action="" method="post" autocomplete="off" scope="request">
UserName: 
<input name=username id=username/><br/><br/>
Password:
<input name=password id=password/><br/><br/>
Address: 
<input name=address id=address/><br/><br/>
Phone: 
<input name=phone id=phone/><br/><br/>
Email: 
<input name=email id=email/><br/><br/>
<br/>
<br/>
<input type="submit" name="submit" value="Register" class="btn btn-default"/>
</center>
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


if(($_POST["username"])!=null && ($_POST["password"])!=null && ($_POST["phone"])!=null && ($_POST["email"])!=null && ($_POST["address"])!=null){
if(isset($_POST["username"])&& isset($_POST["password"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["address"])){
$uname=$_POST["username"];
$pwd=$_POST["password"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$address=$_POST["address"];


$sql = "insert into customers values ('$uname','$pwd','$address','$phone','$email')";

$result = $conn->query($sql);
echo "Success";

header("location: customer.php");

}
else{
	echo "Please enter correct values";
}
}
$conn->close();

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

