<?php
require_once ('../controller/adminPanelCon.php');
require_once ('../config/database.php');
require_once ('../models/adminModel.php');
session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resource/css/all.css">
    <link rel="stylesheet" href="../resource/css/admin.css">
    <title>Document</title>
</head>
<body onload="checked('user')">
    <div class="container">
 
        <div class="wrapper">
       <?php include 'adminSidebar.php' ?>
      
        <div class="content">
            <div class="search">
               <div class="title"><h3>Boarding Owner</h3></div> 
               <button onclick="window.location='adminBoardingOwner.php';" type="button">Show All</button>
               <div class="search-bar">
                   <form action="adminBoardingOwner.php" method="post">
                       <input name="word" type="text" placeholder="Search">
                       <button name="search" type="submit"><i class="fa fa-search fa-lg"></i></button>
                   </form>
               </div>
            </div>
            <div class="table">
                <table>
                    <tr>
                        <th>BO Id</td>
                        <th>First Name</td>
                        <th>Last Name</td>
                        <th>Email</td>
                        <th>NIC</th>
                        <th>Address</th>
                        <th>Is_accepted</th>
                        <th>Block user</th>
                    </tr>
                    <?php if(isset($_POST['search']))
                    {
                        $word=$_POST['word'];
                        $id=intval($_POST['word']);
                        $word.='%';
                        
                        $result=bordingownerSearchDetails($id,$word,$connection);
                        foreach($result as $row){
                            ?> 
                        
                          <tr>
                              <td><?php echo $row['BOid']; ?></td>
                              <td><?php echo $row['first_name']; ?></td>
                              <td><?php echo $row['last_name']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['NIC']; ?></td>
                              <td><?php echo $row['address']; ?></td>
                              <td><?php if($row['user_accepted']==0){?> <div class="accept accept-not"><h4>Not confirm</h4></div> <?php }?>
                                  <?php if($row['user_accepted']==1){?> <div class="accept accept-apt"><h4>Accepted</h4></div> <?php }?>
                                  <?php if($row['user_accepted']==2){?> <div class="accept accept-bld"><h4>Blocked</h4></div> <?php }?> 
                              </td>
                              <td>
                                  <?php if($row['user_accepted']==0){?>  <a style="color: blue; cursor: pointer;"  >Confirm </a> <?php }?>
                                  <?php if($row['user_accepted']==1){?>  <a style="color: red; cursor: pointer;"  onclick='popBlock(<?php echo $row["BOid"]; ?>,"<?php echo $row["email"]; ?>","<?php echo $row["level"];?>");'>Block</a> <?php }?>
                                  <?php if($row['user_accepted']==2){?>  <a style="color: green; cursor: pointer;"  onclick='unBlock(<?php echo $row["BOid"]; ?>,"<?php echo $row["email"]; ?>","<?php echo $row["level"];?>");'>Unblock</a> <?php }?> 
                              </td>
                          </tr>
                          <?php
                         }
                    }
                    else{ $result=boardingOwnerDetails($connection);
                        foreach($result as $row){
                       ?> 
                   
                     <tr>
                         <td><?php echo $row['BOid']; ?></td>
                         <td><?php echo $row['first_name']; ?></td>
                         <td><?php echo $row['last_name']; ?></td>
                         <td><?php echo $row['email']; ?></td>
                         <td><?php echo $row['NIC']; ?></td>
                         <td><?php echo $row['address']; ?></td>
                         <td><?php if($row['user_accepted']==0){?> <div class="accept accept-not"><h4>Not confirm</h4></div> <?php }?>
                                  <?php if($row['user_accepted']==1){?> <div class="accept accept-apt"><h4>Accepted</h4></div> <?php }?>
                                  <?php if($row['user_accepted']==2){?> <div class="accept accept-bld"><h4>Blocked</h4></div> <?php }?> 
                              </td>
                              <td>
                                  <?php if($row['user_accepted']==0){?>  <a style="color: blue; cursor: pointer;"  >Confirm </a> <?php }?>
                                  <?php if($row['user_accepted']==1){?>  <a style="color: red; cursor: pointer;"  onclick='popBlock(<?php echo $row["BOid"]; ?>,"<?php echo $row["email"]; ?>","<?php echo $row["level"];?>");'>Block</a> <?php }?>
                                  <?php if($row['user_accepted']==2){?>  <a style="color: green; cursor: pointer;"  onclick='unBlock(<?php echo $row["BOid"]; ?>,"<?php echo $row["email"]; ?>","<?php echo $row["level"];?>");'>Unblock</a> <?php }?> 
                              </td>
                     </tr>
                     <?php
                    }
                }
                    ?>
                </table>
            </div>
        </div>
        </div>
    </div>
    <?php include 'adminAcceptpop.php' ?>
    <?php include 'adminBlockpop.php' ?>
    <script src="../resource/js/admin.js"></script>
    <script src="../resource/js/jquery.js"></script>
</body>
</html>

