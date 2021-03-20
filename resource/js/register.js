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
        data:{check:"check",first_name:first,last_name:last,nic:nic,email:email,level:level},
        dataType:"json",
        success:function(data)
        {
            console.log(data);
        }
    });

    return false;
})