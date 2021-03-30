// load nav select
function checked(x)
{
    document.getElementById(x).style.color="#5d80b6";
    document.getElementById(x).style.borderLeft="3px solid #5d80b6";
    document.getElementById(x).style.backgroundColor="#000033";
}


// slide bar animation
document.querySelector('.element1').addEventListener('click',(e)=>{
    if(!$('.element1 > div').hasClass('item-active')){
    $('.element1 > div').addClass('item-active');
    }else{
        $('.element1 > div').removeClass('item-active'); 
    }
})
document.querySelector('.element2').addEventListener('click',(e)=>{
    if(!$('.element2 > div').hasClass('item-active')){
        $('.element2 > div').addClass('item-active');
        }else{
            $('.element2 > div').removeClass('item-active'); 
        }
})
document.querySelector('.element3').addEventListener('click',(e)=>{
    if(!$('.element3 > div').hasClass('item-active')){
        $('.element3 > div').addClass('item-active');
        }else{
            $('.element3 > div').removeClass('item-active'); 
        }
})
document.querySelector('.element4').addEventListener('click',(e)=>{
    if(!$('.element4 > div').hasClass('item-active')){
        $('.element4 > div').addClass('item-active');
        }else{
            $('.element4 > div').removeClass('item-active'); 
        }
})



// table details send to PDF function [report]
$('#userPDF').click(function(){
    var htmlDetails=$('#report-table').html();
    var reportName=$('#reportName').text();
    htmlDetail=htmlDetails.trim();
    htmlDetail=''+htmlDetails+'';
    console.log(htmlDetail.trim());
    htmlDetails=encodeURIComponent(htmlDetails);
    window.location="../controller/adminPanelCon.php?userPDF="+htmlDetails+"&name="+reportName;
})


// report change function [userdetails ,food post, boarding post ]
$('#report-Type').change(function(){
    var type=$('#report-Type').val();
    if(type=="User"){
        window.location="adminReports.php";
    }
    else if(type=="Food"){
        window.location="adminFoodReport.php";
    }
})



// onclick function display block 
function popBlock(id,email,level)
{
  document.querySelector('.block-box').style.display='block';
  // document.querySelector('div:not(.block)').style.filter='blur(6px)';
  document.getElementById('idBlock').innerHTML='User Id :'+id;
  document.getElementById('emailBlock').innerHTML='User email :'+email;
  document.getElementById('email-block').value=email;
  document.getElementById('level-block').value=level;

}


function unBlock(id,email,level)
{
  document.querySelector('.unblock-box').style.display='block';
  // document.querySelector('div:not(.block)').style.filter='blur(6px)';
  document.getElementById('idUnBlock').innerHTML='User Id :'+id;
  document.getElementById('emailUnBlock').innerHTML='User email :'+email;
  document.getElementById('email-save').value=email;
  document.getElementById('level-save').value=level;

}


// onclick display none function
function popBack(x)
{
  document.querySelector(x).style.display='none';
}

