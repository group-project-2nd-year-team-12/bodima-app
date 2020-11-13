function scrollApper1(){
    var introText=document.querySelector('.para1');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<=screenPosition)
    {
        introText.classList.add('para1-apper');
    }

}
function scrollApper2(){
    var introText=document.querySelector('.para4');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/1.3)
    {
        introText.classList.add('para4-apper');
    }

}

function scrollApper3(){
    var introText=document.querySelector('.para5');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/1.3)
    {
        introText.classList.add('para5-apper');
    }

}
function scrollimg1(){
    var introText=document.querySelector('.para2');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/1.3)
    {
        introText.classList.add('para2-apper');
    }

}
function scrollimg2(){
    var introText=document.querySelector('.para3');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/1.3)
    {
        introText.classList.add('para3-apper');
    }

}

function scrollimg3(){
    var introText=document.querySelector('.para6');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/1.3)
    {
        introText.classList.add('para6-apper');
    }

}
window.addEventListener('scroll',fixedTop);
window.addEventListener('scroll',scrollApper2);
window.addEventListener('scroll',scrollApper1);
window.addEventListener('scroll',scrollApper3);
window.addEventListener('scroll',scrollimg2);
window.addEventListener('scroll',scrollimg1);
window.addEventListener('scroll',scrollimg3);

// top bar fixed function
function fixedTop(){
   var height=$('.header').height();
   $(window).scroll(function(){
       if($(this).scrollTop()> height){
        $('.nav').addClass('nav-fixed');
        $('.slide-nav-animate').addClass('slide-nav-after');

       }else{
        $('.nav').removeClass('nav-fixed');
        $('.slide-nav-animate').removeClass('slide-nav-after');
        // console.log(height);
       }
   });
}

// slide bar slide function
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






// notification menu appler
 const noti=document.querySelector('.fa-bell');
 const noti_box=document.querySelector('.notification-box');
 const noti_close=document.querySelector('.fa-times');
 noti.addEventListener('click',(e)=>{
    noti_box.style.display="block";
 })

 noti_close.addEventListener('click',(e)=>{
    noti_box.style.display="none";
 })
