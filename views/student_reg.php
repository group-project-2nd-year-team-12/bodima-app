<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../resource/css/register.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
	<title>Registration Form</title>
	
</head>
<body>
<div class="background-img1"><img src="../resource/img/boarder.png" alt=""></div>
<div class="logo"><img src="../resource/img/logo1.png" alt=""></div>
<div class="container">
	<div class="para">
			<h1><b>U</b>ser <b>R</b>egistration</h1>
			<h2 style="text-align: center">Student</h2>
			<p style="text-align: center"> <span>Hey there!</span> Welcome to Bodima Platform. Explore our facilities. <span>Click Register</span> to find best places just in seconds. Now Sri Lanka's <span>best boardings</span> are at your fingertips!</p>
	</div>
	<div class="register">
		   <form method="post" id="studentReg">
		   		<p>Password <span class="error" id="passError"></span></p>
		   		<input type="password" id="password" name="password" placeholder="Enter Password">
		   		<p>Confirm Password <span class="error" id="cpassError"></span></p>
		   		<input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
				<h6>*Password must contain least one uppercase lowercase and number</h6>
		   		<div class="agreement">
					<div class="term"><b>Term and condition</b></div> 
					<textarea name="aggrement" id="1" cols="10" rows="10">
1. This is a Web platform for finding boarding places.We do not assure you about your sensitive information(ex: creadit card details). Please create a payhere account before you making online payments.
2. We will use your location information to provide you better experience. We do not store any searching information or location information in our platform.
					</textarea>
            	</div>
            	<div class="check">
                 	<input id="check"  type="checkbox" name="check">
                 	<div class="agree"> I am agree with term and condition</div> 
            	</div>
		   		<input type="hidden" id="email" name="email" value="<?php echo $_GET['email']; ?>">
		   		<input type="hidden" id="first_name" name="first_name" value="<?php echo $_GET['first_name']; ?>">
		   		<input type="hidden" id="last_name" name="last_name" value="<?php echo $_GET['last_name']; ?>">
		   		<input type="hidden" id="nic" name="nic" value="<?php echo $_GET['nic']; ?>">
		   		<input id="register" type="submit" name="register_student" value="Register">
		   </form>
	</div>
</div>

</body>
<script src="../resource/js/jquery.js"></script>
<script src="../resource/js/student_reg.js"></script>
<script src="../resource/js/checkAgree.js"></script>
</html>