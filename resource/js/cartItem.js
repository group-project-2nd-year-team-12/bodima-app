//schedule create [time range of order]
function shedule(){
  var sedule= new Date();
  var hour=sedule.getHours();
  var minute=sedule.getMinutes();
  var shedule="shedule";
  // var timeRange='<option value=>NOW</option>';
  var timeRange='<option value="'+ampmFormat(hour,minute)+'">NOW</option>';
  $.ajax({
    type: "Post",
    url: "../controller/cartCon.php",  // get term of order in cart variable
    data:{shedule:shedule},
    dataType: "json",
    success: function (data) {
        //breakfast
      if(data.type=="breakfast")
      {
        var timeLine=11;   //  breakfast end variable
        if(minute < 30)
        {
            var timeStart=30;
            hour+=0.5;
        }
        else if(minute >=30 && minute < 60){
            var timeStart=0;
             hour+=1;
        }
       if(hour < 7)
       {
           hour=7;
       }
       var fromHour=0;
       var fromMin=0;
       var toHour=0;
       var toMin=0;
      for(var i=hour;i<timeLine;i+=0.5)
      {
          fromHour=Math.floor(i);
          fromMin=(timeStart)%60;
          toHour=Math.floor(i+0.5)
          toMin=(timeStart+30)%60;

          timeRange+='<option value="'+ampmFormat(fromHour,fromMin)+'-'+ampmFormat(toHour,toMin)+'">'+ampmFormat(fromHour,fromMin)+'-'+ampmFormat(toHour,toMin)+'</option>';
          timeStart+=30;
      }
      document.querySelector('.shedule-time').innerHTML=timeRange;
      }
      //lunch
      if(data.type=="lunch")
      {
        var timeLine=15;
          if(minute < 30)
          {
              var timeStart=30;
              hour+=0.5;
          }
          else if(minute >=30 && minute < 60){
              var timeStart=0;
               hour+=1;
          }
          if(hour < 12)
          {
              hour=12;
          }
        for(var i=hour;i<timeLine;i+=0.5)
        {
            fromHour=Math.floor(i);
            fromMin=(timeStart)%60;
            toHour=Math.floor(i+0.5)
            toMin=(timeStart+30)%60;
            timeRange+='<option value="'+ampmFormat(fromHour,fromMin)+'-'+ampmFormat(toHour,toMin)+'">'+ampmFormat(fromHour,fromMin)+'-'+ampmFormat(toHour,toMin)+'</option>';
            timeStart+=30;
        }
        document.querySelector('.shedule-time').innerHTML=timeRange;
      }
      //dinner
      if(data.type=="dinner")
      {
        var timeLine=22;
        if(minute < 30)
        {
            var timeStart=30;
            hour+=0.5;
        }
        else if(minute >=30 && minute < 60){
            var timeStart=0;
             hour+=1;
        }
       if(hour < 17 )
       {
           hour=17;
       }

      for(var i=hour;i<timeLine;i+=0.5)
      {
          fromHour=Math.floor(i);
          fromMin=(timeStart)%60;
          toHour=Math.floor(i+0.5)
          toMin=(timeStart+30)%60;
        console.log(document.querySelector('.shedule-time'));
        timeRange+='<option value="'+ampmFormat(fromHour,fromMin)+'-'+ampmFormat(toHour,toMin)+'">'+ampmFormat(fromHour,fromMin)+'-'+ampmFormat(toHour,toMin)+'</option>';
        timeStart+=30;
      }
      document.querySelector('.shedule-time').innerHTML=timeRange;
      }

    }
  });
}

function ampmFormat(hours,minutes) {
  if(hours>=12){
    var ampm="PM";
  }else{
    var ampm="AM";
  }
  hours = hours % 12;
  if(hours==0){
    hours=12;
  }
  if(minutes<10){
    minutes='0'+minutes;
  }
  var strTime = hours + ':' + minutes + ' ' + ampm;
  return strTime;
}

window.onload=shedule(); // call the function

