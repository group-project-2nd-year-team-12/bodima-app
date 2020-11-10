<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../resource/css/footer.css">
    <link rel="stylesheet" href="../resource/css/all.css">
    <link rel="stylesheet" href="../resource/css/nav.css">
    <link rel="stylesheet" href="../resource/css/contact.css">
</head>
<body>
    <?php include "nav.php" ?>
    <div class="container">
        <div class="content">
            <div class="titile-contact">
                <h1>Contact Us</h1>
                <h4 style="margin-left: 20px;margin-top:20px ;color:gray">We'are hear to help</h4>
            </div>
            <div class="item-contact">
                <div class="box-1">
                  <i class="fas fa-phone-alt fa-4x"></i>
                  <h3>Contact with phone
                        <span><i class="fas fa-phone-alt fa-lg"></i></span>
                  </h3>
                  
                </div>
                <div class="box-2">
                    <i class="fas fa-envelope fa-4x"></i>
                    <h3>Contact with email
                        <span><i class="fas fa-envelope fa-lg"></i></span>
                    </h3>
                </div>
                <div class="box-3">
                    <i class="fas fa-comments fa-4x"></i>
                    <h3>Send message to us
                        <span><i class="fas fa-comments fa-lg"></i></span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="contact call">
            <i class="fas fa-times fa-lg"></i>
            <h2>Contact with following Phone number</h2>
            <h4>Active time period (8.00 AM to 5.00 PM)</h4>
            <h1>+94011XXXXXXXX</h1>
        </div>
        <div class="contact email">
            <i class="fas fa-times fa-lg"></i>
            <h2>Contact us with Email</h2>
            <form action="#" id="form">
                <div class=" mail-details">
                    <input type="text" placeholder="Name">
                    <input type="email" placeholder="Email">
                </div>
               <div class="infor"> <textarea coloum="10" from="form"  placeholder="Message" ></textarea></div>
               <div class="submit"> <input type="submit" name="submit" value="Submit"></div>
            </form>
        </div>
        <div class="contact message">
            <i class="fas fa-times fa-lg"></i>
            <h2>Live support</h2>
            <div class="chat">
                <h5>Hi, How can i help you ?</h5>
                
            </div>
            <div class="form">
                <form action="#">
                    <input type="text" placeholder="Type a message">
                    <button type="submit"  ><i class="fas fa-paper-plane"></i></button>
                </form>
                </div>
        </div>
    </div>
 
</body>
<script src="../resource/js/home1.js"></script>
    <script src="../resource/js/contact.js"></script>
    <script src="../resource/js/jquery.js"></script>
</html>