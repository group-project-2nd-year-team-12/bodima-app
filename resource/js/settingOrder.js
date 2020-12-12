const down=document.getElementById('down');
const dropDown=document.getElementById('dropDown');
const dropDownIcon=document.getElementById('down-icon');
down.addEventListener('click',(e)=>{
    if(dropDown.style.display=='none')
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