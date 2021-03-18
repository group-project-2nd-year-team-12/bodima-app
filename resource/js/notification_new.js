$(document).ready(function () {
    function notification() {
        var count="count";
        $.ajax({
            type: "post",
            url: "controller/notification_control.php",
            data:{count:count},// send to controller
            dataType: "json",
            success: function (data) {
                    var content="";
                    var email="";
                    var noID="";
                    

                    for(var i=0;i<data.data.length; i++)
                    {
                    data.data[i];
                    console.log(data.data[i]);

                    if(data.data[i]['type_number']==1){//order accepted
                        content+='<li>'+
                        '<div class="notify" style="margin:5px; font-size:small; border-radius:10px;background-color:#c0c1c25b">'+
                        '<div class="msg_head" style="background-color:#70a6f769;border-radius:10px;">'+
                            '<div style="display:flex; justify-content:space-between; align-items:center; padding-left:5px;"><img src="../bodima-app/resource/img/chicken.png" style="width:20px; height:20px;">'+
                            '<p style="font-size:14px;">'+data.data[i]['massageHeader']+'</p>'+
                            
                            '<div style="text-align:right; padding:5px; line-height:80%;"><span style="font-size:10px; color:black; "> 35 min<br> ago</span></div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="msg_body" style="padding: 10px; color:grey; border-radius:10px;">'+
                            data.data[i]['massage']+
                            '<div style="display:flex; float:right; margin:-5px;margin-bottom:-10px; ">'+
                            '<div style="width:15px;  ">'+
                            '<i class="fas fa-trash" style="color:#afafafa9; :hover{color:#6e6e6ee5;}"></i>'+
                            '</div>'+
                            '</div>'+
                        '</div>'+
                        
                        '</div>'+
                        '</li>';

                    }else if(data.data[i]['type_number']==2){//new order recieved
                        content+='<li>'+
                        '<div class="notify" style="margin:5px; font-size:small; border-radius:10px;background-color:#c0c1c25b">'+
                        '<div class="msg_head" style="background-color:#70a6f769;border-radius:10px;">'+
                            '<div style="display:flex; justify-content:space-between; align-items:center; padding-left:5px;"><img src="../bodima-app/resource/img/pending.png" style="width:20px; height:20px;">'+
                            '<p style="font-size:14px;">'+data.data[i]['massageHeader']+'</p>'+
                            
                            '<div style="text-align:right; padding:5px; line-height:80%;"><span style="font-size:10px; color:black; "> 35 min<br> ago</span></div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="msg_body" style="padding: 10px; color:grey; border-radius:10px;">'+
                            data.data[i]['massage']+
                            '<div style="display:flex; float:right; margin:-5px;margin-bottom:-10px; ">'+
                            '<div style="width:15px;  ">'+
                            '<i class="fas fa-trash" style="color:#afafafa9; :hover{color:#6e6e6ee5;}"></i>'+
                            '</div>'+
                            '</div>'+
                        '</div>'+
                        
                        '</div>'+
                        '</li>';

                    }else if(data.data[i]['type_number']==3){//payment remainder
                        content+='<li>'+
                        '<div class="notify" style="margin:5px; font-size:small; border-radius:10px;background-color:#c0c1c25b">'+
                        '<div class="msg_head" style="background-color:#70a6f769;border-radius:10px;">'+
                        '<div style="display:flex; justify-content:space-between; align-items:center; padding-left:5px;"><img src="../bodima-app/resource/img/mortgage.png" style="width:20px; height:20px;">'+
                        '<p style="font-size:14px;">'+data.data[i]['massageHeader']+'</p>'+
                        
                        '<div style="text-align:right; padding:5px; line-height:80%;"><span style="font-size:10px; color:black; "> 35 min<br> ago</span></div>'+
                        '</div>'+
                        '</div>'+
                        '<div class="msg_body" style="padding: 10px; color:grey; border-radius:10px;">'+
                        data.data[i]['massage']+
                        '<div style="display:flex; float:right; margin:-5px;margin-bottom:-10px; ">'+
                        '<div style="width:15px;  ">'+
                        '<i class="fas fa-trash" style="color:#afafafa9; :hover{color:#6e6e6ee5;}"></i>'+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        
                        '</div>'+
                        '</li>';


                    }else{
                        content+='<li>'+
                        '<div class="notify" style="margin:5px; font-size:small; border-radius:10px;background-color:#c0c1c25b">'+
                        '<div class="msg_head" style="background-color:#70a6f769;border-radius:10px;">'+
                        '<div style="display:flex; justify-content:space-between; align-items:center; padding-left:5px;"><img src="../bodima-app/resource/img/time-is-money.png" style="width:20px; height:20px;">'+
                        '<p style="font-size:14px;">'+data.data[i]['massageHeader']+'</p>'+
                        
                        '<div style="text-align:right; padding:5px; line-height:80%;"><span style="font-size:10px; color:black; "> 35 min<br> ago</span></div>'+
                        '</div>'+
                        '</div>'+
                        '<div class="msg_body" style="padding: 10px; color:grey; border-radius:10px;">'+
                        data.data[i]['massage']+
                        '<div style="display:flex; float:right; margin:-5px;margin-bottom:-10px; ">'+
                        '<div style="width:15px;  ">'+
                        '<i class="fas fa-trash" style="color:#afafafa9; :hover{color:#6e6e6ee5;}"></i>'+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        
                        '</div>'+
                        '</li>';
                    }
                    //     email=data.data[i]["email"];
                        
                    //     noID=data.data[i]["noID"];
                    //     content+='<li>';
                    //     if(data.data[i]["seen_state"]==1)
                    //     {    
                    //         content+='<div onclick=seen("'+email+'","'+noID+'");  style="background-color: rgba(197, 188, 188, 0.981)" class="show-not">';
                    //     }else{
                    //         content+='<div onclick=seen("'+email+'","'+noID+'"); class="show-not">';
                    //     }
                    //    content+= '<div style="width: 50px;">';
                    //     if(data.data[i]["type"]=="order")
                    //     {
                    //         content+= '<div style="background-color:blue" class="noti-log">'+
                    //         '<h3>O</h3>';
                    //     }else{
                    //         content+= '<div style="background-color:red" class="noti-log">'+
                    //         '<h3>L</h3>';
                    //     }
                            
                    //         content+='</div>'+
                    //         '</div>'+
                    //         '<div style="width: 100%; padding:0px 7px;">'+
                    //             '<div class="noti-text">'+
                    //                 '<h5>'+data.data[i]["title"]+' <small style="margin-left: 20px; color:gray">'+data.data[i]["time"]+'</small></h5>'+
                    //                 '<i  class="fas fa-angle-down"></i>'+
                    //             '</div>'+
                    //             '<h6>'+data.data[i]["discription"]+'</h6>'+
                    //         '</div>'+
                    //     '</div>'+
                        
                    //     '</li>';

                        // content+='<li>'+
                        // '<div class="notify" style="margin:5px; font-size:small; border-radius:10px;background-color:#c0c1c25b">'+
                        // '<div class="msg_head" style="background-color:#70a6f769;border-radius:10px;">'+
                        // '<div style="display:flex; justify-content:space-between; align-items:center; padding-left:5px;"><img src="../bodima-app/resource/img/mortgage.png" style="width:20px; height:20px;">'+
                        // '<p style="font-size:14px;">January payment Remainder</p>'+
                        
                        // '<div style="text-align:right; padding:5px; line-height:80%;"><span style="font-size:10px; color:black; "> 35 min<br> ago</span></div>'+
                        // '</div>'+
                        // '</div>'+
                        // '<div class="msg_body" style="padding: 10px; color:grey; border-radius:10px;">'+
                        // 'Your rent payment has due. Please pay before 2021-01-30'+
                        // '<div style="display:flex; float:right; margin:-5px;margin-bottom:-10px; ">'+
                        // '<div style="width:15px;  ">'+
                        // '<i class="fas fa-trash" style="color:#afafafa9; :hover{color:#6e6e6ee5;}"></i>'+
                        // '</div>'+
                        // '</div>'+
                        // '</div>'+
                        
                        // '</div>'+
                        // '</li>';


                        

                        
                    document.querySelector('.notifi-record').innerHTML=content;
                    if(data.count > 0 ){
                        document.querySelector('.notification').classList.add('noti-circle');
                        document.querySelector('.noti-circle').setAttribute("data-count",data.count);
                    }else{
                        document.querySelector('.notification').classList.remove('noti-circle');
                    }
                    }

                
               
            }
          
        });
      }
      notification();

      

      setInterval(function(){ 
        notification();
    }, 1000);

// *******************notification new***************************************
    // function notification() {
    //     var count="count";
    //     $.ajax({
    //         type: "post",
    //         url: "controller/notification_control.php",
    //         data:{count:count},// send to controller
    //         dataType: "json",
    //         success: function (data) {
              
    //                 var content="";
    //                 var email="";
    //                 var noID="";
    //                 for(var i=0;i<data.data.length; i++)
    //                 {
    //                     data.data[i];
    //                     email=data.data[i]["email"];
    //                     noID=data.data[i]["noID"];
    //                     content+='<li>';
    //                     if(data.data[i]["seen_state"]==1)
    //                     {    
    //                         content+='<div onclick=seen("'+email+'","'+noID+'");  style="background-color: rgba(197, 188, 188, 0.981)" class="show-not">';
    //                     }else{
    //                         content+='<div onclick=seen("'+email+'","'+noID+'"); class="show-not">';
    //                     }
    //                    content+= '<div style="width: 50px;">';
    //                     if(data.data[i]["type"]=="order")
    //                     {
    //                         content+= '<div style="background-color:blue" class="noti-log">'+
    //                         '<h3>O</h3>';
    //                     }else{
    //                         content+= '<div style="background-color:red" class="noti-log">'+
    //                         '<h3>L</h3>';
    //                     }
                            
    //                         content+='</div>'+
    //                         '</div>'+
    //                         '<div style="width: 100%; padding:0px 7px;">'+
    //                             '<div class="noti-text">'+
    //                                 '<h5>'+data.data[i]["title"]+' <small style="margin-left: 20px; color:gray">'+data.data[i]["time"]+'</small></h5>'+
    //                                 '<i  class="fas fa-angle-down"></i>'+
    //                             '</div>'+
    //                             '<h6>'+data.data[i]["discription"]+'</h6>'+
    //                         '</div>'+
    //                     '</div>'+
                        
    //                     '</li>';
    //                 document.querySelector('.notifi-record').innerHTML=content;
    //                 if(data.count > 0 ){
    //                     document.querySelector('.notification').classList.add('noti-circle');
    //                     document.querySelector('.noti-circle').setAttribute("data-count",data.count);
    //                 }else{
    //                     document.querySelector('.notification').classList.remove('noti-circle');
    //                 }
    //                 }

                
               
    //         }
          
    //     });
    //   }
    //   notification();

      

    //   setInterval(function(){ 
    //     notification();
    // }, 1000);

// ************************************************************************


});
function seen(x,y){
  var email=x;
  var id=y;
  $.ajax({
      type: "post",
      url: "controller/notificationCon.php",
      data:{id:id,email:email},
      dataType: "json",
      success: function (data) {
         window.location=data.responce;
      }
  });
  }

 