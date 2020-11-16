window.addEventListener('load',(e)=>{
    document.querySelector('.section1-header h2').style.opacity=1;
    document.querySelector('.section1-header h4').classList.add('section1-apper');
})

function fixedTop(){
    var height=$('.header').height();
    $(window).scroll(function(){
        if($(this).scrollTop()> height){
         $('.nav').addClass('nav-fixed');
         $('.slide-nav-animate').addClass('slide-nav-after');
 
        }else{
         $('.nav').removeClass('nav-fixed');
         $('.slide-nav-animate').removeClass('slide-nav-after');
        //  console.log(height);
        }
    });
 }
 window.addEventListener('scroll',fixedTop);
// window.addEventListener('scroll',(e)=>{
//     const sec1=document.querySelector('.section1-header h4');
// })
// $(document).ready(function() { 

//     $("html").niceScroll();

//   }

// );
function scrollimg1(){
    var introText=document.querySelector('.section2');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/2)
    {
        document.querySelector('.find').classList.add('find-apper');
    }else
    {
        document.querySelector('.find').classList.remove('find-apper');
    }
}
function scrollimg2(){
    var introText=document.querySelector('.section2');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/2)
    {
        document.querySelector('.boarding').classList.add('boarding-apper');
    }
    else
    {
        document.querySelector('.boarding').classList.remove('boarding-apper');
    }
}

function scrollimg3(){
    var introText=document.querySelector('.section2');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/2)
    {
        document.querySelector('.delivery').classList.add('delivery-apper');
    }
    else
    {
        document.querySelector('.delivery').classList.remove('delivery-apper');
    }
}
window.addEventListener('scroll',scrollimg1);
window.addEventListener('scroll',scrollimg2);
window.addEventListener('scroll',scrollimg3);
