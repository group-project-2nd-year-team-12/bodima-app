var ratedIndex = -1;

function resetColors() {
    $(".rps i").css("color", "#e2e2e2")
}

function setStars(max) {
    for (var i = 0; i <= max; i++) {
        $(".rps i:eq(" + i + ")").css("color", "#f7bf17");

    }
}
$(document).ready(function() {

    $(".rpc i, .review-bg").click(function() {
        $(".review-modal").fadeOut();
    })
    $(".opmd").click(function() {
        $(".review-modal").fadeIn();
    })

    resetColors();

    $(".rps i").mouseover(function() {
        resetColors();
        var currentIndex = parseInt($(this).data("index"));
        setStars(currentIndex);
    })
    $(".rps i").on("click", function() {
        ratedIndex = parseInt($(this).data("index"));
        localStorage.setItem("rating", ratedIndex);
        $(".starRateV").val(parseInt(localStorage.getItem("rating")));
    })
    $(".rps i").mouseleave(function() {
        resetColors();
        if (ratedIndex != -1) {
            setStars(ratedIndex);
        }
    })
    if (localStorage.getItem("rating") != null) {
        setStars(parseInt(localStorage.getItem("rating")));
        $(".statRateV").val(parseInt(localStorage.getItem("rating")));
    }
    $(".rpbtn").click(function() {
        if ($("#rate-field").val() == '') {
            $(".rate-error").html("Please Fill In The Text Box!");
        } else if ($(".rateName").val() == '') {
            $(".rate-error").html("Please Enter Your Name !");
        } else if (localStorage.getItem("rating") == null) {
            $(".rate-error").html("Please Select A Star To Rate!");
        } else {
            $(".rate-error").html("");

            var $form = $(this).closest(".rmp");
            var starRate = $form.find(".starRateV").val();
            var rateMsg = $form.find(".rateMsg").val();
            var date = $form.find(".rateDate").val();
            var name = $form.find(".rateName").val();

            console.log($form);
            console.log(starRate);
            console.log(rateMsg);
            $.ajax({
                url: "../controller/rateCon.php",
                type: "POST",
                //dataType: "json",
                data: {
                    starRate: starRate,
                    rateMsg: rateMsg,
                    date: date,
                    name: name
                },
                success: function(data) {
                    //window.location = "index.php";
                    window.location.reload();
                    //console.log(data);
                    //window.location = "rate.php"
                }

            })

        }
    })
});