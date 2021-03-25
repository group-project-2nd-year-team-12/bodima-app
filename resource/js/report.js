// when load get all details  [report.php]
$(document).ready(function () {
        const date=new Date();
        var year=date.getFullYear();
        var month=date.toLocaleString('default', { month: 'long' });
        $('#report-year').val(year);
        $('#report-month').val(month);
        $.ajax({
            type: "POST",
            url:"../../controller/adminPanelCon.php",
            data:{userDetails:"userDetails",year:year,month:month},
            dataType:"json",
            success:function (data) {
                console.log(data);
                $('#stu').html(data.student);
                $('#boa').html(data.boarder);
                $('#foodSupplier').html(data.food_supplier);
                $('#boardings').html(data.boardings_owner);

                $('#stuC').html(data.studentC);
                $('#boaC').html(data.boarderC);
                $('#boardingC').html(data.boardings_ownerC);
                $('#foodC').html(data.food_supplierC);

                $('#sRate').html(data.rateS+'%');
                $('#bRate').html(data.rateB+'%');
                $('#boRate').html(data.rateBO+'%');
                $('#fRate').html(data.rateF+'%');
                var pec=((data.nowCount)/(data.student+data.boarder+data.food_supplier+data.boardings_owner))*100;
                pec=pec.toFixed(2);
                $('#addPec').html(pec+'%');
                $('#userNumCount').html(data.student+data.boarder+data.food_supplier+data.boardings_owner);
            }
        });
});

// when  select the date then submit [report.php]
$(document).ready(function () {
    $('#report-year , #report-month').change(function(){
        var year=$('#report-year').val();
        var month=$('#report-month').val();
        $.ajax({
            type: "POST",
            url:"../../controller/adminPanelCon.php",
            data:{userDetails:"userDetails",year:year,month:month},
            dataType:"json",
            success:function (data) {
                console.log(data);
                $('#stu').html(data.student);
                $('#boa').html(data.boarder);
                $('#foodSupplier').html(data.food_supplier);
                $('#boardings').html(data.boardings_owner);

                $('#stuC').html(data.studentC);
                $('#boaC').html(data.boarderC);
                $('#boardingC').html(data.boardings_ownerC);
                $('#foodC').html(data.food_supplierC);

                $('#sRate').html(data.rateS+'%');
                $('#bRate').html(data.rateB+'%');
                $('#boRate').html(data.rateBO+'%');
                $('#fRate').html(data.rateF+'%');
                $('#addPec').html(data.nowCount+'%');
                $('#userNumCount').html(data.student+data.boarder+data.food_supplier+data.boardings_owner);
            }
        });
    })

})
