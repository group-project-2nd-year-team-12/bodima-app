

//schedule
function shedule(){
  var sedule= new Date();
  var hour=sedule.getHours();
  var minute=sedule.getMinutes();
  var shedule="shedule";
  var timeRange='<option value="now">NOW</option>';
  $.ajax({
    type: "Post",
    url: "../controller/cartCon.php",
    data:{shedule:shedule},
    dataType: "json",
    success: function (data) {
        //breakfast
      if(data.type=="breakfast")
      {
        var timeLine=11;
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

      for(var i=hour;i<timeLine;i+=0.5)
      {
        console.log(document.querySelector('.shedule-time'));
          timeRange+='<option value="'+Math.floor(i)+'.'+(timeStart)%60+'-'+Math.floor(i+0.5)+'.'+(timeStart+30)%60+'">'+Math.floor(i)+'.'+(timeStart)%60+'-'+Math.floor(i+0.5)+'.'+(timeStart+30)%60+' </option>';
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
            timeRange+='<option Value="'+Math.floor(i)+'.'+(timeStart)%60+'-'+Math.floor(i+0.5)+'.'+(timeStart+30)%60+'">'+Math.floor(i)+'.'+(timeStart)%60+'-'+Math.floor(i+0.5)+'.'+(timeStart+30)%60+' </option>';
            timeStart+=30;
        }
        document.querySelector('.shedule-time').innerHTML=timeRange;
      }
      //dinner
      if(data.type=="dinner")
      {
        var timeLine=19;
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
        console.log(document.querySelector('.shedule-time'));
          timeRange+='<option value="'+Math.floor(i)+'.'+(timeStart)%60+'-'+Math.floor(i+0.5)+'.'+(timeStart+30)%60+'">'+Math.floor(i)+'.'+(timeStart)%60+'-'+Math.floor(i+0.5)+'.'+(timeStart+30)%60+' </option>';
          timeStart+=30;
      }
      document.querySelector('.shedule-time').innerHTML=timeRange;
      }

    }
  });
}

window.onload=shedule();