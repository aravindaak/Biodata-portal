

<!DOCTYPE html>
<html>
<head>
	<title>REGISTER</title>
	 <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>


<div class="container-fluid">
     <div class="right">
          <a href="profile.html" class="homebtn link1" role="button">Home</a>
          <a href="login.php" class="regbtn link1" role="button">Login</a>
          
     </div>
     </div>

     <div class="container">
          <div class="row">
               <div class="col-sm-3"></div>
               <div class="col-sm-6">
                    <div class="form-box">
                         <div class="form-head">
                              <p class="website">WEBSITE</p>
                         </div>

                         <div class="form-bottom">
                              <form role="form" action="" method="post" id="regform" enctype="multipart/form-data">
                                   <div class="row">
                                        <div class="form-group col-sm-6">
                                             <label  for="name">Name:</label>
                                        <div>
                                             <input type="text" name="name" class="firstname form-control" id="name" >
                                        </div>
                                   </div>

                                    <div class="form-group col-sm-6">
                                    <label  for="dob">Birthday:</label>
                                    <div ><input type="date" name="dob" class="birthday form-control" id="dob"></div>
                                   </div>


                                   <div class="form-group col-sm-6">
                                        <label  for="sex">Gender:</label>
                                        <div >
                                   <div class="row">
                                   <div class="col-sm-3"><label class="radio-inline" for="male"><input type="radio" name="sex" value="male" id="male">Male</label></div>
                                   <div class="col-sm-4"><label class="radio-inline" for="female"><input type="radio" name="sex" value="female" id="female">Female</label></div>
                                   <div class="col-sm-3"><label class="radio-inline" for="other"><input type="radio" name="sex" value="other" id="other">Other</label></div>
                                   </div>
                                </div>
                                   </div>



                                   <div class="form-group col-sm-6">
                                        <label  for="ms">Relationship Status:</label>
                                        <div >
                                   <div class="row">
                                   <div class="col-sm-4"><label class="radio-inline" for="single"><input type="radio" name="ms" value="single" id="single">Single</label></div>
                                   <div class="col-sm-4"><label class="radio-inline" for="married"><input type="radio" name="ms" value="married" id="married">Married</label></div>
                                   </div>
                                   </div>
                                   </div>


                                   

                                   <div class="form-group col-sm-12">
                                        <label  for="pn">Mobile Phone:</label>
                                    <div><input type="number" name="pn" class="phone form-control" id="pn"></div>
                                   </div>
                                                                     

                                   <div class="form-group col-sm-12">
                                        <label  for="bio">About me:</label>
                                        <div ><textarea name="bio" class="form-control" value="bio" id="bio"></textarea></div>
                                   </div>

                                   

                                   <div>
                                        Select image to upload:
                                   <input type="file" name="image">
                                   </div>

                                   <div class="form-group col-sm-6">
                                        <label  for="un">Username:</label>
                                    <div ><input type="text" name="un" class="username form-control" id="un"></div>
                                   </div>


                                   <div class="form-group col-sm-6">
                                        <label  for="pass">Password:</label>
                                    <div ><input type="password" name="pass" class="password form-control" id="pass"></div>
                                   </div>

               
                                   <div class="form-group col-sm-12">
                                   
                                   <div><input type="submit" class="form-control submit" value="Create my Profile" name="submit"></div>
                                   </div>
                                   

                                   </div>


                              
                         </div>
                         
                    
                    
               </div>
               
          </div>
          
     </div>





















<!--

            <form action="" method="post" enctype="multipart/form-data">
               <div class="field">
               <label for="name">NAME:</label>
               <input type="text" name="name" id="name" autocomplete="off">
               </div>

               <div class="field">
               <label for="dob">DATE OF BIRTH:</label>
               <input type="DATE" name="dob" id="dob" autocomplete="off">
               </div>

               <div class="field">
               <label for="sex">SEX:</label><br>
               <input type="radio" name="sex" value="Male" id="sex" >Male<br>
               <input type="radio" name="sex" value="Female" id="sex" >Female<br>
               <input type="radio" name="sex" value="Other" id="sex" >Other
               </div>

               <div class="field">
               <label for="ms">MARITAL STATUS:</label><br>
               <input type="radio" name="ms" value="Married" id="ms" >Married<br>
               <input type="radio" name="ms" value="Single" id="ms" >Single
               </div>

               <div class="field">
               <label for="pn">PHONE NUMBER:</label>
               <input type="text" name="pn"  id="pn" autocomplete="off">
               
               </div>

               <div class="field">
               <label for="bio">BIO:</label>
               <textarea name="bio" id="bio"></textarea>
               </div>

               <div class="field">
               <label for="un">USERNAME</label>
               <input type="text" name="un"  id="un" autocomplete="off">
               </div>
              
               <div class="field">
               <label for="pass">PASSWORD:</label>
               <input type="text" name="pass"  id="pass" autocomplete="off">
               </div>

               <div>Select image to upload:
               <input type="file" name="image">
               </div>

               <input type="submit" name="submit1" value="SUBMIT">-->
             </form>




<?php
//error_reporting(0);
require 'db.php';
require 'security.php';

if(!empty($_POST))
{
	if(isset($_POST['name'],$_POST['dob'],$_POST['sex'],$_POST['ms'],$_POST['pn'],$_POST['bio'],$_POST['un'],$_POST['pass']))
  {
		
                    
      $target="images/".basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], $target);
			
		
		$name= trim($_POST['name']);
		$dob= trim($_POST['dob']);
		$sex= trim($_POST['sex']);
		$ms= trim($_POST['ms']);
		$pn= trim($_POST['pn']);
		$bio= trim($_POST['bio']);
          $username=trim($_POST['un']);
          $password=trim($_POST['pass']);
		if(!empty($name) && !empty($dob) && !empty($sex) && !empty($ms) && !empty($pn) && !empty($bio) && !empty($username) && !empty($password))
    {
			$insert=$db->prepare("INSERT INTO biodata(name,dob,sex,maritalstatus,phonenumber,bio,image,username,password) VALUES(?,?,?,?,?,?,?,?,?)");
			$insert->bind_param("sssssssss", $name, $dob,$sex,$ms,$pn,$bio,$target,$username,$password);
			if($insert->execute())
      {
				?><div class="col-sm-12" style= ' color: white; font-size: 20px; font-family: Verdana; text-align: center;'>Registration successful! Login to Enter</div>";
				<input type="button" name="Log" class="col-sm-2 lgn" value="LOGIN" onclick="window.location.href='login.php'" ><?php 
                   
		  
	    }
    }
 } 
 else {?>
    <div class="col-sm-12" style= ' color: white; font-size: 20px; font-family: Verdana; text-align: center;'> Please Enter correct values in all the fields!</div> <?php
      }
}

?>
</body>
</html>
