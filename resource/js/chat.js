// user chat loader
$(document).ready(function () {
  function chatLoad(){
      var chat="load";
      var message="";
      var content=document.querySelector('.live-content');
        if(content!=null)
        {
            $.ajax({
                type: "post",
                url: "controller/chatCon.php",
                data: {chat:chat},
                dataType: "json",
                success: function (data) {
                    console.log(data.email);
                    message+='<div class="user-profile-details">'+
                    '<div class="avater">'+
                        '<h3>A</h3>'+
                    '</div>'+
                    '<div class="avater-details">'+
                        '<h4>Bodima</h3>'+
                        '<h6 id="userEmail">bodiama7@SpeechGrammarList.com</h6>'+
                    '</div>'+
                    '</div>';
                    for(var i=0;i<data.message.length;i++)
                    {
                        // console.log(data.message[i]);
                        if(data.message[i][3]==data.email)
                        {
                           
                        message+='<div class="sender"><div><div><p>'+data.message[i][5]+'</p></div></div></div>';
                        }else{
                            message+='<div class="receiver">'+
                            '<div>'+
                                 '<div class="sender-icon"><h3>L</h3></div>'+
                                 '<p>'+data.message[i][5]+'</p>'+
                             '</div>'+
                        '</div>';
                        }
                        content.innerHTML=message;
                        
        
                    }
        
                }
            });
        }

  }
  chatLoad();
  setInterval(function (){
      chatLoad()
  },100)




});
function getChatUsers() {
    var getUsers="users";
    console.log('hello');
    var users="";
    $.ajax({
        type: "post",
        url: "controller/chatCon.php",
        data: {user:getUsers},
        dataType: "json",
        success: function (data) {
            console.log(data);
            for(var i=0;i<data.chatUser.length;i++)
            {
                var userEmail=data.chatUser[i][2];
                users+='<div onclick=chatBox("'+userEmail+'"); class="user-profile">'+
                    '<div class="avater">'+
                        '<h3>A</h3>'+
                    '</div>'+
                    '<div class="avater-details">'+
                        '<h4>'+data.chatUser[i][4]+'</h3>'+
                        '<h5>'+data.chatUser[i][5]+'</h4>'+
                    '</div>'+
                    '<div class="msg-time">'+

                    '</div>'+
                '</div>';
            }
            if( document.querySelector('.admin-side')!=null)
            {
                document.querySelector('.admin-side').innerHTML=users;
            }
          
        }
    });
    }
    getChatUsers();

// chat with admin
function chatLive()
{
    var msg=$('#chat').val();
    if(msg!="")
    {
        $('#chat').val("");
        var userEmail=document.getElementById('userEmail');
        var scrollTopElementAdmin= document.querySelector('.live-content-admin');
        var scrollTopElement= document.querySelector('.live-content');
        if(userEmail!=null)
        {
            userEmail=userEmail.innerHTML;
        }
        console.log(userEmail);
        $.ajax({
            type: "post",
            url: "controller/chatCon.php",
            data: {msg:msg,userEmail:userEmail},
            dataType: "json",
            success: function (data) {
                if(scrollTopElementAdmin!=null)
                {
                    scrollTopElementAdmin.scrollTop = scrollTopElementAdmin.scrollHeight+200;
                }else{
                    scrollTopElement.scrollTop = scrollTopElement.scrollHeight+200;
                }
                
                
            }
           
        });
    }

}

function chatBox(x) { 
    
   
   function reload(x)
   {
    var userEmail=x;
    var message="";
    var content=document.querySelector('.live-content-admin');
    if(content!=null){
        $.ajax({
            type: "post",
            url: "controller/chatCon.php",
            data:{email:userEmail},
            dataType: "json",
            success: function (data) {
                // console.log(data);
                message+='<div class="user-profile-details">'+
                '<div class="avater">'+
                    '<h3>A</h3>'+
                '</div>'+
                '<div class="avater-details">'+
                    '<h4>'+data.userName+'</h3>'+
                    '<h6 id="userEmail">'+data.userEmail+'</h6>'+
                '</div>'+
            '</div>';
                document.querySelector('.admin-side').style.display="none";
                for(var i=0;i<data.message.length;i++)
                {
                    // console.log(data.message[i]);
                    if(data.message[i]["sender"]==data.email)
                    {
                       
                    message+='<div class="sender"><div><div><p>'+data.message[i]["message"]+'</p></div></div></div>';
                    }else{
                        message+='<div class="receiver">'+
                        '<div>'+
                             '<div class="sender-icon"><h3>L</h3></div>'+
                             '<p>'+data.message[i]["message"]+'</p>'+
                         '</div>'+
                    '</div>';
                    }
                    content.innerHTML=message;
                    
    
                }
            }
        });
    }
   
   }
   reload(x);
   setInterval(function (){
    reload(x);
},100)

 }

 function activeLive()
 {
     var chatBox=document.querySelector('.live-box');
     chatBox.classList.add('liveSupport-active');


 }
 function removeLive()
 {
     var chatBox=document.querySelector('.live-box');
     chatBox.classList.remove('liveSupport-active');


 }

 function back(){
    document.querySelector('.live-content-admin').style.display="none";
    getChatUsers();
    console.log( document.querySelector('.live-content-admin'));
 }