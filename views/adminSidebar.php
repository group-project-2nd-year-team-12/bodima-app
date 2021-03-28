<!-- admin side bar -->
<head>
    <link rel="stylesheet" href="../resource/css/liveSupport.css">
    <script src="../resource/js/jquery.js"></script>
    <script src="../resource/js/liveSupport.js"></script>

</head>
<div class="nav">
            <div class="orderM">
                <img src="https://img.icons8.com/color/48/000000/data-configuration.png"/>
                <h3>Administrator</h3>
            </div>
            <h2 class="title"><i class="fa fa-cogs"></i>Dash Board</a></h2>
            <ul>
                <div id="dash">
                    <li><div><i class="fa fa-cogs"></i><a href="../controller/adminPanelCon.php?admin"> Dash Board</div> </li>
                    <div class="item">
                    <a href="#"></a>
                    </div>
                </div>
                <div class="element1" id="user">
                    <li><div><i class="fa fa-user-friends"></i> Users</div> <i class="fa fa-chevron-down"></i></li>
                    <div class="item">
                        <a href="adminStudent.php">Students <i class="fa fa-caret-right"></i></a>
                        <a href="adminBorder.php">Boarders <i class="fa fa-caret-right"></i></a>
                        <a href="adminboardingOwner.php">Boarding Owners <i class="fa fa-caret-right"></i></a>
                        <a href="adminFoodsupplier.php">Food Suppliers <i class="fa fa-caret-right"></i></a>
                    </div>
                </div >
              
                <div class="element2" id="food">
                    <li><div><i class="fa fa-hamburger"></i> Food Posts</div> <i class="fa fa-chevron-down"></i></li>
                    <div class="item">
                        <a href="adminFoodPost.php">Posts <i class="fa fa-caret-right"></i></a>
                    </div>
                </div>
                <div class="element3" id="boarding">
                    <li><div><i class="fas fa-laptop-house"></i> Boarding Posts</div> <i class="fa fa-chevron-down"></i></li>
                    <div class="item">
                        <a href="adminBoardingPost.php">Posts <i class="fa fa-caret-right"></i></a>
                    </div>
                </div>
                <div class="element4" id="report">
                    <li><div><i class="fas fa-file-pdf"></i> Reports</div> <i class="fa fa-chevron-down"></i></li>
                    <div class="item">
                        <a href="adminReports.php">Data reports <i class="fa fa-caret-right"></i></a>
                    </div>
                </div>
                <!-- <div class="element5" id="bill">
                    <li><div><i class="fas fa-file-pdf"></i>settings</div> <i class="fa fa-chevron-down"></i></li>
                    <div class="item">
                        <a href="#">Posting income <i class="fa fa-caret-right"></i></a>
                        <a href="#">Transaction <i class="fa fa-caret-right"></i></a>
                    </div>
                </div> -->
                <a href="../index.php"><li>Web Site <i class="fa fa-chevron-right"></i></li></a>
                <a href="../controller/logoutController.php" id="complaint"><li><div>Log Out</div> <i class="fa fa-angle-double-right"></i></li></a>
               
            </ul>
</div>

<!-- live support  -->
<?php include ("liveSupport.php"); ?>

