<?php
require_once ('../../config/database.php');
      require_once ('../../models/adminModel.php');
session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../resource/css/admin.css">
    <link rel="stylesheet" href="../../resource/css/all.css">
    <title>Document</title>
</head>
<body onload="checked('user')">

    <div class="container">
        <div class="wrapper">
        <?php include 'slide-bar.php' ?>
      
        <div class="content">
            <div class="search">
               <div class="title"><h3>Student</h3></div> 
               <button onclick="window.location='student.php';" type="button">Show All</button>
               <div class="search-bar">
                   <form action="../../views/admin/student.php" method="post">
                       <input name="word" type="text" placeholder="Search">
                       <button name="search" type="submit"><i class="fa fa-search fa-lg"></i></button>
                   </form>
               </div>
            </div>
            <div class="table">
                <table>
                    <tr>
                        <th>Reg Id</td>
                        <th>First Name</td>
                        <th>Last Name</td>
                        <th>Email</td>
                        <th>NIC</th>
                        <th>Address</th>
                        <th>Is_accepted</th>
                        <th>Block user</th>
                    </tr>

                    <!-- user search the word  -->
                    <?php if(isset($_POST['search']))
                    {
                        $word=$_POST['word'];
                        $id=intval($_POST['word']);
                        $word.='%';
                        
                        
                        $result=adminModel::searchStudent($id,$word,$connection);
                        while($row=mysqli_fetch_assoc($result)){
                            ?> 
                       <?php include 'pop.php' ?>
                          <tr>
                              <td><?php echo $row['Reg_id']; ?></td>
                              <td><?php echo $row['first_name']; ?></td>
                              <td><?php echo $row['last_name']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['nic']; ?></td>
                              <td><?php echo $row['address']; ?></td>
                              <td><?php if($row['user_accepted']==0){?> <div class="accept accept-not"><h4>Not confirm</h4></div> <?php }?>
                                  <?php if($row['user_accepted']==1){?> <div class="accept accept-apt"><h4>Accepted</h4></div> <?php }?>
                                  <?php if($row['user_accepted']==2){?> <div class="accept accept-bld"><h4>Blocked</h4></div> <?php }?> 
                              </td>
                              <td>
                                  <?php if($row['user_accepted']==0){?>  <a style="color: blue; cursor: pointer;"  onclick='popBlock(<?php echo $row["Reg_id"]; ?>,"<?php echo $row["email"]; ?>","<?php echo $row["level"];?>");'>Confirm </a> <?php }?>
                                  <?php if($row['user_accepted']==1){?>  <a style="color: red; cursor: pointer;"  onclick='popBlock(<?php echo $row["Reg_id"]; ?>,"<?php echo $row["email"]; ?>","<?php echo $row["level"];?>");'>Block</a> <?php }?>
                                  <?php if($row['user_accepted']==2){?>  <a style="color: green; cursor: pointer;"  onclick='popBlock(<?php echo $row["Reg_id"]; ?>,"<?php echo $row["email"]; ?>","<?php echo $row["level"];?>");'>Unblock</a> <?php }?> 
                              </td>
                          </tr>
                         
                          <?php
                         }
                    }
                    //  user get all details about student
                    else{ $result=adminModel::userDetails('student',$connection);
                    while($row=mysqli_fetch_assoc($result)){        
                       ?> 
                     <?php include 'pop.php' ?>
                     <tr>
                         <td><?php echo $row['Reg_id']; ?></td>
                         <td><?php echo $row['first_name']; ?></td>
                         <td><?php echo $row['last_name']; ?></td>
                         <td><?php echo $row['email']; ?></td>
                         <!-- <td><?php echo $row['nic']; ?></td> -->
                         <td>bnbfbsh</td>
                         <td><?php echo $row['address']; ?></td>
                    <td><?php      if($row['user_accepted']==0){?> <div class="accept accept-not"><h4>Not confirm</h4></div> <?php }?>
                        <?php      if($row['user_accepted']==1){?> <div class="accept accept-apt"><h4>Accepted</h4></div> <?php }?>
                        <?php      if($row['user_accepted']==2){?> <div class="accept accept-bld"><h4>Blocked</h4></div> <?php }?> 
                    </td>
                    <td><?php      if($row['user_accepted']==0){?>  <a style="color: blue; cursor: pointer;"  onclick='popBlock(<?php echo $row["Reg_id"]; ?>,"<?php echo $row["email"]; ?>","<?php echo $row["level"];?>");'>Confirm </a> <?php }?>
                        <?php      if($row['user_accepted']==1){?>  <a style="color: red; cursor: pointer;"  onclick='popBlock(<?php echo $row["Reg_id"]; ?>,"<?php echo $row["email"]; ?>","<?php echo $row["level"];?>");'>Block</a> <?php }?>
                        <?php      if($row['user_accepted']==2){?>  <a style="color: green; cursor: pointer;"  onclick='popBlock(<?php echo $row["Reg_id"]; ?>,"<?php echo $row["email"]; ?>","<?php echo $row["level"];?>");'>Unblock</a> <?php }?> 
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
 
</body>
    <script src="../../resource/js/admin.js"></script>
    <script src="../../resource/js/jquery.js"></script>
    <script>
          $('#1').click(tick); // title function
          $('#2').click(tick);
          $('#3').click(tick);
          $('#4').click(tick);
          $('#5').click(tick);
          $('#6').click(tick);

        function tick()
        { 
           
            if(this.checked)
        {
            $('.btn button').removeAttr('disabled',false);
            $('.btn button').css('background-color','red');
        }
        else{if(!$('#1').is(":checked") && !$('#2').is(":checked") && !$('#3').is(":checked") && !$('#4').is(":checked") && !$('#5').is(":checked") ){
            $('.btn button').attr('disabled',true);
            $('.btn button').css('background-color','gray');
        }
        }
        }

        // onclick function display function

        function popBlock(id,email,level)
        {
       
            document.querySelector('.block').style.display='block';
            // document.querySelector('div:not(.block)').style.filter='blur(6px)';
            document.getElementById('id').innerHTML='User Id :'+id;
            document.getElementById('email').innerHTML='User email :'+email;
            document.getElementById('email-save').value=email;
            document.getElementById('level-save').value=level;

        }
        // onclick display none function

        function popBack()
        {
            document.querySelector('.block').style.display='none';
            // document.querySelector('div:not(.block)').style.filter='blur(0px)';
        }
    </script>
</html>

