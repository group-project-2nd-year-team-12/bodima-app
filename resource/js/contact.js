const contact1=document.querySelector('.box-1');
const contact2=document.querySelector('.box-2');
const contact3=document.querySelector('.box-3');

function add(x,y){
    document.querySelector(x).style.display='block';
    document.querySelector(y).style.display='none';
    document.querySelector(y).style.transition='0.5s';

}
function remove(x,y){
    document.querySelector(x).style.display='none';
    document.querySelector(y).style.display='block';
    document.querySelector(y).style.transition='0.5s';
}

contact1.addEventListener('mouseover',function(){ add('.box-1 h3','.fa-phone-alt')});
contact1.addEventListener('mouseout',function(){remove('.box-1 h3','.fa-phone-alt')});
contact2.addEventListener('mouseover',function(){add('.box-2 h3','.fa-envelope')});
contact2.addEventListener('mouseout',function(){remove('.box-2 h3','.fa-envelope')});
contact3.addEventListener('mouseover',function(){add('.box-3 h3','.fa-comments')});
contact3.addEventListener('mouseout',function(){remove('.box-3 h3','.fa-comments')});

contact1.addEventListener('click',(e)=>{
    document.querySelector('.call').style.display="block";
//    $(':not(.call i)').css('pointer-events','none');

})
document.querySelector('.call i').addEventListener('click',(e)=>{
    document.querySelector('.call').style.display='none';
})

contact2.addEventListener('click',(e)=>{
    document.querySelector('.email').style.display="block";

})
document.querySelector('.email i').addEventListener('click',(e)=>{
    document.querySelector('.email').style.display='none';
})

contact3.addEventListener('click',(e)=>{
    document.querySelector('.message').style.display="block";

})
document.querySelector('.message i').addEventListener('click',(e)=>{
    document.querySelector('.message').style.display='none';
})