$(document).ready(function () {
    window.onload=function(){
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
                var pec=((data.nowCount)/(data.student+data.boarder+data.food_supplier+data.boardings_owner))*100;
                pec=pec.toFixed(2);
                $('#addPec').html(pec+'%');
                $('#userNumCount').html(data.student+data.boarder+data.food_supplier+data.boardings_owner);
            }
        });
    }
});

// when  select the select then submit
$(document).ready(function () {
    $('#report-year , #report-month').change(function(){
        // this.form.submit();
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


// PDF function
$(document).ready(function () {
    $('#userPDF').click(function(){
        var htmlDetails=$('#report-table').html();
        console.log(htmlDetails);
        htmlDetail=htmlDetails.trim();
        htmlDetail=''+htmlDetails+'';
        console.log(htmlDetail.trim());
        htmlDetails=encodeURIComponent(htmlDetails);

        
        // alert(htmlDetails);
        window.location="../../controller/adminPanelCon.php?userPDF="+htmlDetails+"";
    })
})