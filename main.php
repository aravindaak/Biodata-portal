<?php  
//error_reporting(0);
require 'security.php';
require 'db.php';
session_start();
$username=$_SESSION['username'];
$password=$_SESSION['password'];
if(!$_SESSION['bio'])
{
	header('location:login.php');
}

$r=mysqli_query($db,"SELECT name,dob,sex,maritalstatus,phonenumber,bio,image FROM biodata where username='$username' and password='$password'");                
$row=mysqli_fetch_object($r);  
if(!count($r))
{
   echo "No records!";
}
else
{
?>

<!-- this is not needed because i put the onclick thing for the logout button below. check it out. If it's not working I'll style this button itself
<input type="button" name="logout" value="LOGOUT" onclick="window.location.href='logout.php'">-->

<!DOCTYPE html>
<html>
<head>
	<title>BIO DATA</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<style>
      table, th, td 
      {
      border: 1px solid black;
      }
     </style>-->
</head>
<body>

      <div class="container-fluid">
      <div class="right">
         <a href="profile.html" class="logout link1" role="button" name="logout" value="LOGOUT" onclick="window.location.href='logout.php'" >Logout</a>
         <a href="update.php" class="update link1" role="button" name="update1" value="UPDATE INFO" onclick="window.location.href='update.php'">Update</a>
     </div>
     </div>


      <div class="container">
         <div class="row">
            <div class="col-sm-4"></div>
            
            <div class="container col-sm-4 main">
               <p class="profile">My Profile</p>
               <?php $s=$row->image; ?>
                <p class="text-center"><?php echo '<img src="'.$s.'" alt="Display picture" class="img-circle image">';?> </p>
                <!--<p class="text-center"><img src="'.$s.'" class="img-circle image"></p>-->
                  <hr>
               
               <div class="row col-sm-offset-3 detail">   
                  <p class="det"><i class="glyphicon glyphicon-user "></i><?php echo escape($row->name);?></p>
                  <p class="det"><i class="glyphicon glyphicon-gift "></i><?php echo escape($row->dob); ?></p>
                  <p class="det"><i class="glyphicon glyphicon-asterisk "></i><?php echo escape($row->sex); ?></p>
                  <p class="det"><i class="glyphicon glyphicon-heart "></i><?php echo escape($row->maritalstatus); ?></p>
                  <p class="det"><i class="glyphicon glyphicon-earphone "></i><?php echo escape($row->phonenumber); ?></p>
                  <p class="det"><i class="glyphicon glyphicon-comment "></i><?php echo escape($row->bio); ?></p>
                 
               </div>
            </div>


         </div>
      </div>


</body>
</html>
<?php } 
?>

        <!--<table>
         	<tr>
         		<th>NAME:</th>
         		<td><?php echo escape($row->name); ?></td>
         	</tr>
         	<tr>
         		<th>DOB:</th>
         		<td><?php echo escape($row->dob); ?></td>
         	</tr>
         	<tr>
         		<th>SEX:</th>
         		<td><?php echo escape($row->sex); ?></td>
         	</tr>
         	<tr>
         	    <th>MARITAL STATUS:</th>
         	    <td><?php echo escape($row->maritalstatus); ?></td>

         	</tr>
         	<tr>
         		<th>PHONE NUMBER:</th>
         		<td><?php echo escape($row->phonenumber); ?></td>
         	</tr>
         	<tr>
         		<th>BIO:</th>
         		<td><?php echo escape($row->bio); ?></td>
         	</tr>
         	<tr>
         	<?php $s=$row->image; ?>
         		<th>IMAGE:</th>
         		<td><?php echo '<img src="'.$s.'" alt="Display picture" style="width:128px;height:128px">'; ?></td>
         	</tr>
         </table>
         <input type="button" name="update1" value="UPDATE INFO" onclick="window.location.href='update.php'">
         <input type="button" name="userpass" value="UPDATE PASSWORD" onclick="window.location.href='updateusepass.php' ">-->

