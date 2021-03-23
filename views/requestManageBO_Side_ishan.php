<div class="payment-slide">
              <ul>
                  <div class="orderManager">
                    <div class="orderM"><img src="../resource/img/house-a.png"/></div>
                    <div class="orderM">BOARDING REQUEST MANAGER</div>
                  </div>
                  <li onclick="window.location='../index.php'"><i style="width: 30px;" class="fas fa-external-link-alt"></i> Home page</li>
                  <li id="newReq" onclick="window.location='myBoardingReqIshan_New.php'"><i style="width: 30px;" class="fas fa-sort-amount-down-alt"></i> New Requests <div id="noti-order" class="noti-order"><h5>1</h5></div></li>
                  <li id="boarderAdded" onclick="window.location='newBoarderAddIshan_new.php'"><i style="width: 30px;"  class="fas fa-house-user"></i> New Boarder Added <div id="noti-accpet" class="noti-order"><h5>1</h5></div></li>
                  <li id="AddAsNewBoarder" onclick="window.location='addAsBoarderIshanBO_new.php'"><i style="width: 30px;" class="fas fa-user-plus"></i> Add As a New Boarder <div id="noti-delivery" class="noti-order"><h5>1</h5></div></li>
                  
              </ul>
          </div> 


<!-- food supplier side count -->
<script src="../resource/js/jquery.js"></script>
<script>
    $(document).ready(function(){
        function newOrder()
    {
        view="breakfast";
        $.ajax({
            url:"../controller/notificationCon.php",
            method:"POST",
            data:{view:view},
            dataType:"json",
            success:function(data)
			{
                console.log(data);
                if(data.breakfast+data.lunch+data.dinner+data.longTerm!=0)
                {   $('#noti-order').css("display","block");
                    $('#noti-order h5').html(data.breakfast+data.lunch+data.dinner+data.longTerm);
                }else{
                  $('#noti-order').css("display","none");
                }
              
                if(data.breakfast!=0)
                {
                    $('#noti-breakfast').css("display","block");
                    $('#noti-breakfast h5').html(data.breakfast);
                }else{
                    $('#noti-breakfast').css("display","none");
                }
                if(data.lunch!=0)
                {
                    $('#noti-lunch').css("display","block");
                    $('#noti-lunch h5').html(data.lunch);
                }else{
                    $('#noti-lunch').css("display","none");
                }
                if(data.dinner!=0)
                {
                    $('#noti-dinner').css("display","block");
                    $('#noti-dinner h5').html(data.dinner);
                }else{
                    $('#noti-dinner').css("display","none");
                }
                if(data.longTerm!=0)
                {
                    $('#noti-longTerm').css("display","block");
                    $('#noti-longTerm h5').html(data.longTerm);
                }else{
                    $('#noti-longTerm').css("display","none");
                }

                if(data.acceptBreakfast+data.accLunch+data.accDinner+data.accLongTerm!=0)
                {   $('#noti-accpet').css("display","block");
                    $('#noti-accpet h5').html(data.acceptBreakfast+data.accLunch+data.accDinner+data.accLongTerm);
                }
                else{
                    $('#noti-accpet').css("display","none");
                }


                if(data.acceptBreakfast!=0)
                {
                  $('#noti-accpetBreakfast').css("display","block");
                    $('#noti-accpetBreakfast h5').html(data.acceptBreakfast);
                }else{
                    $('#noti-accpetBreakfast').css("display","none");
                }

                if(data.accLunch!=0)
                {
                  $('#noti-accpetLunch').css("display","block");
                    $('#noti-accpetLunch h5').html(data.accLunch);
                }else{
                    $('#noti-accpetLunch').css("display","none");
                }
                if(data.accDinner!=0)
                {
                  $('#noti-accpetDinner').css("display","block");
                    $('#noti-accpetDinner h5').html(data.accDinner);
                }else{
                    $('#noti-accpetDinner').css("display","none");
                }
                if(data.accLongTerm!=0)
                {
                  $('#noti-accpetLongTerm').css("display","block");
                    $('#noti-accpetLongTerm h5').html(data.accLongTerm);
                }else{
                    $('#noti-accpetLongTerm').css("display","none");
                }

                if(data.delBCount+data.delLCount+data.delDCount+data.delLTCount!=0)
                {   $('#noti-delivery').css("display","block");
                    $('#noti-delivery h5').html(data.delBCount+data.delLCount+data.delDCount+data.delLTCount);
                }
                else{
                    $('#noti-delivery').css("display","none");
                }
    
                // short term breakfast delivery list count
                if(data.delBCount!=0)
                {
                  $('#noti-delBreakfast').css("display","block");
                    $('#noti-delBreakfast h5').html(data.delBCount);
                }else{
                    $('#noti-delBreakfast').css("display","none");
                }
                // short term lunch delivery list count
                if(data.delLCount!=0)
                {
                  $('#noti-delLunch').css("display","block");
                    $('#noti-delLunch h5').html(data.delLCount);
                }else{
                    $('#noti-delLunch').css("display","none");
                }
                // short term dinner delivery list count
                if(data.delDCount!=0)
                {
                  $('#noti-delDinner').css("display","block");
                    $('#noti-delDinner h5').html(data.delDCount);
                }else{
                    $('#noti-delDinner').css("display","none");
                }

                // long term breakfast delivery list count
                if(data.delLTBcount!=0)
                {
                  $('#noti-delBreakfastLong').css("display","block");
                    $('#noti-delBreakfastLong h5').html(data.delLTBcount);
                }else{
                    $('#noti-delBreakfastLong').css("display","none");
                }
                // long term lunch delivery list count
                if(data.delLTLcount!=0)
                {
                  $('#noti-delLunchLong').css("display","block");
                    $('#noti-delLunchLong h5').html(data.delLTLcount);
                }else{
                    $('#noti-delLunchLong').css("display","none");
                }
                // long term dinner delivery list count
                if(data.delLTDcount!=0)
                {
                  $('#noti-delDinnerLong').css("display","block");
                    $('#noti-delDinnerLong h5').html(data.delLTDcount);
                }else{
                    $('#noti-delDinnerLong').css("display","none");
                }

                if(data.delLTCount!=0)
                {
                  $('#noti-delLongTerm').css("display","block");
                    $('#noti-delLongTerm h5').html(data.delLTCount);
                }else{
                    $('#noti-delLongTerm').css("display","none");
                }
		
			}
        })
    }
    newOrder();
    setInterval(function(){ 
		newOrder();; 
	}, 1000);
    })
</script>

<!-- check available function -->
<script>
    $(document).ready(function () {
        function available(){
            var availWord=document.getElementById('availSpan');
            $.ajax({
            type: "post",
            url: "../controller/orderConFood.php",
            data:{checkAvailable:'check'},// send to controller
            dataType: "json",
            success: function (data) {
                console.log(data);
                if(data.available=="0")
                {
                    availWord.style.color='#ffca0a';
                    availWord.innerHTML='Unavailable';
                }
                else if(data.available=="1")
                {
                    availWord.style.color='#40c057';
                    availWord.innerHTML='Available';
                }
            }
        });
    }
        available();
    });
</script>

