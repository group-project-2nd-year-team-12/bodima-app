<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Box</title>
    <link rel="stylesheet" href="../resource/css/popupBoxIshan.css">
</head>
<body>
    <?php 
    if (isset($_GET['request_id'])) {
         $request_id=$_GET['request_id'];
     } ?>

<div id="simpleModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            
            <h2>Your Payment is Unsuccessfull</h2>
        </div>
        <div class="modal-body">
       
            <p>You tried to pay online But your transaction is not valid. Now you can choose pay hand over option and cancel this deal.</p>
           
        </div>
        <div class="modal-footer">
           <button class="buttonhand" onclick="window.location='../controller/requestIshan.php?onPayNSReq=<?php echo $request_id;?>'">Pay handover</button>
           <button class="buttoncancel" onclick=" window.location='../controller/requestIshan.php?onReqCan=<?php echo $request_id;?>'">Cancel</button>
        </div>
    </div>
</div>
    
    
</body>
</html>