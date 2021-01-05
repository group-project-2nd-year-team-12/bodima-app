<div class="payment-slide">
                <ul>
                <div class="orderManager">
                    <div class="orderM"><img src="https://img.icons8.com/fluent/55/000000/order-history.png"/></div>
                    <div class="orderM">FOOD REQUEST MANAGER</div>
                  </div>
                  <li  onclick="window.location='../index.php'"><i style="width: 30px;" class="fas fa-external-link-alt"></i> Home page</li>
                  <li id="pending" onclick="window.location='paymentFood_pending.php'"><i style="width: 30px;"  class="fas fa-hourglass-half"></i> Pending Orders <div class="noti-order" id="noti-pending"><h5>1</h5></div></li>
                  <li id="accept" onclick="window.location='../controller/orderCon.php?id=2'"><i style="width: 30px;" class="fas fa-clipboard-check"></i> Accepted Orders <div id="noti-order"><h5>1</h5></div></li>
                  <li id="receive" onclick="window.location='../controller/orderCon.php?id=3'"><i style="width: 30px;" class="fas fa-truck"></i> Receiving Order <div id="noti-delivery"><h5>1</h5></div></li>
                  <li id="long-term" onclick="window.location='paymentFood_longTerm.php'"><i style="width: 30px;" class="fas fa-table"></i> Longterm Order <div class="noti-order" id="noti-long"><h5>1</h5></div></li>
                  <li id="history" onclick="window.location='../controller/orderCon.php?id=4'"><i style="width: 30px;" class="fas fa-history"></i> Order History</li>
                  <li onclick="window.location='foodposts.php'"><i style="width: 30px;" class="fas fa-plus"></i> New Order</li>
                  
                  
              </ul>
          </div> 
          <script src="../resource/js/jquery.js"></script>

          <!-- user side count  -->
          <script>
                    
                     $(document).ready(function(){
                        function countOrder()
                            {
                                request="order";
                                $.ajax({
                                    url:"../controller/notificationCon.php",
                                    method:"POST",
                                    data:{request:request},
                                    dataType:"json",
                                    success:function(data)
                                    {
                                        console.log(data);
                                        // pending count
                                        if(data.pCount!=0) 
                                        {
                                           
                                            $('#noti-pending').css("display","block");
                                            $('#noti-pending h5').html(data.pCount);
                                        }else{
                                            $('#noti-pending').css("display","none");
                                        }
                                        
                                        // accept count
                                        if(data.aCount!=0) 
                                        {
                                           
                                            $('#noti-order').css("display","block");
                                            $('#noti-order h5').html(data.aCount);
                                        }else{
                                            $('#noti-order').css("display","none");
                                        }

                                        // delivery count        
                                        if(data.dCount!=0)
                                        {
                                            $('#noti-delivery').css("display","block");
                                            $('#noti-delivery h5').html(data.dCount); 
                                        }else{
                                            $('#noti-delivery').css("display","none");
                                        }

                                        if(data.pendingShort!=0)
                                        {
                                            $('#noti-breakfast').css("display","block");
                                            $('#noti-breakfast h5').html(data.pendingShort);
                                        }else{
                                            $('#noti-breakfast').css("display","none");
                                        }

                                        if(data.pendingLong!=0)
                                        {
                                            $('#noti-longTerm').css("display","block");
                                            $('#noti-longTerm h5').html(data.pendingLong);
                                        }else{
                                            $('#noti-longTerm').css("display","none");
                                        }


                                        if(data.acceptShort!=0)
                                        {
                                            $('#noti-recShort').css("display","block");
                                            $('#noti-recShort h5').html(data.acceptShort);
                                        }else{
                                            $('#noti-recShort').css("display","none");
                                        }

                                        if(data.acceptLong!=0)
                                        {
                                            $('#noti-recLong').css("display","block");
                                            $('#noti-recLong h5').html(data.acceptLong);
                                        }else{
                                            $('#noti-recLong').css("display","none");
                                        }
    
                                        if(data.deliveryShort!=0)
                                        {
                                            $('#noti-delShort').css("display","block");
                                            $('#noti-delShort h5').html(data.deliveryShort);
                                        }else{
                                            $('#noti-delShort').css("display","none");
                                        }
 
                                        if(data.deliveryLong!=0)
                                        {
                                            $('#noti-delLong').css("display","block");
                                            $('#noti-delLong h5').html(data.deliveryLong);
                                        }else{
                                            $('#noti-delLong').css("display","none");
                                        }
                                        if(data.longTerm!=0)
                                        {
                                            $('#noti-long').css("display","block");
                                            $('#noti-long h5').html(data.longTerm);
                                        }else{
                                            $('#noti-long').css("display","none");
                                        }


                                    }
                                })
                            }
                            countOrder();

                            setInterval(function(){ 
		                        countOrder();
	                        }, 5000);
    })
            
          </script>