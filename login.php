<?php
//error_reporting(0);
require 'security.php';
require 'db.php';

global $username,$password;
   
if(!empty($_POST))
{
 if(isset($_POST['username'],$_POST['password']))
 {
	 $username=$_POST['username'];
     $password=$_POST['password'];
    $result=mysqli_query($db,"SELECT * from biodata where username='$username' and password='$password'");
	if(($result->num_rows)==1)

	{   
		session_start();
		$_SESSION['bio']='true';
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		header('location:main.php');
	}
	else
	{
	?>
		 <div class="col-sm-12" style= 'color: red; font-size: 20px; font-family: Verdana; text-align: center; position: fixed; bottom: 120px;'>Invalid username and/or password!</div>;"  <br> 
		<br>
	<!--echo "New User? Register now!"; ?> <input type="button" name="register" value="REGISTER" onclick="window.location.href='register.php'" >
--><?php
	}
 }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


	
<div class="container-fluid">
	<div class="right">
		<a href="profile.html" class="homebtn link1" role="button">Home</a>
		<a href="register.php" class="regbtn link1" role="button">Register</a>
		
	</div>

	<div class="row">
		<div class="col-sm-offset-4 col-sm-4" id="box">
		  
				
		
		
		<form action="" method="post" id="myform">
			<p class="website">WEBSITE</p>
  			<div class="form-group">
   				<div class="input-group form_row form_username">
   					<span class="input-group-addon">
   						<i class="glyphicon glyphicon-user"></i>
   					</span>
   					<input type="text" class="form-control text" placeholder="Username" id="username" name="username">
   				</div>
 			 </div>
 
  			<div class="form-group">
  				<div class="input-group form_row form_pass">
  					<span class="input-group-addon">
  						<i class="glyphicon glyphicon-lock"></i>
  					</span>
					<input type="password" class="form-control password" placeholder="Password" id="password" name="password">  				
  				</div>
  			</div>

  			<div class="form-group form_row">
  				<input type="submit" class="form-control signin" value="Sign in"  name="login">
			</div>
			
		</form>
</div>
</div>
</body>
</html>