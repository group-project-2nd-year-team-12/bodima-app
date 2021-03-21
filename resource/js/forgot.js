// forgot password
$('#forgotForm').on('submit',function(){
    var email=$('#email').val();
    $.ajax({
        url:"../controller/forgotPasswordController.php",
        method:"POST",
        data:{submit:"submit",email:email},
        dataType:"json",
        success:function(data)
        {
            console.log(data);
            if(data.email!=""){
                $('#emailError').html(data.email);
                $('#email').css("background-color", "rgb(255, 224, 224)");
             }else{
                 window.location='emailVerify.php?email='+email+'&token='+data.token+'';
             }
        }
    });
    return false;
});


