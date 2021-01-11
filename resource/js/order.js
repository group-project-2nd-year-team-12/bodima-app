var search=window.location.search;
var param=new URLSearchParams(search);
var availble=param.get('available');
var availWord=document.getElementById('availSpan');
window.addEventListener('load',(e)=>{
    if(availble==0)
    {
        // availableCheck.checked=false;
        availWord.style.color='#ffca0a';
        availWord.innerHTML='Unavailable';
    }
    else if(availble==1)
    {
        // availableCheck.checked=true;
        availWord.style.color='#40c057';
        
    }
    
})

const breakfastFocus=document.getElementById('breakfast');
const lunchfastFocus=document.getElementById('lunch');
const dinnerfastFocus=document.getElementById('dinner');
const longTermfastFocus=document.getElementById('longTerm');
const shortTermfastFocus=document.getElementById('shortTerm');

function focus_food(){
    window.addEventListener('load',(e)=>{ 
        console.log('hi');
        breakfastFocus.style.backgroundColor='orange';
        })
    breakfastFocus.addEventListener('click',(e)=>{
        breakfastFocus.style.backgroundColor='orange';
        lunchfastFocus.style.backgroundColor='initial';
        dinnerfastFocus.style.backgroundColor='initial';
        longTermfastFocus.style.backgroundColor='initial';
    })
    lunchfastFocus.addEventListener('click',(e)=>{
        lunchfastFocus.style.backgroundColor='orange';
        breakfastFocus.style.backgroundColor='initial';
        dinnerfastFocus.style.backgroundColor='initial';
        longTermfastFocus.style.backgroundColor='initial';
    })
    dinnerfastFocus.addEventListener('click',(e)=>{
        dinnerfastFocus.style.backgroundColor='orange';
        lunchfastFocus.style.backgroundColor='initial';
        breakfastFocus.style.backgroundColor='initial';
        longTermfastFocus.style.backgroundColor='initial';
    })
    longTermfastFocus.addEventListener('click',(e)=>{
        longTermfastFocus.style.backgroundColor='orange';
        lunchfastFocus.style.backgroundColor='initial';
        dinnerfastFocus.style.backgroundColor='initial';
        breakfastFocus.style.backgroundColor='initial';
    })
    
}


focus_food();