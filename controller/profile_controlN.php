<!-- an -->
<?php   
        session_start();
        require_once ('../config/database.php');
        require_once ('../models/profile_modelN.php'); 
        require_once ('../models/pay_rent_modelN.php'); 
        require_once ('../models/summary_count_model.php');     
?>


<?php
// supply data to profile
if(isset($_GET['profile']))
{

        if($_SESSION['level']=='boarder')
        {
        
                $profile_image=profile_modelN::getprofile_image($connection,$_SESSION['level'],$_SESSION['email']);
                $img=mysqli_fetch_assoc($profile_image);
                echo $img['profileimage'];
                $profileimage= serialize($img['profileimage']);
        

                $user=profile_modelN::get_user_details_boarder($connection,$_SESSION['level'],$_SESSION['email']);  
                $detail= mysqli_fetch_assoc($user); 
                echo $detail['telephone']; 
                $tele=serialize($detail['telephone']);


                //summary display
                $BOidx=pay_rent_modelN::get_BO_details($connection,$_SESSION['Bid']);
                $BOidarr=mysqli_fetch_assoc($BOidx);
                print_r($BOidarr);
                $due_months=summary_count_model::duePayments_count($connection,$BOidarr['BOid'],$_SESSION['Bid']);
                $due_months1=mysqli_fetch_assoc($due_months);
                print_r($due_months1);
                echo "rounded :".round($due_months1['diff']);

                $noti_count=summary_count_model::Notification_count($connection,$_SESSION['Bid'],$_SESSION['level']);
                $noti_count1=mysqli_fetch_assoc($noti_count);

                $delivaring_food=summary_count_model::proccesingfood_count($connection,$_SESSION['email']);
                $delivaring_food1=mysqli_fetch_assoc($delivaring_food);

                $summary=  array(0=>$due_months1,
                                1=>$delivaring_food1,
                                2=>$noti_count1);

                $summ=serialize($summary);
                header('Location:../views/profilepage1.php?profileimage='.$profileimage.'&tele='.$tele.'&summary='.$summ);



        }else if($_SESSION['level']=='boardings_owner'| $_SESSION['level']=='food_supplier'| $_SESSION['level']=='student')
             
        {
                $profile_image=profile_modelN::getprofile_image($connection,$_SESSION['level'],$_SESSION['email']);
                $img=mysqli_fetch_assoc($profile_image);
                echo $img['profileimage'];
                $profileimage= serialize($img['profileimage']);

                $user=profile_modelN::get_user_details($connection,$_SESSION['level'],$_SESSION['email']);  
                $detail= mysqli_fetch_assoc($user); 
                echo $detail['telephone']; 
                $tele=serialize($detail['telephone']);//only telephone number


                //------------------summary counts--------------------------------------
                $level=$_SESSION['level'];
               



                if($level=="boardings_owner")
                {
                        $newReq_count=summary_count_model::newRequest_count($connection,$_SESSION['BOid']);
                        $newReq_count1=mysqli_fetch_assoc($newReq_count);

                        $B_count=summary_count_model::boarder_count($connection,$_SESSION['BOid']);
                        $B_count1=mysqli_fetch_assoc($B_count);

                        $noti_count=summary_count_model::Notification_count($connection,$_SESSION['BOid'],$_SESSION['level']);
                        $noti_count1=mysqli_fetch_assoc($noti_count);

                        $B_post_count=summary_count_model::myAdvertisement_BO_count($connection,$_SESSION['BOid']);
                        $B_post_count1=mysqli_fetch_assoc($B_post_count);


                        $summary=  array(0=>$newReq_count1,
                                        1=>$B_count1,
                                        2=>$noti_count1,
                                        3=>$B_post_count1);
                             
                        for($i=0;$i<4;$i++){
                                print_r($summary[$i]);
                        }
                        

                }else if($level=="food_supplier")
                {
                        $new_order=summary_count_model::newOrders_count($connection,$_SESSION['FSid']);
                        $new_order1=mysqli_fetch_assoc($new_order);

                        $to_deliver=summary_count_model::deliveringState_count($connection,$_SESSION['FSid']);
                        $to_deliver1=mysqli_fetch_assoc($to_deliver);

                        $noti_count=summary_count_model::Notification_count($connection,$_SESSION['BOid'],$_SESSION['level']);
                        $noti_count1=mysqli_fetch_assoc($noti_count);

                        print_r($to_deliver1);
                        $summary=  array(0=>$new_order1,
                                        1=>$to_deliver1,
                                        2=>$noti_count1);

                }else if($level=="student")
                {
                
                        $request_count=summary_count_model::Requests_count($connection,$_SESSION['email']);
                        $request_count1=mysqli_fetch_assoc($request_count);

                        $accept_count=summary_count_model::Accepted_count($connection,$_SESSION['email']);
                        $accept_count1=mysqli_fetch_assoc($accept_count);

                        $noti_count=summary_count_model::Notification_count($connection,$_SESSION['BOid'],$_SESSION['level']);
                        $noti_count1=mysqli_fetch_assoc($noti_count);

                        $summary=  array(0=>$request_count1,
                                        1=>$accept_count1,
                                        2=>$noti_count1);
                        

                }

                $summ=serialize($summary);
                //-----------------------------------------------------------------------
                header('Location:../views/profilepage1.php?profileimage='.$profileimage.'&tele='.$tele.'&summary='.$summ);

        } 
        else{
                echo $_SESSION['first_name'].' '.$_SESSION['level'];
        } 
        
     


 }

        
?>