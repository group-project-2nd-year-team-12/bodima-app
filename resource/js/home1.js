
document.querySelector('.burger').addEventListener('click',(e)=>
{
    const slide=document.querySelector('.slide-nav');
    const slide_li=document.querySelectorAll('.slide-nav ul li');
    if(slide.classList.contains('slide-nav-animate'))
    {
        slide.classList.remove('slide-nav-animate');
    }
    else
    {
        slide.classList.add('slide-nav-animate');
    }
    slide_li.forEach((link,index) => {
        if(link.style.animation)
        {
            link.style.animation="";
        }else{
            link.style.animation='slideLink 1s ease forwards '+index/7 +'s ';
        }
    });
    document.querySelector('.burger').classList.toggle('rot');
})

function slide(){
    var height=$('.header').height();
    $(window).scroll(function(){
        if($(this).scrollTop()> height){
         $('.slide-nav-animate').addClass('slide-nav-after');
 
        }else{
         $('.slide-nav-animate').removeClass('slide-nav-after');
        //  console.log(height);
        }
    });
 }
 window.addEventListener('scroll',slide);





// notification menu appler
const noti=document.querySelector('.fa-bell');
const noti_box=document.querySelector('.notification-box');
const noti_close=document.querySelector('.fa-times');
var flag=0;
//  noti.addEventListener('click',(e)=>{
//      if(flag==0){
//         noti_box.style.display="block";
//         flag=1;
//      }
//      else{
//         noti_box.style.display="none";
//         flag=0;
//      }
//  })
//  $('.notification-box').click(function(event){
//     event.stopPropagation();
// });
// var flag=0;
window.onclick=function(event){
   if(event.target.closest(".fa-bell") && flag==0){
       noti_box.style.display="block";
       flag=1;
   }
   else
   {
       if((!event.target.closest(".notification-box")) &&  (!event.target.closest(".fa-bell")))
       {
           noti_box.style.display="none";
           flag=0;
       }
       if(event.target.closest(".fa-bell") && flag==1)
       {
           noti_box.style.display="none";
           flag=0;
       }

   }
}