<?php
session_start();

     function sentConDealAcc($BOEmail)
     {
      $first_name=$_SESSION['first_name'];
         $subject="Message from Boadima.lk Website";
         $headers  = 'MIME-Version: 1.0' . "\r\n";
         $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         $from="boadima7@gmail.com";
     // Create email headers
         $headers .= 'From: '.$from."\r\n".
         'Reply-To: '.$from."\r\n" .
         'X-Mailer: PHP/' . phpversion();
      
         $message='
        
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
	
    <style>
		*{
			padding: 0;
			margin: 0;
			font-family: "Poppins",sans-serif;
        }
        body{
            background-color: #8EE48f;
        }
    .container{
        width: 70%;
        margin: 0 auto;
        background-color:#5cdb95;
    }

    

     
  


.header{
    padding: 30px;
}
.wrapper{
    background-color: #379683;
}
.header h2{
    color: white;
}

.header h3{
    text-align: center;
    font-size: 32px;
    border-bottom: 2px solid black;

}
.content{
    padding:0 100px ;
    text-align: center;
    margin: 0 auto;
}
p{
    margin: 0 auto;
}
.footer{
    background-color: black;
    color: white;
    text-align: center;
    padding: 20px 0;
    margin: 0 auto;
   
}




	</style>
</head>
<body>
    <div class="container">
        <div class="wrapper">
        <div class="header">
            <h2>Bodima </h2>
            <h4>Hi '.$first_name.'</h4>
            <h3>Accepted Confirm Boarding Deal </h3>
        </div>
        </div>
        <div class="content">
           <div class="para"> <p>.
             <h4><b style="color: red">Congralulations!!</b> You Requested  <?php echo $city ?>     my boarding place.I liked to join you for new boarder.So I accepted your request. please Confirm Request soon.Please check details bodima.lk web site</h4></p></div>
          

            
        <div class="footer">
        <h4>Bodima @2020 all right received </h4>
    </div>
    </div>
    
</body>
</html>';
     
     mail("anugaya.alwis@gmail.com",$subject,$message,$headers);
     }



     function sentConDealRej($BOEmail)
     {
      $first_name=$_SESSION['first_name'];
         $subject="Message from Boadima.lk Website";
         $headers  = 'MIME-Version: 1.0' . "\r\n";
         $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         $from="boadima7@gmail.com";
     // Create email headers
         $headers .= 'From: '.$from."\r\n".
         'Reply-To: '.$from."\r\n" .
         'X-Mailer: PHP/' . phpversion();
      
         $message='
        
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
  
    <style>
    *{
      padding: 0;
      margin: 0;
      font-family: "Poppins",sans-serif;
        }
        body{
            background-color: #8EE48f;
        }
    .container{
        width: 70%;
        margin: 0 auto;
        background-color:#5cdb95;
    }

    

     
  


.header{
    padding: 30px;
}
.wrapper{
    background-color: #379683;
}
.header h2{
    color: white;
}

.header h3{
    text-align: center;
    font-size: 32px;
    border-bottom: 2px solid black;

}
.content{
    padding:0 100px ;
    text-align: center;
    margin: 0 auto;
}
p{
    margin: 0 auto;
}
.footer{
    background-color: black;
    color: white;
    text-align: center;
    margin-left:0;
    margin-right:0;
    margin-bottom:0;
    padding: 20px 0;
    
   
}




  </style>
</head>
<body>
    <div class="container">
        <div class="wrapper">
        <div class="header">
            <h2>Bodima </h2>
            <h4>Hi '.$first_name.'</h4>
            <h3>Confirm Deal Request is Rejected </h3>
        </div>
        </div>
        <div class="content">
           <div class="para"> <p>Thanks for your order. We prepare your order and  we will delivery you mentioned address <b>['.$first_name.']</b>. First follwing the instruction for payment for order.   </p></div>
            
        <div class="footer">
        <h4>Bodima @2020 all right received </h4>
        </div>
    </div>
    
</body>
</html>';
     
     mail("reshmikaediriweera1997@gmail.com",$subject,$message,$headers);
     }

?>