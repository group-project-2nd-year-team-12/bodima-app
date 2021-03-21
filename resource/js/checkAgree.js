// check the agrement is check or not
function checkAggre()
{
    window.addEventListener('click',(e)=>{
        
        if(document.getElementById('check').checked==true)
        {
            document.getElementById('register').disabled=false;
            document.getElementById('register').style.backgroundColor=' #101e5a';
        }
        else
        {
            document.getElementById('register').disabled=true;
            document.getElementById('register').style.backgroundColor='gray';
        }
    });
    window.addEventListener('load',(e)=>{
        document.getElementById('register').disabled=true;
        document.getElementById('register').style.backgroundColor='gray';
    })
}

checkAggre();