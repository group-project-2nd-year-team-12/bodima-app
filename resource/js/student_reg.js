// form submission with ajax [register 1st page]
$('#studentReg').on('submit',function(){
    var first=$('#first_name').val();
    var last=$('#last_name').val();
    var nic=$('#nic').val();
    var email=$('#email').val();
    var level ='student';
    var password=$('#password').val();
    var confirmpassword=$('#confirmpassword').val();
    $.ajax({
        url:"../controller/registerCon.php",
        method:"POST",
        data:{saveStudent:"submit",first_name:first,last_name:last,nic:nic,email:email,level:level,password:password,confirmpassword:confirmpassword},
        dataType:"json",
        success:function(data)
        {
            console.log(data);
            if(data.pass!=""){
                $('#passError').html(data.pass);
                $('#password').css("background-color", "rgb(255, 224, 224)");
                $('#confirmpassword').css("background-color", "rgb(255, 224, 224)");
             }else{
                 window.location='emailVerify.php?email='+data.email+'&token='+data.token+'&level='+data.level+'';
             }
        }
    });
    return false;
});


