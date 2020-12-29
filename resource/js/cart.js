
// $(window).on('popstate', function(event) {
//   alert("pop");
//   console.log('hbdhbhdcbhjbsd');
//  });
//  window.onhashchange = function() {
//   alert("pop");
//  }

//  console.log('hbdhbhdcbhjbsd');
function disBtn()
{
  // document.getElementById('request').disabled=true;
  document.getElementById('request').style.backgroundColor="gray";
  document.getElementById('request').innerHTML="Pending";
  // window.location="../views/cartItem.php";
}

function cancelLongTerm(){
  // document.getElementById('longTerm-check').checked=false;
  $("#longTerm-check").prop("checked", false);
  document.querySelector('.longTerm').classList.remove('longTerm-active');
  document.querySelector('.shedule').style.display='none';
}

function activeLongterm(){
  $("#longTerm-check").prop("checked", true);
  document.querySelector('.longTerm').classList.remove('longTerm-active');
  document.querySelector('.shedule').style.display='block';
}

$(document).ready(function () {
  function cartMange()
  {
   var manage='manage';
   $.ajax({
     url:'../controller/cartCon.php',
     method:'post',
     dataType:'json',
     data:{manage:manage},
     success:function(data)
     {
       console.log(data);
       if(data.term=="")
       {
         document.getElementById('1').disabled=false;
         document.getElementById('2').disabled=false;
         document.getElementById('3').disabled=false;
         document.getElementById('longTerm-check').disabled=false;
       }
       else{
        document.getElementById('1').disabled=true;
        document.getElementById('2').disabled=true;
        document.getElementById('3').disabled=true;
        document.getElementById('longTerm-check').disabled=true;
        if(document.getElementById('longTerm-check').checked==true)
        {
          document.querySelector('.shedule').style.display='block';
        }
       }
     }
   })
  }
  cartMange();


 function loadSession()
  {
   var count='count';
   $.ajax({
     url:'../controller/cartCon.php',
     method:'post',
     dataType:'json',
     data:{count:count},
     success:function(data)
     {
       $('.count').html(data.count);
     }
   });
   
  }

  loadSession();
});

function formSheduleValidate()
{
  var startDate=$('#startDate').val();
  var endDate=$('#endDate').val();
  console.log(startDate);
  var inpStart=new Date(startDate);
  var inpEnd=new Date(endDate);
  var today= new Date();
  var errorStart=$('#error-start');
  var errorEnd=$('#error-end');

  if(startDate=="")
  {
    errorStart.html('* Date not selected');
    return false;
  }
  if(endDate=="")
  {
    errorEnd.html('* Date not selected');
    return false;
  }

  if((today.setHours(0, 0, 0, 0) > inpStart.setHours(0, 0, 0, 0)))
  {
    errorStart.html('* You can\'t select past date');
    return false;
  }
  if((today.setHours(0, 0, 0, 0) > inpEnd.setHours(0, 0, 0, 0)))
  {
    errorEnd.html('* You can\'t select past date');
    return false;
  }
   if(inpStart.setHours(0, 0, 0, 0) > inpEnd.setHours(0, 0, 0, 0))
  {
    errorEnd.html('* Invalid date selection');
    return false;
  }

   if((inpEnd.getTime()-today.getTime())/(1000 * 60 * 60 * 24)>30)
  {
    errorEnd.html('* Select date within one month');
    return false;
  }

  return true;
}                 






