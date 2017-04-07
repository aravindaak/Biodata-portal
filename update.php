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
$query1=mysqli_query($db,"SELECT name,maritalstatus,phonenumber,bio,image FROM biodata where username='$username' and password='$password'");
   $r=mysqli_fetch_object($query1);
   if(count($r))
   {
   ?>        
    <!DOCTYPE html>
    <html>
    <head>
    	<title></title>
    </head>
    <body>
    
   
              <form action="" method="post" enctype="multipart/form-data">
               
               <div class="field">
               <label for="name">NAME:</label>
               <input type="text" name="name" id="name" autocomplete="off" value=<?php echo escape($r->name)?>  >
               </div>

               <div class="field">
               <label for="ms">MARITAL STATUS:</label><br>
               <input type="radio" name="ms" <?php if($r->name="Married"){  ?> checked <?php } ?> id="ms" >Married<br>
               <input type="radio" name="ms" <?php if($r->name="Single"){  ?> checked <?php } ?>  id="ms" >Single
               </div>

               <div class="field">
               <label for="pn">PHONE NUMBER:</label>
               <input type="text" name="pn"  id="pn" value=<?php echo escape($r->phonenumber) ?> autocomplete="off">
               
               </div>

               <div class="field">
               <label for="bio">BIO:</label>
               <textarea name="bio" id="bio" value=<?php echo escape($r->bio) ?> ></textarea>
               </div>

               <div >Select image to upload:
               <input type="file" name="image">
               </div>
             
           
               <input type="submit" name="update" value="UPDATE">      
            </form>


 </body>
    </html>

   <?php
}

  if(!empty($_POST['update']))
  { if(isset($_POST['name'],$_POST['ms'],$_POST['pn'],$_POST['bio']))
    
     {  
   	  $name=trim($_POST['name']);
      $ms=trim($_POST['ms']);
      $pn=trim($_POST['pn']);
      $bio=trim($_POST['bio']);
      if(!empty($_POST['image']))
      {$image="images/".basename($_FILES['image']['name']);
      move_uploaded_file($_FILES['image']['tmp_name'], $image);
      $query="UPDATE biodata SET name='$name',maritalstatus='$ms',phonenumber='$pn',bio='$bio',image='$image' where username='$username' and password='$password'";
      }
      else {$query="UPDATE biodata SET name='$name',maritalstatus='$ms',phonenumber='$pn',bio='$bio' where username='$username' and password='$password'";}
  
    if(mysqli_query($db,$query)===TRUE)
         {
          
       header('location:main1.php');
          } 
      }
    else                                                                                                  
         {echo "Input data in every field";}
   
  
 }
 


?>