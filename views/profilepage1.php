<?php 

require_once ('../config/database.php');
require_once ('../controller/profile_controlN.php');


if(isset($_SESSION['email'])){


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <title>profile</title>
	 <link rel="stylesheet" href="../resource/css/new_home.css">
	 <link rel="stylesheet" href="../resource/css/all.css">
	 <link rel="stylesheet" href="../resource/css/sidebar2.css">
	 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="../resource/css/profile1.css">
    <link rel="stylesheet" href="../resource/css/extra.css">
</head>

 <body>

 <?php 
  $level=$_SESSION['level'];
  $first_name=$_SESSION['first_name'];
  $last_name=$_SESSION['last_name'];
  $email=$_SESSION['email'];
  $address=$_SESSION['address'];
?>

<?php  if($_SESSION['level']=="food_supplier"){
                          $level_name = 'Food supplier';}

                elseif($_SESSION['level']=="boarder"){
                          $level_name = 'Boarder';}

                elseif($_SESSION['level']=="boardings_owner"){
                          $level_name = 'Boardings Owner';}

                elseif($_SESSION['level']=="administrator"){
                          $level_name = 'Administrator';}
                          else{
                          $level_name = 'User';}
  ?>

  <?php if(isset($_GET['error'])){
    $error=unserialize($_GET['error']);
    
    // imgerror($error);
  }
  $summary=unserialize($_GET['summary']);
    $summary1=$summary[0];
    $summary2=$summary[1];
    $summary3=$summary[2];
    // print_r($summary);
   
  ?>



 <?php require "header1.php"?>
	 <div class="container1">
     	
     <div class="container2">
        <div class="sidebar_b">
        <?php require "sidebar1.php"?>	
        </div>
        <div class="middle_b">
          <h1>Profile<a href="../controller/editprofile_control.php?editprofile=1"><button class="p_edit" name="p_edit" value="Edit"><i class="far fa-edit"></i>Edit</button></a></h1>
            <div class="mid_A">
                <h3>account Information</h3>
                <hr/>
                <div class="detail_table">

                <div class="list">
                  <p><div class="pr_th"><span>First Name</span></div><div class="pr_td" style="text-transform:capitalize;"> : <?php echo $first_name ?></div> </p>
                </div>
                <div class="list">
                  <p><div class="pr_th"><span>Last Name</span></div><div class="pr_td" style="text-transform:capitalize;">: <?php echo $last_name ?></div></p>
                </div>
                <div class="list">
                  <p><div class="pr_th"><span>Address</span></div><div class="pr_td">: <?php if(strlen(trim($_SESSION['email']))<=0){echo "None";} else {echo $_SESSION['address'];}?></div></p>
                </div>

                <?php if($_SESSION['level']=='boarder') {
                    //$Userdata=unserialize($_GET['user']);
                    $tele=unserialize($_GET['tele']);
                  
                  echo '
                <div class="list">
                  <p><div class="pr_th"><span>Contact </span></div><div class="pr_td">:'.$tele.'</div></p>
                </div>';} else{ echo '';} ?>

              
                <div class="list">
                  <p><div class="pr_th"><span>Email </span></div><div class="pr_td">: <?php echo $email?></div></p>
                </div>
                <div class="list">
                  <p><div class="pr_th"><span>User Type </span></div><div class="pr_td">: <?php echo $level_name ?></div></p>
                </div>
                </div>
            </div>
              <div class="mid_B">
                <div class="profile_photo">
                <?php  require_once ('../models/profile_modelN.php');
                      require_once ('../config/database.php');
                      $x=profile_modelN::getprofile_image($connection,$_SESSION['level'],$_SESSION['email']);
                      $img=mysqli_fetch_assoc($x);?>
                  <img src="<?php echo $img['profileimage'] ;?>" class="profile_img" alt="">
                  
                </div>
                <div class="prof_info">
                  <h2 style="text-transform:capitalize;"><?php echo $first_name .' '.$last_name?></h2>
                  <p style="text-transform:uppercase;"> <?php echo $level_name?></p>
                </div>


<!-- ******************summary dash board of the profile********************* -->
                
                <?php 
                if($_SESSION['level']=='student'){

                  echo '<div class="status">
                  <div class="statbox">
                    <div class="vertical_bar"></div>
                              <div class="info">
                                <div class="name">Requests</div>
                                <div class="num"><div>'.$summary1['requests'].'</div></div>
                              </div>
                    <div class="vertical_bar"></div>
                              <div class="info">
                                <div class="name">Accepted</div>
                                <div class="num"><div>'.$summary2['accepted'].'</div></div>
                              </div>
                    <div class="vertical_bar"></div>
                              <div class="info">
                                <div class="name">Notifications</div>
                                <div class="num"><div>'.$summary3['notification'].'</div></div>
                              </div>
                    <div class="vertical_bar"></div>
                  </div>
                </div>';

                }else if($_SESSION['level']=='boarder'){
                  
                    echo '<div class="status">
                    <div class="statbox">
                      <div class="vertical_bar"></div>
                                <div class="info">
                                  <div class="name">Due Payments</div>
                                  <div class="num"><div>'.round($summary1['diff']).'</div></div>
                                </div>
                      <div class="vertical_bar"></div>
                                <div class="info">
                                  <div class="name">Notifications</div>
                                  <div class="num"><div>'.$summary3['notification'].'</div></div>
                                </div>
                      <div class="vertical_bar"></div>
                                <div class="info">
                                  <div class="name">Current orders</div>
                                  <div class="num"><div>'.$summary2['delivaring'].'</div></div>
                                </div>
                      <div class="vertical_bar"></div>
                    </div>
                  </div>';

                }else if($_SESSION['level']=='boardings_owner'){

                  echo '<div class="status">
                  <div class="statbox">
                    <div class="vertical_bar"></div>
                              <div class="info">
                                <div class="name">New Requests</div>
                                <div class="num"><div>'.$summary1['newRequest'].'</div></div>
                              </div>
                    <div class="vertical_bar"></div>
                              <div class="info">
                                <div class="name">Boarders</div>
                                <div class="num"><div>'.$summary2['boarders'].'</div></div>
                              </div>
                    <div class="vertical_bar"></div>
                              <div class="info">
                                <div class="name">Notifications</div>
                                <div class="num"><div>'.$summary3['notification'].'</div></div>
                              </div>
                    <div class="vertical_bar"></div>
                  </div>
                </div>';

                }else if($_SESSION['level']=='food_supplier'){

                  echo '<div class="status">
                  <div class="statbox">
                    <div class="vertical_bar"></div>
                              <div class="info">
                                <div class="name">New Orders<br><br></div>
                                <div class="num"><div>'.$summary1['new_order'].'</div></div>
                              </div>
                    <div class="vertical_bar"></div>
                              <div class="info">
                                <div class="name"><center>Currently<br>Active Orders</center></div>
                                <div class="num"><div>'.$summary2['to_deliver'].'</div></div>
                              </div>
                    <div class="vertical_bar"></div>
                              <div class="info">
                                <div class="name">Notification<br><br></div>
                                <div class="num"><div>'.$summary3['notification'].'</div></div>
                              </div>
                    <div class="vertical_bar"></div>
                  </div>
                </div>';

                }else{
                  echo '';
                } 
                
                ?>
                
<?php } else {header('Location:../index.php');}?>

</br></br></br></br>
                </div>
              </div>
        </div>
        
    </div>

   </div>	
   <script>
    function imgerror($error) {
    alert($error);
    }
    </script>
	 
	 <script>
    // $('.btn').click(function(){
    //   $(this).toggleClass("click");
      $('.sidebar').toggleClass("show");
    // });
      $('.profile-btn').click(function(){
        $('nav ul .profile-show').toggleClass("show");
        $('nav ul .first').toggleClass("rotate");
      });
      $('.serv-btn').click(function(){
        $('nav ul .serv-show').toggleClass("show1");
        $('nav ul .second').toggleClass("rotate");
      });

      $('nav ul .open-show').toggleClass("show1");

      $('nav ul li').click(function(){
        $(this).addClass("active").siblings().removeClass("active");
      });
    </script>
</body>
</html>

    