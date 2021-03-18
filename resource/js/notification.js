$(document).ready(function () {
    function notification() {
        var count="count";
        $.ajax({
            type: "post",
            url: "controller/notificationCon.php",
            data:{count:count},// send to controller
            dataType: "json",
            success: function (data) {
              
                    var content="";
                    var email="";
                    var noID="";
                    for(var i=0;i<data.data.length; i++)
                    {
                        data.data[i];
                        email=data.data[i]["email"];
                        noID=data.data[i]["noID"];
                        content+='<li>';
                        if(data.data[i]["seen_state"]==1)
                        {    
                            content+='<div onclick=seen("'+email+'","'+noID+'");  style="background-color: rgba(197, 188, 188, 0.981)" class="show-not">';
                        }else{
                            content+='<div onclick=seen("'+email+'","'+noID+'"); class="show-not">';
                        }
                       content+= '<div style="width: 50px;">';
                        if(data.data[i]["type"]=="order")
                        {
                            content+= '<div style="background-color:blue" class="noti-log">'+
                            '<h3>O</h3>';
                        }else{
                            content+= '<div style="background-color:green" class="noti-log">'+
                            '<h3>L</h3>';
                        }
                            
                            content+='</div>'+
                            '</div>'+
                            '<div style="width: 100%; padding:0px 7px;">'+
                                '<div class="noti-text">'+
                                    '<h5>'+data.data[i]["title"]+' <small style="margin-left: 20px; color:gray">'+data.data[i]["time"]+'</small></h5>'+
                                    '<i  class="fas fa-angle-down"></i>'+
                                '</div>'+
                                '<h6>'+data.data[i]["discription"]+'</h6>'+
                            '</div>'+
                        '</div>'+
                        
                        '</li>';
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

 