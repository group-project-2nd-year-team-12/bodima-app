
<!DOCTYPE html>
<html>
<head>
	<title>Bodima</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../resource/css/forgot1.css">
<body >
<div class="image" ><img  style="width:650px; z-index:-100" src="../resource/img/newPassword.png" alt=""></div>
 <div class="container">
	 <div class="para">
	     <h1><b>N</b>ew <b>P</b>assword</h1>
	 </div>
	 <div class="new">
	 <div class="para-img"><img src="../resource/img/logo1.png" alt=""></div>
    <div class="header-wrapper">
		<div class="head" style="margin-bottom: 10px;"><h1>Reset password </h1></div>
	</div>
	<div >
	<form id="resetForm" method="POST" class="feild-pa">
			<label for="password">Password : <span class="error" id="passError"></label>
			<input type="password" name="password" id="password" placeholder="Password" >
            <label for="Confirm Password">Confirm Password :<span class="error" id="contError"></label>
            <input type="Password" name="confirmpassword" id="confirmpassword" placeholder="Password" >
			<h6 style="text-align:left;color:#101e5a">*Password must contain least one uppercase lowercase and number</h6>	
			<input type="submit" name="submit" value=" Save Changes ">
		</form>
	</div>
</div>
</body>
<script src="../resource/js/jquery.js"></script>
<script src="../resource/js/newPassword.js"></script>
</html>