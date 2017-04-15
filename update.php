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
    	<title>Update Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="update.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    
    <body>

    <div class="container-fluid">
     <div class="right">
          <a href="main.php" class="cancel link1" role="button">Cancel</a>
          
     </div>
     </div>

          <div class="container">
          <div class="row">
               <div class="col-sm-3"></div>
               <div class="col-sm-6">
                    <div class="form-box">

                         <div class="form-bottom">
                              <form action="" method="post" enctype="multipart/form-data">
                                   <div class="row">
                                        <div class="form-group col-sm-12">
                                             <label  for="name">Name:</label>
                                        <div>
                                             <input type="text" name="name" class="firstname form-control" id="name" autocomplete="off" value=<?php echo escape($r->name)?>  > 
                                        </div>
                                   </div>


                                   <div class="form-group col-sm-6">
                                        <label  for="ms">Relationship Status:</label>
                                        <div >
                                   <div class="row">
                                   <div class="col-sm-4"><label class="radio-inline" for="single"><input type="radio" name="ms" <?php if($r->name="Single"){  ?> checked <?php } ?> value="single" id="single" >Single</label></div>
                                   <div class="col-sm-4"><label class="radio-inline" for="married"><input type="radio" name="ms" <?php if($r->name="Married"){  ?> checked <?php } ?> value="married" id="married">Married</label></div>
                                   </div>
                                   </div>
                                   </div>


                                   

                                   <div class="form-group col-sm-6">
                                        <label  for="pn">Mobile Phone:</label>
                                    <div><input type="number" name="pn" class="phone form-control" id="pn" value=<?php echo escape($r->phonenumber) ?> autocomplete="off"></div>
                                   </div>
                                                                     

                                   <div class="form-group col-sm-12">
                                        <label  for="bio">About me:</label>
                                        <div ><input type="textarea" name="bio" class="form-control" id="bio" class="form-control" value=<?php echo escape($r->bio) ?> > </div>
                                   </div>

                                   

                                   <div class="form-group col-sm-12">
                                        <label for="image">Select image to upload:</label>
                                   <div><input type="file" name="image" class="photo" id="image"></div>
                                   </div>

                                                  
                                   <div class="form-group col-sm-12">                                   
                                   <div><input type="submit" class="form-control submit" value="Update Profile" name="update"></div>
                                   </div>
                                   

                                   </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </body>
            </html>

    
   
             <!-- <form action="" method="post" enctype="multipart/form-data">
               
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
               <input type="text"  name="bio" id="bio" value=<?php echo escape($r->bio) ?> autocomplete="off" >
               </div>

               <div >Select image to upload:
               <input type="file" name="image">
               </div>
             
           
               <input type="submit" name="update" value="UPDATE">      
            </form> -->



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
          ?>
         <div class="col-sm-12" style= ' color: white; font-size: 20px; font-family: Verdana; text-align: center;'>Data Updated!</div>
         <?php
          } 
      }
    else                                                                                                  
         {echo "Input data in every field";}
   
  
 }
 


?>
