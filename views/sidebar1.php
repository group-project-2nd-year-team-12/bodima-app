



<?php if(isset($_SESSION['email']))
  { ?>
    <nav class="sidebar">
      <div class="profile_info">
      <?php  require_once ('../models/profile_modelN.php');
      require_once ('../config/database.php');
        $x=profile_modelN::getprofile_image($connection,$_SESSION['level'],$_SESSION['email']);
        $img=mysqli_fetch_assoc($x);?>

        <img src="<?php echo $img['profileimage'] ?>" class="profile_image" alt="">
        <div class="name_title"><h4></h4><?php echo $_SESSION['first_name'] ?></h4>
        
        <?php  if($_SESSION['level']=="food_supplier"){
                          echo '<span>Food Supplier</span>';}

                elseif($_SESSION['level']=="boarder"){
                            echo '<span>Boarder</span>';}

                elseif($_SESSION['level']=="boardings_owner"){
                            echo '<span>Boarding Owner</span>';}

                elseif($_SESSION['level']=="administrator"){
                            echo '<span>Administrator</span>';}
                          else{
                            echo '<span>User</span>';}
          ?>
       </div>
      </div>
     
      <ul>
        <li><a href="#">Home</a></li>
        <li class="active" >
            <a href="#" class="profile-btn">Profile
              <span class="fas fa-caret-down first"></span>
            </a>
            <ul class="profile-show">
              <li><a href="../controller/profile_controlN.php?profile=1">View Profile</a></li>
              <li><a href="../controller/editprofile_control.php?editprofile=1">Edit Profile</a></li>
            </ul>
        </li>
        

        <!-- ************************* boarding_owner **************************************************** -->
        <?php  if($_SESSION['level']=="boardings_owner")
          {?>
        <li>
          <a href="#" class="serv-btn"><i class="fas fa-home"></i>Request Manager
            <span class="fas fa-caret-down second"></span>
          </a>
          <ul class="serv-show">
            <li><a href="#">New Requests</a></li>
            <li><a href="#">New Boarder added</a></li>
            <li><a href="#">Add as New Boarder</a></li>
          </ul>
        </li>
        <li><a href="../controller/boarder_list_controlN.php?boarderlist=1"><i class="fas fa-users"></i>My Boarders</a></li>
        <li><a href="#"><i class="fas fa-print"></i>Print Reports</a></li>
        <li><a href="#"><i class="fas fa-puzzle-piece"></i>Post New Ad</a></li>
        <li><a href="#"><i class="fas fa-ad"></i>My Advertisements</a></li>
        <li><a href="#"><i class="fas fa-utensils"></i>Order Food</a></li>
        <li><a href="#"><i class="fas fa-hamburger"></i>My Order Manager</a></li>
        <?php
        }?>
        <!-- ********************************************************************************************** -->

        <!-- ************************** food_Supplier ***************************************************** -->
        <?php  if($_SESSION['level']=="food_supplier")
          {?>
        <li>
          <a href="#" class="serv-btn"><i class="fas fa-home"></i>Request Manager
            <span class="fas fa-caret-down second"></span>
          </a>
          <ul class="serv-show">
            <li><a href="#">New Order</a></li>
            <li><a href="#">Card Payment</a></li>
            <li><a href="#">Delivering Orders</a></li>
            <li><a href="#">Order History</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fas fa-puzzle-piece"></i>Post New Ad</a></li>
        <li><a href="#"><i class="fas fa-ad"></i>My Advertisements</a></li>
        
        <?php
        }?>


        <!-- ********************************************************************************************** -->

        <!-- ************************** Student ***************************************************** -->
        <?php  if($_SESSION['level']=="student")
          {?>
        
        <li>
          <a href="#" class="serv-btn"><i class="fas fa-home"></i>Request Manager
            <span class="fas fa-caret-down second"></span>
          </a>
          <ul class="serv-show">
            <li><a href="#">Pending Requests</a></li>
            <li><a href="#">Accepted Requests</a></li>
            <li><a href="#">Pay Advance and rent</a></li>
            <li><a href="#">Rented</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fas fa-plus-circle"></i>Boarding Request</a></li>
       
        <?php
        }?>


        <!-- ********************************************************************************************** -->
        <!-- ************************** boarder ***************************************************** -->
        <?php  if($_SESSION['level']=="boarder")
          {?>
        <li><a href="../controller/new_payment_Control.php?id=1"><i class="fas fa-home"></i>Pay Rent</a></li>
        <li>
          <a href="#" class="serv-btn"><i class="fas fa-dollar-sign"></i>My Payments
            <span class="fas fa-caret-down second"></span>
          </a>
          <ul class="serv-show">
            <li><a href="../controller/payment_history_controlN.php?id=1">History</a></li>
            <li><a href="../controller/new_payment_Control.php?id=1">New Payment</a></li>
          </ul>
        </li>
        
        <li><a href="#"><i class="fas fa-utensils"></i>Order Food</a></li>
        <li><a href="#"><i class="fas fa-hamburger"></i>My Order Manager</a></li>
        <li><a href="#"><i class="fas fa-home"></i>My Request Manager</a></li>
        
        <?php
        }?>


        <!-- ********************************************************************************************** -->

        <li><a href="../controller/logoutController.php">LogOut</a></li>
      </ul>
      </nav>

      <nav class="mobile_sidebar">
       <h1> mobile nav</h1>
      </nav>
  

  <?php 
  }?>

    