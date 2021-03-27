<div class="accept-box">
<div class="accept-content">
       <div class="title1">
           <div class="iconClose">  <i id="blockIcon" class="fas fa-times fa-2x" onclick="popBack()"></i></div>
       </div>
        <div><img src="https://img.icons8.com/metro/80/4a90e2/checked-user-male.png"/></div>
        <h1>Accept User</h1>
       <div class="block-contain">
       <div class="para">
           <p>
               Select the following reason for the user block Id number  [<span id="idBlock"></span> ]  and Email [ <span id="emailBlock"></span> ]
           </p>
           <form action="../controller/adminPanelCon.php" method="post">
                <input id="email-save" type="hidden" name="email">
                <input id="level-save" type="hidden" name="level">
                
                <div class="btn-class">
                    <button name="block" style="margin: 10px 0 10px 0;" class="accept-btn" id="accept-btn" type="submit">Confirm</button>
                    <button type="button" class="cancel-btn" onclick="popBack()">cancel</button>
                </div>
           </form>
       </div>
       </div>

   </div>
</div>