const down=document.getElementById('down');
const dropDown=document.getElementById('dropDown');
const dropDownIcon=document.getElementById('down-icon');

down.addEventListener('click',(e)=>{
    if(dropDown.style.display=="none" || dropDown.style.display=="")
    {
        dropDown.style.display='flex';
        dropDownIcon.style.transform='rotate(180deg)';
    }
   else 
   {
    dropDown.style.display='none';
    dropDownIcon.style.transform='rotate(0deg)';
   }

})


const search=window.location.search;
const param=new URLSearchParams(search);
const availble=param.get('available');
const availableCheck=document.getElementById('available');
window.addEventListener('load',(e)=>{
    if(availble==0)
    {
        availableCheck.checked=false;
    }
    else if(availble==1)
    {
        availableCheck.checked=true;
    }
    
})
const availWord=document.getElementById('')
availableCheck.addEventListener('click',(e)=>{
    if(availableCheck.checked==false)
    {
        if(confirm('Are you sure disable this service ?'))
        {
            document.getElementById('formAvailable').submit();
            availableCheck.checked=false;
        }else{
            availableCheck.checked=true;
        }
    }else{
        if(confirm('Are you sure enable this service ?'))
        {
            document.getElementById('formAvailable').submit();
            availableCheck.checked=true;
        }else{
            availableCheck.checked=false;
        }
    }
})
        


// $(document).ready(function() {
//     // console.log("hello");
//     setTimeout(function() {
//         $('#error').fadeOut('slow');
//         $('#error').animate({transform:'translateY(100px)'});​
//     }, 1000)
// });
// $('#error').fadeOut('slow');


