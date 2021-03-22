// reset  password
$('#resetForm').on('submit',function(){
    var password=$('#password').val();
    var confirmpassword=$('#confirmpassword').val();
    $.ajax({
        url:"../controller/newPasswordCon.php",
        method:"POST",
        data:{submit:"submit",password:password,confirmpassword:confirmpassword},
        dataType:"json",
        success:function(data)
        {
            console.log(data);
            if(data.pass!=""){
                $('#passError').html(data.pass);
                $('#password').css("background-color", "rgb(255, 224, 224)");
                $('#confirmpassword').css("background-color", "rgb(255, 224, 224)");
             }else{
                 window.location='user_loging.php';
             }
        }
    });
    return false;
});
