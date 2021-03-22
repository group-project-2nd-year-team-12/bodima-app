<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../resource/css/register.css">
    <link rel="stylesheet" href="../resource/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
	<title>Registration Form</title>
</head>
<body>
<div class="background-img"><img src="../resource/img/login3.jpg" alt=""></div>
<!-- <div class="para"><img src="../resource/img/logo1.png" alt=""></div> -->
<div class="container1">
    <div class="paragraph">
    <div class="para-img"><img src="../resource/img/logo1.png" alt=""></div>
        <?php if(isset($_GET['resend']))
        {?>
        <div class="resend">
            <div class="right"><i class="fa fa-check fg-lg"></i></div>
            <div class="letter"><h4>Confirmation resent! Check your email again.</h4></div>
        </div>
        <?php }?>
        <h3><i class="fa fa-envelope-open"></i> You've got a mail</h3>
         <h2><b>C</b>heck <b>Y</b>our <b>E</b>mail </h2>
        <p> We just sent you a confirmation link to <span style="color:#101e5a;"><?php echo $_GET['email']; ?></span>  check your emails and verify your email address by clicking the confirm link in the email.</p>

        <!-- <div class='emailerror'>Do you want to resend the email :</div> -->
    <form action="../controller/registerCon.php" method="post">
        <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" >
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>" >
        <input type="hidden" name="level" value="<?php echo $_GET['level']; ?>" >
        <button type="submit" name="resend" id='resend' >Resend Confirmation Email </button>
    </form>
    </div>
</div>
</body>
</html>