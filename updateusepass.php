<?php
//error_reporting(0);
require 'db.php';
require 'security.php';
session_start();
if(!$_SESSION['bio'])
{
   header('location:login.php');
}
$username=$_SESSION['username'];
$password=$_SESSION['password'];
?>




      <form action="" method="post">

                <div class="field">
               <label for="passw">NEW PASSWORD:</label>
               <input type="text" name="passw" id="passw" autocomplete="off">
               </div>
               <input type="submit" name="update1" value="UPDATE">
      </form>

<?php
 
      
      if(!empty($_POST['update1']))
      {
         if(isset($_POST['passw']))
         {
        
         $pass=trim($_POST['passw']);
          
         $query="UPDATE biodata SET password='$pass' where username='$username'";
         
         if(mysqli_query($db,$query)===TRUE)
            {echo "Password successfully changed";
              ?><input type="button" name="back" value="GO BACK" onclick="window.location.href='main1.php'"> <?php
            }
         }
            else{echo "Input data in field";}
         
      }
      else{echo "Click on update";}
   

?>