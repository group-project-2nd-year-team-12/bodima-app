
// load nav
function checked(x)
{
    document.getElementById(x).style.color="#5d80b6";
    document.getElementById(x).style.borderLeft="3px solid #5d80b6";
}


// remove popup
function cancel(x,y){
const timeOutIcon=document.getElementById('timeOutIcon');
const timeOut=document.querySelector(x);
timeOutIcon.addEventListener('click',(e)=>{
    timeOut.classList.remove(y);
})
}

cancel('.timeOut','timeOut-active');
cancel('.orderAccept','orderAccept-active');

