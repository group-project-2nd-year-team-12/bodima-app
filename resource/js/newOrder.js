
var search=window.location.search;
var param=new URLSearchParams(search);
var availble=param.get('available');
var availWord=document.getElementById('availSpan');
console.log('dnv jdbv h');
window.addEventListener('load',(e)=>{
    if(availble==0)
    {
        // availableCheck.checked=false;
        availWord.style.color='red';
        availWord.innerHTML='Unavailable';
    }
    else if(availble==1)
    {
        // availableCheck.checked=true;
        availWord.style.color='#40c057';
        
    }
    
})