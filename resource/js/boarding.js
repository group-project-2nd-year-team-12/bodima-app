function text(x) {
    if (x == '0') {
        document.getElementById('indivi').style.display = 'block';
        document.getElementById('ROrH').style.display = 'none';

    } else {
        document.getElementById('indivi').style.display = 'none';
        document.getElementById('ROrH').style.display = 'block';
    }

}




$('.group').on('input', '.prc', function() {
    var totalsum = 0;
    $('.group .prc').each(function() {
        var inputVal = $(this).val();
        if ($.isNumeric(inputVal)) {
            totalsum = parseFloat(inputVal) * 100;
        }

    });
    $('#Aamount').val(totalsum);
    //$('#result').text(totalsum);

    //result=$_SESSION['totalsum']

});

$('form').submit(function(e) {
    $(':disabled').each(function(e) {
        $(this).removeAttr('disabled');
    })

});