<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../resource/css/register.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
	<title>Registration Form</title>
</head>
<body>
<div class="background-img1"><img src="../resource/img/bording_owner.png" alt=""></div>
<div class="logo"><img src="../resource/img/logo1.png" alt=""></div>
<div class="container">
	<div class="para">
		<h1><b>U</b>ser <b>R</b>egistration</h1>
		<h2 style="text-align: center">Boarding Owner</h2>
		<p style="text-align: center"> Hey there!  Welcome to bodima platform. You are in the <b>most famous boarding Advertising and renting platform</b>. Congratulations for your journey with us!  </p>
	</div>
	<div class="register">
		<form id="boardingReg" method="post">
			<p>Address <span class="error" id="addError"></p>
			<input type="text" id="address" name="address" placeholder="eg : 310/delgasduwa/dodanduwa">

			<p>Merchant ID <span class="error" id="merError"></p>
			<input type="text" id="merchant"  name="merchant" placeholder="Enter Payhere Merchant ID">
				
			<p>Password <span class="error" id="passError"></p>
			<input type="password" id="password" name="password" placeholder="Enter Password">

			<p>Confirm Password <span class="error" ></p>
			<input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">

			<div class="agreement">
				<div class="term"><b>Term and condition</b></div> 
				<textarea name="aggrement" id="1" cols="30" rows="5">
1. This is a Web platform for Adverting boarding places. We do not assure you about your sensitive information(ex: credit card details). Please create a pay here account before you making online payments.
2. We will use your location information to provide you a better experience. We do not store any searching information or location information on our platform.	
				</textarea>
			</div>
			<div class="check">
				<input id="check"  type="checkbox" name="check">
				<div class="agree"> I am agree with term and condition</div> 
			</div>
			<input type="hidden" id="email" name="email" value="<?php echo $_GET['email'];?>">
			<input type="hidden" id="first_name" name="first_name" value="<?php echo $_GET['first_name'];?>">
			<input type="hidden" id="last_name" name="last_name" value="<?php echo $_GET['last_name'];?>">
			<input type="hidden" id="nic" name="nic" value="<?php echo $_GET['nic'];?>">
			<input id="register" type="submit" name="register" value="Register">
		</form>
	</div>
</div>
</body>
	<script src="../resource/js/jquery.js"></script>
	<script src="../resource/js/boarding_owner.js"></script>
	<script src="../resource/js/checkAgree.js"></script>
</html>