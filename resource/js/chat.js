$(document).ready(function () {
  function chatLoad(){
      var chat="load";
      var message="";
    $.ajax({
        type: "post",
        url: "controller/chatCon.php",
        data: {chat:chat},
        dataType: "json",
        success: function (data) {

            for(var i=0;i<data.message.length;i++)
            {
                console.log(data.message[i]);
                if(data.message[i][3]==data.email)
                {
                    message+='<div class="receiver">'+
                    '<div>'+
                         '<div class="sender-icon"><h3>L</h3></div>'+
                         '<p>'+data.message[i][4]+'</p>'+
                     '</div>'+
                '</div>';
                }else{
                    message+='<div class="sender"><div><p>'+data.message[i][4]+'</p></div></div>';
                }
                document.querySelector('.live-content').innerHTML=message;

            }

        }
    });
  }
  chatLoad();
  setInterval(function (){
      chatLoad()
  },100)

});

function chatLive()
{
    var msg=$('#chat').val();
    console.log(msg);
    $.ajax({
        type: "post",
        url: "controller/chatCon.php",
        data: {msg:msg},
        dataType: "json",
        success: function (data) {
            console.log(data);
        }
    });
}