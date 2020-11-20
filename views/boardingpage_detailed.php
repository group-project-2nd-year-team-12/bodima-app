<?php   require_once ('../config/database.php');
        require_once ('../models/advertisement_model.php');
        session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resource/css/nav.css">
    <link rel="stylesheet" href="../resource/css/footer.css">
    <link rel="stylesheet" href="../resource/css/all.css">
    <link rel="stylesheet" href="../resource/css/boardingpage_detailed.css">
  
    <title>Boarding details</title>
</head>
<body>
<div class="page_boarding">
   
<?php include 'nav.php' ?>


    <div class="box_outer">
        <div class="col-7 main">
            <div class="inner_main">
                <h2>GIRLS' BOARDING IN KOTTAWA</h2>
                <span>posted by: Rohini Weerasinghe - Nov 19, 2020</span>
                <img runat = 'server' src = '../resource/Images/uploaded_boarding/3.jpg' />
                <h4>Details</h4>
                <hr />
                <div class="details">
                        <li>Category    : individual</li>
                        <li>rent for    : girls</li>
                        <li>Description : near to university of Moratuwa</li>
                </div>

                <h4>payment details</h4>
                <hr />
                <div class="details">
                        <li>Monthly rental (per person)    : Rs. 6000</li>
                        <li>keymoney    : Rs. 6000</li>
                        <li>extra details : food will not be provided<br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        water and current bill will be included for rent</li>
                </div>
            
            </div>
        </div>
        <div class="col-5 right">
            <div class="inner_right">
                <h2 class="price">Rs. 6,000</h2>
                <hr>
                    <div class="expandable">
                        <button class="collapsible">
                        <i class="fas fa-map-marked-alt"></i>
                            44, Wijayawardhana Rd., Kottawa.</button>
                        <div class="content">
                        
                        <div class="mapouter">
                            <div class="gmap_canvas">
                            <iframe width="500" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=dharmapala%20widyalaya%2Ckottawa&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                <a href="https://www.whatismyip-address.com/divi-discount/"></a>
                            </div>
                            <style>
                                .mapouter{position:relative;text-align:right;height:300px;width:500px;}
                                .gmap_canvas {overflow:hidden;background:none!important;height:300px;width:500px;}
                            </style>
                        </div>
                        
                        </div>
                        <button class="collapsible">Request<input id='demo' class='btn6request' type='submit' value='Request'></button>
                        <div class="content">
                        <textarea rows="4" cols="30" name="comment" form="usrform" placeholder="type your massage here. . ."></textarea>
                        <input id='demo' class='btn6request' type='submit' value='Send Request' style='float:right;'>
                        </div>
                        <button class="collapsible">Open Section 3</button>
                        <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
            </div>
        </div>
</div>


<?php include 'footer.php' ?>
</div>
</body>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
<script src="../resource/js/home1.js"></script>
<script src="../resource/js/jquery.js"></script>
</html>