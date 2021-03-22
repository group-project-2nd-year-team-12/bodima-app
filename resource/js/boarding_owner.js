// form submission with ajax [register 1st page]
$('#boardingReg').on('submit',function(){
    var first=$('#first_name').val();
    var last=$('#last_name').val();
    var nic=$('#nic').val();
    var email=$('#email').val();
    var level ='boardings_owner';
    var password=$('#password').val();
    var confirmpassword=$('#confirmpassword').val();
    var address=$('#address').val();
    var link=$('#link').val();
    $.ajax({
        url:"../controller/registerCon.php",
        method:"POST",
        data:{submitBoarding:"submitBoarding",first_name:first,last_name:last,nic:nic,email:email,level:level,password:password,confirmpassword:confirmpassword,address:address,link:link},
        dataType:"json",
        success:function(data)
        {
            console.log(data);
            if(data.state=='unsucess'){
                if(data.pass!=""){
                    $('#passError').html(data.pass);
                    $('#password').css("background-color", "rgb(255, 224, 224)");
                    $('#confirmpassword').css("background-color", "rgb(255, 224, 224)");
                 }else{
                    $('#passError').html('');
                    $('#password').css("background-color", "#b8bcc4");
                    $('#confirmpassword').css("background-color", "#b8bcc4");
                 }
                 if(data.address!=""){
                    $('#addError').html(data.address);
                    $('#address').css("background-color", "rgb(255, 224, 224)");
                 }else{
                    $('#addError').html("");
                    $('#address').css("background-color", "#b8bcc4");            
                 }
                 if(data.link!=""){
                    $('#linkError').html(data.link);
                    $('#link').css("background-color", "rgb(255, 224, 224)");
                 }else{
                    $('#linkError').html('');
                    $('#link').css("background-color", "#b8bcc4");             
                }
            }else if(data.state=='sucess'){
                window.location='emailVerify.php?email='+data.email+'&token='+data.token+'&level='+data.level+'';
            }
          
        }
    });
    return false;
});

