
// load nav
function checked(x)
{
    document.getElementById(x).style.color="#5d80b6";
    document.getElementById(x).style.borderLeft="3px solid #5d80b6";
}


// remove popup
const timeOutIcon=document.getElementById('timeOutIcon');
const timeOut=document.querySelector('.timeOut');
timeOutIcon.addEventListener('click',(e)=>{
    timeOut.style.display='none';

})
