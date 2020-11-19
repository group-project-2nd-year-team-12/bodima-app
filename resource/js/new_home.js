window.addEventListener('load',(e)=>{
    const text=document.querySelector('.section1-header h2');  // text tag eka gaththa 
    const starText=text.textContent;       // eke thina 
    const splitText=starText.split("");
    // console.log(splitText);
    text.textContent="";
    for(let i=0;i<splitText.length;i++){
        text.innerHTML+="<span>"+splitText[i]+"</span>";
    }
    let char =0;
    let timer = setInterval(onTick,50);
    function onTick(){
        const span=text.querySelectorAll("span")[char];
        span.classList.add("fade");
        console.log(span);
        char++;
        if(char===splitText.length){
            complete();
            return;
        }

    }
    function complete(){
        clearInterval(timer);
        timer=null;
    }
    document.querySelector('.section1-header h4').classList.add('section1-apper');
});

// function fixedTop(){
//     var height=$('.header').height();
//     $(window).scroll(function(){
//         if($(this).scrollTop()> height){
//          $('.nav').addClass('nav-fixed');
//          $('.slide-nav-animate').addClass('slide-nav-after');
 
//         }else{
//          $('.nav').removeClass('nav-fixed');
//          $('.slide-nav-animate').removeClass('slide-nav-after');
//         //  console.log(height);
//         }
//     });
//  }
//  window.addEventListener('scroll',fixedTop);
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

function scrollimg4(){
    var introText=document.querySelector('.section4');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/2)
    {
        document.querySelector('.keymoney').classList.add('keymoney-apper');
    }else
    {
        document.querySelector('.keymoney').classList.remove('keymoney-apper');
    }
}
function scrollimg5(){
    var introText=document.querySelector('.section4');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/2)
    {
        document.querySelector('.free').classList.add('free-apper');
    }
    else
    {
        document.querySelector('.free').classList.remove('free-apper');
    }
}

function scrollimg6(){
    var introText=document.querySelector('.section4');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/2)
    {
        document.querySelector('.order').classList.add('order-apper');
    }
    else
    {
        document.querySelector('.order').classList.remove('order-apper');
    }
}
window.addEventListener('scroll',scrollimg4);
window.addEventListener('scroll',scrollimg5);
window.addEventListener('scroll',scrollimg6);

function scrollimg7(){
    var introText=document.querySelector('.section6');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/2)
    {
        document.querySelector('.boarder').classList.add('boarder-apper');
    }else
    {
        document.querySelector('.boarder').classList.remove('boarder-apper');
    }
}
function scrollimg8(){
    var introText=document.querySelector('.section6');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/2)
    {
        document.querySelector('.post').classList.add('post-apper');
    }
    else
    {
        document.querySelector('.post').classList.remove('post-apper');
    }
}

function scrollimg9(){
    var introText=document.querySelector('.section6');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/2)
    {
        document.querySelector('.order-b').classList.add('order-b-apper');
    }
    else
    {
        document.querySelector('.order-b').classList.remove('order-b-apper');
    }
}
window.addEventListener('scroll',scrollimg7);
window.addEventListener('scroll',scrollimg8);
window.addEventListener('scroll',scrollimg9);

function scrollimg10(){
    var introText=document.querySelector('.section8');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/2)
    {
        document.querySelector('.grow').classList.add('grow-apper');
    }else
    {
        document.querySelector('.grow').classList.remove('grow-apper');
    }
}
function scrollimg11(){
    var introText=document.querySelector('.section8');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/2)
    {
        document.querySelector('.post-a').classList.add('post-a-apper');
    }
    else
    {
        document.querySelector('.post-a').classList.remove('post-a-apper');
    }
}

function scrollimg12(){
    var introText=document.querySelector('.section8');
    var introPosition=introText.getBoundingClientRect().top;
    var screenPosition=window.innerHeight;

    if(introPosition<screenPosition/2)
    {
        document.querySelector('.get').classList.add('get-apper');
    }
    else
    {
        document.querySelector('.get').classList.remove('get-apper');
    }
}
window.addEventListener('scroll',scrollimg10);
window.addEventListener('scroll',scrollimg11);
window.addEventListener('scroll',scrollimg12);

