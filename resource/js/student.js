$('#1').click(tick); // title function
$('#2').click(tick);
$('#3').click(tick);
$('#4').click(tick);
$('#5').click(tick);
$('#6').click(tick);

function tick()
{ 
  if(this.checked)
{
  $('.btn button').removeAttr('disabled',false);
  $('.btn button').css('background-color','red');
}
else{if(!$('#1').is(":checked") && !$('#2').is(":checked") && !$('#3').is(":checked") && !$('#4').is(":checked") && !$('#5').is(":checked") ){
  $('.btn button').attr('disabled',true);
  $('.btn button').css('background-color','gray');
}
}
}


