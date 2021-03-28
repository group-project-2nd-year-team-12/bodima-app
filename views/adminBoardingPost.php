<?php
require_once ('../config/database.php');
require_once ('../controller/adminPanelCon.php');
session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../resource/css/admin.css">
    <link rel="stylesheet" href="../resource/css/all.css">
    <title>Document</title>
</head>
<body onload="checked('boarding')">

    <div class="container">
   
        <div class="wrapper">
        <?php include 'adminSidebar.php' ?>
      
        <div class="content">
            <div class="search">
               <div class="title"><h3>Student</h3></div> 
               <button onclick="window.location='adminBoardingPost.php';" type="button">Show All</button>
               <div class="search-bar">
                   <form action="adminBoardingPost.php" method="post">
                       <input name="word" type="text" placeholder="Search">
                       <button name="search" type="submit"><i class="fa fa-search fa-lg"></i></button>
                   </form>
               </div>
            </div>
            <div class="table">
                <table>
                    <tr>
                        <th>Boarding Post Id</td>
                        <th>BOid</td>
                        <th>Category</td>
                        <th>Girl or boy</th>
                        <th>Person count</th>
                        <th>Cost per person</th>
                        <th>Rating</th>
                        <th>House Number</th>
                        <th>location</th>
                        <th>Life span</th>
                        <th>Key money</th>
                        <!-- <th>Number of item</th> -->
                    </tr>
                    <?php if(isset($_POST['search']))
                    {
                        $word=$_POST['word'];
                        $id=intval($_POST['word']);
                        $word.='%';
                        
                        $result=bpostSearchDetails($id,$word,$connection);
                        foreach($result as $row){  
                            ?> 
    
                          <tr>
                              <td><?php echo $row['B_post_id']; ?></td>
                              <td><?php echo $row['BOid']; ?></td>
                              <td><?php echo $row['category']; ?></td>
                              <td><?php echo $row['girlsBoys']; ?></td>
                              <td><?php echo $row['person_count']; ?></td>
                              <td><?php echo $row['cost_per_person']; ?></td>
                              <td><?php echo $row['rating']; ?></td>
                              <td><?php echo $row['house_num']; ?></td>
                              <td><?php echo $row['location']; ?></td>
                              <td><?php echo $row['lifespan']; ?></td>
                              <td><?php echo $row['keymoney']; ?></td>
                          </tr>
                          <?php
                         }
                    }
                    else{ $result=bpostDetails($connection);
                     
                    foreach($result as $row){        
                       ?> 
                     <tr>
                     <td><?php echo $row['B_post_id']; ?></td>
                              <td><?php echo $row['BOid']; ?></td>
                              <td><?php echo $row['category']; ?></td>
                              <td><?php echo $row['girlsBoys']; ?></td>
                              <td><?php echo $row['person_count']; ?></td>
                              <td><?php echo $row['cost_per_person']; ?></td>
                              <td><?php echo $row['rating']; ?></td>
                              <td><?php echo $row['house_num']; ?></td>
                              <td><?php echo $row['location']; ?></td>
                              <td><?php echo $row['lifespan']; ?></td>
                              <td><?php echo $row['keymoney']; ?></td>
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
             
</body>
    <script src="../resource/js/admin.js"></script>
    <script src="../resource/js/jquery.js"></script>
</html>

