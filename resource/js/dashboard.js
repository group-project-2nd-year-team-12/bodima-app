
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "../controller/adminPanelCon.php",
        data: {getAdmin:'getAdmin'},
        dataType: "json",
        success: function (data) {
            $('#all').html(data.all);
            $('#pendingOrder').html(data.pendingOrder);
            $('#completeOrder').html(data.completeOrder);
            $('#allRenu').html('Rs '+(data.fRenue+data.bRenue));
            $('#foodRenu').html('Rs '+data.fRenue);
            $('#boardingRenu').html('Rs '+data.bRenue);
            $('#orderTotal').html('Rs '+data.totalOrder);
            $('#allReq').html(data.allReq);
            $('#penReq').html(data.penReq);
            $('#comReq').html(data.comReq);
        }
    });
});