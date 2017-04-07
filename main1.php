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

<input type="button" name="logout" value="LOGOUT" onclick="window.location.href='logout.php'">
<!DOCTYPE html>
<html>
<head>
	<title>BIO DATA</title>
	 <style>
      table, th, td 
      {
      border: 1px solid black;
      }
     </style>
</head>



<body>
         <table>
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
         <!--<input type="button" name="userpass" value="UPDATE PASSWORD" onclick="window.location.href='updateusepass.php' ">-->
</body>
</html>
<?php } 
?>