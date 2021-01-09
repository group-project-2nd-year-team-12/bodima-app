


const breakfastFocus=document.getElementById('breakfast');
const lunchfastFocus=document.getElementById('lunch');
const dinnerfastFocus=document.getElementById('dinner');
const longTermfastFocus=document.getElementById('longTerm');
const shortTermfastFocus=document.getElementById('shortTerm');

function focus_request(){
    window.addEventListener('load',(e)=>{ 
        shortTermfastFocus.style.backgroundColor='orange';
    });
    shortTermfastFocus.addEventListener('click',(e)=>{
        shortTermfastFocus.style.backgroundColor='orange';
        longTermfastFocus.style.backgroundColor='initial';
    });
    longTermfastFocus.addEventListener('click',(e)=>{
        longTermfastFocus.style.backgroundColor='orange';
        shortTermfastFocus.style.backgroundColor='initial';
    })
    
}

focus_request();

