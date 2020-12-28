

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





