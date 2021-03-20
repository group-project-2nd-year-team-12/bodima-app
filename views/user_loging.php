<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../resource/css/login.css">
	<link rel="stylesheet" type="text/css" href="../resource/css/all.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
	<title>Login form</title>
</head>
<body>

	<?php if(isset($_GET['login'])){ ?>
	<div class="resend">
        <div class="right"><i class="fas fa-exclamation-circle fa-2x"></i></div>
        <div class="letter"><h4>Please login first to access this feature</h4></div>
	</div>
	<?php } ?>
	

<div class="big-box">
			<!-- login left side box -->
			<div class="discrip">
				<div style="width: 650px;height:480px;"><img  style="width:650px;height:480px;" src="../resource/img/boardingPost.jpg" ></div>
				<div class="welcome">
					<h1>Welcome To Bodima</h1>
				</div>
			</div>
			<!-- login right side box -->
			<div class="login">
			<div class="profile"><img src="../resource/img/logo1.png" ></div>
			<h1 style="text-align:center">User Login!</h1>
				<form action="../controller/logingController.php" method="post">
					<?php if(isset(($_GET['errors'])))
					{
						echo "<p class='error'>Invalid Username / Password</p>";
					} ?>
				
					<p>Username</p>
					<!-- amal methana bn type eka email enna one-->
					<input type="text" name="username" placeholder="Enter Email Address" >
					<p>Password</p>
					<input type="password" name="password" placeholder="Enter Password">
					<a href="user_forgot_password.php" style="float: right;font-weight: bolder; font-size:15px;color:#101e5a;">Forget Password ?</a>
					<input type="submit" name="submit" value="Login">
					
					<p style="font-weight: bolder; font-size:15px;color:#101e5a;">Don't have an account ? <a style="color:#5d80b6;"  href="register.php"> Sign Up</a></p>

				</form>
			</div>
</div>

<?php
if(isset($_SESSION['email']))
{?>
	<div class="longTerm">
    <div class="longTerm-box">
        <div class="accHeader">
            <h1>Confirm logout</h1>
            <h3 style="margin-top: 15px;margin:0 10px">You are already logged in as <b><?php echo $_SESSION['first_name'] ?></b>. You need to log out ?</h3>
        </div>
        <div class="btn-long">
          <button class="active" onclick="window.location='../controller/logoutController.php'" id="accept-btn" >Log out</button>
          <button class="cancel" onclick="window.location='../index.php'">Cancel</button>
        </div>
    </div>
  </div>
<?php }
?>
</body>
</html>