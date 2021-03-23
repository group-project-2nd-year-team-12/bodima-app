$(document).ready(function () {
    window.onload=function(){
        $.ajax({
            type: "POST",
            url:"../../controller/adminPanelCon.php",
            data:{userDetails:"userDetails"},
            dataType:"json",
            success:function (data) {
                console.log(data);
                $('#stuC').html(data.studentC);
                $('#boaC').html(data.boarderC);
                $('#boardingC').html(data.food_supplierC);
                $('#foodC').html(data.boardings_ownerC);
            }
        });
    }
});


