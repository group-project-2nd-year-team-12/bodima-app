$(document).ready(function () {
    const date=new Date();
    var year=date.getFullYear();
    var month=date.toLocaleString('default', { month: 'long' });
    $('#report-year').val(year);
    $('#report-month').val(month);
        $.ajax({
            type: "POST",
            url:"../../controller/adminPanelCon.php",
            data:{foodDetails:"foodDetails",year:year,month:month},
            dataType:"json",
            success:function (data) {
                console.log(data);
                $('#countSB').html(data.countSB);
                $('#countSL').html(data.countSL);
                $('#countSD').html(data.countSD);
                $('#countLB').html(data.countLB);
                $('#countLL').html(data.countLL);
                $('#countLD').html(data.countLD);

                $('#countSBD').html(data.countSBD);
                $('#countSLD').html(data.countSLD);
                $('#countSDD').html(data.countSDD);
                $('#countLBD').html(data.countLBD);
                $('#countLLD').html(data.countLLD);
                $('#countLDD').html(data.countLDD);

                $('#valueSBD').html('Rs '+data.valueSBD);
                $('#valueSLD').html('Rs '+data.valueSLD);
                $('#valueSDD').html('Rs '+data.valueSDD);
                $('#valueLBD').html('Rs '+data.valueLBD);
                $('#valueLLD').html('Rs '+data.valueLLD);
                $('#valueLDD').html('Rs '+data.valueLDD);

                $('#gainSB').html('Rs '+data.valueSBD/10);
                $('#gainSL').html('Rs '+data.valueSLD/10);
                $('#gainSD').html('Rs '+data.valueSDD/10);
                $('#gainLB').html('Rs '+data.valueLBD/10);
                $('#gainLL').html('Rs '+data.valueLLD/10);
                $('#gainLD').html('Rs '+data.valueLDD/10);

                $('#addPec').html('Rs '+data.total);
                $('#userNumCount').html(data.posts);
            }
        });
});

// when  select the select then submit [foodReport.php]
$(document).ready(function () {
    $('#report-year , #report-month').change(function(){
        var year=$('#report-year').val();
        var month=$('#report-month').val();
        $.ajax({
            type: "POST",
            url:"../../controller/adminPanelCon.php",
            data:{foodDetails:"foodDetails",year:year,month:month},
            dataType:"json",
            success:function (data) {
                console.log(data);
                $('#countSB').html(data.countSB);
                $('#countSL').html(data.countSL);
                $('#countSD').html(data.countSD);
                $('#countLB').html(data.countLB);
                $('#countLL').html(data.countLL);
                $('#countLD').html(data.countLD);

                $('#countSBD').html(data.countSBD);
                $('#countSLD').html(data.countSLD);
                $('#countSDD').html(data.countSDD);
                $('#countLBD').html(data.countLBD);
                $('#countLLD').html(data.countLLD);
                $('#countLDD').html(data.countLDD);

                $('#valueSBD').html('Rs '+data.valueSBD);
                $('#valueSLD').html('Rs '+data.valueSLD);
                $('#valueSDD').html('Rs '+data.valueSDD);
                $('#valueLBD').html('Rs '+data.valueLBD);
                $('#valueLLD').html('Rs '+data.valueLLD);
                $('#valueLDD').html('Rs '+data.valueLDD);

                $('#gainSB').html('Rs '+data.valueSBD/10);
                $('#gainSL').html('Rs '+data.valueSLD/10);
                $('#gainSD').html('Rs '+data.valueSDD/10);
                $('#gainLB').html('Rs '+data.valueLBD/10);
                $('#gainLL').html('Rs '+data.valueLLD/10);
                $('#gainLD').html('Rs '+data.valueLDD/10);


                $('#addPec').html('Rs '+data.total);
                $('#userNumCount').html(data.posts);
            }
        });
    })

})