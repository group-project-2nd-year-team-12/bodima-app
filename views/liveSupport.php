<?php if(isset($_SESSION['email'])){?>
                <div class="liveSupport">
                     <div class="live-box">
                         <div class="live-header">
                                <!-- <div id="back" class="avater"  style="cursor:pointer"><i onclick=back(); class="fas fa-chevron-left fa-lg"></i></div> -->
                                 <h3>Live support</h3>
                                 <i style="cursor:pointer" onclick=removeLive(); class="fas fa-times fa-lg"></i>                            
                         </div>
                            <?php 

                             if($_SESSION['level']=="administrator"){?>
                                <div class="admin-side">
                                    
                                </div>
                                <div class="live-content-admin">
                                </div>
                            <?php }else{ ?>
                                <div class="live-content">

                                </div>
                                <?php }
                                ?>
                                
                        <div class="live-footer">
                        <form action="#" id="live-form">
                            <input type="text" placeholder="Type a massege" name="" id="chat">
                            <button onclick=chatLive()><i  class="far fa-paper-plane fa-lg"></i></button>
                        </form>
                        </div>
                     </div>
                     <div onclick=activeLive(); style="cursor: pointer;"  class="live-icon"><i style="position: relative;"  class="fas fa-comment fa-4x"></i><i class="fas fa-comment-alt fa-lg"></i></div>
                </div>
<?php } ?>