<?php 
    date_default_timezone_set("Asia/Colombo");  
    $creattime=date('Y-m-d h:i:s');

    require_once ('../config/database.php');
    require_once ('../models/ratemodel.php');
    require_once ('../controller/rateCon.php');

    // $result_set=rating::getids($connection);
    // $count=mysqli_num_rows($result_set);
    // //echo $count;

    // $result_set=rating::getSum($connection);
    // $data=mysqli_fetch_assoc($result_set);
    // $total=$data['total'];
    $rating_B_post_id=$_SESSION['rating_B_post_id'];
    $dataset=rategetcount($rating_B_post_id,$connection);
    //print_r($dataset);
    $count=$dataset['count'];
    $total=$dataset['total'];
    //echo $total;
    //echo "gggg";
    $avg = '';

    if($count != 0){
        if(is_nan(round(($total/$count),1))){
            $avg=0;
        }else{
            $avg=round(($total/$count),1);
        }
    }else{
        $avg=0;
    }
    
    //echo $avg;


    //$result_post=mysqli_fetch_assoc($result_set);
    //$val=$result_post['uName'];

    //print_r($result_post['uName']);
    //$mytime = getdate(date("U"));
    //$date = "$mytime[weekday],$mytime[month] $mytime[mday],$mytime[year]";
    //echo $date;
?>
<?php      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating System </title>
    <link rel="stylesheet" href="../resource/css/ratemain.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>
<body>

    <div class="container" >
        <div class="rating-review">
            <div class="tri table-flex">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div class="rnb rv1">
                                    <h3><?php echo $avg; ?>/5.0</h3>
                                </div>
                                <div class="pdt-rate">
                                    <div class="pro-rating">
                                        <div class="clearfix rating mart8">
                                            <div class="rating-stars">
                                                <div class="grey-stars"></div>
                                                <div class="filled-stars" style="width:<?php echo $avg * 20; ?>%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rnrn">
                                    <p class="rars"><?php if($count == 0){ echo "No";}else{echo $count;}   ?> Reviews</p>
                                </div>
                            </td>
                            
                            <td>
                                <div class="rrb">
                                   <!--  <p>Please Review Our Product!</p> -->
                                    <button class="rbtn opmd">Add Review</button>
                                </div> 
                            </td>
                        </tr>
                    </tbody> 
                </table>
                <div class="review-modal" style="display:none"  >
                
                <!-- style="display:none" -->
                    <div class="review-bg"></div>
                    <div class="rmp">
                        <div class="rpc">
                            <span><i class="fa fa-times"></i></span>
                        </div>
                        <div class="rps" align="center">
                            <i class="fa fa-star" data-index="0" style="display: none"></i>
                            <i class="fa fa-star" data-index="1"></i>
                            <i class="fa fa-star" data-index="2"></i>
                            <i class="fa fa-star" data-index="3"></i>
                            <i class="fa fa-star" data-index="4"></i>
                            <i class="fa fa-star" data-index="5"></i>
                        </div>
                        <input type="hidden" value="" class="starRateV">
                        <input type="hidden" value="<?php echo $creattime; ?>" class="rateDate">
                        <div class="rptf" align="center">
                            <input type="text" class="rateName" placeholder="Enter Your name....">
                        </div>
                        <div class="rptf" align="center">
                            <textarea class="rateMsg" id="rate-field" placeholder="Describe Your experience"></textarea>
                        </div>
                        <div class="rate-error" align="center"></div> 
                        <div class="rpsb" align="center">
                            <button class="rpbtn">Post Review</button>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="bri">
            
                <div class="uscm">
                <?php 
                
                $result_all=rating::getratingDetails($rating_B_post_id,$connection);
                //echo "bbbbb";
                //$result_rating=mysqli_fetch_assoc($result_all);
                if(mysqli_num_rows($result_all) > 0){
                    
                    while($fetch= mysqli_fetch_all($result_all) ){
                        //echo "mmmmmm";
                        //print_r($fetch);
                        
                        //print_r(count($fetch));
                        //print_r($fetch[0][3]);
                        //print_r($fetch['3']);
                        //print_r($fetch);
                 
                ?>
                    <div class="uscm-secs">

                    <?php
                    for($a=0;$a < count($fetch);$a++){

                    ?>
                    <div class="rating_box" style="display:flex;border:20px;">
                        <div class="us-img">
                            <p><?php echo substr($fetch[$a][3],0,1);?></p>
                            
                        </div>
                        <div class="uscms">
                            <div class="us-rate">
                                <div class="pdt-rate">
                                    <div class="pro-rating">
                                        <div class="clearfix rating mart8">
                                            <div class="rating-stars">
                                                <div class="grey-stars"></div>
                                                <div class="filled-stars" style="width:<?php echo $fetch[$a][4]*20;?>%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="us-cmt">
                                <p><?php echo $fetch[$a][5];?></p>
                            </div>
                            <div class="us-nm">
                                <p><i>By <span class="cmnm"><?php echo $fetch[$a][3];?></span> on <span class="cmdt"> <?php echo $fetch[$a][6];?></span></i></p>
                            </div>
                            
                        </div>

                    </div>
                        
                        <?php


                        }

                            ?>

                    </div>

                <?php 
                   }
                }
                
                ?>
                </div>
             
            </div>
           
        </div>
    </div>
    
    <script src="../resource/js/ratemain.js"></script>    
</body>
</html>