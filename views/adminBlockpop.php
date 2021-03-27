<div class="block-box">
<div class="block">
       <div class="title1">
           <div class="iconClose">  <i id="blockIcon" class="fas fa-times fa-2x" onclick="popBack('.block-box')"></i></div>
       </div>
        <div><img src="https://img.icons8.com/pastel-glyph/80/4a90e2/user-lock.png"/></div>
        <h1>Block User</h1>
       <div class="block-contain">
       <div class="para">
           <p>
               Select the following reason for the user block Id number  [<span id="idBlock"></span> ]  and Email [ <span id="emailBlock"></span> ]
           </p>
           <form action="../controller/adminPanelCon.php" method="post">
               
               <div class="con">
                    <input type="checkbox" name="condition1" value="Breaks user aggreement" id="1">
                    <label for="1">Breaks user aggreement</label>
                </div>
                <div class="con">
                    <input type="checkbox" value="Complain about post" name="condition2" id="2">
                    <label for="2">Complain about post</label>
                </div>
                <div class="con">
                    <input type="checkbox" value="Complaine about profile"  name="condition3" id="3">
                    <label for="3">Complaine about profile</label>
                </div>
                <div class="con">
                    <input type="checkbox" value="Unauthorised sales"  name="condition4" id="4">
                    <label for="4">Unauthorised sales</label>
                </div>
                <div class="con"> 
                    <input type="checkbox" value="Vialate user condition" name="condition5" id="5">
                    <label for="5">Vialate user condition</label>
                </div>
                <div class="con"> 
                    <input type="checkbox" value="Vialate user condition" name="condition5" id="6">
                    <label for="5">Other</label>
                </div>
           
                <input id="email-block" type="hidden" name="email">
                <input id="level-block" type="hidden" name="level">
                
                <div class="btn-class">
                    <button name="block" style="margin: 10px 0; background-color: rgb(139, 139, 139)" class="accept-btn" id="block-btn" type="submit" disabled>Confirm</button>
                    <button type="button" class="cancel-btn" onclick="popBack('.block-box')">cancel</button>
                </div>
           </form>
       </div>
       </div>

   </div>
</div>

<script>
          $('#1').click(title);
          $('#2').click(title);
          $('#3').click(title);
          $('#4').click(title);
          $('#5').click(title);
          $('#6').click(title);

        function title()
        { 
                if($('#1').is(":checked") || $('#2').is(":checked") || $('#3').is(":checked") || $('#4').is(":checked") || $('#5').is(":checked") || $('#6').is(":checked") )
            {
                $('#block-btn').removeAttr('disabled',false);
                $('#block-btn').css('background-color','#0093FF');
            }
            else{
                $('#block-btn').attr('disabled',true);
                $('#block-btn').css('background-color','gray');
            }
        }
</script>