// order setting drop down 
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

// check available or not food supplier 
var search=window.location.search;
var param=new URLSearchParams(search);
var availble=param.get('available');
var availWord=document.getElementById('availSpan');
var availableCheck=document.getElementById('available');
window.addEventListener('load',(e)=>{
    if(availble==0)
    {
        availableCheck.checked=false;
        availWord.style.color='rgb(255, 202, 10)';
        availWord.innerHTML='Unavailable';
    }
    else if(availble==1)
    {
        availableCheck.checked=true;
        availWord.style.color='#40c057';
        
    }
    setTimeout(function() {
        // window.location='../controller/orderCon.php?id=1';
    }, 5000)
    
})


// available button settings
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
 



