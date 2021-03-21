// form submission with ajax [register 1st page]
$('#registerForm').on('submit',function(){
    var first=$('#first_name').val();
    var last=$('#last_name').val();
    var nic=$('#nic').val();
    var email=$('#email').val();
    var level = $('input[name="level"]:checked').val()
    $.ajax({
        url:"../controller/registerCon.php",
        method:"POST",
        data:{submit:"submit",first_name:first,last_name:last,nic:nic,email:email,level:level},
        dataType:"json",
        success:function(data)
        {
            console.log(data);
          if(data.state=='unsucess')
          {
            if(data.eFirst!=""){
                $('#firstError').html(data.eFirst);
                $('#first_name').css("background-color", "rgb(255, 224, 224)");
             }else{
                 $('#firstError').html("");
                 $('#first_name').css("background-color", "#b8bcc4");
             }
             if(data.eLast!=""){
                 $('#lastError').html(data.eLast);
                 $('#last_name').css("background-color", "rgb(255, 224, 224)");
              }else{
                  $('#lastError').html("");
                  $('#last_name').css("background-color", "#b8bcc4");
              }
              if(data.eNic!=""){
                 $('#nicError').html(data.eNic);
                 $('#nic').css("background-color", "rgb(255, 224, 224)");
              }else{
                  $('#nicError').html("");
                  $('#nic').css("background-color", "#b8bcc4");
              }
              if(data.eEmail!=""){
                 $('#emailError').html(data.eEmail);
                 $('#email').css("background-color", "rgb(255, 224, 224)");
              }else{
                  $('#emailError').html("");
                  $('#email').css("background-color", "#b8bcc4");
              }
          }else if(data.state=='sucess')
          {
            if(data.level=="boardings_owner")
                {
                    window.location='boarding_owner_reg.php?email='+data.email+'&first_name='+data.first_name+'&last_name='+data.last_name+'&nic='+nic;
                }
            if(data.level=="student")
                {
                    window.location='student_reg.php?email='+data.email+'&first_name='+data.first_name+'&last_name='+data.last_name+'&nic='+nic;
                }
            if(data.level=="food_supplier")
                {
                    window.location='food_supplier_reg.php?email='+data.email+'&first_name='+data.first_name+'&last_name='+data.last_name+'&nic='+nic;                
                }
          }
        }
    });

    return false;
})