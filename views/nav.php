<div class="container" id="container">
        <div class="header">
            <div class="logo">
                <h1><b style="color: rgb(13, 13, 189)">B</b>odima<small style="font-size: 14px; color:rgb(13, 13, 189);">   Solution for many problem</small></h1>
            </div>
            <div class="sign">
                <?php if(!isset($_SESSION['email'])){echo '<a href="../controller/logingController.php?click1">Sign In <i class="fa fa-sign-in-alt"></i></a>';}?>
                <?php if(isset($_SESSION['email'])){ 
                    if($_SESSION['level']=='administrator'){echo '<a href="../controller/adminPanelCon.php?admin"> Dash Board &nbsp</a>'; }
                    ?>

                    <div class="notification"><i class="fa fa-bell"></i></div>
                    <div class="profile"><a href="profilepage.php"> <i  class="fa fa-user-circle"></a></i></div>
                <?php
                    echo '<div class="user">Hi '.$_SESSION['first_name'].'</div>'; 
                    echo '<a href="../controller/logoutController.php">Sign out <i class="fa fa-sign-out-alt"></i></a>';}
                ?> 
                
            </div>
        </div>
        <div class="nav">
            <ul class="nav_bar">
                <div class="burger">
                        <div>
                            <div class="line1"></div>
                            <div class="line2"></div>
                            <div class="line3"></div>
                        </div>
                </div>
                <li class=" nav_item "><a href="../index.php"><i class=" fa fa-home"></i>Home</a></li>
                <li class="nav_item "><a href="boardings.php"><i class="fa fa-bed"></i> Boardings</a></li>
                <li class="nav_item "><a href="foodposts.php"><i class="fas fa-hamburger"></i> Order Foods</a></li>
                <li class="nav_item "><a href="../views/about.php "><i class="fa fa-address-card"></i> About us</a></li>
                <li class="nav_item "><a href="# "><i class="fa fa-address-book"></i> Contact Us</a></li>
            </ul>
            <div class="slide-nav">
            <ul><?php if(isset($_SESSION['email'])){?> 
                    <li onclick="window.location='profilepage.php'">Profile</li>

                    <li>Chat</li>
                    <?php if($_SESSION['level']=='food_supplier'){?>
                        <li onclick='window.location="orders.php"'>Orders </li>
                       
                   <?php } ?>
                    <?php if($_SESSION['level']=='boardings_owner'){?>
                        <li onclick='window.location="ConBODealIshan.php"'>Confirm Deal </li>
                        <li onclick='window.location="TBOReqIshan.php"'>Request</li>
                   <?php } ?>
                    <li onclick="window.location='../controller/logoutController.php'">Log out</li>
                <?php } else{?>
                    <h4>Plase sign in first to system.</h4>
                        <h3 class="nav-sign" onclick="window.location='user_loging.php'">Sign in </h3>
                        
                <?php } ?>
                </ul>
        </div>
        </div>