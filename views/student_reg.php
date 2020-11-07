<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../resource/css/register.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
	<title>Registration Form</title>
	
</head>
<body class="body1">
	<div class="container">
	<div class="para">
			<h1><b>U</b>ser <b>R</b>egistration</h1>
			<p> Hey there! Welcome to Bodima Platform. Explore our facilities. Click Register to find best places just in seconds. Now Sri Lanka's best boardings are at your fingertips!</p>
	</div>
	<div class="register">
	   <?php
	   if(isset($_GET['param']))
	   {
		   $errors=$_GET['param'];
		   foreach($errors as $error)
		   {
			   echo '<p class="error"><b>'.$error.'</b></p>';
		   }
	   }
	 
	 ?>
		   <form action="../controller/registerCon.php" method="post">
		   <p>Password</p>
		   	<input type="password" name="password" placeholder="Enter Password">
		   	<p>Confirm Password</p>
		   	<input type="password" name="confirmpassword" placeholder="Confirm Password">
		   <div class="agreement">
                     <div class="term"><b>Term and condition</b></div> 
					<textarea name="aggrement" id="1" cols="10" rows="9">
1. This is a Web platform for finding boarding places.We do not assure you about your sensitive information(ex: creadit card details). Please create a payhere account before you making online payments.
2. We will use your location information to provide you better experience. We do not store any searching information or location information in our platform.
					</textarea>
            </div>
                            
            <div class="check">
                 <input id="check"  type="checkbox" name="check">
                 <div class="agree"> I am agree with term and condition</div> 
                 
            </div>
		   
		   	<input id="register" type="submit" name="register_student" value="Register">
		   </form>
	</div>
	</div>
	<script src="../resource/js/main.js"></script>
</body>
</html>