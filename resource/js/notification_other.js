$(document).ready(function () {
    function notification() {
        var count="count";
        $.ajax({
            type: "post",
            url: "../controller/notification_control.php",
            data:{count:count},// send to controller
            dataType: "json",
            success: function (data) {
                console.log(data);
                    var content="";
                    var email="";
                    var noID="";
                    

                    for(var i=0;i<data.data.length; i++)
                    {
                    data.data[i];
                    // console.log(data.data[i]['timesince']);

                    noID=data.data[i]['notify_id'];
                    if(data.data[i]['type_number']==1){//order accepted
                        content+='<li>'+
                        '<div onclick=seen("'+noID+'");class="notify" style="margin:5px; font-size:small; border-radius:10px;background-color:#c0c1c25b">'+
                        '<div class="msg_head" style="background-color:#70a6f769;border-radius:10px;">'+
                            '<div style="display:flex; justify-content:space-between; align-items:center; padding-left:5px;"><img src="../bodima-app/resource/img/chicken.png" style="width:20px; height:20px;">'+
                            '<p style="font-size:14px;">'+data.data[i]['massageHeader']+'</p>'+
                            
                            '<div style="text-align:right; padding:5px; line-height:80%;"><span style="font-size:10px; color:black; "> 35 min<br> ago</span></div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="msg_body" style="padding: 10px; color:rgb(97, 97, 97); border-radius:10px;">'+
                            data.data[i]['massage'];
                            

                    }else if(data.data[i]['type_number']==2){//new order recieved
                        content+='<li>'+
                        '<div class="notify" style="margin:5px; font-size:small; border-radius:10px;background-color:#c0c1c25b">'+
                        '<div class="msg_head" style="background-color:#70a6f769;border-radius:10px;">'+
                            '<div style="display:flex; justify-content:space-between; align-items:center; padding-left:5px;"><img src="../bodima-app/resource/img/pending.png" style="width:20px; height:20px;">'+
                            '<p style="font-size:14px;">'+data.data[i]['massageHeader']+'</p>'+
                            
                            '<div style="text-align:right; padding:5px; line-height:80%;"><span style="font-size:10px; color:black; "> 35 min<br> ago</span></div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="msg_body" style="padding: 10px; color:rgb(97, 97, 97); border-radius:10px;">'+
                            data.data[i]['massage'];

                    }else if(data.data[i]['type_number']==3){//payment remainder
                        content+='<li>'+
                        '<div class="notify" style="margin:5px; font-size:small; border-radius:10px;background-color:#c0c1c25b">'+
                        '<div class="msg_head" style="background-color:#70a6f769;border-radius:10px;">'+
                        '<div style="display:flex; justify-content:space-between; align-items:center; padding-left:5px;"><img src="../bodima-app/resource/img/mortgage.png" style="width:20px; height:20px;">'+
                        '<p style="font-size:14px;">'+data.data[i]['massageHeader']+'</p>'+
                        
                        '<div style="text-align:right; padding:5px; line-height:80%;"><span style="font-size:10px; color:black; "> 35 min<br> ago</span></div>'+
                        '</div>'+
                        '</div>'+
                        '<div class="msg_body" style="padding: 10px; color:rgb(97, 97, 97); border-radius:10px;">'+
                        data.data[i]['massage'];
                        


                    }else{
                        content+='<li>'+
                        '<div class="notify" style="margin:5px; font-size:small; border-radius:10px;background-color:#c0c1c25b">'+
                        '<div class="msg_head" style="background-color:#70a6f769;border-radius:10px;">'+
                        '<div style="display:flex; justify-content:space-between; align-items:center; padding-left:5px;"><img src="../bodima-app/resource/img/time-is-money.png" style="width:20px; height:20px;">'+
                        '<p style="font-size:14px;">'+data.data[i]['massageHeader']+'</p>'+                      
                        '<div style="text-align:right; padding:5px; line-height:80%;"><span style="font-size:10px; color:black; "> 35 min<br> ago</span></div>'+
                        '</div>'+
                        '</div>'+
                        '<div class="msg_body" style="padding: 10px; color:rgb(97, 97, 97); border-radius:10px;">'+
                        data.data[i]['massage'];
                        
                    }

                    content+='<div style="display:flex; float:right; margin:-5px;margin-bottom:-10px; ">'+
                    '<div onclick=deleteNoti('+data.data[i]["notify_id"]+'); style="width:17px; background-color:red;">'+
                    '<i class="fas fa-trash" style="color:#afafafa9; :hover{color:#6e6e6ee5;}"></i>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                
                    '</div>'+
                    '</li>';
                   
                        console.log(content);
                    document.querySelector('.notifi-record').innerHTML=content;
                    if(data.count > 0 ){
                        document.querySelector('.notification').classList.add('noti-circle');
                        document.querySelector('.noti-circle').setAttribute("data-count",data.count);
                    }else{
                        document.querySelector('.notification').classList.remove('noti-circle');
                    }
                    }

                
               
            },  error: function (xhr, ajaxOptions, thrownError) {
               alert(xhr.status);
                alert(thrownError);
            }
          
        });
      }
      notification();

      

      setInterval(function(){ 
        notification();
    }, 1000);


});
function seen(y){
  var id=y;
  $.ajax({
      type: "post",
      url: "controller/notification_control.php",
      data:{id:id},
      dataType: "json",
      success: function (data) {
         window.location=data.responce;
      }
  });
  }
function deleteNoti(id){
    window.location='controller/notification_control.php?delete=1&notify_id='+id;
    // alert('dhgv');
}

// function delete_notif(delid){
//     var delId=delid;
//     $.ajax({
//         type: "post",
//         url: "controller/notification_control.php",
//         data:{delId:delId},
//         dataType: "json",
//         success: function (data) {
//            window.location=data.responce;
//         }
//     });
// }
// ?delete=1&notify_id='+data.data[i]['notify_id']+'"

 